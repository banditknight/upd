<?php

namespace App\Exceptions\Custom\Vendor;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class RegisterFailedException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(__('status.status_message_registration_failed_exception'), Response::HTTP_INTERNAL_SERVER_ERROR, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
