<?php

require("request.php");

$repterek = json_decode(CallAPI("GET", "http://api.aviationstack.com/v1/flights?access_key=bb59eaea66db3d80c7acb6fae93d1878", ["param" => "value"]), true)["data"];
$json = json_encode($repterek);
$bytes = file_put_contents("../data.json", $json);