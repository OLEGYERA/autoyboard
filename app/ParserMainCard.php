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
}
