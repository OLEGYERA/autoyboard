<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufactureCountry extends Model
{
    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias'
    ];

    public function brands(){
        return $this->hasMany('App\Brand', 'manufacture_id');
    }
}
