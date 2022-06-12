<?php

namespace App\Exceptions\Custom;

use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractException extends \Exception
{
    protected $statusCode;

    protected $statusMessage;

    protected $httpStatusCode;

    public function __construct(
        string $statusMessage = 'Something went wrong',
        int $statusCode = 400,
        int $httpStatusCode = Response::HTTP_BAD_REQUEST
    ) {
        parent::__construct();

        Log::info($statusMessage);

        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;
        $this->httpStatusCode = $httpStatusCode;
    }

    public function jsonErrorResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => [
                'code'    => $this->statusCode,
                'message' => $this->statusMessage
            ],
            'data' => null
        ], $this->httpStatusCode);
    }
}
