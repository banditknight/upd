<?php

namespace App\Http\Controllers\BackOffice\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\v1\TenderParticipant;

class TenderProcessController extends AbstractController
{
    public function index(Request $request)
    {
        $aanwid = TenderParticipant::where([
            'tenderId' => $request->tenderId,
            'aanwijzing' => true,
        ])->paginate($request->limit);
        return $this->responseSuccess($aanwid);
    }

    public function show($id)
    {
        $aanwid = TenderParticipant::where('id', $id)->first();
        return $this->responseSuccess($aanwid);
    }

    public function aanwijzingvendor($id)
    {
        $v = request()->all();
        foreach ($v as $value) {
            $vendor = TenderParticipant::where(['tenderId' => $id, 'vendorId' => $value])->first();
            $vendor->aanwijzing = true;
            $vendor->update();
        }

        $data = TenderParticipant::where([
            'tenderId' => $id,
            'aanwijzing' => true,
        ])->get();

        return $this->responseSuccess($data);
    }

    public function aanwijzingvendordestroy($id)
    {
        $v = request()->all();
        foreach ($v as $value) {
            $vendor = TenderParticipant::where(['tenderId' => $id, 'vendorId' => $value])->first();
            $vendor->aanwijzing = false;
            $vendor->update();
        }

        $data = TenderParticipant::where([
            'tenderId' => $id,
            'aanwijzing' => true,
        ])->get();

        return $this->responseSuccess($data);
    }
}
