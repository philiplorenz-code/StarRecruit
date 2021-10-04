<?php
$jsonurl = "https://quotes.rest/qod";
$json = file_get_contents($jsonurl);
var_dump(json_decode($json));

