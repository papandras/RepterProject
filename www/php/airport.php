<?php

require("sheet.php");

$settings = json_decode(file_get_contents("../settings.json"), true);

if (!isset($_POST["repter"])) {
    $settings = json_decode(file_get_contents("../settings.json"), true);
} else {
    $settings["airport"] = $_POST["repter"] ?? "";
    $kivalasztottRepter == "" ? $kivalasztottRepter = "Shenzhen" : $kivalasztottRepter = $_POST["repter"];
}
$kivalasztottRepter = $settings["airport"];

file_put_contents("../settings.json", json_encode($settings));

//header("Location: ../index.php"); --> Ez úgy döntött hogy nem működik... Helyette a lenti

echo '<script type="text/javascript">location.replace("../index.php");</script>';
