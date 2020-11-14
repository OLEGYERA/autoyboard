<?php

namespace App\Http\Controllers\System;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;
use App\ExchangeRates;

class ExchangeRatesController extends Controller
{
    public function parseRate()
    {
        $rates = Curl::to('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5')
            ->withTimeout(60)->withConnectTimeout(60)
            ->withHeaders(array('User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85'))
            ->withResponseHeaders()
            ->returnResponseObject()->get();

        $er = new ExchangeRates;
        foreach (json_decode($rates->content) as $rate) {
            switch ($rate->ccy) {
                case 'USD':
                    $er->USD = $rate->sale;
                    break;
                case 'RUR':
                    $er->RUR = $rate->sale;
                    break;
                case 'EUR':
                    $er->EUR = $rate->sale;
                    break;
            }
        }
        $er->save();
    }

    public function generateMultyRate($priceChoosed)
    {
        $er = ExchangeRates::latest('created_at')->first();
        $to = $priceChoosed['to'];
        $from = $priceChoosed['from'];
        switch ($priceChoosed['currency']) {
            case 1:
                return [
                    'USD' => ['to' => $to, 'from' => $from],
                    'UAH' => ['to' => intval($to * $er->USD), 'from' => intval($from * $er->USD)],
                    'EUR' => ['to' => intval($to * $er->USD / $er->EUR), 'from' => intval($from * $er->USD / $er->EUR)],
                ];
                break;
            case 2:
                return [
                    'USD' => ['to' => intval($to / $er->USD), 'from' => intval($from / $er->USD)],
                    'UAH' => ['to' => $to, 'from' => $from],
                    'EUR' => ['to' => intval($to / $er->EUR), 'from' => intval($from / $er->EUR)],
                ];
                break;
            case 3:
                return [
                    'USD' => ['to' => intval($to * $er->EUR / $er->USD), 'from' => intval($from * $er->EUR / $er->USD)],
                    'UAH' => ['to' => intval($to * $er->EUR), 'from' => intval($from * $er->EUR)],
                    'EUR' => ['to' => $to, 'from' => $from],
                ];
                break;
        }
    }

    public function getExchange()
    {
        return ExchangeRates::latest('created_at')->first();;
    }
}
