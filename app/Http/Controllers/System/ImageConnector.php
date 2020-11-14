<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageConnector extends Controller
{
    public function getImage($card_id, $alias){
        try{
            $img = Storage::disk('webdav')->get('/auto/' . $card_id . '/'. $alias . '.jpg');
        }
        catch (\Exception $e){
            abort(404);
        }
        return response($img)->header('Content-type','image/jpg');
    }
}
