<?php

namespace App\Http\Controllers\Auto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function start(){
        return view('auto.site.templates.basicHTML');
    }
}
