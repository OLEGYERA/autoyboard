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

    public function main(){
        return $this->hasOne('App\ParserMainCard', 'id');
    }

    public function photos(){
        return $this->hasMany('App\ParserPhotoCard', 'url_id');
    }

    public function photo(){
        return $this->hasOne('App\ParserPhotoCard', 'url_id');
    }

    public function state(){
        return $this->hasManyThrough('App\TransportChState' , 'App\ParserStateCard', 'url_id','id', 'id', 'state_id');
    }

    public function security(){
        return $this->hasManyThrough('App\TransportChTech' , 'App\ParserSecurityCard', 'url_id','id', 'id', 'security_id');
    }

    public function comfort(){
        return $this->hasManyThrough('App\TransportChTech' , 'App\ParserComfortCard', 'url_id','id', 'id', 'comfort_id');
    }

    public function multimedia(){
        return $this->hasManyThrough('App\TransportChTech' , 'App\ParserMultimediaCard', 'url_id','id', 'id', 'multimedia_id');
    }

    public function other(){
        return $this->hasManyThrough('App\TransportChTech' , 'App\ParserOtherCard', 'url_id','id', 'id', 'other_id');
    }
}
