<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UkrainianCity extends Model
{
    public function region()
    {
        return $this->belongsTo('App\UkrainianRegion', 'region_id', 'id');
    }
}
