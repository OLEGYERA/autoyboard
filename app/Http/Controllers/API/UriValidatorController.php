<?php

namespace App\Http\Controllers\API;
use App\Brand;
use App\Http\Controllers\API\BasicController;

use App\TransportType;
use App\TransportChColor;
use App\TransportChState;
use App\TransportChFuel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UriValidatorController extends BasicController
{
    public $jSON_RESPONSE = [];
    public $verifiedData = [];

    public function validateSearch(Request $request){
        parse_str($request->uri, $uris);
        $this->verifyMainQueries($uris);
        foreach ($uris as $alias => $uri){
            switch ($alias){
                case 'sch':
                    $this->analizeSearchDetailAlias($uri);
                    break;
                case 'transport':
                    $this->analizeTransportAlias($uri);
                    break;
                case 'rbmy':
                    $rbmyFullStores = [];
                    foreach ($uri as $k => $rbmy){
                        $rbmyFullStore = [];
                        if(isset($rbmy['reg'])){
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'regionChoose', intval($rbmy['reg']));
                            $brands = $this->verifiedData['transport_type']->brands()->where('manufacture_id', intval($rbmy['reg']))->select(['brands.id as val', 'title as name'])->get();
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'brands', $brands);
                        }
                        else{
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'regionChoose', null);
                            $brands = [];
                        }
                        $rbmyFullStore = Arr::add($rbmyFullStore, 'brands', $brands);

                        if(isset($rbmy['brand'])){
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'brandChoose', intval($rbmy['brand']));
                            $brand = Brand::select(['brands.id as val', 'title as name'])->find($rbmy['brand']);
                            $models = $brand->modelsWithTransportType($this->verifiedData['transport_type']->val)->select(['id as val', 'title as name'])->get();
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'models', $models);
                        }
                        else{
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'brandChoose', null);
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'models', []);
                        }
                        if(isset($rbmy['model']) && isset($rbmy['brand'])){
                            $modelArr = [];
                            foreach ($rbmy['model'] as $model){
                                array_push($modelArr, intval($model));
                            }
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'modelsChoose', $modelArr);
                        }
                        else{
                            $rbmyFullStore = Arr::add($rbmyFullStore, 'modelsChoose', []);
                        }

                        $yearForm = isset($rbmy['yearF']) ? intval($rbmy['yearF']) : null;
                        $yearTo = isset($rbmy['yearT']) ? intval($rbmy['yearT']) : null;
                        if($yearForm > $yearTo && $yearTo !== null){
                            $tempYear = $yearForm;
                            $yearForm = $yearTo;
                            $yearTo = $tempYear;
                        }
                        $rbmyFullStore = Arr::add($rbmyFullStore, 'yearFrom', $yearForm);
                        $rbmyFullStore = Arr::add($rbmyFullStore, 'yearTo', $yearTo);
                        array_push($rbmyFullStores, $rbmyFullStore);

                    }
                    $this->jSON_RESPONSE = Arr::add($this->jSON_RESPONSE, 'rbmyFullStore', $rbmyFullStores);
                    break;
                case 'region':
                    $regionFullStores = [];
                    $regionsArr = [];
                    if(isset($uri['reg'])){
                        foreach ($uri['reg'] as $region){
                            array_push($regionsArr, intval($region));
                        }
                    }
                    $regionFullStores = Arr::add($regionFullStores, 'choosedRegions', $regionsArr);

                    $citiesArr = [];
                    if(isset($uri['city'])){
                        foreach ($uri['city'] as $city){
                            array_push($citiesArr, intval($city));
                        }
                    }
                    $regionFullStores = Arr::add($regionFullStores, 'choosedCities', $citiesArr);
                    $this->jSON_RESPONSE = Arr::add($this->jSON_RESPONSE, 'regionFullStore', $regionFullStores);
                    break;
            }
        }


        return response()->json($this->jSON_RESPONSE, 200);
    }

    private function verifyMainQueries($data){
        $this->validateSearchDetailMain($data);
        $this->validateTransportMain($data);
        return true;
    }

    protected function validateSearchDetailMain($data){
        $this->verifiedData['autoCond'] = (isset($data['sch']['autoCond']) && $data['sch']['autoCond'] <= 3 && $data['sch']['autoCond'] >= 1) ? intval($data['sch']['autoCond']) : 1;
        $this->verifiedData['curr'] = (isset($data['sch']['curr']) && $data['sch']['curr'] <= 3 && $data['sch']['curr'] >= 1) ? intval($data['sch']['curr']) : 1;

        if(!isset($data['sch'])){
            $this->analizeSearchDetailAlias();
        }
        return true;
    }

    protected function validateTransportMain($data){
        $tempTTID = 1;
        if(!isset($data['transport']['type'])){
            $tempTT = null;
        }
        else {
            $tempTT = TransportType::select('id as val')->find(intval($data['transport']['type']));
        }

        $tt = $tempTT == null ? TransportType::select('id as val')->find($tempTTID) : $tempTT;
        $this->verifiedData['transport_type'] = $tt;

        if(!isset($data['transport'])){
            $this->analizeTransportAlias();
        }

        return true;
    }

    private function analizeSearchDetailAlias($uri = []){
        $searchDetailFullStores = [];

        $searchPropsChoosed = [];
//        $searchPropsChoosed['fullResource'] = isset($uri['fr']) && boolval($uri['fr']);
//        $searchPropsChoosed['verifiedAuto'] = isset($uri['va']) && boolval($uri['va']);
        $searchPropsChoosed['withPhoto'] = isset($uri['wph']) ? false : true;

        $searchPropsChoosed['abroad'] = isset($uri['ab']) ? $this->bollStr($uri['ab']) : false;
        $searchPropsChoosed['credit'] = isset($uri['cr']) ? $this->bollStr($uri['cr']) : false;
        $searchPropsChoosed['customsСleared'] = isset($uri['cc']) ? $this->bollStr($uri['cc']) : false;
        $searchPropsChoosed['confiscated'] = isset($uri['cf']) ? $this->bollStr($uri['cf']) : false;
        $searchPropsChoosed['accident'] = isset($uri['acc']) ? $this->bollStr($uri['acc']) : false; // принудительный запрет
        $searchPropsChoosed['noMotion'] = isset($uri['nom']) ? $this->bollStr($uri['nom']) : false; // принудительный запрет

        $searchPropsChoosed['bargain'] = isset($uri['b']) && $this->bollStr($uri['b']);
        $searchPropsChoosed['exchangeCar'] = isset($uri['ec']) && $this->bollStr($uri['ec']);
        $searchPropsChoosed['exchangeHouse'] = isset($uri['eh']) && $this->bollStr($uri['eh']);

        $priceChoosed = [];
        $priceChoosed['currency'] = $this->verifiedData['curr'];
        $priceChoosed['from'] = (isset($uri['priceF']) && intval($uri['priceF']) !== 0) ? intval(substr($uri['priceF'], 0,10)) : null;
        $priceChoosed['to'] = (isset($uri['priceT']) && intval($uri['priceT']) !== 0) ? intval(substr($uri['priceT'], 0,5)) : null;

        if($priceChoosed['from'] > $priceChoosed['to'] && $priceChoosed['to'] !== null){
            $tempFrom = $priceChoosed['from'];
            $priceChoosed['from'] = $priceChoosed['to'];
            $priceChoosed['to'] = $tempFrom;
        }
        $searchDetailFullStores = Arr::add($searchDetailFullStores, 'autoConditionChoosed', $this->verifiedData['autoCond']);
        $searchDetailFullStores = Arr::add($searchDetailFullStores, 'searchPropsChoosed', $searchPropsChoosed);
        $searchDetailFullStores = Arr::add($searchDetailFullStores, 'priceChoosed', $priceChoosed);

        $this->jSON_RESPONSE = Arr::add($this->jSON_RESPONSE, 'searchDetailFullStore', $searchDetailFullStores);
    }

    private function analizeTransportAlias($uri = []){
        $transportFullStores = [];
        $transportFullStores = Arr::add($transportFullStores, 'typeChoosed', $this->verifiedData['transport_type']->val);
        $transportFullStores = Arr::add($transportFullStores, 'transportTypes', TransportType::select(['id as val', 'rtitle as name'])->get());
        if(isset($uri['bodies'])){
            $bodyArr = [];
            foreach ($uri['bodies'] as $body){
                array_push($bodyArr, intval($body));
            }
            $transportFullStores = Arr::add($transportFullStores, 'bodiesChoosed', $bodyArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'bodiesChoosed', []);
        }
        $bodies = $this->verifiedData['transport_type']->bodies()->select('id as val', 'rtitle as name')->get();
        $transportFullStores = Arr::add($transportFullStores, 'transportBodies', $bodies);

        if(isset($uri['colors'])){
            $colorsArr = [];
            foreach ($uri['colors'] as $color){
                array_push($colorsArr, intval($color));
            }
            $transportFullStores = Arr::add($transportFullStores, 'colorsChoosed', $colorsArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'colorsChoosed', []);
        }
        $transportFullStores = Arr::add($transportFullStores, 'transportColors', TransportChColor::select(['id as val', 'rtitle as name', 'color', 'bg_color as bg'])->get());


        if(isset($uri['imp'])){
            $importerArr = [];
            foreach ($uri['imp'] as $importer){
                array_push($importerArr, intval($importer));
            }
            $transportFullStores = Arr::add($transportFullStores, 'importersChoosed', $importerArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'importersChoosed', []);
        }

        if(isset($uri['states'])){
            $stateArr = [];
            foreach ($uri['states'] as $state){
                array_push($stateArr, intval($state));
            }
            $transportFullStores = Arr::add($transportFullStores, 'statesChoosed', $stateArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'statesChoosed', []);
        }
        $transportFullStores = Arr::add($transportFullStores, 'transportStates', TransportChState::select(['id as val', 'rtitle as name'])->get());

        if(isset($uri['fuels'])){
            $fuelsArr = [];
            foreach ($uri['fuels'] as $fuel){
                array_push($fuelsArr, intval($fuel));
            }
            $transportFullStores = Arr::add($transportFullStores, 'fuelsChoosed', $fuelsArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'fuelsChoosed', []);
        }
        $transportFullStores = Arr::add($transportFullStores, 'transportFuels', TransportChFuel::select(['id as val', 'rtitle as name'])->get());

        $fuelConsumptionChoosed = [];
        $fuelConsumptionChoosed['from'] = isset($uri['fuelsF']) ? intval(substr($uri['fuelsF'], 0,5)) : null;
        $fuelConsumptionChoosed['to'] = isset($uri['fuelsT']) ? intval(substr($uri['fuelsT'], 0,5)) : null;
        if($fuelConsumptionChoosed['from'] > $fuelConsumptionChoosed['to'] && $fuelConsumptionChoosed['to'] !== null){
            $tempFrom = $fuelConsumptionChoosed['from'];
            $fuelConsumptionChoosed['from'] = $fuelConsumptionChoosed['to'];
            $fuelConsumptionChoosed['to'] = $tempFrom;
        }
        $transportFullStores = Arr::add($transportFullStores, 'fuelConsumptionChoosed', $fuelConsumptionChoosed);
        $mileageChoosed = [];
        $mileageChoosed['from'] = isset($uri['mileageF']) ? intval(substr($uri['mileageF'], 0,5)) : null;
        $mileageChoosed['to'] = isset($uri['mileageT']) ? intval(substr($uri['mileageT'], 0,5)) : null;
        if($mileageChoosed['from'] > $mileageChoosed['to'] && $mileageChoosed['to'] !== null){
            $tempFrom = $mileageChoosed['from'];
            $mileageChoosed['from'] = $mileageChoosed['to'];
            $mileageChoosed['to'] = $tempFrom;
        }
        $transportFullStores = Arr::add($transportFullStores, 'mileageChoosed', $mileageChoosed);

        if(isset($uri['trans'])){
            $transmissionArr = [];
            foreach ($uri['trans'] as $transmission){
                array_push($transmissionArr, intval($transmission));
            }
            $transportFullStores = Arr::add($transportFullStores, 'transmissionsChoosed', $transmissionArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'transmissionsChoosed', []);
        }
        $transportFullStores = Arr::add($transportFullStores, 'transportTransmissions', $this->verifiedData['transport_type']->transmissions()->select('tranport_ch_transmissions.id as val', 'rtitle as name')->get());

        $volumeChoosed = [];
        $volumeChoosed['from'] = isset($uri['volF']) ? intval(substr($uri['volF'], 0,5)) : null;
        $volumeChoosed['to'] = isset($uri['volT']) ? intval(substr($uri['volT'], 0,5)) : null;
        if($volumeChoosed['from'] > $volumeChoosed['to'] && $volumeChoosed['to'] !== null){
            $tempFrom = $volumeChoosed['from'];
            $volumeChoosed['from'] = $volumeChoosed['to'];
            $volumeChoosed['to'] = $tempFrom;
        }
        $transportFullStores = Arr::add($transportFullStores, 'volumeChoosed', $volumeChoosed);

        $doorsChoosed = [];
        $doorsChoosed['from'] = isset($uri['doorsF']) ? intval(substr($uri['doorsF'], 0,5)) : null;
        $doorsChoosed['to'] = isset($uri['doorsT']) ? intval(substr($uri['doorsT'], 0,5)) : null;
        if($doorsChoosed['from'] > $doorsChoosed['to'] && $doorsChoosed['to'] !== null){
            $tempFrom = $doorsChoosed['from'];
            $doorsChoosed['from'] = $doorsChoosed['to'];
            $doorsChoosed['to'] = $tempFrom;
        }
        $transportFullStores = Arr::add($transportFullStores, 'doorsChoosed', $doorsChoosed);

        if(isset($uri['gears'])){
            $gearsArr = [];
            foreach ($uri['gears'] as $gear){
                array_push($gearsArr, intval($gear));
            }
            $transportFullStores = Arr::add($transportFullStores, 'gearsChoosed', $gearsArr);
        }
        else{
            $transportFullStores = Arr::add($transportFullStores, 'gearsChoosed', []);
        }
        $transportFullStores = Arr::add($transportFullStores, 'transportGears', $this->verifiedData['transport_type']->gears()->select('tranport_ch_gears.id as val', 'rtitle as name')->get());

        $powerChoosed = [];
        $powerChoosed['from'] = isset($uri['powF']) ? intval(substr($uri['powF'], 0,5)) : null;
        $powerChoosed['to'] = isset($uri['powT']) ? intval(substr($uri['powT'], 0,5)) : null;
        if($powerChoosed['from'] > $powerChoosed['to'] && $powerChoosed['to'] !== null){
            $tempFrom = $powerChoosed['from'];
            $powerChoosed['from'] = $powerChoosed['to'];
            $powerChoosed['to'] = $tempFrom;
        }
        $transportFullStores = Arr::add($transportFullStores, 'powerChoosed', $powerChoosed);

        $seatsChoosed = [];
        $seatsChoosed['from'] = isset($uri['doorsF']) ? intval(substr($uri['doorsF'], 0,5)) : null;
        $seatsChoosed['to'] = isset($uri['doorsT']) ? intval(substr($uri['doorsT'], 0,5)) : null;
        if($seatsChoosed['from'] > $seatsChoosed['to'] && $seatsChoosed['to'] !== null){
            $tempFrom = $seatsChoosed['from'];
            $seatsChoosed['from'] = $seatsChoosed['to'];
            $seatsChoosed['to'] = $tempFrom;
        }
        $transportFullStores = Arr::add($transportFullStores, 'seatsChoosed', $seatsChoosed);

        $this->jSON_RESPONSE = Arr::add($this->jSON_RESPONSE, 'transportFullStore', $transportFullStores);
    }

    private function bollStr($str){
        return $str == 'true' ? true : false;
    }

}
