<?php

namespace App\Http\Controllers;

use App\Events\ExampleEvent;
use App\Events\v1\VendorRegistered;
use App\Models\v1\Vendor;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
//        $job = (new SendMailJob())->delay(60);
//
//        $this->dispatch($job);

//        Mail::to('yuliusardin@gmail.com')
//            ->send(new \App\Mail\v1\VendorRegistered(Vendor::find(1)));


        event(new ExampleEvent());
        event(new VendorRegistered(Vendor::find(1)));
    }
}
