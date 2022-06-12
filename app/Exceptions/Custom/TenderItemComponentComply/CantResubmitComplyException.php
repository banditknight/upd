<?php

namespace App\Exceptions\Custom\TenderItemComponentComply;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class CantResubmitComplyException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_cant_resubmit_comply_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
