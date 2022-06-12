<?php

namespace App\Exceptions\Custom\Repository;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class RepositoryModelNotFoundException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_repository_model_not_found_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
