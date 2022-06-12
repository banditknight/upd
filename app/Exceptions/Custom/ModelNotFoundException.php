<?php

namespace App\Exceptions\Custom;

use Symfony\Component\HttpFoundation\Response;

class ModelNotFoundException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_model_not_found_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
