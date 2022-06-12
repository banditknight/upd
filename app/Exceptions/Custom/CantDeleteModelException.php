<?php

namespace App\Exceptions\Custom;

use Symfony\Component\HttpFoundation\Response;

class CantDeleteModelException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_cant_delete_model_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
