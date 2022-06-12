<?php

use App\Models\v1\Bank;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\{UserTrait};

class BankTest extends \BackOffice\v1\TestCase
{
    use UserTrait;

    public const END_POINT = 'bo.bank';

    public function testIndex()
    {
        $this
            ->loginAs($this->getSuperAdminUser())
            ->get(route(sprintf('%s.%s', self::END_POINT, 'index')))
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([
                'data' => [
                    'data' => ['*' =>
                        [
                            'id',
                            'code',
                            'name'
                        ]
                    ],
                    'meta' => [
                        '*' => [
                            'total',
                            'count',
                            'per_page',
                            'current_page',
                            'total_pages',
                            'links',
                        ]
                    ]
                ]
            ]);
    }

    public function testShow()
    {
        $this
            ->loginAs($this->getSuperAdminUser())
            ->get(route(sprintf('%s.%s', self::END_POINT, 'show'), [
                'id' => 1
            ]))
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([
                'data' => [
                    'id', 'name', 'code'
                ]
            ]);
    }

    public function testStoreWithInValidCode()
    {
        $data = [
            'code' => 'LOREM TEST',
            'name' => 'Lorem Test'
        ];

        $this
            ->loginAs($this->getSuperAdminUser())
            ->post(route(sprintf('%s.%s', self::END_POINT, 'store'), $data))
            ->seeStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testStore()
    {
        $data = [
            'code' => 'LOREM_TEST',
            'name' => 'Lorem Test'
        ];

        $this
            ->loginAs($this->getSuperAdminUser())
            ->post(route(sprintf('%s.%s', self::END_POINT, 'store'), $data))
            ->seeStatusCode(Response::HTTP_OK);
    }

    public function testUdate()
    {
        $latestBank = Bank::orderBy('id', 'desc')->first()->only(['id']);

        $data = [
            'code' => 'TEST_LOREM',
            'name' => 'Test Lorem'
        ];

        $this
            ->loginAs($this->getSuperAdminUser())
            ->put(
                route(sprintf('%s.%s', self::END_POINT, 'update'), $latestBank),
                $data
            )
            ->seeStatusCode(Response::HTTP_OK);
    }

    public function testDelete()
    {
        $data = Bank::orderBy('id', 'desc')->first()->only(['id']);

        $this
            ->loginAs($this->getSuperAdminUser())
            ->delete(route(sprintf('%s.%s', self::END_POINT, 'destroy'), $data))
            ->seeStatusCode(Response::HTTP_OK);
    }
}
