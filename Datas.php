<?php

require("request.php");

$repterek = json_decode(file_get_contents("data.json"), true);

class Datas
{
    
    public function GetDatas($datas, $direction)
    {   
        if($direction == true){
            $dir = "departure";
        }
        elseif($direction == false){
            $dir = "arrival";
        }
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

        for($i = 0; $i < count($datas); ++$i)
        {
            //var_dump($datas[$i]);
            //echo "<br><br>";
            //if($datas[$i]["$dir"]["airport"] = "Shenzhen"){
                $helper = substr($datas[$i]["departure"]["scheduled"], 11, 8);
                $data["time"] = $helper;
                $data["airport"] = $datas[$i]["departure"]["airport"];
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
            //}
            //else{
                $data = null;
            //}
        }
        return $datas;
    }
}

$dataArray = new Datas();