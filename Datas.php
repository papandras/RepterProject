<?php

class Datas
{
/**
 * Szükséges adatok:
 * Időpont
 * Célállomás
 * Légitársaság
 * Járatszám
 * Terminál
 * Státusz
 */

    private $time;
    private $destination;
    private $flight;
    private $number;
    private $terminal;
    private $status;

    public function getDatas($data)
    {
        $requiredDatas = [];
        $requiredData = [];

        /*
            [
                "time" => "",
                "destination" => "",
                "flight" => "",
                "number" => "",
                "terminal" => "",
                "status" => "",
            ],
        */

        if(is_array($data) && !is_null($data))
        {
            for($i = 0; $i < count($data); ++$i)
            {
                foreach($data[$i] as $key => $value)
                {
                    //$requiredDatas[$i]["time"] = $repterek[$i]["flight_date"];
                    $requiredDatas["time"] = $data[$i]["flight_date"];
                    if($key == "flight_date"){
                        $requiredDatas[$i]["time"] = $value;
                    }
                    if(is_array($value)){
                        foreach($value as $key2 => $value2){
                            if(is_array($value2)){
                                foreach($value2 as $key3 => $value3)
                                {
                                    
                                }
                            }
                            else
                            {

                            }
                        }
                    }
                    else
                    {

                    }
                }
                $requiredDatas[$i] = $requiredData;
            }
        }

        return $requiredDatas;
    }
}