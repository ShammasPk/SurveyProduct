<?php
$string = "Match this string";

var_dump(filter_var($string, FILTER_VALIDATE_REGEXP,
array("options"=>array("regexp"=>"/^M(.*)/"))))
?>