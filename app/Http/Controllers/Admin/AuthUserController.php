<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthUserController extends BasicController
{
    public function receiveData(){
        return response()->json(Auth::user(), 200);
    }
}
