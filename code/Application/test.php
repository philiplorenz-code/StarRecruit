<?php
$jsonurl = "https://quotes.rest/qod";
$json = file_get_contents($jsonurl);
$cite = json_decode($json);
echo $cite;
$quote = $json["quote"];
echo $quote;

