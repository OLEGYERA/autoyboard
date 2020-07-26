<?php

namespace App\Http\Controllers\AGGREGATOR\Services\autoria;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\AGGREGATOR\Services\autoria\Lexeme;
use App\Http\Controllers\AGGREGATOR\LogSystem\LogWriter;

class LexemeController extends Lexeme
{


    public function __construct(){
        parent::__construct();
    }

    public function filterAnalizeCardAddress($content, $parse_props){
        $filterPage = $this->DOM->loadStr($content);
            $findedCards = $filterPage->find('.ticket-item');
        if(count($findedCards) === 0) return false;

        $data = [
            'parsingType' => 'AutoFilter',
            'parsingResource' => 'Autoria',
            'parsingTitle' => 'Страница: ' . 'Страница: ' . ($parse_props['URL']['currentPage'] + 1) . ', кол-во выводимых страниц: ' . $parse_props['URL']['page_size'] . ', ID-категории: ' . $parse_props['URL']['catID'],
            'parsingURL' => 'System'
        ];

        (new LogWriter())->writeLog('data', 'success', $data);

        $cardsAddress = [];
        foreach($findedCards as $findedCard){
            $cardAddress = $findedCard->find('.address')->getAttribute('href');
            if(strpos($cardAddress, 'newauto') === false){
                array_push($cardsAddress, $cardAddress);
            }
        }
        return $cardsAddress;
    }

    public function pageAnalizeCardData($content, $url){
        $this->readContent($content, false);

        try {
            $this->collectPrimaryInfo();
        }
        catch (\Exception $e){
            echo $e->getMessage() . '<br/>';
        }

        $data = [
            'parsingType' => 'AutoCard',
            'parsingResource' => 'Autoria',
            'parsingTitle' => $this->mainCardCollection['brand'] . ' ' . $this->mainCardCollection['model'] . ' ' . $this->mainCardCollection['year'] . ', ' . $this->mainCardCollection['region']  . ', ' . $this->mainCardCollection['city'],
            'parsingURL' => $url
        ];

        (new LogWriter())->writeLog('data', 'success', $data);



        $cardData['finish'] = Carbon::now();

        return $cardData;
    }



}

//https://auto.ria.com/auto_bmw_740_24574755.html
//https://auto.ria.com/auto_volkswagen_passat_b8_27212631.html
//https://auto.ria.com/auto_audi_a4_26883239.html
//https://auto.ria.com/auto_skoda_fabia_27436011.html
