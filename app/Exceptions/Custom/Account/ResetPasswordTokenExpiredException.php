<?php

namespace App\Exceptions\Custom\Account;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordTokenExpiredException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_reset_password_token_expired_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
