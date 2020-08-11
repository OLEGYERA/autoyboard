<?php

namespace App\Http\Controllers\Site\Auto;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Site\BasicController;


class PageController extends BasicController
{

    public function start(){

        $this->content = view('site.auto.home.ru')->render();
        return $this->renderBasic();
    }

    public function filter(){

        $this->content = view('site.auto.filter.ru')->render();
        return $this->renderBasic();
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
//        return response($img)->headers('Content-type','image/png');
//        file_put_contents('123.png', $img);
//        imagepng('123.png');
//        return asset('123.png');
    }


}
