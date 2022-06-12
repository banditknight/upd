<?php

namespace App\Exceptions\Custom\Account;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_unauthorized'),
            Response::HTTP_UNAUTHORIZED,
            Response::HTTP_UNAUTHORIZED
        );
    }
}
