<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelOfBrand extends Model
{
    protected $table = 'models';

    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias',
        'brand_id', 'transport_type_id', 'parent_id',
    ];
}
