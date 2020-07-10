<?php

namespace App\Http\Controllers\Admin\Aggregator\Nucleus;

use App\Proxy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProxyController extends Controller
{
    public function receiveAll(){

        return response()->json(Proxy::all(), 200);
    }
}
