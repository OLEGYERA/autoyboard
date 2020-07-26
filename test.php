
<?php

namespace App\Http\Controllers\AGGREGATOR\Services\autoria;

use Carbon\Carbon;
use PHPHtmlParser\Dom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LexemeController extends Controller
{
    private $DOM;
    private $specialLabels = [];
    private $conditionLabels = [];
    private $safetyLabels = [];
    private $comfortLabels = [];
    private $multimediaLabels = [];
    private $otherLabels = [];


    public function  __construct(){
        $this->DOM = new Dom();
    }

    public function filterAnalizeCardAddress($content){
        $filterPage = $this->DOM->loadStr($content);
        $findedCards = $filterPage->find('.ticket-item');
        if(count($findedCards) === 0) return false;

        $cardsAddress = [];
        foreach($findedCards as $findedCard){
            $cardAddress = $findedCard->find('.address')->getAttribute('href');
            if(strpos($cardAddress, 'newauto') === false){
                array_push($cardsAddress, $cardAddress);
            }
        }
        return $cardsAddress;
    }

    public function pageAnalizeCardData($content){
        $cardData = ['labels' => [], 'start' => Carbon::now()];
        $this->DOM->setOptions(['removeScripts' => false]);
        $cardPage = $this->DOM->loadStr($content);

        $tech_current_flow = '';
        $stage = 0;

        foreach ($cardPage->find('script') as $script){
            if($script->getAttribute('data-base-url')){
                $cardData['brand'] = $script->getAttribute('data-mark-name');
                $cardData['model'] = $script->getAttribute('data-model-name');
                $cardData['modification'] = $script->getAttribute('data-modification');
                $cardData['year'] = $script->getAttribute('data-year');
                $cardData['chat_link'] = $script->getAttribute('data-chat-link');
                $cardData['price']['value'] = $script->getAttribute('data-seller-price');
                $cardData['price']['type'] = $script->getAttribute('data-currency');
                $cardData['service_date']['add'] = $script->getAttribute('data-add-date');
                $cardData['service_date']['update'] = $script->getAttribute('data-update-date');
//
//
            }
        }


//        dd($cardPage->find('.carousel-inner .photo-620x465 picture img'));

        $id = 35151515151;
        foreach($cardPage->find('.carousel-inner .photo-620x465 picture img') as $key=>$photo_item){
//            $now = Carbon::now();
//
            $uri = $photo_item->getAttribute('src');
//
//            $img_name = substr($uri, strrpos($uri, '/') + 1);
//            $img_url = substr($uri, 0,strpos($uri, $img_name));
//            $name_exploding = explode('.', $img_name);
//            $extension = $name_exploding[1];
//            $alternate_extension = 'webp';
//            $clear_img_path = substr($name_exploding[0], 0, mb_strlen($name_exploding[0]) - 1);
//
//
//            error_reporting(0);
//
////            /large
//            $seek_img_large_jpg = file_get_contents($img_url . $clear_img_path . 'fx.' . $extension);
//            if($seek_img_large_jpg){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/large/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_large_jpg);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'fx.' . $extension . '<br/>';
//            }
//
//            $seek_img_large_webp = file_get_contents($img_url . $clear_img_path . 'fx.' . $alternate_extension);
//            if($seek_img_large_webp){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/large/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_large_webp);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'fx.' . $alternate_extension . '<br/>';
//            }
//
////            /medium
//            $seek_img_medium_jpg = file_get_contents($img_url . $clear_img_path . 'f.' . $extension);
//            if($seek_img_medium_jpg){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/medium/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_medium_jpg);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'f.' . $extension . '<br/>';
//            }
//
//            $seek_img_medium_webp = file_get_contents($img_url . $clear_img_path . 'f.' . $alternate_extension);
//            if($seek_img_medium_webp){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/medium/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_medium_webp);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'f.' . $alternate_extension . '<br/>';
//            }
//
////            /small
//            $seek_img_small_jpg = file_get_contents($img_url . $clear_img_path . 'bx.' . $extension);
//            if($seek_img_small_jpg){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/small/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_small_jpg);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'bx.' . $extension . '<br/>';
//            }
//
//            $seek_img_small_webp = file_get_contents($img_url . $clear_img_path . 'bx.' . $alternate_extension);
//            if($seek_img_small_webp){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/small/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_small_webp);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'bx.' . $alternate_extension . '<br/>';
//            }
//
////            /mini
//            $seek_img_mini_jpg = file_get_contents($img_url . $clear_img_path . 's.' . $extension);
//            if($seek_img_mini_jpg){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/mini/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_mini_jpg);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 's.' . $extension . '<br/>';
//            }
//
//            $seek_img_mini_webp = file_get_contents($img_url . $clear_img_path . 's.' . $alternate_extension);
//            if($seek_img_mini_webp){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/mini/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_mini_webp);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 's.' . $alternate_extension . '<br/>';
//            }
//
//            $emitted = Carbon::now();
//
//            echo 'Уровень: ' . $key . ', сек: ' . $now->diffInSeconds($emitted) . '<br/>';

//            echo "Name: " . $img_name . ', Extension: ' . $extension . ', Type: ' . $clear_img_path  . '<br/>';
            echo $uri  . '<br/>';

        }

        dd(1);


        foreach($cardPage->find('#description_v3 dd') as $key => $tech_item){
            if($key == 0 && count($tech_item->getChildren()) !== 0){
                foreach($tech_item->getChildren() as $sub_tech_item){
                    if($sub_tech_item->getAttribute('class') !== null || $sub_tech_item->getAttribute('class') === 'point') continue;
                    if(strpos($sub_tech_item->text, 'двер') !== false){
                        $cardData['doors'] = trim(explode(' двер', $sub_tech_item->text)[0]);
                    }
                    elseif(strpos($sub_tech_item->text, 'мест') !== false){
                        $cardData['seat_place'] = trim(explode(' мест', $sub_tech_item->text)[0]);
                    }
                    else{
                        $cardData['body'] = trim($sub_tech_item->text);
                    }
                }
            }
            else{
                if(count($tech_item->getChildren()) !== 0){
                    //скрипт продолжение парсинга по старому лейблу
                    if($tech_item->getChildren()[0]->getAttribute('class') == 'label'){
                        $tech_current_flow = $tech_item->getChildren()[0]->text;
                        $stage = 0;
                    }
                    elseif(count($tech_item->getChildren()) > 1 && $tech_item->getChildren()[1]->getAttribute('class') == 'label'){
//                        $tech_current_flow = $tech_item->getChildren()[1]->text;
//                        $stage = 0;
                        continue;
                    }
                    else{
                        if(count($tech_item->getChildren()) > 1 && $tech_item->getChildren()[1]->getTag() !== 'span') continue;
                        $stage++;
                    }


                    switch($tech_current_flow){
                        case 'Пробег':
                            $cardData['engine']['mileage'] = trim(explode('тыс. км', $tech_item->getChildren()[2]->text)[0]);
                            break;
                        case 'Двигатель':
                            if($stage == 0){
                                $sub_stage = 0;
                                foreach ($tech_item->getChildren()[2]->getChildren() as $sub_tech_item){
                                    if($sub_tech_item->text == '•') continue;
                                    if($sub_stage == 0){
                                        $engine_specifications = explode('(', $sub_tech_item->text);
                                        if(count($engine_specifications) > 1){
                                            $engine_volume = trim($engine_specifications[0]);
                                            if($engine_volume !== ''){
                                                $cardData['engine']['specification']['volume'] = trim(explode('л', $engine_volume)[0]);
                                            }
                                            $engine_power = explode('/', explode(')', $engine_specifications[1])[0]);

                                            if($engine_power[0] !== ''){
                                                $cardData['engine']['specification']['horse'] = trim(explode('л.с.', $engine_power[0])[0]);
                                            }

                                            if($engine_power[1] !== ''){
                                                $cardData['engine']['specification']['kilowatt'] = trim(explode('кВт', $engine_power[1])[0]);
                                            }

                                        }else{

                                            $engine_volume = trim($engine_specifications[0]);
                                            if($engine_volume !== ''){
                                                $cardData['engine']['specification']['volume'] = trim(explode('л', $engine_volume)[0]);
                                            }
                                        }
                                        $sub_stage++;
                                    }
                                    else{
                                        $cardData['engine']['specification']['type'] = $sub_tech_item->text;
                                    }
                                }

                            }
                            else{
                                //without label tag, we strong push first child
                                foreach ($tech_item->getChildren()[0]->getChildren() as $sub_tech_item){
                                    if($sub_tech_item->text == null) continue;
                                    if(strpos($sub_tech_item->text, 'город') !== false){
                                        $cardData['engine']['consumption']['city'] = trim(explode('город', $sub_tech_item->text)[1]);
                                    }
                                    elseif(strpos($sub_tech_item->text, 'трасса') !== false){
                                        $cardData['engine']['consumption']['track'] = trim(explode('трасса', $sub_tech_item->text)[1]);
                                    }
                                    elseif(strpos($sub_tech_item->text, 'смешанный') !== false){
                                        $cardData['engine']['consumption']['mixed'] = trim(explode('смешанный', $sub_tech_item->text)[1]);//
                                    }
                                }
                            }
                            break;
                        case 'Коробка передач':
                            $cardData['engine']['transmission'] = trim($tech_item->getChildren()[2]->text);
                            break;
                        case 'Привод':
                            $cardData['engine']['gear'] = trim($tech_item->getChildren()[2]->text);
                            break;
                        case 'Цвет':
                            if(strpos($tech_item->getChildren()[1]->text, 'металлик') !== false){
                                $cardData['color']['metallic'] = true;
                                $cardData['color']['color'] = trim(explode('металлик', $tech_item->getChildren()[1]->text)[0]);
                            }else{
                                $cardData['color']['metallic'] = false;
                                $cardData['color']['color'] = trim($tech_item->getChildren()[1]->text);
                            }
                            break;
                        case 'Состояние':
                            $sub_text = '';
                            foreach($tech_item->getChildren()[2]->getChildren() as $sub_tech_item){
                                if($sub_tech_item->text === ' ') continue;
                                if(strpos($sub_tech_item->text, '&nbsp;') !== false){
                                    $sub_text = trim(explode('&nbsp;', $sub_tech_item->text)[0]) . ' ';
                                }
                                else{
                                    $sub_text .= trim(explode('&nbsp;', $sub_tech_item->text)[0]);
                                    $this->conditionLabelAnalyzer($sub_text);
                                    $sub_text = '';
                                }
                            }
                            $cardData['conditionLabels'] = $this->conditionLabels;
                            break;
                        case 'Безопасность':
                            $sub_text = '';
                            foreach($tech_item->getChildren()[2]->getChildren() as $sub_tech_item){
                                if($sub_tech_item->text === ' ') continue;
                                if(strpos($sub_tech_item->text, '&nbsp;') !== false){
                                    $sub_text = trim(explode('&nbsp;', $sub_tech_item->text)[0]) . ' ';
                                }
                                else{
                                    $sub_text .= trim(explode('&nbsp;', $sub_tech_item->text)[0]);
                                    $this->safetyLabelAnalyzer($sub_text);
                                    $sub_text = '';
                                }
                            }
                            $cardData['safetyLabels'] = $this->safetyLabels;
                            break;
                        case 'Комфорт':
                            $sub_text = '';
                            foreach($tech_item->getChildren()[2]->getChildren() as $sub_tech_item){
                                if($sub_tech_item->text === ' ') continue;
                                if(strpos($sub_tech_item->text, '&nbsp;') !== false){
                                    $sub_text = trim(explode('&nbsp;', $sub_tech_item->text)[0]) . ' ';
                                }
                                else{
                                    $sub_text .= trim(explode('&nbsp;', $sub_tech_item->text)[0]);
                                    $this->comfortLabelAnalyzer($sub_text);
                                    $sub_text = '';
                                }
                            }
                            $cardData['comfortLabels'] = $this->comfortLabels;
                            break;
                        case 'Мультимедиа':
                            $sub_text = '';
                            foreach($tech_item->getChildren()[2]->getChildren() as $sub_tech_item){
                                if($sub_tech_item->text === ' ') continue;
                                if(strpos($sub_tech_item->text, '&nbsp;') !== false){
                                    $sub_text = trim(explode('&nbsp;', $sub_tech_item->text)[0]) . ' ';
                                }
                                else{
                                    $sub_text .= trim(explode('&nbsp;', $sub_tech_item->text)[0]);
                                    $this->multimediaLabelAnalyzer($sub_text);
                                    $sub_text = '';
                                }
                            }
                            $cardData['multimediaLabels'] = $this->multimediaLabels;
                            break;
                        case 'Прочее':
                            $sub_text = '';
                            foreach($tech_item->getChildren()[2]->getChildren() as $sub_tech_item){
                                if($sub_tech_item->text === ' ') continue;
                                if(strpos($sub_tech_item->text, '&nbsp;') !== false){
                                    $sub_text = trim(explode('&nbsp;', $sub_tech_item->text)[0]) . ' ';
                                }
                                else{
                                    $sub_text .= trim(explode('&nbsp;', $sub_tech_item->text)[0]);
                                    $this->otherLabelAnalyzer($sub_text);
                                    $sub_text = '';
                                }
                            }
                            $cardData['otherLabels'] = $this->otherLabels;
                            break;
                    }
                }
            }
        }


        if(count($cardPage->find('#full-description')) !== 0){
            $cardData['description'] = $cardPage->find('#full-description')->text;
        }


        // смешать с метками состояния, кроме торга и уступки
        if(count($cardPage->find('.label-param')) !== 0){
            $sub_text = '';
            foreach($cardPage->find('.label-param')->getChildren() as $label){
                if($label->text == ' ') continue;
                echo $label->text . '<br/>';
                if(strpos($label->text, 'Пригнан из ') !== false){
                    $cardData['specialLabels']['driven_from'] = explode('Пригнан из ', $label->text)[1];
                }elseif(strpos($label->text, 'Первая регистрация') !== false){
                    $cardData['specialLabels']['first_registration'] = true;
                }
                elseif(strpos($label->text, 'Обмен') !== false){
                    $cardData['specialLabels']['exchange'] = true;
                }
                elseif(strpos($label->text, 'Торг') !== false){
                    $cardData['specialLabels']['bargain'] = true;
                }
                elseif(strpos($label->text, 'Авто не в Украине') !== false){
                    $cardData['specialLabels']['not_in_ukraine'] = true;
                }
                elseif(strpos($label->text, 'После ДТП') !== false){
                    $cardData['specialLabels']['after_crash'] = true;
                }
                elseif(strpos($label->text, 'Не на ходу') !== false){
                    $cardData['specialLabels']['for_parts'] = true;
                }
                elseif(strpos($label->text, 'Взято в кредит') !== false){
                    $cardData['specialLabels']['car_credit'] = true;
                }

            }
        }

        if(count($cardPage->find('.not-cleared')) !== 0 && $cardPage->find('.not-cleared')->firstChild()->text == "Авто не растаможено"){
            $cardData['not_cleared'] = true;
        }else{
            $cardData['not_cleared'] = false;
        }



        $cardData['region'] = $cardPage->find('.breadcrumbs a')[1]->firstChild()->text;
        $cardData['city'] = $cardPage->find('.breadcrumbs a')[2]->firstChild()->text;

        $cardData['finish'] = Carbon::now();

        dd($cardData);
        return $cardData;
    }

    private function conditionLabelAnalyzer($label){
        switch($label){
            case 'Гаражное хранение':
                $this->conditionLabels['garage_storage'] = true;
                break;
            case 'Индивидуальная комплектация':
                $this->conditionLabels['individual_equipment'] = true;
                break;
            case 'Не бит':
                $this->conditionLabels['not_beat'] = true;
                break;
            case 'Не крашен':
                $this->conditionLabels['not_painted'] = true;
                break;
            case 'Первый владелец':
                $this->conditionLabels['first_owner'] = true;
                break;
            case 'Пригоню под заказ':
                $this->conditionLabels['under_order'] = true;
                break;
            case 'Ручное управление для инвалидов':
                $this->conditionLabels['manual_control'] = true;
                break;
            case 'Сервисная книжка':
                $this->conditionLabels['service_book'] = true;
                break;
            case 'Требует ремонта':
                $this->conditionLabels['needs_repair'] = true;
                break;
        }
    }
    private function safetyLabelAnalyzer($label){
        switch($label) {
            case 'Центральный замок':
                $this->safetyLabels['central_lock'] = true;
                break;
            case 'ABS':
                $this->safetyLabels['abs'] = true;
                break;
            case 'Подушка безопасности (Airbag)':
                $this->safetyLabels['airbag'] = true;
                break;
            case 'Сигнализация':
                $this->safetyLabels['signaling'] = true;
                break;
            case 'Серворуль':
                $this->safetyLabels['servo_wheel'] = true;
                break;
            case 'Иммобилайзер':
                $this->safetyLabels['immobilizer'] = true;
                break;
            case 'Галогенные фары':
                $this->safetyLabels['halogen_headlights'] = true;
                break;
            case 'ESP':
                $this->safetyLabels['esp'] = true;
                break;
            case 'ABD':
                $this->safetyLabels['abd'] = true;
                break;
            case 'Замок на КПП':
                $this->safetyLabels['checkpoint_lock'] = true;
                break;
            case 'Бронированный автомобиль':
                $this->safetyLabels['armored_vehicle'] = true;
                break;
            case 'Пневмоподвеска':
                $this->safetyLabels['air_suspension'] = true;
                break;
        }
    }
    private function comfortLabelAnalyzer($label){
        switch($label) {
            case 'Усилитель руля':
                $this->comfortLabels['power_steering'] = true;
                break;
            case 'Эл. стеклоподъемники':
                $this->comfortLabels['electric_windows'] = true;
                break;
            case 'Бортовой компьютер':
                $this->comfortLabels['onboard_computer'] = true;
                break;
            case 'Электропакет':
                $this->comfortLabels['electrical_package'] = true;
                break;
            case 'Кондиционер':
                $this->comfortLabels['conditioner'] = true;
                break;
            case 'Подогрев зеркал':
                $this->comfortLabels['heated_mirrors'] = true;
                break;
            case 'Климат контроль':
                $this->comfortLabels['climate_control'] = true;
                break;
            case 'Подогрев сидений':
                $this->comfortLabels['heated_seats'] = true;
                break;
            case 'Мультируль':
                $this->comfortLabels['multifunction'] = true;
                break;
            case 'Круиз контроль':
                $this->comfortLabels['cruise_control'] = true;
                break;
            case 'Парктроник':
                $this->comfortLabels['parktronic'] = true;
                break;
            case 'Датчик света':
                $this->comfortLabels['light_sensor'] = true;
                break;
            case 'Кожаный салон':
                $this->comfortLabels['leather_interior'] = true;
                break;
            case 'Сенсор дождя':
                $this->comfortLabels['rain_sensor'] = true;
                break;
            case 'Люк':
                $this->comfortLabels['luke'] = true;
                break;
            case 'Омыватель фар':
                $this->comfortLabels['headlight_washer'] = true;
                break;
            case 'Запуск кнопкой':
                $this->comfortLabels['stop_start'] = true;
                break;
            case 'Память сидений':
                $this->comfortLabels['seat_memory'] = true;
                break;
            case 'Подогрев руля':
                $this->comfortLabels['heated_wheel'] = true;
                break;
        }
    }
    private function multimediaLabelAnalyzer($label){
        switch($label) {
            case 'MP3':
                $this->multimediaLabels['mp3'] = true;
                break;
            case 'CD':
                $this->multimediaLabels['cd'] = true;
                break;
            case 'DVD':
                $this->multimediaLabels['dvd'] = true;
                break;
            case 'Система навигации GPS':
                $this->multimediaLabels['nav_gps'] = true;
                break;
            case 'Сабвуфер':
                $this->multimediaLabels['subwoofer'] = true;
                break;
            case 'Магнитола':
                $this->multimediaLabels['radio_cassette'] = true;
                break;
            case 'Акустика':
                $this->multimediaLabels['acoustics'] = true;
                break;
        }
    }
    private function otherLabelAnalyzer($label){
        switch($label) {
            case 'Тонирование стекол':
                $this->otherLabels['thorizing_glasses'] = true;
                break;
            case 'Фаркоп':
                $this->otherLabels['towbar'] = true;
                break;
            case 'Газовая установка (ГБО)':
                $this->otherLabels['gas_installation'] = true;
                break;
            case 'Тюнинг':
                $this->otherLabels['tuning'] = true;
                break;
            case 'Дерево':
                $this->otherLabels['tree'] = true;
                break;
            case 'Длинная база':
                $this->otherLabels['long_base'] = true;
                break;
            case 'Кузов MAXI':
                $this->otherLabels['body_max'] = true;
                break;
        }
    }

}

//https://auto.ria.com/auto_bmw_740_24574755.html
//https://auto.ria.com/auto_volkswagen_passat_b8_27212631.html
//https://auto.ria.com/auto_audi_a4_26883239.html
//https://auto.ria.com/auto_skoda_fabia_27436011.html
