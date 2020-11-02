<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Stichoza\GoogleTranslate\GoogleTranslate;
use YandexTranslate;
use Intervention\Image\ImageManagerStatic as Image;
use http\Env;
use PHPHtmlParser\Dom;
use App\Brand;
use App\ModelOfBrand;
use App\ManufactureCountry;
use App\TranportBody;
use App\UkrainianRegion;
use App\UkrainianCity;
use App\BrandPivotType;

use App\TransportChTech;
use App\TransportChTechPivotType;


use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function testParse(){
$url = 'https://medpravda.ua';
$agent = 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)';
$referer = 'https://www.visaservices.co.in/Finland-russia-online/AppScheduling/AppScheduling.aspx?P=PcqAqEGdf4OMbJ1CZgKHSUN3Je9Uumiy6NGhvmhMab7phBf7hKlWsBQNrNze6jyj+86S93yLA0yGdiqvwB5yZg==';
$postLoginFields = array();
$postLoginFields['__LASTFOCUS:'] = "";
$postLoginFields['__EVENTTARGET'] = "";
$postLoginFields['__EVENTARGUMENT'] = "";
$postLoginFields['__VIEWSTATE'] = "oR/RTjZiv/ZPwgjEDneDwNkm1iu3LTxLiyUpPJo+guTBgPXwM+qla8+fd9x+24lMUrz2P2FThy7gS979bICs8YUVRK9x7ZviKuFG5JYC/AsiIlH3WFRH5Vqlo5lGGwW36MzwPPY9DakT9njFMKWlhmA0IFlRI8E+J+7g9ehKHVNbNZQKjmMun4WvQO6C+2Srpob0XsicjWd9jRjKTcesVHyn9RIOiyGV1Ud5wdF9bOC5V2efOrHOuvQOgZgNf6LH4u1hul3ZlWhgGIagOnSBL1OSru/dsF7DMHS8JNz0FZEYEGw9rOsykhJFmEmL7wFFtu9f630K4z5uXAjN9vuYjV2DyxRmBlyWmnGbRC93NZ3ERkvwSBPqUm2rWGhGOKoFIRVnuh+Od2romvzOoiQCJvfauK1NJP+7lSOo0C6i3epu4hjEUA8mBpGrkQ/105glvxrI8i+BxNO05KMhQRObQIIch9N3gzM2LUtCzfdXxL1LbQnVJDUsnT7WffWml0jy98dsj4hEbmCI9vVOeAOHq/+yT/tDZFyNemjt1G2CnGl+LLLJmFbOhFdbEWBDrtkjz3O52QnFSS0uhzIG1txYm9ElAdInFYFhWG6cq+JtxyvISXN7e3ZWQyl4xvrxKsZSD2ugAN9Hy8q2LEo2s4ej1/5DDvuV6gcpLAjExVZBvN7DQiTrLnAR6nZtolVTWMZXn0GkY3CwV4v422Nt8I6EvqcqsaOIV+utpRYndwi9wmD2YWZclR0ql8DwwXMYYi6sj2xRLEDUlz1xDlqPNWh77pK4pg42YzXSMm04lsCtjD6UOngL6wMJ3OIx2DREoJ7aq0hYVCoFkI3hMqEvHA3EB+5wjm0a0czNxQZLOnnMhzXyfyEwiZRWSxtf0aUkWBDdsFkTym8No9so0rVJtwxQAqfje2DHINqxPXBEMQ+DQkrMe0a29FXBnRYlJOdfi0HYTRPgLOlalL/EtQDZ/VIaC6HLN1VhH+LqkxPOsvr6mYflltvA0iPmnDxN/GVaNEKxeoaaTtJX0plYJbbzZtxfC/Oy7ytALC4Itq57ebtJ2NJl97NdyVoro/tAjP/cNPWieoy+oOrhHPdSmvNa2hcaeWrqu1KIgFDOF82aqOEn58Vpl6u4MHX3JAWcvSpgUwVLnH/rIEKUdkayhfzVYtastbiySX8rsUff1EhlnF7f7K39Zx/jRTnEaZCiOwEHkJd1";
$postLoginFields['ctl00$plhMain$cboVAC'] = "14";
$postLoginFields['ctl00$plhMain$btnSubmit'] = "ОТПРАВИТЬ";
$postLoginFields['____Ticket'] = "1";
$postLoginFields['__EVENTVALIDATION'] = "ocN9/AWVkqNfVBdx4wlSJJXUC5GZ5dfdK6dtrVj3hGKXzAD49uvhKRKBIhIeRRIuTvxvEAiUdWDlJUvGn0fGO3zwrRw7iVe7yHiBEc00shTSKMMavWRYfd/D9G65u9xT1IX1MJmpIlM=";

//создаем файл для cookies
$cookiefile = tempnam('test', 'cookie_');

$ch = curl_init(); //инициализация библиотеки
//указываем адрес страницы
curl_setopt($ch, CURLOPT_URL,$url);
//указываем заголовок User-Agent
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
//указываем, что полученная страница должна быть сохранена в переменную
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//указываем, что cURL должен переходить по редиректам
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

 //referer - адрес страницы с которой вы пришли,
//т.е. нужно указать адрес страницы на которой находится форма
curl_setopt($ch, CURLOPT_REFERER, $referer);
//указываем, что мы отправляем данные методом post
curl_setopt($ch, CURLOPT_POST, 1);
//добавляем строку с post данными
curl_setopt($ch, CURLOPT_POSTFIELDS,  http_build_query($postLoginFields));
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//выполняем запрос
$page = curl_exec($ch);




        dd($ch);
        curl_close($ch);
echo $page;


//        while ($line = fgets($fp, 1024)){ $page .= $line; }



        $brand_1 = Curl::to('https://medpravda.ua')
            ->withTimeout(60)
            ->withConnectTimeout(60)
            //            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
            ->withHeaders(array('User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85'))
            ->withResponseHeaders()
            ->returnResponseObject()
            ->get();
//        echo $brand_1->content;
//        echo  '<iframe src=”' . url('https://medpravda.ua/preparat/Pankreatin-10000') . '” width=”1” height=”1” align=”left”>';
        return view('welcome');
    }

    public function filterparse()
    {
        //auto 1
//moto 2
//tractor 4*
//water_transport 3*
//trailer 5
//lorry 6
//bus 7
//autodom 8

        $cat_id = 4;

        $brand_1 = Curl::to('https://auto.ria.com/demo/api/categories/'. $cat_id .'/marks/_active/_with_count/_with_country?langId=2')
        ->withTimeout(60)
        ->withConnectTimeout(60)
        //            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
        ->withHeaders(array('User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85'))
        ->withResponseHeaders()
        ->returnResponseObject()
        ->get();


        $brand_1 = json_decode($brand_1->content);
        $manufacture = json_decode('[{"val" : "276", "name": "Германия"},{"val" : "392", "name": "Япония"},{"val" : "250", "name": "Франция"},{"val" : "840", "name": "США"},{"val" : "408", "name": "Корея"},{"val" : "203", "name": "Чехия"},{"val" : "804", "name": "Украина"},{"val" : "380", "name": "Италия"},{"val" : "752", "name": "Швеция"},{"val" : "158", "name": "Китай"},{"val" : "40", "name": "Австрия"},{"val" : "826", "name": "Англия"},{"val" : "32", "name": "Аргентина"},{"val" : "112", "name": "Беларусь"},{"val" : "56", "name": "Бельгия"},{"val" : "100", "name": "Болгария"},{"val" : "76", "name": "Бразилия"},{"val" : "348", "name": "Венгрия"},{"val" : "276", "name": "Германия"},{"val" : "900", "name": "Грузия"},{"val" : "208", "name": "Дания"},{"val" : "356", "name": "Индия"},{"val" : "364", "name": "Иран"},{"val" : "901", "name": "Ирландия"},{"val" : "724", "name": "Испания"},{"val" : "380", "name": "Италия"},{"val" : "398", "name": "Казахстан"},{"val" : "124", "name": "Канада"},{"val" : "158", "name": "Китай"},{"val" : "408", "name": "Корея"},{"val" : "428", "name": "Латвия"},{"val" : "440", "name": "Литва"},{"val" : "442", "name": "Люксембург"},{"val" : "458", "name": "Малайзия"},{"val" : "498", "name": "Молдова"},{"val" : "528", "name": "Нидерланды"},{"val" : "578", "name": "Норвегия"},{"val" : "902", "name": "ОАЭ"},{"val" : "616", "name": "Польша"},{"val" : "620", "name": "Португалия"},{"val" : "643", "name": "Россия"},{"val" : "642", "name": "Румыния"},{"val" : "688", "name": "Сербия"},{"val" : "703", "name": "Словакия"},{"val" : "705", "name": "Словения"},{"val" : "840", "name": "США"},{"val" : "792", "name": "Турция"},{"val" : "860", "name": "Узбекистан"},{"val" : "804", "name": "Украина"},{"val" : "246", "name": "Финляндия"},{"val" : "250", "name": "Франция"},{"val" : "203", "name": "Чехия"},{"val" : "756", "name": "Швейцария"},{"val" : "752", "name": "Швеция"},{"val" : "233", "name": "Эстония"},{"val" : "392", "name": "Япония"}]');

        $manufacture_assoc = [];
        foreach ($manufacture as $i){
            $manufacture_assoc = Arr::add($manufacture_assoc, $i->val, $i->name);
        }


        foreach ($brand_1 as $i){
            $brand = Brand::where('title', $i->name)->first();
            if(!empty($brand)){
                $model = Curl::to('https://auto.ria.com/uk/api/categories/' . $cat_id . '/marks/' . $i->value . '/models/_active?langId=4')
                    ->withTimeout(60)
                    ->withConnectTimeout(60)
                    //            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
                    ->withHeaders(array('User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85'))
                    ->withResponseHeaders()
                    ->returnResponseObject()
                    ->get();
                echo $brand->title . '-------------------------------<br/>';
               foreach (json_decode($model->content) as $model){
                   $sn = ModelOfBrand::where('title', $model->name)->first();
                   if(empty($sn)){
                       $st = (new ModelOfBrand)->create([
                           'title' => $model->name,
                           'alias' => $this->createAlias($model->name),
                           'brand_id' => $brand->id,
                           'transport_type_id' => 3
                       ]);
                       if($st !== null){
                           echo $model->name . ' success<br/>';
                       }
                       else{
                           echo $model->name . ' false<br/>';
                       }
                   }
               }
            }

//            if(!empty($brand)){
//                echo $i->country . '<br/>';
//                if($i->country != 0 && isset($manufacture_assoc[$i->country])){
//                    $mc = ManufactureCountry::where('rtitle', $manufacture_assoc[$i->country])->first();
//                    $brand->manufacture_id = $mc->id;
//                    $brand->save();
//                }
//            }
        }
        dd($i->country);


        dd($manufacture_assoc);
        foreach (Brand::all() as $item){
            if($item->car){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 1;
                $bpt->save();
            }
            if($item->moto){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 2;
                $bpt->save();
            }
            if($item->tractor){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 3;
                $bpt->save();
            }
            if($item->water_transport){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 4;
                $bpt->save();
            }
            if($item->trailer){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 5;
                $bpt->save();
            }
            if($item->lorry){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 6;
                $bpt->save();
            }
            if($item->bus){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 7;
                $bpt->save();
            }
            if($item->autodom){
                $bpt = new BrandPivotType;
                $bpt->brand_id = $item->id;
                $bpt->type_id = 8;
                $bpt->save();
            }
        }

        dd('end');







        $ru_json = json_decode('{"security":[{"name":"Сигнализация","value":303}],"comfort":[{"name":"Антена","value":487},{"name":"Душ","value":412},{"name":"Запуск кнопкой","value":525},{"name":"Кондиционер","value":189},{"name":"Отопление","value":490},{"name":"Палатка","value":489},{"name":"Память сидений","value":523},{"name":"Плита","value":488},{"name":"Подогрев руля","value":524},{"name":"Сейф","value":492},{"name":"Телевизор","value":422},{"name":"Туалет","value":425},{"name":"Умывальник","value":491},{"name":"Холодильник","value":426}],"multimedia":[{"name":"CD","value":407},{"name":"DVD","value":408},{"name":"MP3","value":433}],"state":[{"name":"Гаражное хранение","value":477},{"name":"Индивидуальная комплектация","value":513},{"name":"Не бит","value":497},{"name":"Не крашен","value":498},{"name":"Первая регистрация","value":501},{"name":"Первый владелец","value":496},{"name":"Пригоню под заказ","value":512},{"name":"Требует ремонта","value":522}]}', true);
        $ua_json = json_decode('{"security":[{"name":"Сигналізація","value":303}],"comfort":[{"name":"Антена","value":487},{"name":"Душ","value":412},{"name":"Запуск кнопкою","value":525},{"name":"Кондиціонер","value":189},{"name":"Обігрів керма","value":524},{"name":"Опалення","value":490},{"name":"Палатка","value":489},{"name":"Пам\'ять сидінь","value":523},{"name":"Плита","value":488},{"name":"Сейф","value":492},{"name":"Телевізор","value":422},{"name":"Туалет","value":425},{"name":"Умивальник","value":491},{"name":"Холодильник","value":426}],"multimedia":[{"name":"CD","value":407},{"name":"DVD","value":408},{"name":"MP3","value":433}],"state":[{"name":"Гаражне зберігання","value":477},{"name":"Індивідуальна комплектація","value":513},{"name":"Не битий","value":497},{"name":"Не фарбований","value":498},{"name":"Перша реєстрація","value":501},{"name":"Перший власник","value":496},{"name":"Потребує ремонту","value":522},{"name":"Прижену під замовлення","value":512}]}', true);
        $en_json = json_decode('{"security": [{"name": "Alarm", "value": 303}], "comfort": [{"name": "Antenna", "value": 487}, {"name": " Shower ","value": 412}, {"name":" Button start ","value": 525}, {"name":" Air conditioning ","value": 189}, {"name":" Heating steering wheel ","value": 524}, {"name":" Heating ","value": 490}, {"name":" Tent ","value": 489}, {"name":"Seat memory ","value": 523}, {"name":" Stove ","value": 488}, {"name":" Safe ","value": 492}, {"name":" TV ","value": 422}, {"name":" Toilet ","value": 425}, {"name":" Washbasin ","value": 491}, {"name":" Refrigerator ", "value": 426}], "multimedia": [{"name": "CD", "value": 407}, {"name": "DVD", "value": 408}, {"name": "MP3", "value": 433}], "state": [{"name": "Garage storage", "value": 477}, {"name": "Individual equipment", "value": 513} , {"name": "Unbeaten", "value": 497}, {"name": "Unpainted", "value": 498}, {"name": "First registration", "value": 501 }, {"name": "First owner", "value": 496}, {"name": "Needs repair", "value": 522}, {"name": "Custom", "value" : 512}]}', true);


//auto 1
//moto 2
//tractor 4
//water_transport 3
//trailer 5
//lorry 6
//bus 7
//autodom 8


        $type_id = 8;
        $obj = [];



        foreach ($ru_json as $key => $item) {
            foreach ($item as $i){
                $obj = Arr::add($obj, $i['value'], ['assoc' => $key, 'rtitle' => $i['name']]);
            }
        }
        foreach ($ua_json as $key => $item) {
            foreach ($item as $i){
                $obj[$i['value']]['utitle'] = $i['name'];
            }
        }
        foreach ($en_json as $key => $item) {
            foreach ($item as $i){
                $obj[$i['value']]['title'] = trim($i['name']);
                $obj[$i['value']]['alias'] = mb_strtolower($this->createAlias(trim($i['name'])));
                echo $i['value'] . '<br/>';
            }
        }

        dd($obj);



        foreach ($obj as $item) {

            $searched_item = TransportChTech::where('alias', $item['alias'])->first();

            if(empty($searched_item)){
                $tct = new TransportChTech;
                $tct->type = $item['assoc'];
                $tct->title = $item['title'];
                $tct->rtitle = $item['rtitle'];
                $tct->utitle = $item['utitle'];
                $tct->alias = $item['alias'];

                $tct->save();


                $tctpt = new TransportChTechPivotType;
                $tctpt->ch_tech_id = $tct->id;
                $tctpt->type_id = $type_id;
                $tctpt->save();

            }
            else{
                echo $item['title'] . '---' . '<br/>';
                $tctpt = new TransportChTechPivotType;
                $tctpt->ch_tech_id = $searched_item->id;
                $tctpt->type_id = $type_id;
                $tctpt->save();
            }


        }

        dd('end');






        dd(json_decode($response->content));





        foreach ($ru_json as $item) {
            $ru_obj = Arr::add($ru_obj, $item->value, ['name' => $item->name, 'state' => $item->state]);
        }

        foreach ($ua_json as $item) {
            $ua_obj = Arr::add($ua_obj, $item->value, ['name' => $item->name, 'state' => $item->state]);
        }
        foreach ($en_json as $item){
            echo $item->value. '<br/>';
            $en_obj = Arr::add($en_obj, $item->value, trim($item->name));
        }


        foreach ($ru_obj as $k => $item) {
            $tb = new UkrainianCity;
            $tb->title = 'null';
            $tb->rtitle = $item['name'];
            $tb->utitle = $ua_obj[$k]['name'];
            $tb->alias = 'null';

            $tb->region_id = UkrainianRegion::where('timely', $item['state'])->first()->id;
            dd($tb);
            $tb->save();
            echo 'ru: ' . $tb->rtitle . ', ua: ' . $tb->utitle . '<br/>';
//            $tb->save();

        }

        dd($ru_obj, $ua_obj);


        $ru_json = json_decode('');
        $ua_json = json_decode('');
        $en_json = json_decode('');
    }



//$response = Curl::to('https://auto.ria.com/uk/api/categories/8/auto_options/_group?langId=2')
//->withTimeout(60)
//->withConnectTimeout(60)
////            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
//->withHeaders(array('User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85'))
//->withResponseHeaders()
//->returnResponseObject()
//->get();

    public function img_minified(){

        for($i=1; $i <= 500; $i++){
            $image = Image::make('https://cdn3.riastatic.com/photosnew/auto/photo/mercedes-benz_vito-111__351177843fx.jpg');
            $watermark = Image::make('img/system/logos/logo_white.png');
            $image->insert($watermark, 'bottom-left', 5, 5);

            $large = $image->resize(800, 600);
            $large->save('folder/' . $i . 'large.jpg',  60);
            $medium = $image->resize(620, 465);
            $medium->save('folder/' . $i . 'medium.jpg',  60);

            $standart = $image->resize(460, 290);
            $standart->save('folder/' . $i . 'standart.jpg',  60);

            $small = $image->resize(150, 100);
            $small->save('folder/' . $i . 'small.jpg',  60);
        }

    }











    public function first_try(){
        $response = Curl::to('https://auto.ria.com/legkovie/?page=1')
            ->withTimeout(60)
            ->withConnectTimeout(60)
//            ->withProxy('93.190.44.51', 14523, 'https://', 'O9e5TwD', 'N5k6WhE')
            ->withHeaders( array( 'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; HRY-LX1 Build/HONORHRY-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36 YaApp_Android/9.85 YaSearchBrowser/9.85') )
            ->withResponseHeaders()
            ->returnResponseObject()
            ->get();



        $tidy_config = array(
            'clean' => true,
            'output-xhtml' => true,
            'show-body-only' => true,
            'wrap' => 0,
        );
        $tidy = \tidy_parse_string( $response->content, $tidy_config, 'UTF8');
//        dd($tidy);


        $dom = new Dom;
        $dom = $dom->loadStr($tidy);
        $htmls = $dom->find('.ticket-item');

        foreach($htmls as $html){
            $link = $html->find('.address');
            foreach ($link->getChildren() as $child){
                echo $child->text . ' ';
            }
            echo '<br/>';


//            outerHtml - "<a data-template-v="6" href="https://auto.ria.com/auto_audi_q7_27328890.html" class="address" title="Audi Q7 2017 в Одессе" target="_self"><span class="blue bold">Audi Q7 EXLUSIVE ABT</span> 2017</a> ◀"
//            inner_html - <span class="blue bold">Audi Q7 EXLUSIVE ABT</span> 2017
        }
        dd($htmls);
//        https://auto.ria.com/legkovie/?page=1
    }

    public function test(){
        ini_set('max_execution_time', 180);

        dd(123);

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
                    $new_brand->utitle= $brand['name_uk'];
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
                    $model_new->utitle= $model['name_uk'];
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
            'ь' => 'y',  'ы' => 'y',   'ъ' => 'y',
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
            '(' => '',    ')' => '',  '\'' => 'y'
        );
        return strtr($string, $converter);
    }


}

//75.151.213.85
//91.217.42.2
//                        ->withOption('PROXY', '93.190.44.51')
//            ->withOption('PROXYPORT', '14523')
//            ->withOption('PROXYUSERPWD', 'O9e5TwD:N5k6WhE')
