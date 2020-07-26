<?php

namespace App\Http\Controllers\AGGREGATOR\LogSystem;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

abstract class Log
{
    protected $disk;

    public function __construct(){
        $this->disk = Storage::disk('parser');
        $this->loadDirectories();
    }



    private function loadDirectories(){
        if(!$this->disk->exists('data'))
            $this->disk->makeDirectory('data');
        if(!$this->disk->exists('data/success'))
            $this->disk->makeDirectory('data/success');
        if(!$this->disk->exists('data/error'))
            $this->disk->makeDirectory('data/error');

        if(!$this->disk->exists('img'))
            $this->disk->makeDirectory('img');
        if(!$this->disk->exists('img/success'))
            $this->disk->makeDirectory('img/success');
        if(!$this->disk->exists('img/error'))
            $this->disk->makeDirectory('img/error');

    }


    protected function cteatingName4File($carbon){
        return 'Log_' . $carbon->year . '_' . $carbon->month . '_' . $carbon->day . '.txt';
    }

    protected function creatingInputHeaderDesign(){
        $inputRows = [];
        $inputRows[0] = '••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••';
        $inputRows[1] = '• Date: [' . Carbon::now()->format('Y-M-d H:i:s') . ']';
        return $inputRows;
    }

    protected function creatingInputMainDesign($logType, $logStatus, $data){
        $inputRows = [];

        if($logType == 'data'){
            if($logStatus == 'success'){
                $inputRows[2] = '• Parsing Type: [' . $data['parsingType'] . ']';
                $inputRows[3] = '• Parsing Resource: [' . $data['parsingResource'] . ']';
                $inputRows[4] = '• Parsing Title: [' . $data['parsingTitle'] . ']';
                $inputRows[5] = '• Parsing URL: [' . $data['parsingURL'] . ']';
            }
        }
//        $inputRows[6] = '• Porxy: [127.0.0.1]';
//        $inputRows[7] = '• User-agent: [Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36]';
//        $inputRows[8] = '';
//        $inputRows[9] = '• Time to complete tasks:';
        return $inputRows;
    }

    protected function creatingInputFooterDesign(){
        $inputRows = [];
        $inputRows[0] = '----------------------------------------------------------------------------------------------------';
        $inputRows[1] = '';
        return $inputRows;
    }
}
