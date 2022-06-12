<?php

namespace App\Traits;

use App\Events\v1\VendorRegistered;
use App\Exceptions\Custom\Vendor\RegisterFailedException;
use App\Models\v1\Vendor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;

trait VendorRegisterTransaction
{
    use Asset;

    public function transaction(\Laravel\Lumen\Http\Request $request)
    {
        try {
            DB::beginTransaction();
            /** @var Vendor $registerVendor */

            $latestid = 'TMP001';
            $latest = DB::table('vendors')->latest()->first();
            if(!empty($latest->id)){
                $latestid = 'TMP'.sprintf('%03d'.$latest->id);
            }

            $request->request->set('registrationNumber', $latestid);
            // $request->request->set('registrationNumber', Uuid::uuid4()->toString());
            $registerVendor = $this->repo->create($request->request->all());

            event(new VendorRegistered($registerVendor));

            DB::commit();

            return $registerVendor;
        } catch (QueryException $queryException) {
            DB::rollback();

            return new RegisterFailedException();
        } catch (\Exception $exception) {
            DB::rollback();

            return $exception;
        }
    }
}
