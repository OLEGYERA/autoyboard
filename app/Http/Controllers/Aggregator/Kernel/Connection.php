<?php

namespace App\Http\Controllers\Aggregator\Kernel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ixudra\Curl\Facades\Curl;

class Connection extends Controller
{
    private $tidy_config = [
        'clean' => true,
        'output-xhtml' => true,
        'show-body-only' => true,
        'wrap' => 0,
    ];

    public function connect_to_gateway_object($parseURL){
        $response = $this->createGateway($parseURL, 'object');
        //['status' => $response->status, 'headers' => $response->headers, 'content' => $response->content];
        if($response->status == 301 || $response->status == 302){

            return $this->connect_to_gateway_object($response->headers['Location']);
        }

        if($response->status != 301 && $response->status != 302 && $response->status != 200){
            return false;
        }
        return $this->purgingData($response->content);
    }

    public function connect_to_gateway_download($parseURL, $directory, $name){
        $response = $this->createGateway($parseURL, 'download', $directory, $name);
        return true;
    }

    private function createGateway($parse_url, $type, $directory = null, $name = null){
        $gateway_result = Curl::to($parse_url)
            ->withTimeout(60)->withConnectTimeout(60)
//            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
            ->withResponseHeaders();

        if($type == 'object'){
            $gateway_result = $gateway_result->returnResponseObject()->get();
        }
        elseif($type == 'download'){
//            if(!Storage::disk('articles')->exists($directory)){
//                Storage::disk('articles')->makeDirectory($directory);
//            }
//            $gateway_result = $gateway_result->download(storage_path('app/public/img/articles/') . $directory . '/' . $name);
        }
        return $gateway_result;
    }

    private function purgingData($content){
        return \tidy_parse_string($content, $this->tidy_config, 'UTF8');
    }
}
