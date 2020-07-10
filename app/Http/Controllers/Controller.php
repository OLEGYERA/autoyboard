<?php

namespace App\Http\Controllers;
use http\Env;
use PHPHtmlParser\Dom;
use App\Brand;
use App\ModelOfBrand;
use App\TransportType;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function test(){
        ini_set('max_execution_time', 180);

//        $isset_brand->forceFill(['transport_type_array->as' => true]);
        $brands = Curl::to('https://automoto.ua/_block/auto-widget/search-form?includeFilters=false&q=&mark=&model=&category=8&price%5Bfrom%5D=&price%5Bto%5D=&year%5Bfrom%5D=&year%5Bto%5D=&engine_volume%5Bfrom%5D=&engine_volume%5Bto%5D=&mileage%5Bfrom%5D=&mileage%5Bto%5D=&country=&no_reseller=&bodyType=&exchange=&damaged=&customed=&with_photo=&new=')
            ->withTimeout(60)
            ->withConnectTimeout(60)
//            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
            ->withResponseHeaders()
            ->asJsonResponse(true)
            ->get();

        dd(1);
        $under_line = false;
        $under_alias = false;
        foreach ($brands['marks'] as $brand){
            if($brand['name'] == '--------------------'){
                $under_line = true;
                continue;
            }else{
                if(!$under_line){
                    continue;
                }
            }
//            if(mb_strtolower($this->createAlias($brand['name'])) == 'kolibri'){
//                $under_alias = true;
//                continue;
//            }else{
//                if(!$under_alias){
//                    continue;
//                }
//            }
            if($under_line){
                $isset_brand = Brand::where('alias', mb_strtolower($this->createAlias($brand['name'])))->first();
                if(!empty($isset_brand)){
                    $isset_brand->autodom = true;
                    $isset_brand->save();
                    $new_brand = $isset_brand;
                }
                else{
                    $new_brand = new Brand;
                    $new_brand->autodom = true;
                    $new_brand->title = $brand['name'];
                    $new_brand->rtitle = $brand['name_ru'];
                    $new_brand->utitle = $brand['name_uk'];
                    $new_brand->alias = mb_strtolower($this->createAlias($brand['name']));
                    $new_brand->save();
                    echo $new_brand->title . ' - бренд создан <br/>';
                    $extension = explode('.', $brand['logo']);
                    if(isset($extension[1])){
                        $extension = $extension[1];
                        Curl::to('https://automoto.ua' . $brand['logo'])
                            ->withTimeout(60)
                            ->withConnectTimeout(60)
                            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
                            ->withResponseHeaders()
                            ->download('img/brands_logo/' . $new_brand->alias . '.' . $extension);
                             echo $new_brand->alias . ' - изображение добавленно <br/>';
                    }
                    else{
                        echo $new_brand->alias . ' - изображение <b>не</b> добавленно <br/>';
                    }
                }



                echo $new_brand->title . ' - МОДЕЛИ ---------------------------------------------- <br/>';

                $models = Curl::to('https://automoto.ua/_block/auto-widget/search-form?includeFilters=false&q=&mark=' . $brand['id'] . '&model=&category=8&price%5Bfrom%5D=&price%5Bto%5D=&year%5Bfrom%5D=&year%5Bto%5D=&engine_volume%5Bfrom%5D=&engine_volume%5Bto%5D=&mileage%5Bfrom%5D=&mileage%5Bto%5D=&country=&no_reseller=&bodyType=&exchange=&damaged=&customed=&with_photo=&new=')
                    ->withTimeout(60)
                    ->withConnectTimeout(60)
                    ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
                    ->withResponseHeaders()
                    ->asJsonResponse(true)
                    ->get();
                foreach ($models['models'] as $model) {
                    $model_new = new ModelOfBrand();
                    if(!empty(ModelOfBrand::find($model['id']))){
                        continue;
                    }
                    $model_new->id = $model['id'];
                    $model_new->brand_id = $new_brand->id;
                    $model_new->parent_id = $model['parent_id'];
                    $model_new->transport_type_id = 8;

                    $model_new->title = $model['name'];
                    $model_new->rtitle = $model['name_ru'];
                    $model_new->utitle = $model['name_uk'];
                    $model_new->alias = mb_strtolower($this->createAlias($model['name']));

                    $model_new->save();
                    echo $model_new->title . ' - модель созданна <br/>';
                }
            echo $new_brand->title . ' - КОНЕЦ ---------------------------------------------- <br/>';
            echo '<br/><br/><br/><br/>';
            }
        }







//        dd(Brand::where('transport_type_array->0', '1')->get());
//        $item = (Brand::where('title', 'asdasdsssddas')->first());
//        $item->forceFill(['transport_type_array->moto' => false]);
//        $item->save();
//        dd($item);
//        $brand = new Brand;
//        $brand->transport_type_array = json_encode(array('legkovye' => true, 'moto' => false, 'vodnyy-transport' => false, 'spectehnika' => true, 'pricepy' => false, 'gruzoviki' => false, 'avtobusy' => false, 'avtodoma' => true, 'vozdushnyy-transport' => false, 'selyhoztehnika' => false,));
//        $brand->title = 'asdasdsssddas';
//        $brand->alias = 'assdasssddass';
//        $brand->save();
//dd($brand);


//        $brands = Curl::to('https://auto.ria.com/api/categories/1/marks/_active/_with_count?langId=2')
//            ->withTimeout(60)
//            ->withConnectTimeout(60)
//            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
//            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
//            ->withResponseHeaders()
//            ->asJsonResponse(true)
////            ->returnResponseObject()
//            ->get();
//
//
//        foreach($brands as $item){
//            $models = Curl::to('https://auto.ria.com/api/marks/' . $item['value'] . '/models/_group/_with_count?langId=2&category_id=1')
//                ->withTimeout(60)
//                ->withConnectTimeout(60)
//                ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
//                ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
//                ->withResponseHeaders()
//                ->asJsonResponse(true)
////            ->returnResponseObject()
//                ->get();
//
//            $brand = new Brand;
//            $brand->transport_type_array = json_encode(array('legkovye' => true, 'moto' => false, 'vodnyy-transport' => false, 'spectehnika' => false, 'pricepy' => false, 'gruzoviki' => false, 'avtobusy' => false, 'avtodoma' => false, 'vozdushnyy-transport' => false, 'selyhoztehnika' => false,));
//            $brand->title = $item['name'];
//            $brand->alias = mb_strtolower($this->createAlias($item['name']));
//            $brand->save();
////            dd($brand);
//
//            echo $brand->title . ' - Добавленно <br/>';
//            echo '----------------------------Модели----------------------------------------- <br/>';
//            foreach ($models as $m_item){
//                $model = new ModelOfBrand();
//                $model->brand_id = $brand->id;
//                $model->transport_type_id = 1;
//                $model->title = $m_item['name'];
//                $model->alias = mb_strtolower($this->createAlias($m_item['name']));
//                $model->save();
//                echo $model->title . ' - Добавленно <br/>';
//            }
//            echo '----------------------------Конец Модели------------------------------------------------ <br/><br/><br/>';


//            dd($models);

//














//        $response->content
//        $contents = File::get('index.htmls');
//        $tidy_config = array(
//            'clean' => true,
//            'output-xhtml' => true,
//            'show-body-only' => true,
//            'wrap' => 0,
//
//        );
//        $tidy = \tidy_parse_string( $contents, $tidy_config, 'UTF8');
//        dd($tidy);
//        $dom = new Dom;
//        $dom = $dom->loadStr($contents);
//        $htmls = $dom->find('.address')[0];
//        dd($htmls, $htmls->innerHtml);
    }
//getAttribute('href')

    protected function createAlias($string){
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            ' ' => '-', ' / ' => '_', '/' => '_',
        );
        return strtr($string, $converter);
    }


}

//75.151.213.85
//91.217.42.2
//                        ->withOption('PROXY', '93.190.44.51')
//            ->withOption('PROXYPORT', '14523')
//            ->withOption('PROXYUSERPWD', 'O9e5TwD:N5k6WhE')
