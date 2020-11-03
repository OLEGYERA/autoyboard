<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParserUrlList extends Model
{
    public $fillable = [
        'autoCondition', 'transport_type', 'status', 'url'
    ];

    public function isUnique($original_url){
        if(empty($this->where('url', $original_url)->first())){
            return true;
        }
        else{
            return false;
        }
    }

    public function body(){
        return $this->hasOne('App\ParserBodyCard', 'id');
    }
}
