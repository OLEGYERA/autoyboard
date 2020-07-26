<?php

namespace App\Http\Controllers\AGGREGATOR\LogSystem;

use App\Http\Controllers\AGGREGATOR\LogSystem\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class LogWriter extends Log
{
    public function __construct(){
        parent::__construct();
    }


    public function writeLog($type, $status, $data){
        $file_name = $this->cteatingName4File(Carbon::today());
        $pathToFile = $type . '/' .$status . '/' . $file_name;

        //creating Header
        foreach ($this->creatingInputHeaderDesign() as $row){
            $this->disk->append($pathToFile, $row);
        }

        //creating Main
        foreach ($this->creatingInputMainDesign($type, $status, $data) as $row){
            $this->disk->append($pathToFile, $row);
        }

        //creating Footer
        foreach ($this->creatingInputFooterDesign() as $row){
            $this->disk->append($pathToFile, $row);
        }


//        if(!$this->disk->exists($pathToFile)){
//            $this->disk->put($pathToFile, 'ppended file content');
//        }
//        dd($this->disk->exists($pathToFile));

    }


}
