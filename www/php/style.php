<?php

/**
 * setting.json-ben tárolja el az éppen használatban lévő stíluslapot
 * hogy az oldal újratöltése után is megmaradjon.
 */

$settings = json_decode(file_get_contents("../settings.json"), true);
$settings["style"] = $_POST["bgc"] ?? null;
file_put_contents("../settings.json", json_encode($settings));

if ($settings["style"] != null) {
    header("Location: ../index.php");
}
