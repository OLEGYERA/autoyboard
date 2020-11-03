<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParserMainCard extends Model
{
    public $fillable = [
        'id', 'brand_id', 'model_id', 'region_id', 'city_id', 'manufacture_id',
        'modification', 'year', 'chat_link', 'price_value', 'price_currency',
        'resource_created', 'resource_updated', 'description',
        'abroad', 'credit', 'accident', 'noMotion', 'exchange', 'bargain', 'customsСleared'
    ];

    protected function brand(){
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    protected function model(){
        return $this->belongsTo('App\ModelOfBrand', 'model_id');
    }

    protected function region(){
        return $this->belongsTo('App\UkrainianRegion', 'region_id');
    }

    public function city(){
        return $this->belongsTo('App\UkrainianCity', 'city_id');
    }

    protected function manufacture(){
        return $this->belongsTo('App\ManufactureCountry', 'manufacture_id');
    }

}
