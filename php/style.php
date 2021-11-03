<?php

/**
 * setting.json-ben tárolja el az éppen használatban lévő stíluslapot
 * hogy az oldal újratöltése után is megmaradjon.
 */

$style = json_decode(file_get_contents("../settings.json"), true);
$style["style"] = $_POST["bgc"] ?? null;
file_put_contents("../settings.json", json_encode($style));

if($style["style"] != null)
{
    header("Location: ../index.php");
}

?>