<?php

require("request.php");

$repterek = json_decode(file_get_contents("data.json"), true);

class Datas
{
    private $osszesRepter = [];

    public function GetAirports($data)
    {
        for($i = 0; $i < count($data); ++$i)
        {
            //round(abs(strtotime($data["time"]) - strtotime(date('H:i'))) / 60) < 480
            //$time = round(abs(strtotime(date(substr(substr($data[$i]["departure"]["scheduled"], 11, 8), 0,5))) - strtotime(date('H:i'))) / 60);
            //if($data[$i]["airline"]["name"] != null){
            //    $osszesRepter[$i] = $data[$i]["departure"]["airport"];
            //}

            $time = date(substr(substr($data[$i]["departure"]["scheduled"], 11, 8), 0,5));
            if(round(abs(strtotime($time) - strtotime(date('H:i'))) / 60) < 480)
                {
                    $osszesRepter[$i] = $data[$i]["departure"]["airport"];
                }
        }
        
        return array_unique($osszesRepter);
    }

    public function GetDatas($datas)
    {   
        for($i = 0; $i < count($datas); ++$i)
        {
                $data["time"] = date(substr(substr($datas[$i]["departure"]["scheduled"], 11, 8), 0,5));
                if(round(abs(strtotime($data["time"]) - strtotime(date('H:i'))) / 60) < 480)
                {
                    //$osszesRepter[$i] = $datas[$i]["departure"]["airport"];

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
                }

                $datas[$i] = $data;
        }
        return $datas;
    }

    
}

$dataArray = new Datas();

$x = new Datas();

//$kivalasztottRepter = $_POST["repter"] ?? null;
//$kivalasztottRepter == "" ? $kivalasztottRepter = "Shenzhen" : $kivalasztottRepter = $_POST["repter"];

$kivalasztottRepter = json_decode(file_get_contents("settings.json"), true)["airport"];

if($kivalasztottRepter == "")
{
    $kivalasztottRepter = "Shenzhen";
}

$style = json_decode(file_get_contents("settings.json"), true);