<?php

namespace App\Exceptions\Custom\JoinTender;

use App\Exceptions\Custom\AbstractException;
use Symfony\Component\HttpFoundation\Response;

class AlreadyJoinTenderException extends AbstractException
{
    public function __construct(string $statusMessage = 'Something went wrong', int $statusCode = 400, int $httpStatusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct(
            __('status.status_message_already_join_tender_exception'),
            $statusCode,
            $httpStatusCode
        );
    }
}
