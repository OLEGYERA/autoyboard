<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandPivotType extends Model
{
    protected $fillable = ['brand_id', 'type_id'];

//    protected function brands(){
//        return $this->hasManyThrough('App\TransportType', 'App\Brand', 'type_id', 'id', 'id', 'brand_id');
//    }
}
