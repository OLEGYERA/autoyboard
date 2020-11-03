<?php

namespace App\Http\Controllers\Site\Auto;

use App\ParserUrlList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Site\BasicController;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

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

    public function card($id){
        $card = ParserUrlList::findOrFail($id);
        $this->content = view('site.auto.card.ru')->with(['card' => $card])->render();
        return $this->renderBasic();
        //Body
        //$base->body->typeBody
        //$base->body->typeFuel
        //$base->body->typeTransmission
        //$base->body->typeGear
        //$base->body->typeColor

        //Main
        //$base->main->brand
        //$base->main->model
        //$base->main->region
        //$base->main->manufacture

        //Photos
        //$base->photos

        //$base->state
        //$base->security
        //$base->comfort
        //$base->comfort
        //$base->other



        //@if($base->body->typeBody !== null)
        //
        //@endif

    }
    public function favorite(){

        $this->content = view('site.auto.favorite.ru')->render();
        return $this->renderBasic();
    }
    public function extended(Request $request){
//            dd($request->all());
        $this->content = view('site.auto.extended.ru')->render();
        return $this->renderBasic();
    }
    public function presentation(){

        $this->content = view('site.auto.presentation.ru')->render();
        return $this->renderBasic();
    }
    public function faq(){

        $this->content = view('site.auto.faq.ru')->render();
        return $this->renderBasic();
    }
    public function about(){

        $this->content = view('site.auto.about.ru')->render();
        return $this->renderBasic();
    }
    public function confidentiality(){

        $this->content = view('site.auto.confidentiality.ru')->render();
        return $this->renderBasic();
    }
    public function convention(){

        $this->content = view('site.auto.convention.ru')->render();
        return $this->renderBasic();
    }
    public function marks(){

        $this->content = view('site.auto.marks.ru')->render();
        return $this->renderBasic();
    }
    public function catbody(){

        $this->content = view('site.auto.catbody.ru')->render();
        return $this->renderBasic();
    }
    public function changelog(){

        $this->content = view('site.auto.changelog.ru')->render();
        return $this->renderBasic();
    }
    public function update(){

        $this->content = view('site.auto.update.ru')->render();
        return $this->renderBasic();
    }






    public function generateURL(){

//        https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg
//        $f = new File('https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg');
//        dd($f);
        $url = 'https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg';
        $name = substr($url, strrpos($url, '/') + 1);

        $img_url = substr($url, 0,strpos($url, $name));
        $name_exploding = explode('.', $name);
        $extension = $name_exploding[1];
        $clear_img_path = substr($name_exploding[0], 0, mb_strlen($name_exploding[0]) - 1);

//        dd($extension, $clear_img_path);
        error_reporting(0);
//        $r = file_get_contents('https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg');


        $image = Image::make('https://cdn3.riastatic.com/photosnew/auto/photo/mercedes-benz_vito-111__351177843fx.jpg');
        $watermark = Image::make('img/system/logos/logo_white.png');
        $image->insert($watermark, 'bottom-left', 5, 5);

        for($i=300; $i > 1; $i--) {
            $large = $image->resize(800, 600);
            $large = $large->encode('jpg', 60);
            $r = Storage::disk('webdav')->put('folder/' . $i . 'large.jpg', $large->__toString());

            $webp = $image->resize(800, 600);
            $webp = $webp->encode('webp', 60);
            $r = Storage::disk('webdav')->put('folder/' . $i . 'web.webp', $webp->__toString());

        }
//        for($i=1; $i <= 500; $i++){
//            $image = Image::make('https://cdn3.riastatic.com/photosnew/auto/photo/mercedes-benz_vito-111__351177843fx.jpg');
//            $watermark = Image::make('img/system/logos/logo_white.png');
//            $image->insert($watermark, 'bottom-left', 5, 5);
//
//            $large = $image->resize(800, 600);
//            $large->save('folder/' . $i . 'large.jpg',  60);
//            $medium = $image->resize(620, 465);
//            $medium->save('folder/' . $i . 'medium.jpg',  60);
//
//            $standart = $image->resize(460, 290);
//            $standart->save('folder/' . $i . 'standart.jpg',  60);
//
//            $small = $image->resize(150, 100);
//            $small->save('folder/' . $i . 'small.jpg',  60);
//        }

//        $r = Storage::disk('webdav')->put('auto/123.jpg', $r);
//        dd($r);
//        Storage::disk('webdav')->put('https://cdn1.riastatic.com/photosnew/auto/photo/bmw_x5__340495096s.jpg', 'bmw.jpg');

//        $r = Carbon::now();
//        $img = Storage::disk('webdav')->get('/481large.jpg');
//        $s = Carbon::now();
//        dd($r, $s);
//        return response($img)->header('Content-type','image/png');;
//        file_put_contents('123.jpg', $img);
//        imagepng('123.png');
//        return asset('123.png');
    }


}
