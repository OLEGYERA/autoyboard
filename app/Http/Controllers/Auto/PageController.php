<?php

namespace App\Http\Controllers\Auto;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\File;

class PageController extends Controller
{

    public function start(){
        echo '<img src="' . route('lol', ['alias' => 4841414515461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 484145461]) . '" />';

        echo '<img src="' . route('lol', ['alias' => 484141451461]) . '" />';

        echo '<img src="' . route('lol', ['alias' => 484141455461]) . '" />';

        echo '<img src="' . route('lol', ['alias' => 484141455461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 48414145415461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 48411454515461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 48414154515461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 48414141461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 4841145461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 4854141445561]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 4841415154651]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 484144515461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 4841412515461]) . '" />';
        echo '<img src="' . route('lol', ['alias' => 4841145154561]) . '" />';













    }



    public function generateURL(){

//        https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg
//        $f = new File('https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg');
//        dd($f);
        $url = 'https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg';
        $name = substr($url, strrpos($url, '/') + 1);

        $img_url = substr($url, 0,strpos($url, $name));
        dd($img_url, $name);
        $name_exploding = explode('.', $name);
        $extension = $name_exploding[1];
        $clear_img_path = substr($name_exploding[0], 0, mb_strlen($name_exploding[0]) - 1);

//        dd($extension, $clear_img_path);
        error_reporting(0);
        $r = file_get_contents('https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg');

        dd($r);
        Storage::disk('webdav')->put('auto/123.jpg', $r);
//        Storage::disk('webdav')->put('https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg', 'bmw.jpg');

//        $img = Storage::disk('webdav')->get('/Photos/123.png');
//        return response($img)->header('Content-type','image/png');
//        file_put_contents('123.png', $img);
//        imagepng('123.png');
//        return asset('123.png');
//        return view('auto.site.templates.basicHTML');
    }


}