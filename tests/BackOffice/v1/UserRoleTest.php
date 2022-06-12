<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\UserTrait;

class UserRoleTest extends \BackOffice\v1\TestCase
{
    use UserTrait;

    public function testVendorAccessBackOfficeEndPoint()
    {
        $this
            ->loginAs($this->getVendorUser())
            ->get(route('bo.bank.index'))
            ->seeStatusCode(Response::HTTP_FORBIDDEN);
    }

    public function testSuperAdminAccessBackOfficeEndPoint()
    {
        $this
            ->loginAs($this->getSuperAdminUser())
            ->get(route('bo.bank.index'))
            ->seeStatusCode(Response::HTTP_OK);
    }
}
