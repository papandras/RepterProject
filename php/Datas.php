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
            $time = date(substr(substr($data[$i]["departure"]["scheduled"], 11, 8), 0,5));
            if(round(abs(strtotime($time) - strtotime(date('H:i'))) / 60) < 480 && $time >= date('H:i'))
            {
                $osszesRepter[$i] = $data[$i]["departure"]["airport"];
            }
        }
        for($i = 0; $i < count($data); ++$i)
        {
            $time = date(substr(substr($data[$i]["arrival"]["scheduled"], 11, 8), 0,5));
            if(round(abs(strtotime($time) - strtotime(date('H:i'))) / 60) < 480 && $time >= date('H:i'))
            {
                $osszesRepter[$i+count($data)+1] = $data[$i]["arrival"]["airport"];
            }
        }

        if($osszesRepter==null){
            $osszesRepter = ["Jelenleg egyik reptérről sem indul/érkezik járat 8 órán belül!"];
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

    public function GetDatas($data)
    {   
        $airData = [];
        for($i = 0; $i < count($data); ++$i)
        {
            $dataSeged = [];
            //$data["time"] = $datas[$i]["departure"]["scheduled"];
                $dataSeged["time"] = date(substr(substr($data[$i]["departure"]["scheduled"], 11, 8), 0,5));
                if(round(abs(strtotime($dataSeged["time"]) - strtotime(date('H:i'))) / 60) < 480 && $dataSeged["time"] >= date('H:i'))
                {
                    //$data["seged"] = date('H:i') ." < ". $data["time"];
                    $dataSeged["start"] = $data[$i]["departure"]["airport"];
                    $dataSeged["destination"] = $data[$i]["arrival"]["airport"];
                    $dataSeged["company"] = $data[$i]["airline"]["name"];
                    $dataSeged["number"] = $data[$i]["flight"]["iata"];
                    $dataSeged["terminal"] = $data[$i]["departure"]["terminal"];
                    switch($data[$i]["flight_status"]){
                        case "scheduled":
                            $dataSeged["status"] = "Ütemezett";
                            break;
                        case "active":
                            $dataSeged["status"] = "Aktív";
                            break;
                        case "landed":
                            $dataSeged["status"] = "Leszállt";
                            break;
                        case "scheduled":
                            $dataSeged["status"] = "Törölve";
                            break;
                        case "incident":
                            $dataSeged["status"] = "Incidens";
                            break;
                        case "data":
                            $dataSeged["status"] = "Elterelt";
                            break;
                        default: $dataSeged["status"] = NULL;
                    }
                    $airData[$i] = $dataSeged;
                }

                
        }
        return array_merge($airData);
    }
}

$dataArray = new Datas();

//$kivalasztottRepter = $_POST["repter"] ?? null;
//$kivalasztottRepter == "" ? $kivalasztottRepter = "Shenzhen" : $kivalasztottRepter = $_POST["repter"];

$kivalasztottRepter = json_decode(file_get_contents("settings.json"), true)["airport"];

if($kivalasztottRepter == "")
{
    $kivalasztottRepter = $dataArray->GetDatas($repterek)[0]["start"];
}

$style = json_decode(file_get_contents("settings.json"), true);

$table = "light";
if($style["style"]=="light.css"){
    $table = "dark";
}