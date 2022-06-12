<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\UserTrait;

class AnnouncementVendorTest extends \App\v1\TestCase
{
    use UserTrait;

    public CONST END_POINT = 'app.vendor';

    public function testIndex()
    {
        $this
            ->loginAs($this->getVendorUser())
            ->get(route(sprintf('%s.%s', self::END_POINT, 'index')))
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([]);
    }
}
