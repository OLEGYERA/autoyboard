<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias',
        'logo', 'car', 'moto', 'tractor',
        'water_transport', 'trailer', 'lorry', 'bus',
        'autodom',
    ];

    protected $hidden = ['laravel_through_key'];

    public function modelsWithTransportType($transport_id){
        return $this->hasMany('App\ModelOfBrand', 'brand_id', 'val')->where('transport_type_id', $transport_id);
    }

    public function modelWithTransportType($transport_id){
        return $this->hasOne('App\ModelOfBrand', 'brand_id', 'val')->where('transport_type_id', $transport_id);
    }


}
