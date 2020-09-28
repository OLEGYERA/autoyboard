<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranportBody extends Model
{
    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias', 'type_id'
    ];
}
