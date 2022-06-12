<?php

namespace App\Exceptions\Custom\File;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class FileDoesNotBelongToYouException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_file_does_not_belong_to_you_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
