<?php

namespace App\Exceptions\Custom\File;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class LoginToAccessFileException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_login_to_access_file_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
