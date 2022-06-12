<?php

use App\Http\Requests\v1\BankAccount\StoreRequest;
use App\Models\v1\BankAccount;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\{FakerTrait, UserTrait};

class BankAccountTest extends \App\v1\TestCase
{
    use UserTrait, DatabaseTransactions, FakerTrait;

    public CONST END_POINT = 'app.account';

    public function testIndex()
    {
        $this
            ->loginAs($this->getVendorUser())
            ->get(route(sprintf('%s.%s', self::END_POINT, 'index')))
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([
                'data' => [
                    'data' => ['*' =>
                        [
                            'id',
                            'accountNumber',
                            'accountHolderName',
                            'bankAddress',
                            'bank' => [
                                'id', 'name'
                            ],
                            'currency' => [
                                'id', 'code', 'name', 'symbol'
                            ]
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

    public function testShowSuccess()
    {
        $this
            ->loginAs($this->getVendorUser())
            ->get(route(sprintf('%s.%s', self::END_POINT, 'show'), [
                'id' => BankAccount::where('vendorId', '=', $this->vendorId)->get(['id'])->last()->id,
            ]))
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([
                'data' => [
                    'id',
                    'accountNumber',
                    'accountHolderName',
                    'bankAddress',
                    'bank' => [
                        'id', 'name'
                    ],
                    'currency' => [
                        'id', 'code', 'name', 'symbol'
                    ]
                ]
            ]);
    }

    public function testShowFailed()
    {
        $this
            ->loginAs($this->getVendorUser())
            ->get(route(sprintf('%s.%s', self::END_POINT, 'show'), [
                'id' => BankAccount::where('vendorId', '=', $this->vendorId)->get(['id'])->last()->id + 1,
            ]))
            ->seeStatusCode(Response::HTTP_NOT_FOUND)
            ->seeJsonStructure([]);
    }

    /**
     * @dataProvider provideValidData
     */
    public function testStore(array $data)
    {
        $this
            ->loginAs($this->getVendorUser())
            ->post(route(sprintf('%s.%s', self::END_POINT, 'store'), $data))
            ->seeStatusCode(Response::HTTP_OK);
    }

    /**
     * @dataProvider provideValidData
     */
    public function testUdate(array $data)
    {
        $latestBankAccount = BankAccount::orderBy('id', 'desc')->first()->only(['id']);

        $this
            ->loginAs($this->getVendorUser())
            ->put(
                route(sprintf('%s.%s', self::END_POINT, 'update'), $latestBankAccount),
                $data
            )
            ->seeStatusCode(Response::HTTP_OK);
    }

    public function testDeleteFailed()
    {
        $latestBankAccount = BankAccount::orderBy('id', 'desc')->first()->only(['id']);

        $this
            ->loginAs($this->getVendorUser())
            ->delete(route(sprintf('%s.%s', self::END_POINT, 'destroy'), $latestBankAccount))
            ->seeStatusCode(Response::HTTP_NOT_FOUND);
    }

    /**
     * @dataProvider provideValidData
     */
    public function testFormRequestValidationWithValidData(array $data)
    {
        $bankAccountStoreRequest = Mockery::mock(StoreRequest::class);
        $bankAccountStoreRequest->shouldReceive('all')->andReturn($data);

        $isPasses = Validator::make(
            $bankAccountStoreRequest->all(),
            (new StoreRequest())->rules()
        )->passes();

        $this->assertTrue($isPasses);
    }

    /**
     * @dataProvider provideInvalidData
     */
    public function testFormRequestValidationWithInvalidData(array $data)
    {
        $bankAccountStoreRequest = Mockery::mock(StoreRequest::class);
        $bankAccountStoreRequest->shouldReceive('all')->andReturn($data);

        $isFails = Validator::make(
            $bankAccountStoreRequest->all(),
            (new StoreRequest())->rules()
        )->fails();

        $this->assertTrue($isFails);
    }

    public function provideValidData()
    {
        return [
            [
                [
                    'bankId' => 1,
                    'accountNumber' => $this->getFaker()->bankAccountNumber,
                    'accountHolderName' => $this->getFaker()->name,
                    'bankAddress' => $this->getFaker()->streetAddress,
                    'currencyId' => 1
                ]
            ],
        ];
    }

    public function provideInvalidData()
    {
        return [
            [
                [
                    // Missing fields.
                ]
            ],
            [
                [
                    'bankId' => null, // bankId is can't be null
                    // accountNumber is missing
                    // accountHolderName is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 'ABC', // bankId is can't be string
                    // accountNumber is missing
                    // accountHolderName is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => true, // bankId is can't be boolean
                    // accountNumber is missing
                    // accountHolderName is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 100, // bankId is valid but could not find the requested id
                    // accountNumber is missing
                    // accountHolderName is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],

            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => null, // accountNumber can't be null
                    // 'accountHolderName' is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => 'ABC123', // accountNumber can't be string
                    // 'accountHolderName' is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => true, // accountNumber can't be boolean
                    // 'accountHolderName' is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    // 'accountHolderName' is missing
                    // bankAddress is missing
                    // currencyId is missing
                ]
            ],

            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => null, // accountHolderName can't be null
                    // 'bankAddress' is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => true, // accountHolderName can't be boolean
                    // 'bankAddress' is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test-ing', // accountHolderName must valid AlphaSpaceDotComma()
                    // 'bankAddress' is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test 123', // accountHolderName must valid AlphaSpaceDotComma()
                    // 'bankAddress' is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test !', // accountHolderName must valid AlphaSpaceDotComma()
                    // 'bankAddress' is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    // 'bankAddress' is missing
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => null, // bankAddress can't be null
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => false, // bankAddress can't be boolean
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => 'Some Address Number 5', // bankAddress is valid.
                    // currencyId is missing
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => 'Some Address Number 5', // bankAddress is valid.
                    'currencyId' => null, // currencyId can't be null
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => 'Some Address Number 5', // bankAddress is valid.
                    'currencyId' => false, // currencyId can't be boolean
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => 'Some Address Number 5', // bankAddress is valid.
                    'currencyId' => 'ABC', // currencyId can't be string
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => 'Some Address Number 5', // bankAddress is valid.
                    'currencyId' => 1000, // currencyId is numeric but id can't be found.
                ]
            ],
            [
                [
                    'bankId' => 1, // bankId is valid
                    'accountNumber' => '4565126467', // accountNumber is valid but duplicate
                    'accountHolderName' => 'Test.', // accountHolderName valid AlphaSpaceDotComma()
                    'bankAddress' => 'Some Address Number 5', // bankAddress is valid.
                    'currencyId' => -1, // currencyId is numeric and valid CurrencyValid()
                ]
            ],
        ];
    }
}
