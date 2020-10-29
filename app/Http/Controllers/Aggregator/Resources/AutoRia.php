<?php

namespace App\Http\Controllers\Aggregator\Resources;
use App\Http\Controllers\Aggregator\Kernel\Core;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\TransportType;
use App\ParserUrlList;

class AutoRia extends Core
{

    //delete confiscate
    //change обмен 2 на 1 общий обмен
    public $cardData;
    protected $resource_name = 'AutoRia';
    protected $resource_domain = 'https://auto.ria.com/'; //изображение возвращается без домена

    public function runCollectLinks(){
        foreach (TransportType::all() as $tt){
            $page = 0;
            $resource_type_id = $tt->id == 3 ? 4 : ($tt->id == 4 ? 3 : $tt->id);
            while ($this->collectLinks($page, $resource_type_id, $tt)) $page++;
        }
    }
    protected function collectLinks($page, $resource_type_id, $transport_type){
        $url = $this->resource_domain . 'search/?indexName=auto&categories.main.id=' . $resource_type_id . '&price.currency=1&sort[0].order=dates.created.desc&top=1&abroad.not=-1&custom.not=-1&page=' . $page . '&size=100';
        $content = $this->getPage('https://auto.ria.com/search?indexName=auto&categories.main.id=6&price.currency=1&sort[0].order=dates.created.desc&top=1&abroad.not=-1&custom.not=-1&page=0&size=10');
        if(!$content) return false;

        $dom = $this->readPage($content);
        $transportCards = $dom->find('section.ticket-item');
        if($transportCards->count() == 0)  return false;
        foreach ($transportCards as $transportCard) {
            $href = $transportCard->find('.address')->getAttribute('href');
            if((new ParserUrlList)->isUnique($href)){
                echo $href . '<br/>';
                (new ParserUrlList)->create([
                    'autoCondition' => 3,
                    'transport_type' => $transport_type->id,
                    'url' => $href
                ]);
            }
            else{
                continue;
            }
        }
        return true;
    }

    public function runCollectCards(){
        $cardURLs = ParserUrlList::where('status', 1)->get();
        if($cardURLs->count() != 0){
            foreach ($cardURLs as $key=> $cardURL){
                if($key !== 3) continue;
                $this->cardData = [];
                $this->cardData['state'] = [];
                $this->cardData['security'] = [];
                $this->cardData['comfort'] = [];
                $this->cardData['multimedia'] = [];
                $this->cardData['other'] = [];
                $this->CollectCard($cardURL);
            }
        }
    }

    protected function CollectCard($cardURL){
        $content = $this->getPage($cardURL->url);
        if(!$content) echo 'Error';

        $dom = $this->readPage($content, false);
        $this->cardData['mainProps'] = $this->collectMainProps($dom, $cardURL);
        if($this->cardData['mainProps'] == false) echo 'Error';
        $this->collectPhotos($dom, $cardURL);
        $this->collectLabels($dom, $cardURL);
        $this->collectTechs($dom, $cardURL);

        dd($this->cardData);
    }

    private function collectMainProps($dom, $cardURL){
        $scriptData = $dom->find('script[data-base-url]');
        if(count($scriptData) === 0) return false;
        $brandModelArrID = $this->getBrandModelArrID($scriptData->getAttribute('data-mark-name'), $scriptData->getAttribute('data-model-name'), $cardURL);
        // создать условия
        $locationData = $dom->find('.breadcrumbs a');
        if(count($locationData) === 0) return false;
        $regionArrID = $this->getRegionsArrID($locationData[1]->firstChild()->text, $locationData[2]->firstChild()->text);
        // создать условия

        $transportAddArr = [
            'mod' => $scriptData->getAttribute('data-modification') !== '' ? $scriptData->getAttribute('data-modification') : null,
            'year' => $scriptData->getAttribute('data-year') !== '' ? $scriptData->getAttribute('data-year') : null,
            'chat_link' => $scriptData->getAttribute('data-chat-link') !== '' ? $scriptData->getAttribute('data-chat-link') : null,
            'priceVal' => $scriptData->getAttribute('data-seller-price') !== '' ? $scriptData->getAttribute('data-seller-price') : null,
            'priceCur' => $scriptData->getAttribute('data-currency') !== '' ? $scriptData->getAttribute('data-currency') : null,
            'resource_create_date' => $scriptData->getAttribute('data-add-date') !== '' ? $scriptData->getAttribute('data-add-date') : null,
            'resource_update_date' => $scriptData->getAttribute('data-update-date') !== '' ? $scriptData->getAttribute('data-update-date') : null,
        ];

        $description = null;
        $decriptionData = $dom->find('#full-description');
        if(count($decriptionData) !== 0){
            $description = $decriptionData->text;
        }

        return [
            'description' => $description,
            'brandModel' => $brandModelArrID,
            'regions' => $regionArrID,
            'additional' => $transportAddArr
        ];
    }

    private function collectPhotos($dom, $cardURL){
        $photoData = $dom->find('.carousel-inner .photo-620x465 picture img');

        if(count($photoData) === 1 && strpos($photoData->getAttribute('src'), 'nophoto') !== false){
            return $this->performImages(false, $cardURL->id);
        };

        $photoArr = [];
        foreach($photoData as $key=>$photo_item){
            array_push($photoArr, $photo_item->getAttribute('src'));
        }

        return $this->performImages($photoArr, $cardURL->id);

    }

    private function collectLabels($dom, $cardURL){
        $specialLabelData = $dom->find('.label-param');
        $manufactureID = null;

        if(count($specialLabelData) !== 0) {
            foreach ($specialLabelData->getChildren() as $specialLabel) {
                $label = $specialLabel->text;
                if ($label == ' ') continue;
                if (strpos($label, 'Пригнаний з ') !== false) {
                    $this->cardData['manufacureID'] = $this->getManufacureID(explode('Пригнаний з ', $label)[1]);
                } elseif (strpos($label, 'Авто не в Україні') !== false) {
                    $this->cardData['special']['abroad'] = true;
                } elseif (strpos($label, 'Взято в кредит') !== false) {
                    $this->cardData['special']['credit'] = true;
                } elseif (strpos($label, 'Після ДТП') !== false) {
                    $this->cardData['special']['accident'] = true;
                } elseif (strpos($label, 'Не на ходу') !== false) {
                    $this->cardData['special']['noMotion'] = true;
                } elseif (strpos($label, 'Обмін') !== false) {
                    $this->cardData['special']['exchange'] = true;
                } elseif (strpos($label, 'Торг') !== false) {
                    $this->cardData['special']['bargain'] = true;
                } else{
                    array_push($this->cardData['state'], $this->getStateID($label));
                }
            }
        }

        $customsCleared = $dom->find('.not-cleared');

        if(count($customsCleared) !== 0 && $customsCleared->firstChild()->text == "Авто не розмитнено"){
            $this->cardData['special']['customsСleared'] = true;
        }
        else{
            $this->cardData['special']['customsСleared'] = false;
        }

        return true;
    }

    private function collectTechs($dom, $cardURL){
        $techData = $dom->find('#description_v3 dd');
        $tech_current_flow = '';
        $stage = 0;
        foreach($techData as $key => $tech_item){
            $itemChildren = $tech_item->getChildren();
            if(count($itemChildren) === 0) continue;
            if($key == 0){
                foreach($itemChildren as $sub_tech_item){
                    $sub_class = $sub_tech_item->getAttribute('class');
                    if($sub_class !== null) continue;

                    $sub_text = $sub_tech_item->text;
                    if(strpos($sub_text, 'двер') !== false){
                        $this->cardData['body']['doors'] = trim(explode(' двер', $sub_text)[0]);
                    }
                    elseif(strpos($sub_text, 'місц') !== false){
                        $this->cardData['body']['seats'] = trim(explode(' місц', $sub_text)[0]);
                    }
                    else{
                        $this->cardData['body']['body'] = $this->getBodyID(trim($sub_text), $cardURL);
                    }
                }
            }
            else{
                if($itemChildren[0]->getAttribute('class') == 'label'){
                    $tech_current_flow = $itemChildren[0]->text;
                    $stage = 0;
                }
                elseif(count($itemChildren) > 1 && $itemChildren[1]->getAttribute('class') == 'label'){
                    continue;
                }
                else{
                    if(count($itemChildren) > 1 && $itemChildren[1]->getTag() !== 'span') continue;
                    $stage++;
                }

                switch($tech_current_flow){
                    case 'Пробіг':
                        $this->cardData['body']['mileage'] = trim(explode('тис. км', $itemChildren[2]->text)[0]);
                        break;
                    case 'Двигун':
                        if($stage == 0){
                            $sub_stage = 0;
                            foreach ($itemChildren[2]->getChildren() as $sub_tech_item){
                                if($sub_tech_item->text == '•') continue;
                                if($sub_stage == 0){
                                    $engine_specifications = explode('(', $sub_tech_item->text);
                                    if(count($engine_specifications) > 1){
                                        $engine_volume = trim($engine_specifications[0]);
                                        if($engine_volume !== ''){
                                            $this->cardData['body']['volume'] = trim(explode('л', $engine_volume)[0]);
                                        }
                                        $engine_power = explode('/', explode(')', $engine_specifications[1])[0]);

                                        if($engine_power[0] !== ''){
                                            $this->cardData['body']['horse'] = trim(explode('к.с.', $engine_power[0])[0]);
                                        }

                                        if($engine_power[1] !== ''){
                                            $this->cardData['body']['kilowatt'] = trim(explode('кВт', $engine_power[1])[0]);
                                        }

                                    }else{
                                        $engine_volume = trim($engine_specifications[0]);
                                        if($engine_volume !== ''){
                                            $this->cardData['body']['volume'] = trim(explode('л', $engine_volume)[0]);
                                        }
                                    }
                                    $sub_stage++;
                                }
                                else{
                                    $this->cardData['body']['fuels']['type'] = $this->getFuelID(trim($sub_tech_item->text));
                                }
                            }
                        }
                        else{
                            //without label tag, we strong push first child
                            foreach($itemChildren[0]->getChildren() as $sub_tech_item){
                                $subItemText = $sub_tech_item->text;
                                if($subItemText == null) continue;
                                if(strpos($subItemText, 'місто') !== false){
                                    $this->cardData['body']['fuels']['city'] = trim(explode('місто', $subItemText)[1]);
                                }
                                elseif(strpos($subItemText, 'траса') !== false){
                                    $this->cardData['body']['fuels']['track'] = trim(explode('траса', $subItemText)[1]);
                                }
                                elseif(strpos($subItemText, 'змішаний') !== false){
                                    $this->cardData['body']['fuels']['mixed'] = trim(explode('змішаний', $subItemText)[1]);
                                }
                            }
                        }
                        break;
                    case 'Коробка передач':
                        $this->cardData['body']['transmission'] = $this->getTransmissionID(trim($itemChildren[2]->text), $cardURL);
                        break;
                    case 'Привід':
                        $this->cardData['body']['gear'] = $this->getGearID(trim($itemChildren[2]->text), $cardURL);
                        break;
                    case 'Колір':
                        if(strpos($itemChildren[1]->text, 'металік') !== false){
                            $this->cardData['body']['color']['metallic'] = true;
                            $this->cardData['body']['color']['color'] = $this->getColorID(trim(explode('металік', $itemChildren[1]->text)[0]));
                        }else{
                            $this->cardData['body']['color']['metallic'] = false;
                            $this->cardData['body']['color']['color'] = $this->getColorID(trim($itemChildren[1]->text));
                        }
                        break;
                    case 'Стан':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'condition', $cardURL);
                        break;
                    case 'Безпека':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'security', $cardURL);
                        break;
                    case 'Комфорт':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'comfort', $cardURL);
                        break;
                    case 'Мультимедіа':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'multimedia', $cardURL);
                        break;
                    case 'Інше':
                        $this->techLabelAnalizer($itemChildren[2]->getChildren(), 'others', $cardURL);
                        break;
                }
            }
        }
    }

    private function techLabelAnalizer($techs, $type, $cardURL){
        $sub_text = '';
        foreach($techs as $tech_item){
            if($tech_item->text === ' ') continue;
            if(strpos($tech_item->text, '&nbsp;') !== false){
                $sub_text = trim(explode('&nbsp;', $tech_item->text)[0]) . ' ';
            }
            else{
                $sub_text .= trim(explode('&nbsp;', $tech_item->text)[0]);
                switch ($type){
                    case 'condition':
                        array_push($this->cardData['state'], $this->getStateID($sub_text));
                        break;
                    case 'security':
                        array_push($this->cardData['security'], $this->getTechID($sub_text, 'security', $cardURL));
                        break;
                    case 'comfort':
                        array_push($this->cardData['comfort'], $this->getTechID($sub_text, 'comfort', $cardURL));
                        break;
                    case 'multimedia':
                        array_push($this->cardData['multimedia'], $this->getTechID($sub_text, 'multimedia', $cardURL));
                        break;
                    case 'others':
                        echo $sub_text . '<br/>';
                        array_push($this->cardData['other'], $this->getTechID($sub_text, 'others', $cardURL));
                        break;
                }
                $sub_text = '';
            }
        }
        return true;
    }
}

















//public function testMerge(){
//    $r = Drug::whereHas('image', function ($q){
//        $q->where('title', '!=', 'basic');
//    })->get();
//
//
//    foreach ($r as $i){
//        dd($i);
//    }
//}
