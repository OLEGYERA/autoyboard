<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageConnector extends Controller
{
    public function getImage($card_id, $alias){
        try{
            $url    = 'https://u248209.your-storagebox.de' . '/auto/' . $card_id . '/'. $alias . '.jpg';
            $c = curl_init($url);

            $authString = 'u248209:seaeVhSM5iKvqMqp';
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($c, CURLOPT_USERPWD, $authString);

            $content = curl_exec($c);
            if(curl_getinfo($c, CURLINFO_HTTP_CODE) == 404){
                abort(404);
            }
            $contentType = curl_getinfo($c, CURLINFO_CONTENT_TYPE);
            header('Content-Type:'.$contentType);
            echo $content;
//            $url  $img = Storage::disk('webdav')->get('/auto/' . $card_id . '/'. $alias . '.jpg');
        }
        catch (\Exception $e){
            abort(404);
        }
//        return response($img)->header('Content-type','image/jpg');
    }
}
