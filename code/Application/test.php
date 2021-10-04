<?php
$jsonurl = "https://quotes.rest/qod";
$json = file_get_contents($jsonurl);
$cite = $json["quote"];
var_dump(json_decode($cite));
echo $cite;

