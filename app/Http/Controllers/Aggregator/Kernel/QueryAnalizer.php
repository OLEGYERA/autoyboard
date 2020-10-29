<?php

namespace App\Http\Controllers\Aggregator\Kernel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\TransportType;
use App\UkrainianRegion;
use App\ManufactureCountry;
use App\TransportChState;
use App\TransportChFuel;
use App\TransportChColor;

class QueryAnalizer extends Controller
{
    public function verifyBMData($brand, $model, $cardURL){
        $tt = TransportType::find($cardURL->transport_type); $tt->val = $tt->id;
        $brand = $tt->brand()->where('title', trim($brand))->first();
        if($brand !== null){
            $brand->val = $brand->id;
            $model = $brand->modelWithTransportType($tt->id)->where('title', $model)->first();
            if($model !== null){
                return ['brandID' => $brand->id, 'modelID' => $model->id];
            }
            return ['brandID' => $brand->id, 'modelID' => null];
        }
        return ['brandID' => null, 'modelID' => null];
    }

    public function verifyRegionData($region, $city){
        if(mb_strlen($region) == 0 || mb_strlen($city) == 0) return false;
        $region = str_replace('область', '', $region);

        $ur = UkrainianRegion::where('utitle', trim($region))->first();
        if($ur !== null){
            $ur->val = $ur->id;
            $uc = $ur->cities()->where('utitle', trim($city))->first();
            if($uc !== null){
                return ['regionID' => $ur->id, 'cityID' => $uc->id];
            }
            return ['regionID' => $ur->id, 'cityID' => null];
        }
        return ['regionID' => null, 'cityID' => null]; //will catch our error with entering regions and cities
    }

    public function verifyManufactureData($country){
        $country = mb_substr($country , 0, -2);
        $manufacure = ManufactureCountry::where('utitle', 'like', $country . '%')->first();
        if($manufacure === null) return null;
        return $manufacure->id;
    }

    public function verifyStateData($label){
        $label = TransportChState::where('utitle', $label)->first();
        if($label === null) return null;
        return $label->id;
    }

    public function verifyTechData($label, $type, $cardURL){
        $tt = TransportType::find($cardURL->transport_type); $tt->val = $tt->id;
        $tech = $tt->techs()->where('type', $type)->where('utitle', $label)->first();
        if($tech === null) return null;
        return $tech->id;

    }

    public function verifyBodyData($label, $cardURL){
        $tt = TransportType::find($cardURL->transport_type); $tt->val = $tt->id;
        $body = $tt->bodies()->where('utitle', trim($label))->first();
        if($body === null) return null;
        return $body->id;
    }

    public function verifyFuelData($label){
//        $tt = TransportType::find($cardURL->transport_type); $tt->val = $tt->id;
        $fuel = TransportChFuel::where('utitle', trim($label))->first();
        if($fuel === null) return null;
        return $fuel->id;
    }

    public function verifyTransmissionData($label, $cardURL){
        $tt = TransportType::find($cardURL->transport_type); $tt->val = $tt->id;
        $transmission = $tt->transmissions()->where('utitle', trim($label))->first();
        if($transmission === null) return null;
        return $transmission->id;
    }

    public function verifyGearData($label, $cardURL){
        $tt = TransportType::find($cardURL->transport_type); $tt->val = $tt->id;
        $gear = $tt->gears()->where('utitle', trim($label))->first();
        if($gear === null) return null;
        return $gear->id;
    }

    public function verifyColorData($label){
        $color = TransportChColor::where('utitle', trim($label))->first();
        if($color === null) return null;
        return $color->id;
    }

}
