<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Workflow\Exception\NotEnabledTransitionException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $rendered = parent::render($request, $exception);

        if (env('APP_DEBUG', true) && app()->environment('local')) {
            return $rendered;
        }

        if ($exception instanceof \App\Exceptions\Custom\AbstractException) {
            return $exception->jsonErrorResponse();
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'status' => [
                    'code'    => $rendered->getStatusCode(),
                    'message' => $exception->validator->getMessageBag()->first()
                ],
                'data' => $exception->validator->getMessageBag()
            ], $rendered->getStatusCode());
        }

        if ($exception instanceof \Illuminate\Database\QueryException) {
            return response()->json([
                'status' => [
                    'code'    => $rendered->getStatusCode(),
                    'message' => app()->environment('local') ? $exception->getMessage() :
                        $this->resolverQueryExceptionCode($exception->getCode())
                ],
                'data' => null
            ], $rendered->getStatusCode());
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'status' => [
                    'code'    => Response::HTTP_NOT_FOUND,
                    'message' => !$exception->getMessage() ?
                        __('status.status_message_not_found_exception') : $exception->getMessage()
                ],
                'data' => null
            ], $rendered->getStatusCode());
        }

        if ($exception  instanceof UnauthorizedException) {
            return response()->json([
                'status' => [
                    'code'    => Response::HTTP_FORBIDDEN,
                    'message' => $exception->getMessage()
                ],
                'data' => null
            ], $rendered->getStatusCode());
        }

        if ($exception  instanceof ModelNotFoundException) {
            return response()->json([
                'status' => [
                    'code'    => Response::HTTP_NOT_FOUND,
                    'message' => __('status.status_message_model_with_id_not_found_exception', [
                        'id' => implode($exception->getIds())
                    ])
                ],
                'data' => null
            ], $rendered->getStatusCode());
        }

        if ($exception instanceof NotEnabledTransitionException) {
            return response()->json([
                'status' => [
                    'code'    => Response::HTTP_BAD_REQUEST,
                    'message' => $exception->getMessage(),
                ],
                'data' => null
            ], $rendered->getStatusCode());
        }

        // @todo do something with error message, Such as notify developer.
        return response()->json([
            'status' => [
                'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => app()->environment('local') ?
                    $exception->getMessage() :
                    __('status.status_message_global_exception')
            ],
            'data' => null
        ], $rendered->getStatusCode());
    }

    private function resolverQueryExceptionCode($code)
    {
        if ($code === '23000') {
            return __('status.status_message_unique_violation_constraint_exception');
        }

        return __('status.status_message_query_exception');
    }
}
