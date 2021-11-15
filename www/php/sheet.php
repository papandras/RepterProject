<?php

require("Datas.php");

$repterek = json_decode(file_get_contents("data.json"), true);

$datas = new Datas($repterek, date("8"));

$kivalasztottRepter = json_decode(file_get_contents("settings.json"), true)["airport"];

if($kivalasztottRepter == "")
{
    $kivalasztottRepter = array_merge($datas->GetAirports($repterek))[0];
}
if($kivalasztottRepter == "Jelenleg egyik reptérről sem indul/érkezik járat 8 órán belül!")
{
    $kivalasztottRepter = "";
}

$style = json_decode(file_get_contents("settings.json"), true);

$table = "light";
if($style["style"]=="light.css"){
    $table = "dark";
}