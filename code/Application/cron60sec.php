<?php

$start = microtime(true);
set_time_limit(60);
for ($i = 0; $i < 59; ++$i) {
    include("matching_algo.php");
    time_sleep_until($start + $i + 1);
}
