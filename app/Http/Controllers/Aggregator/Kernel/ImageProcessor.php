<?php

namespace App\Http\Controllers\Aggregator\Kernel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use App\ParserPhotoCard;

use App\TransportType;
use App\UkrainianRegion;

class ImageProcessor extends Controller
{
    public function imageCollector($imageArr, $id){
        if($imageArr !== false){
            foreach ($imageArr as $key => $image_url){
                $trusUrl = $this->createTrusUrl($image_url);
                try {
                    $image = Image::make($trusUrl);
                } catch (\Exception $e){
                    continue;
                }
                
                $watermark = Image::make(asset('img/system/logos/logo_white.png'));
                $image->insert($watermark, 'bottom-left', 5, 5);

                $size = $this->createTrusSize($image->getWidth(), $image->getHeight());
                $auto_photo = $image->resize($size['w'], $size['h']);
                $auto_photo = $auto_photo->encode('jpg', 70);
                $auto_photo_path = 'auto/' . $id . '/' . 'photo_' . $key . '.jpg';

                if(Storage::disk('webdav')->put($auto_photo_path, $auto_photo)) (new ParserPhotoCard)->create([
                    'url_id' => $id,
                    'path' => $auto_photo_path
                ]);
            }
        }
        return true;
    }

    protected function createTrusUrl($image_url){
        $img_name = substr($image_url, strrpos($image_url, '/') + 1);
        $name_exploding = explode('.', $img_name);
        $extension = $name_exploding[1];
        $clear_img_path = substr($name_exploding[0], 0, mb_strlen($name_exploding[0]) - 1);
        $img_url = substr($image_url, 0,strpos($image_url, $img_name));

        return $img_url . $clear_img_path . 'fx.' . $extension;
    }

    protected function createTrusSize($width, $height){
        return $width > $height ? ['w' => 620, 'h' => 465] : ['w' => 450, 'h' => 600];
    }

}
