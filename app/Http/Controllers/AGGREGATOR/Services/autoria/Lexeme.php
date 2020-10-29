<?php

namespace App\Http\Controllers\AGGREGATOR\Services\autoria;

use Carbon\Carbon;
use PHPHtmlParser\Dom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


abstract class Lexeme
{
    public $DOM;
    public $DOM_TREE;

    protected $mainCardCollection = [];
    protected $photoCardCollection = [];
    protected $labelCardCollection = [];
    protected $techCardCollection = [];


    public function __construct(){
        $this->DOM = new Dom();
    }

    public function readContent($content, $r_scr = true){
        $this->DOM->setOptions(['removeScripts' => $r_scr]);
        $this->DOM_TREE = $this->DOM->loadStr($content);
    }

    public function collectPrimaryInfo(){
        try {
            $this->mainCardCollection();
        }
        catch (\Exception $e){
           throw new \Exception($e);
        }


        //run if mainCard hasn`t errors
        $this->photoCardCollection();
        $this->specialLabelCardCollection();
        $this->techCardCollection();


    }

    private function mainCardCollection(){
//        $scriptData = $this->DOM_TREE->find('script[data-base-url]');
//        if(count($scriptData) === 0) throw new \Exception('Отсоединение парсера карты автомобиля');
//
//        $locationData = $this->DOM_TREE->find('.breadcrumbs a');
//        if(count($locationData) === 0) throw new \Exception('Отсоединение парсера карты автомобиля');
//
//        $this->mainCardCollection =  [
//            'brand' => $scriptData->getAttribute('data-mark-name'),
//            'model' => $scriptData->getAttribute('data-model-name'),
//            'modification' => $scriptData->getAttribute('data-modification'),
//            'year' => $scriptData->getAttribute('data-year'),
//            'chat_link' => $scriptData->getAttribute('data-chat-link'),
//            'price_value' => $scriptData->getAttribute('data-seller-price'),
//            'price_type' => $scriptData->getAttribute('data-currency'),
//            'service_add_date' => $scriptData->getAttribute('data-add-date'),
//            'service_update_date' => $scriptData->getAttribute('data-update-date'),
//            'region' => $locationData[1]->firstChild()->text,
//            'city' => $locationData[2]->firstChild()->text,
//        ];

        $decriptionData = $this->DOM_TREE->find('#full-description');
        if(count($decriptionData) !== 0){
            $this->mainCardCollection['description'] = $decriptionData->text;
        }
    }

    private function photoCardCollection(){
//        $photoData = $this->DOM_TREE->find('.carousel-inner .photo-620x465 picture img');
//
//        if(count($photoData) === 1 && strpos($photoData->getAttribute('src'), 'nophoto') !== false) return false;
//
//        foreach($photoData as $key=>$photo_item){
//            array_push($this->photoCardCollection, $photo_item->getAttribute('src'));
//        }
    }

    private function specialLabelCardCollection(){
        $specialLabelData = $this->DOM_TREE->find('.label-param');
//
//        if(count($specialLabelData) !== 0) {
//            foreach ($specialLabelData->getChildren() as $specialLabel) {
//                $label = $specialLabel->text;
//                if ($label == ' ') continue;
//                if (strpos($label, 'Пригнан из ') !== false) {
//                    $this->labelCardCollection['special']['driven_from'] = explode('Пригнан из ', $label)[1];
//                } elseif (strpos($label, 'Первая регистрация') !== false) {
//                    $this->labelCardCollection['special']['first_registration'] = true;
//                } elseif (strpos($label, 'Обмен') !== false) {
//                    $this->labelCardCollection['special']['exchange'] = true;
//                } elseif (strpos($label, 'Торг') !== false) {
//
//                    $this->labelCardCollection['special']['bargain'] = true;
//                } elseif (strpos($label, 'Авто не в Украине') !== false) {
//                    $this->labelCardCollection['special']['not_in_ukraine'] = true;
//                } elseif (strpos($label, 'После ДТП') !== false) {
//                    $this->labelCardCollection['special']['after_crash'] = true;
//                } elseif (strpos($label, 'Не на ходу') !== false) {
//                    $this->labelCardCollection['special']['for_parts'] = true;
//                } elseif (strpos($label, 'Взято в кредит') !== false) {
//                    $this->labelCardCollection['special']['car_credit'] = true;
//                }
//            }
//        }

//        $customsCleared = $this->DOM_TREE->find('.not-cleared');
//
//        if(count($customsCleared) !== 0 && $customsCleared->firstChild()->text == "Авто не растаможено"){
//            $this->labelCardCollection['special']['customs_cleared'] = false;
//        }
//        else{
//            $this->labelCardCollection['special']['customs_cleared'] = true;
//        }


    }

    private function techCardCollection(){
//        $techData = $this->DOM_TREE->find('#description_v3 dd');
//        $tech_current_flow = '';
//        $stage = 0;

//        foreach($techData as $key => $tech_item){
//            $itemChildren = $tech_item->getChildren();
//            if(count($itemChildren) === 0) continue;
//
//            if($key == 0){
//                foreach($itemChildren as $sub_tech_item){
//                    $sub_class = $sub_tech_item->getAttribute('class');
//                    if($sub_class !== null) continue;
//
//                    $sub_text = $sub_tech_item->text;
//                    if(strpos($sub_text, 'двер') !== false){
//                        $this->techCardCollection['body']['doors'] = trim(explode(' двер', $sub_text)[0]);
//                    }
//                    elseif(strpos($sub_text, 'мест') !== false){
//                        $this->techCardCollection['body']['seat_place'] = trim(explode(' мест', $sub_text)[0]);
//                    }
//                    else{
//                        $this->techCardCollection['body']['body'] = trim($sub_text);
//                    }
//                }
//            }
//            else{
//                if($itemChildren[0]->getAttribute('class') == 'label'){
//                    $tech_current_flow = $itemChildren[0]->text;
//                    $stage = 0;
//                }
//                elseif(count($itemChildren) > 1 && $itemChildren[1]->getAttribute('class') == 'label'){
//                    continue;
//                }
//                else{
//                    if(count($itemChildren) > 1 && $itemChildren[1]->getTag() !== 'span') continue;
//                    $stage++;
//                }
//
//                switch($tech_current_flow){
//                    case 'Пробег':
//                        $this->techCardCollection['body']['mileage'] = trim(explode('тыс. км', $itemChildren[2]->text)[0]);
//                        break;
//                    case 'Двигатель':
//                        if($stage == 0){
//                            $sub_stage = 0;
//                            foreach ($itemChildren[2]->getChildren() as $sub_tech_item){
//                                if($sub_tech_item->text == '•') continue;
//                                if($sub_stage == 0){
//                                    $engine_specifications = explode('(', $sub_tech_item->text);
//                                    if(count($engine_specifications) > 1){
//                                        $engine_volume = trim($engine_specifications[0]);
//                                        if($engine_volume !== ''){
//                                            $this->techCardCollection['engine']['specification']['volume'] = trim(explode('л', $engine_volume)[0]);
//                                        }
//                                        $engine_power = explode('/', explode(')', $engine_specifications[1])[0]);
//
//                                        if($engine_power[0] !== ''){
//                                            $this->techCardCollection['engine']['specification']['horse'] = trim(explode('л.с.', $engine_power[0])[0]);
//                                        }
//
//                                        if($engine_power[1] !== ''){
//                                            $this->techCardCollection['engine']['specification']['kilowatt'] = trim(explode('кВт', $engine_power[1])[0]);
//                                        }
//
//                                    }else{
//                                        $engine_volume = trim($engine_specifications[0]);
//                                        if($engine_volume !== ''){
//                                            $this->techCardCollection['engine']['specification']['volume'] = trim(explode('л', $engine_volume)[0]);
//                                        }
//                                    }
//                                    $sub_stage++;
//                                }
//                                else{
//                                    $this->techCardCollection['engine']['specification']['type'] = $sub_tech_item->text;
//                                }
//                            }
//                        }
//                        else{
//                            //without label tag, we strong push first child
//                            foreach($itemChildren[0]->getChildren() as $sub_tech_item){
//                                $subItemText = $sub_tech_item->text;
//                                if($subItemText == null) continue;
//                                if(strpos($subItemText, 'город') !== false){
//                                    $this->techCardCollection['engine']['consumption']['city'] = trim(explode('город', $subItemText)[1]);
//                                }
//                                elseif(strpos($subItemText, 'трасса') !== false){
//                                    $this->techCardCollection['engine']['consumption']['track'] = trim(explode('трасса', $subItemText)[1]);
//                                }
//                                elseif(strpos($subItemText, 'смешанный') !== false){
//                                    $this->techCardCollection['engine']['consumption']['mixed'] = trim(explode('смешанный', $subItemText)[1]);
//                                }
//                            }
//                        }
//                        break;
//                    case 'Коробка передач':
//                        $this->techCardCollection['body']['transmission'] = trim($itemChildren[2]->text);
//                        break;
//                    case 'Привод':
//                        $this->techCardCollection['body']['gear'] = trim($itemChildren[2]->text);
//                        break;
//                    case 'Цвет':
//                        if(strpos($itemChildren[1]->text, 'металлик') !== false){
//                            $this->techCardCollection['body']['color']['metallic'] = true;
//                            $this->techCardCollection['body']['color']['color'] = trim(explode('металлик', $itemChildren[1]->text)[0]);
//                        }else{
//                            $this->techCardCollection['body']['color']['metallic'] = false;
//                            $this->techCardCollection['body']['color']['color'] = trim($itemChildren[1]->text);
//                        }
//                        break;
                    case 'Состояние':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'condition');
                        break;
                    case 'Безопасность':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'safety');
                        break;
                    case 'Комфорт':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'comfort');
                        break;
                    case 'Мультимедиа':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'multimedia');
                        break;
                    case 'Прочее':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'other');
                        break;
                }

            }
        }
    }

    private function techLabelAnalizer($arr, $type){
        $sub_text = '';
        foreach($arr as $tech_item){
            if($tech_item->text === ' ') continue;
            if(strpos($tech_item->text, '&nbsp;') !== false){
                $sub_text = trim(explode('&nbsp;', $tech_item->text)[0]) . ' ';
            }
            else{
                $sub_text .= trim(explode('&nbsp;', $tech_item->text)[0]);
                switch ($type){
                    case 'condition':
                        $this->conditionLabelAnalyzer($sub_text);
                        break;
                    case 'safety':
                        $this->safetyLabelAnalyzer($sub_text);
                        break;
                    case 'comfort':
                        $this->comfortLabelAnalyzer($sub_text);
                        break;
                    case 'multimedia':
                        $this->multimediaLabelAnalyzer($sub_text);
                        break;
                    case 'other':
                        $this->otherLabelAnalyzer($sub_text);
                        break;
                }
                $sub_text = '';
            }
        }
    }

    protected function conditionLabelAnalyzer($label){
        switch($label){
            case 'Гаражное хранение':
                $this->labelCardCollection['condition']['garage_storage'] = true;
                break;
            case 'Индивидуальная комплектация':
                $this->labelCardCollection['condition']['individual_equipment'] = true;
                break;
            case 'Не бит':
                $this->labelCardCollection['condition']['not_beat'] = true;
                break;
            case 'Не крашен':
                $this->labelCardCollection['condition']['not_painted'] = true;
                break;
            case 'Первый владелец':
                $this->labelCardCollection['condition']['first_owner'] = true;
                break;
            case 'Пригоню под заказ':
                $this->labelCardCollection['condition']['under_order'] = true;
                break;
            case 'Ручное управление для инвалидов':
                $this->labelCardCollection['condition']['manual_control'] = true;
                break;
            case 'Сервисная книжка':
                $this->labelCardCollection['condition']['service_book'] = true;
                break;
            case 'Требует ремонта':
                $this->labelCardCollection['condition']['needs_repair'] = true;
                break;
        }
    }

    protected function safetyLabelAnalyzer($label){
        switch($label) {
            case 'Центральный замок':
                $this->labelCardCollection['safety']['central_lock'] = true;
                break;
            case 'ABS':
                $this->labelCardCollection['safety']['abs'] = true;
                break;
            case 'Подушка безопасности (Airbag)':
                $this->labelCardCollection['safety']['airbag'] = true;
                break;
            case 'Сигнализация':
                $this->labelCardCollection['safety']['signaling'] = true;
                break;
            case 'Серворуль':
                $this->labelCardCollection['safety']['servo_wheel'] = true;
                break;
            case 'Иммобилайзер':
                $this->labelCardCollection['safety']['immobilizer'] = true;
                break;
            case 'Галогенные фары':
                $this->labelCardCollection['safety']['halogen_headlights'] = true;
                break;
            case 'ESP':
                $this->labelCardCollection['safety']['esp'] = true;
                break;
            case 'ABD':
                $this->labelCardCollection['safety']['abd'] = true;
                break;
            case 'Замок на КПП':
                $this->labelCardCollection['safety']['checkpoint_lock'] = true;
                break;
            case 'Бронированный автомобиль':
                $this->labelCardCollection['safety']['armored_vehicle'] = true;
                break;
            case 'Пневмоподвеска':
                $this->labelCardCollection['safety']['air_suspension'] = true;
                break;
        }
    }

    private function comfortLabelAnalyzer($label){
        switch($label) {
            case 'Усилитель руля':
                $this->labelCardCollection['comfort']['power_steering'] = true;
                break;
            case 'Эл. стеклоподъемники':
                $this->labelCardCollection['comfort']['electric_windows'] = true;
                break;
            case 'Бортовой компьютер':
                $this->labelCardCollection['comfort']['onboard_computer'] = true;
                break;
            case 'Электропакет':
                $this->labelCardCollection['comfort']['electrical_package'] = true;
                break;
            case 'Кондиционер':
                $this->labelCardCollection['comfort']['conditioner'] = true;
                break;
            case 'Подогрев зеркал':
                $this->labelCardCollection['comfort']['heated_mirrors'] = true;
                break;
            case 'Климат контроль':
                $this->labelCardCollection['comfort']['climate_control'] = true;
                break;
            case 'Подогрев сидений':
                $this->labelCardCollection['comfort']['heated_seats'] = true;
                break;
            case 'Мультируль':
                $this->labelCardCollection['comfort']['multifunction'] = true;
                break;
            case 'Круиз контроль':
                $this->labelCardCollection['comfort']['cruise_control'] = true;
                break;
            case 'Парктроник':
                $this->labelCardCollection['comfort']['parktronic'] = true;
                break;
            case 'Датчик света':
                $this->labelCardCollection['comfort']['light_sensor'] = true;
                break;
            case 'Кожаный салон':
                $this->labelCardCollection['comfort']['leather_interior'] = true;
                break;
            case 'Сенсор дождя':
                $this->labelCardCollection['comfort']['rain_sensor'] = true;
                break;
            case 'Люк':
                $this->labelCardCollection['comfort']['luke'] = true;
                break;
            case 'Омыватель фар':
                $this->labelCardCollection['comfort']['headlight_washer'] = true;
                break;
            case 'Запуск кнопкой':
                $this->labelCardCollection['comfort']['stop_start'] = true;
                break;
            case 'Память сидений':
                $this->labelCardCollection['comfort']['seat_memory'] = true;
                break;
            case 'Подогрев руля':
                $this->labelCardCollection['comfort']['heated_wheel'] = true;
                break;
        }
    }

    private function multimediaLabelAnalyzer($label){
        switch($label) {
            case 'MP3':
                $this->labelCardCollection['multimedia']['mp3'] = true;
                break;
            case 'CD':
                $this->labelCardCollection['multimedia']['cd'] = true;
                break;
            case 'DVD':
                $this->labelCardCollection['multimedia']['dvd'] = true;
                break;
            case 'Система навигации GPS':
                $this->labelCardCollection['multimedia']['nav_gps'] = true;
                break;
            case 'Сабвуфер':
                $this->labelCardCollection['multimedia']['subwoofer'] = true;
                break;
            case 'Магнитола':
                $this->labelCardCollection['multimedia']['radio_cassette'] = true;
                break;
            case 'Акустика':
                $this->labelCardCollection['multimedia']['acoustics'] = true;
                break;
        }
    }

    private function otherLabelAnalyzer($label){
        switch($label) {
            case 'Тонирование стекол':
                $this->labelCardCollection['other']['thorizing_glasses'] = true;
                break;
            case 'Фаркоп':
                $this->labelCardCollection['other']['towbar'] = true;
                break;
            case 'Газовая установка (ГБО)':
                $this->labelCardCollection['other']['gas_installation'] = true;
                break;
            case 'Тюнинг':
                $this->labelCardCollection['other']['tuning'] = true;
                break;
            case 'Дерево':
                $this->labelCardCollection['other']['tree'] = true;
                break;
            case 'Длинная база':
                $this->labelCardCollection['other']['long_base'] = true;
                break;
            case 'Кузов MAXI':
                $this->labelCardCollection['other']['body_max'] = true;
                break;
        }
    }
}
