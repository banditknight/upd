<?php

namespace App\Http\Controllers\App\v1;

use App\Application\ResourceTransformer;
use App\Http\Controllers\AbstractController as BaseAbstractController;
use App\Traits\RepositoryModelDeciderTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\ArraySerializer;
use Tymon\JWTAuth\JWTAuth;

abstract class AbstractController extends BaseAbstractController
{
    use RepositoryModelDeciderTrait;

    protected $fractal;

    protected $request;

    public function __construct(Manager $fractal, Request $request, JWTAuth $JWTAuth)
    {
        parent::__construct($JWTAuth);

        $this->repo = $this->getRepo();
        $this->fractal = $fractal;
        $this->request = $request;
    }

    protected function responseSuccess($data, $httpStatusCode = 200, $message = 'Success'): \Illuminate\Http\JsonResponse
    {
        return $this->jsonResponseSuccess($this->transformToArray($data), $httpStatusCode, $message);
    }

    private function transformToArray($data): ?array
    {
        $paginator = null;

        if (is_array($data)) return $data;

        //Replace paginator data to collection
        if ($data instanceof LengthAwarePaginator) {
            $paginator = $data; //Copy data into paginator before replace it with collection
            $data = $data->getCollection();
        }

        if ($this->isNoNeedToTransform($data)) return [];

        $resourceType = 'League\\Fractal\\Resource\\';

        if (
            $data instanceof \Illuminate\Database\Eloquent\Collection &&
            $data->count() === 1 &&
            !$this->request->get('isPagination', true)
        ) {
            $paginator = null;
            $data = $data->get(0);
        }

        $resourceType .= $data instanceof Model ? 'Item' : 'Collection';
        $transformerClass = $this->getTransformer($data);
        $resource = new $resourceType($data, $transformerClass);

        //Set paginator if there is page param
        if ($paginator instanceof LengthAwarePaginator) {
            $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        }

        if (is_null($this->request->get('include'))) {
            return $this->fractal->setSerializer(new ArraySerializer)->createData($resource)->toArray();
        }

        return $this->fractal->parseIncludes($this->request->get('include'))->setSerializer(new ArraySerializer)->createData($resource)->toArray();
    }

    private function jsonResponseSuccess(array $data, $httpStatusCode = 200, $message = 'Success'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => [
                'code'    => 200,
                'message' => $message
            ],
            'data' => empty($data) ? null : $data
        ], $httpStatusCode);
    }

    private function getTransformer($obj)
    {
        $temp = explode('\\', get_class($obj));
        $transformerClass = end($temp);

        if ($transformerClass === 'Collection') {
            return $this->getTransformer($obj->first());
        }

        $transformerClass = 'App\\Application\\Transformers\\' . $transformerClass . 'Transformer';

        if (!class_exists($transformerClass)) {
            $transformerClass = ResourceTransformer::class;
        }

        return new $transformerClass;
    }

    /**
     * Check the data if no need to transform
     *
     * @param Collection $data
     * @return boolean
     * @throws \Exception
     */
    private function isNoNeedToTransform($data): bool
    {
        //Model always need to transform
        if ($data instanceof Model) return false;


        if ($data instanceof \Exception) {
            throw new $data();
        }

        if ($data instanceof \Yajra\DataTables\CollectionDataTable) return false;

        if ($data === null) return true;

        //If Collection is empty, no need to transform
        return $data->count() === 0;
    }
}
