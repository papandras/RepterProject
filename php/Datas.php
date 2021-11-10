<?php

require("request.php");

$repterek = json_decode(file_get_contents("data.json"), true);

class Datas
{

    public function GetAirports($data)
    {
        $osszesRepter = [];
        for($i = 0; $i < count($data); ++$i)
        {
            //round(abs(strtotime($data["time"]) - strtotime(date('H:i'))) / 60) < 480
            //$time = round(abs(strtotime(date(substr(substr($data[$i]["departure"]["scheduled"], 11, 8), 0,5))) - strtotime(date('H:i'))) / 60);
            //if($data[$i]["airline"]["name"] != null){
            //    $osszesRepter[$i] = $data[$i]["departure"]["airport"];
            //}

            $time = date(substr(substr($data[$i]["departure"]["scheduled"], 11, 8), 0,5));
            if(round(abs(strtotime($time) - strtotime(date('H:i'))) / 60) < 480 && strtotime($time) > strtotime(date('H:i')))
            {
                $osszesRepter[$i] = $data[$i]["departure"]["airport"];
            }
        }
        
        return array_unique($osszesRepter);
    }

    public function GetAirlines($data)
    {
        $airlines = [];
        for($i = 0; $i < count($data); ++$i)
        {
            $airlines[$i] = $data[$i]["airline"]["name"];
        }
        
        return array_unique($airlines);
    }

    public function GetDatas($datas)
    {   
        for($i = 0; $i < count($datas); ++$i)
        {
            //$data["time"] = $datas[$i]["departure"]["scheduled"];
                $data["time"] = date(substr(substr($datas[$i]["departure"]["scheduled"], 11, 8), 0,5));
                if(round(abs(strtotime($data["time"]) - strtotime(date('H:i'))) / 60) < 480 && strtotime(date('H:i')) < strtotime($data["time"]))
                {
                    //$data["seged"] = date('H:i') ." < ". $data["time"];

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
                            $data["status"] = "Törölve";
                            break;
                        case "incident":
                            $data["status"] = "Incidens";
                            break;
                        case "data":
                            $data["status"] = "Elterelt";
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

$table = "light";
if($style["style"]=="light.css"){
    $table = "dark";
}