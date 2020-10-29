<?php

namespace App\Http\Controllers\Aggregator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//services
use App\Http\Controllers\Aggregator\Resources\AutoRia;
//use App\Http\Controllers\Parser\Resources\Unews;
//use App\Http\Controllers\Parser\Resources\Kp;

class Parse extends Controller
{

    public function runParseLinks(){
        ini_set('max_execution_time', 3600);
        (new AutoRia)->runCollectLinks();
//        (new UkrHealth)->run();
//        (new Unews)->run();

    }


    public function runParseCards(){
        ini_set('max_execution_time', 9600);
        (new AutoRia)->runCollectCards();
//        (new UkrHealth)->run();
//        (new Unews)->run();

    }

}
