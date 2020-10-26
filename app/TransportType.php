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

    public function bodies(){
        return $this->hasMany('App\TranportBody', 'type_id','val');
    }

    public function transmissions(){
        return $this->hasManyThrough('App\TranportChTransmission' , 'App\TranportChTransmissionPivotType', 'type_id','id', 'val', 'ch_transmission_id');
    }

    public function gears(){
        return $this->hasManyThrough('App\TranportChGear' , 'App\TranportChGearPivotType', 'type_id','id', 'val', 'ch_gear_id');
    }

    public function techs(){
        return $this->hasManyThrough('App\TransportChTech' , 'App\TransportChTechPivotType', 'type_id','id', 'val', 'ch_tech_id');
    }
}
//        return $this->hasOne('App\BrandPivotType', 'type_id', 'val');
