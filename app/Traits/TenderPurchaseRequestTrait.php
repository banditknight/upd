<?php

namespace App\Traits;

use App\Models\v1\PurchaseRequestItem;
use App\Models\v1\Tender;
use App\Models\v1\TenderItem;
use App\Models\v1\PurchaseRequest;
use Illuminate\Support\Facades\DB;

trait TenderPurchaseRequestTrait
{
    public function purchaseRequestToTender($data) : array
    {

        DB::beginTransaction();

        try {

            $data['number'] = "TD".sprintf('%06d',Tender::count());

            $tender = Tender::create($data);

            $purchaseRequestIds = array_column($data['purchaseRequest'] ?? [],'id');

            $purchaseRequestItems = PurchaseRequestItem::join(
                'purchaseRequests',
                'purchaseRequests.id', '=', 'purchaseRequestItems.purchaseRequestId'
            )->join(
                'unitOfMeasures',
                'unitOfMeasures.code', '=', 'purchaseRequestItems.uom'
            )->whereIn('purchaseRequests.id', $purchaseRequestIds)->get([
                'purchaseRequestItems.id',
                'purchaseRequestItems.qty AS quantity',
                'unitOfMeasures.id AS unitOfMeasureId',
                'purchaseRequestItems.description AS description',
                'purchaseRequestItems.estimationUnitCost AS value',
                'purchaseRequests.currencyId AS currencyId',
            ])->each(static function($purchaseRequestItem, $index) use ($tender) {
                /** @var PurchaseRequestItem $purchaseRequestItem */
                /** @var Tender $tender */
                $purchaseRequestItem->setAttribute('tenderId', $tender->id);
                $purchaseRequestItem->setAttribute('productCodeId', 1);
                $purchaseRequestItem->setAttribute('productGroupCodeId', 1);
                $purchaseRequestItem->setAttribute('purchaseRequestItemId', $purchaseRequestItem->id);

                TenderItem::create($purchaseRequestItem->toArray());
            });

            foreach ($purchaseRequestIds as $pri) {
                $pr = PurchaseRequest::find($pri);
                $pr->docStatusId = 4; // complete PR
                $pr->save();
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return $tender->toArray();
    }
}
