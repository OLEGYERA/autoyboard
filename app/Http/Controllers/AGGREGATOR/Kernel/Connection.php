<?php

namespace App\Http\Controllers\AGGREGATOR\Kernel;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Connection extends Controller
{
    private $resourceName;

    public function __construct($resource_name){
        $this->resourceName = $resource_name;
    }

    public function generateParseURL($url_props){
        switch ($this->resourceName){
            case 'autoria':
                return 'https://auto.ria.com/search/?' . 'categories.main.id=' . $url_props['catID'] . '&price.currency=1&sort[0].order=dates.created.desc&top=1&abroad.not=-1&custom.not=-1&page=' . $url_props['currentPage'] . '&size=' . $url_props['page_size'];
                break;
        }
    }


    public function getPage($parseURL, $parsePROPS){
        $response = $this->createGateway($parseURL, $parsePROPS);
        return ['status' => $response->status, 'headers' => $response->headers, 'content' => $response->content];
    }

    private function createGateway($parse_url, $parse_props){
        return Curl::to($parse_url)
            ->withTimeout($parse_props['timeout'])->withConnectTimeout($parse_props['connect_timeout'])
//            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
            ->withResponseHeaders()
            ->returnResponseObject()
            ->get();
    }


}
