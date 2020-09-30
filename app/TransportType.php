<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportType extends Model
{
    protected $fillable = [
        'rtitle', 'utitle', 'alias', 'logo'
    ];

    public function brands(){
        return $this->hasManyThrough('App\Brand' , 'App\BrandPivotType', 'type_id','id', 'val', 'brand_id');
    }

    public function brand(){
        return $this->hasOneThrough('App\Brand' , 'App\BrandPivotType', 'type_id','id', 'val', 'brand_id');
    }
}
//        return $this->hasOne('App\BrandPivotType', 'type_id', 'val');
