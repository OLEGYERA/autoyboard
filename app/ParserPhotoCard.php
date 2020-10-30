<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParserPhotoCard extends Model
{
    public $fillable = [
        'url_id', 'path'
    ];
}
