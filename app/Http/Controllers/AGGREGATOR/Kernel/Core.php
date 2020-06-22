<?php

namespace App\Http\Controllers\AGGREGATOR\Kernel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\AGGREGATOR\Kernel\Connection;
use App\Http\Controllers\AGGREGATOR\Kernel\ProxyAlgorithm as Proxy;


class Core extends Controller
{
    protected $proxy;

    public function __construct(Proxy $proxy){
        $this->proxy = $proxy;
    }

    public function startProcedure(){
        for($i = 0; $i < 20; $i++){
            $this->generate_proxy(1);
        }
//        $this->connection();
    }

    private function generate_proxy($type){
        //types: random, new, current
        return $this->proxy->Generate($type);

    }

    private function connection(){
        $connection = new Connection();
    }
}
