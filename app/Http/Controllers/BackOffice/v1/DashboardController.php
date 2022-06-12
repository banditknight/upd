<?php

namespace App\Http\Controllers\BackOffice\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\PurchaseRequest;
use App\Models\v1\RequestForQuotation;
use App\Models\v1\Tender;
use App\Models\v1\TenderItem;
use App\Models\v1\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $spent = 0 ;

        $ts = Tender::where('docStatusId',4)->get();
        foreach ($ts as $t) {
            foreach ($t->items as $e) {
                $value = (int)$e->value * (int)$e->quantity;
                $spent += $value;
            }
        }

        return response()->json([
            'status' => [
                'code'    => 200,
                'message' => 'Success'
            ],
            'data' => [
                'spent' => [
                    'total' => $spent
                ],
                'tender' => [
                    'total' => Tender::count()
                ],
                'rfq' => [
                    'total' => RequestForQuotation::count()
                ],
                'vendor' => [
                    'total' => Vendor::count()
                ],
                'expenses' => [
                    'options' => [
                        'chart' => [
                            'id' => 'expense-chart'
                        ],
                        'xaxis' => [
                            'categories' => [2017, 2018, 2019, 2020, 2021],
                        ],
                        'plotOptions' => [
                            'bar' => [
                                'columnWidth' => '40%',
                                'borderRadius' => 4
                            ]
                        ],
                        'colors' => ['#01902c', '#E91E63', '#9C27B0']
                    ],
                    'series' => [
                        [
                            'name' => 'Volume',
                            'data' => [
                                210, 228, 378, 50, 289
                            ]
                        ]
                    ]
                ],
                'expensesByProject' => [
                    'series' => [
                        1,
                        2,
                        3,
                        4,
                        5,
                    ],
                    'options' => [
                        'chart' => [
                            'type' => 'donut',
                        ],
                        'labels' => [
                            'Upgrade Pompa Utama',
                            'Upgrade Filter Limbah',
                            'E-Procurement',
                            'IT Security',
                            'Renovasi Kantor',
                        ],
                        'responsive' => [
                            [
                                'breakpoint' => 480,
                                'options' => [
                                    'chart' => [
                                        'width' => '100%',
                                        'height' => 300,
                                    ],
                                    'legend' => [
                                        'position' => 'bottom',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'expensesBySupplier' => [
                    'series' => [
                        [
                            'data' => [1, 2, 3, 5, 5, 3]
                        ]
                    ],
                    'options' => [
                        'chart' => [
                            'type' => 'bar',
                        ],
                        'plotOptions' => [
                            'bar' => [
                                'borderRadius' => 4,
                                'horizontal' => true,
                            ],
                        ],
                        'dataLabels' => [
                            'enabled' => false,
                        ],
                        'xaxis' => [
                            'categories' => [
                                'PT. Jaya Abadi',
                                'PT. PMA',
                                'PT. YES',
                                'Asia Jaya Perkasa',
                                'PT. Langit Digital',
                                'Sentral Nusa',
                            ],
                        ],
                    ]
                ],
                'approvalRequest' => [
                    [
                        'code' => 'BID-000013',
                        'name' => 'Pengadaan Bearing Gearbox Sucker Rod Pump Lapangan Langgak',
                        'date' => Carbon::now()->addDays(-7)->timestamp,
                        'progress' => '60%'
                    ],
                    [
                        'code' => 'BID-000014',
                        'name' => 'Lelang ulang Jasa Penyediaan Katering dan Jasa Pendukungnya untuk Area Operasi PT SPR Langgak',
                        'date' => Carbon::now()->addDays(-1)->timestamp,
                        'progress' => '70%'
                    ],
                    [
                        'code' => 'BID-000017',
                        'name' => 'Jasa Angkut dan Penyediaan Bahan Bakar Solar Industri Secara Call Off Order (COO) untuk Operasional Lapangan PT SPR Langgak',
                        'date' => Carbon::now()->addDays(10)->timestamp,
                        'progress' => '80%'
                    ]
                ],
                'spentPerBuyer' => [
                    'series' => [
                        [
                            'data' => [400, 430, 448, 470, 540, 580]
                        ]
                    ],
                    'options' => [
                        'chart' => [
                            'type' => 'bar',
                        ],
                        'plotOptions' => [
                            'bar' => [
                                'borderRadius' => 4,
                                'horizontal' => true,
                            ],
                        ],
                        'dataLabels' => [
                            'enabled' => false,
                        ],
                        'xaxis' => [
                            'categories' => [
                                'IT Dept.',
                                'Shipment',
                                'Warehouse',
                                'Director',
                                'Marketing',
                                'Production',
                            ],
                        ],
                    ]
                ],
                'latestPurchaseRequisition' => PurchaseRequest::query()
                    ->orderByDesc('id')
                    ->limit(5)
                    ->get()
                    ->toArray()
                ,
                'latestQuotation' => [

                ],
            ]
        ], 200);
    }
}
