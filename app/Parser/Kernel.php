<?php

namespace App\Http\Parser;

//test
use Illuminate\Support\Facades\File;
//Fasades
use PHPHtmlParser\Dom;
use Ixudra\Curl\Facades\Curl;

use Illuminate\Routing\Controller as BaseController;

abstract class Kernel
{

    public function test(){
//        $response = Curl::to('https://auto.ria.com/search/?price.currency=1&top=11&abroad.not=0&custom.not=-1&page=0&size=20')
//            ->withTimeout(60)
//            ->withConnectTimeout(60)
//            ->withProxy('93.190.44.51', 14523, 'http', 'O9e5TwD', 'N5k6WhE')
//            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
//            ->withResponseHeaders()
//            ->returnResponseObject()
//            ->get();
//        $response->content
        $contents = File::get('index.htmls');
//        $tidy_config = array(
//            'clean' => true,
//            'output-xhtml' => true,
//            'show-body-only' => true,
//            'wrap' => 0,
//
//        );
//        $tidy = \tidy_parse_string( $contents, $tidy_config, 'UTF8');
//        dd($tidy);
        $dom = new Dom;
        $dom = $dom->loadStr($contents);
        $html = $dom->find('.address')[0];
        dd($html, $html->innerHtml);
    }
//getAttribute('href')
}

//75.151.213.85
//91.217.42.2
//                        ->withOption('PROXY', '93.190.44.51')
//            ->withOption('PROXYPORT', '14523')
//            ->withOption('PROXYUSERPWD', 'O9e5TwD:N5k6WhE')
