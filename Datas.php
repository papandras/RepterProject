<?php

require("request.php");

class Datas
{

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
                "airport" => "",
                "destination" => "",
                "company" => "",
                "number" => "",
                "terminal" => "",
                "status" => "",
            ],
        */

        for($i = 0; $i < count($repterek); ++$i)
        {
            if($repterek[$i]["departure"]["airport"] == "Shenzhen"){
                $helper = substr($repterek[$i]["departure"]["scheduled"], 11, 8);
                $requiredData["time"] = $helper;
                $requiredData["airport"] = $repterek[$i]["departure"]["airport"];
                $requiredData["destination"] = $repterek[$i]["arrival"]["airport"];
                $requiredData["company"] = $repterek[$i]["airline"]["name"];
                $requiredData["number"] = $repterek[$i]["flight"]["iata"];
                $requiredData["terminal"] = $repterek[$i]["departure"]["terminal"];
                switch($repterek[$i]["flight_status"]){
                    case "scheduled":
                        $requiredData["status"] = "Ütemezett";
                        break;
                    case "active":
                        $requiredData["status"] = "Aktív";
                        break;
                    case "landed":
                        $requiredData["status"] = "Leszállt";
                        break;
                    case "scheduled":
                        $requiredData["cancelled"] = "Törölve";
                        break;
                    case "incident":
                        $requiredData["cancelled"] = "Incidens";
                        break;
                    case "scheduled":
                        $requiredData["diverted"] = "Elterelt";
                        break;
                    default: $requiredData["status"] = NULL;
                }
                
        
                $requiredDatas[$i] = $requiredData;
            }
        }

        return $requiredDatas;
    }
}