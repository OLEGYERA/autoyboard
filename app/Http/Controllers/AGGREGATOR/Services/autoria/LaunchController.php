<?php

namespace App\Http\Controllers\AGGREGATOR\Services\autoria;

use Illuminate\Support\Arr;
use App\Http\Controllers\AGGREGATOR\Kernel\Core;
use App\Http\Controllers\AGGREGATOR\Services\autoria\LexemeController as Lexeme;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use PHPHtmlParser\Dom;

class LaunchController extends Core
{
    protected $lexeme;
    protected $resourceName = 'autoria';
    protected $categories = [
        ['type' => 'auto', 'id' => 1, 'cards' => []],  //yid => 1,
        ['type' => 'moto', 'id' => 2, 'cards' => []], //yid => 2,
        ['type' => 'tractor', 'id' => 4, 'cards' => []], //yid => 3,
        ['type' => 'water_transport', 'id' => 3, 'cards' => []], //yid => 4,
        ['type' => 'trailer', 'id' => 5, 'cards' => []], //yid => 5,
        ['type' => 'lorry', 'id' => 6, 'cards' => []], //yid => 6,
        ['type' => 'bus', 'id' => 7, 'cards' => []], //yid => 7,
        ['type' => 'autodom', 'id' => 8, 'cards' => []], //yid => 8,
    ];



    public function parse(){
        ini_set('memory_limit','2048M');
        ini_set('max_execution_time', 5000);
        $this->lexeme = new Lexeme;
////        $this->launchPageCardParsing('https://auto.ria.com/auto_ford_fusion_27461166.html');
//        $this->launchPageCardParsing('https://auto.ria.com/auto_volkswagen_touareg_27477960.html');
//
//        $this->launchPageCardParsing('https://auto.ria.com/auto_toyota_avalon_23962617.html');
//        $this->launchPageCardParsing('https://auto.ria.com/auto_mercedes_benz_e_220_27388265.html');
//        $this->launchPageCardParsing('https://auto.ria.com/auto_renault_captur_27440495.html');
//
//        $this->launchPageCardParsing('https://auto.ria.com/auto_renault_megane_27438522.html');
////

        $this->FilterCardParsing();
        $this->PageCardParsing();
        return 1;
    }

    protected function FilterCardParsing(){
        foreach($this->categories as $key => $category){
            $parsedCardList = $this->launchFilterCardParsing($category);
            $this->categories[$key] = Arr::add($this->categories[$key], 'cards_address', $parsedCardList);
        }
        return true;
    }

    protected function PageCardParsing(){
        foreach($this->categories as $key => $category){
            echo $category['type'] . '<br/>';
            foreach($category['cards_address'] as $halfAddress){
                foreach ($halfAddress as $address){
                    $this->launchPageCardParsing($address);
                }
            }
        }
        return true;
    }


    private function anlize($body, $category_id){
        $dom = new Dom;
        $dom = $dom->loadStr($body);
        $htmls = $dom->find('.ticket-item');
        foreach ($htmls as $html){
            $adv_id = $html->getAttribute('data-advertisement-id');
            $timely_adv_link_tag = $html->find('.address');
            $adv_title = $timely_adv_link_tag->find('span')->text;
            $adv_year = $timely_adv_link_tag->text;
            $adv_link = $timely_adv_link_tag->getAttribute('href');

            $adv = Curl::to($adv_link)
                ->withTimeout(60)
                ->withConnectTimeout(60)
//            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
                ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
                ->withResponseHeaders()
                ->returnResponseObject()
                ->get();

            $tidy_config = array(
                'clean' => true,
                'output-xhtml' => true,
                'show-body-only' => true,
                'wrap' => 0,
            );
            $tidy = \tidy_parse_string( $adv->content, $tidy_config, 'UTF8');

            $d = new Dom;
            $d = $d->loadStr($tidy);
            $photos= $d->find('.photo-620x465');
            dd($photos);
        }
        dd($htmls);

//        data-advertisement-id

    }
}



//отсутсвует
//     <option value="10"> Сельхозтехника </option>
//    <option value="9"> Воздушный транспорт </option>
