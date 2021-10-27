<?php
$string = "pedrito sola 20202 1223444";
$int = intval(preg_replace("/[^0-9]+/", "", $string), 10);
echo $int;