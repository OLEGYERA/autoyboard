<?php

namespace App\Http\Controllers\API;
use App\Brand;
use App\Http\Controllers\API\BasicController;

use App\TransportType;
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
        $searchPropsChoosed['withPhoto'] = isset($uri['wph']) && boolval($uri['wph']);

        $searchPropsChoosed['abroad'] = isset($uri['ab']) && boolval($uri['ab']);
        $searchPropsChoosed['credit'] = isset($uri['cr']) && boolval($uri['cr']);
        $searchPropsChoosed['customsСleared'] = isset($uri['cc']) && boolval($uri['cc']);
        $searchPropsChoosed['confiscated'] = isset($uri['cf']) && boolval($uri['cf']);
        $searchPropsChoosed['accident'] = isset($uri['acc']) && boolval($uri['acc']);
        $searchPropsChoosed['noMotion'] = isset($uri['nom']) && boolval($uri['nom']);

        $searchPropsChoosed['bargain'] = isset($uri['b']) && boolval($uri['b']);
        $searchPropsChoosed['exchangeCar'] = isset($uri['ec']) && boolval($uri['ec']);
        $searchPropsChoosed['exchangeHouse'] = isset($uri['eh']) && boolval($uri['eh']);

        $priceChoosed = [];
        $priceChoosed['currency'] = $this->verifiedData['curr'];
        $priceChoosed['from'] = (isset($uri['priceF']) && intval($uri['priceF']) !== 0) ? intval($uri['priceF']) : null;
        $priceChoosed['to'] = (isset($uri['priceT']) && intval($uri['priceT']) !== 0) ? intval($uri['priceT']) : null;

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
        $bodies = $this->verifiedData['transport_type']->bodies()->select('id as val', 'rtitle as name')->get();
        $transportFullStores = Arr::add($transportFullStores, 'transportBodies', $bodies);

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
        $this->jSON_RESPONSE = Arr::add($this->jSON_RESPONSE, 'transportFullStore', $transportFullStores);
    }
}
