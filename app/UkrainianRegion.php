<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UkrainianRegion extends Model
{
    public $fillable = ['title', 'rtitle', 'utitle', 'alias', 'region_part_id'];

    public function cities()
    {
        return $this->hasMany('App\UkrainianCity', 'region_id', 'val');
    }
}
