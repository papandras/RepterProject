<?php

require("request.php");

$repterek = json_decode(file_get_contents("data.json"), true);

class Datas
{
    public function GetDatas($datas)
    {   
        
        for($i = 0; $i < count($datas); ++$i)
        {
                $helper = substr($datas[$i]["departure"]["scheduled"], 11, 8);
                $data["time"] = $helper;
                $data["time"] = date(substr($data["time"], 0,5));
                $data["start"] = $datas[$i]["departure"]["airport"];
                $data["destination"] = $datas[$i]["arrival"]["airport"];
                $data["company"] = $datas[$i]["airline"]["name"];
                $data["number"] = $datas[$i]["flight"]["iata"];
                $data["terminal"] = $datas[$i]["departure"]["terminal"];
                switch($datas[$i]["flight_status"]){
                    case "scheduled":
                        $data["status"] = "Ütemezett";
                        break;
                    case "active":
                        $data["status"] = "Aktív";
                        break;
                    case "landed":
                        $data["status"] = "Leszállt";
                        break;
                    case "scheduled":
                        $data["cancelled"] = "Törölve";
                        break;
                    case "incident":
                        $data["cancelled"] = "Incidens";
                        break;
                    case "data":
                        $data["diverted"] = "Elterelt";
                        break;
                    default: $data["status"] = NULL;
                }

                $datas[$i] = $data;
        }
        return $datas;
    }
}

$dataArray = new Datas();