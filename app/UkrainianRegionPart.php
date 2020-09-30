<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UkrainianRegionPart extends Model
{
    public $fillable = ['title', 'rtitle', 'utitle', 'alias'];

    public function regions()
    {
        return $this->hasMany('App\UkrainianRegion', 'region_part_id', 'val');
    }

}
