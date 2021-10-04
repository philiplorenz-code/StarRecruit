<?php
$jsonurl = "https://quotes.rest/qod";
$json = file_get_contents($jsonurl);
$cite = json_decode($cite);
$cite = $json["quote"];
echo $cite;

