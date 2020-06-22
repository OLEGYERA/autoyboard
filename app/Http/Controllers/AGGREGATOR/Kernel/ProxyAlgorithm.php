<?php

namespace App\Http\Controllers\AGGREGATOR\Kernel;
use Illuminate\Support\Arr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProxyAlgorithm extends Controller
{

    private $list_proxy = [
        ['932.27.42.2', 'id' => 0, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['93.190.44.51', 'id' => 1, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['91.217.2.2', 'id' => 2, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['71.21.4.2', 'id' => 3, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['56.2.42.2', 'id' => 4, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['17.17.42.2', 'id' => 5, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['715.217.42.2', 'id' => 6, 'https://', 'O9e5TwD', 'N5k6WhE'],
        ['700.217.42.2', 'id' => 7, 'https://', 'O9e5TwD', 'N5k6WhE'],
    ];
    private $used_proxy = [];
    private $last_proxy;


    public function Generate($type){
        return $this->getProxy($type);
    }

    private function getProxy($type_proxy){
        $catch_proxy = null;

        switch ($type_proxy){
            case 0: // random
                $catch_proxy = $this->randomize($this->list_proxy, false);
                break;
            case 1: // new
                // делаю разрыв в использовании повторного прокси от 5 до 10 едениц
                $catch_proxy = $this->randomize($this->list_proxy, true);
                break;
            case 2: // current
                break;
        }
        var_dump($catch_proxy);

        $this->make_story($catch_proxy);

        return $catch_proxy;
    }

    private function randomize($list_proxy, $is_unique){
        $proxy_size = count($list_proxy);
        if($is_unique){
            $rand_id = rand(0, $proxy_size - 1);

            if(count($this->used_proxy) == count($list_proxy)){
                dd('empty');
            }

            if(array_key_exists($rand_id, $this->used_proxy)){
                var_dump($rand_id);
                return $this->randomize($list_proxy, $is_unique);
            }
            else{
                return $list_proxy[$rand_id];
            }
        }
        else{
            var_dump('exit');
            return $list_proxy[rand(0, $proxy_size - 1)];
        }
    }

    private function make_story($proxy){
        $this->last_proxy = $proxy;
        $this->used_proxy = Arr::add($this->used_proxy, $proxy['id'], $proxy);
        echo '<pre>';
        print_r($proxy);
        echo '<pre>';
        print_r($this->used_proxy);
        echo '_______________________________';

        return true;
    }


}
