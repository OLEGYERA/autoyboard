<?php

namespace App\Http\Controllers\Aggregator\Kernel;

use App\Http\Controllers\Aggregator\Kernel\Connection;
use App\Http\Controllers\Aggregator\Kernel\QueryAnalizer as QA;
use App\Http\Controllers\Aggregator\Kernel\ImageProcessor as IP;
use Illuminate\Http\Request;
use PHPHtmlParser\Dom;


abstract class Core
{
    public $connection;

    public function __construct()
    {
        $this->connection = new Connection();
        $this->qa = new QA();
        $this->image_processor = new IP();
    }

    //Connection
    public function getPage($url){
        return $this->connection->connect_to_gateway_object($url);
    }

    public function readPage($content, $r_scr = true){
        $dom = new Dom();
        $dom->setOptions(['removeScripts' => $r_scr]);
        return $dom->loadStr($content);
    }

    //transportAnalizer

    public function getBrandModelArrID($brand, $model, $cardURL){
        return $this->qa->verifyBMData($brand, $model, $cardURL);
    }
    public function getRegionsArrID($region, $city){
        return $this->qa->verifyRegionData($region, $city);
    }
    public function getManufacureID($country){
        return $this->qa->verifyManufactureData($country);
    }
    public function getStateID($label){
        return $this->qa->verifyStateData($label);
    }
    public function getTechID($label, $type, $cardUrl){
        return $this->qa->verifyTechData($label, $type, $cardUrl);
    }
    public function getBodyID($label, $cardUrl){
        return $this->qa->verifyBodyData($label, $cardUrl);
    }
    public function getFuelID($label){
        return $this->qa->verifyFuelData($label);
    }
    public function getTransmissionID($label, $cardUrl){
        return $this->qa->verifyTransmissionData($label, $cardUrl);
    }
    public function getGearID($label, $cardUrl){
        return $this->qa->verifyGearData($label, $cardUrl);
    }
    public function getColorID($label){
        return $this->qa->verifyColorData($label);
    }


    //ImageProcessor

    public function performImages($imgArr, $id){
        return $this->image_processor->imageCollector($imgArr, $id);
    }

    public function createBasic($imgArr, $id){
        return $this->image_processor->createBasic($imgArr, $id);
    }
}
