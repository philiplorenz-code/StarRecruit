<?php
$jsonurl = "https://quotes.rest/qod.json";
echo $jsonurl;
$json = file_get_contents($jsonurl);
echo $json;
$cite = json_decode($json);
echo $cite;
$quote = $json["quote"];
echo $quote;

