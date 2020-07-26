<?php

namespace App\Http\Controllers\AGGREGATOR\Kernel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\AGGREGATOR\Kernel\Connection;
use App\Http\Controllers\AGGREGATOR\Kernel\ProxyAlgorithm as Proxy;


class Core extends Controller
{
    protected $lexeme;
    protected $resourceName;

    private $connection;
    private $tidy_config = [
        'clean' => true,
        'output-xhtml' => true,
        'show-body-only' => true,
        'wrap' => 0,
    ];
    public $filterPaginationLength = [];
    public $parseFilterList = [];

    public function __construct(){
        $this->connection = new Connection($this->resourceName);
    }


    public function launchFilterCardParsing($category){
        $parse_props = $this->getLastFilterCardParsing($category['id']); //на основе времени последнего парсинга, идет просчет свойств для подключения.
        $page_ended = false;
        $cardFullAddress = [];
        while (!$page_ended){
            $parse_url = $this->connection->generateParseURL($parse_props['URL']);
            $get_content_response = $this->connection->getPage($parse_url, $parse_props['Connection']);
            $clearContent = $this->refactorContent($get_content_response['content']);
            $cardsPartAddress = $this->lexeme->filterAnalizeCardAddress($clearContent, $parse_props);
            if($cardsPartAddress){
                array_push($cardFullAddress, $cardsPartAddress);
                $parse_props['URL']['currentPage']++;
            }
            else{
                $page_ended = true;
            }
        }

        return $cardFullAddress;
    }

    public function launchPageCardParsing($url){
//        $this->isPageCardParsed($url);
        $parse_props['Connection'] = ['timeout' => 45, 'connect_timeout' => 30];
        $get_content_response = $this->connection->getPage($url, $parse_props['Connection']);
        $clearContent = $this->refactorContent($get_content_response['content']);
        return $this->lexeme->pageAnalizeCardData($clearContent, $url);
    }

    private function refactorContent($content){
        return \tidy_parse_string($content, $this->tidy_config, 'UTF8');
    }

    protected function getLastFilterCardParsing($category_id){
//        $last_parse_history = ParseHistory::where('resourse_id', $resourceName)->where('category_id', $category_id)->orderBy('started_at','desc')->first();
//        $histroy_start_time = $last_parse_history->started_at;
        $histroy_start_time = Carbon::create(2020, 7, 16, 16, 40, 0); //муляж
        $diff_in_times = Carbon::now()->diffInHours($histroy_start_time);

        $props = ['URL' => ['catID' => $category_id, 'currentPage' => 0]];

        if($diff_in_times < 2){
            $props['Connection'] = ['timeout' => 20, 'connect_timeout' => 20];
            $props['URL']['page_size'] = 25;
        }
        elseif($diff_in_times >= 2 && $diff_in_times < 4){
            $props['Connection'] = ['timeout' => 45, 'connect_timeout' => 30];
            $props['URL']['page_size'] = 50;
        }
        else{
            $props['Connection'] = ['timeout' => 60, 'connect_timeout' => 60];
            $props['URL']['page_size'] = 100;
        }
        return $props;
    }

    protected function isPageCardParsed($url){
        if($url){
            return 1;
        }
        else{
            return 0;
        }
    }
}
