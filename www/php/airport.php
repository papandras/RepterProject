<?php

require("sheet.php");

$style = json_decode(file_get_contents("../settings.json"), true);

if (!isset($_POST["repter"])) {
    $style = json_decode(file_get_contents("../settings.json"), true);
} else {
    $style["airport"] = $_POST["repter"] ?? "";
    $kivalasztottRepter == "" ? $kivalasztottRepter = "Shenzhen" : $kivalasztottRepter = $_POST["repter"];
}
$kivalasztottRepter = $style["airport"];

file_put_contents("../settings.json", json_encode($style));

//header("Location: ../index.php"); --> Ez úgy döntött hogy nem működik... Helyette a lenti

echo '<script type="text/javascript">location.replace("../index.php");</script>';
