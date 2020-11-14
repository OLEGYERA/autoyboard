<?php

namespace App\Http\Controllers\Site\Auto;

use App\ExchangeRates;
use App\TransportType;
use Illuminate\Http\Request;
use App\Http\Controllers\System\UriValidatorController as UVC;
use App\Http\Controllers\Site\BasicController;

class FiltersPage extends BasicController
{

    public function getFullFilterRu(Request $request){
        $validateData = (new UVC)->validateSearch($request->all(), 'rtitle');
        $this->content = view('site.auto.filters.fullFilter.ru')->with(['validateData' => $validateData])->render();
        return $this->renderBasic();
    }

    public function getFilterRu(Request $request){
        $validateData = (new UVC)->validateSearch($request->all(), 'rtitle');
        $this->content = view('site.auto.filters.filter.ru')->with([
            'validateData' => $validateData,
            'currency' => ExchangeRates::latest('created_at')->first()
        ])->render();
        return $this->renderBasic();
    }



}
