<?php 
$ac = filter_var($_GET2['ac'],FILTER_VALIDATE_INT);

$data_str = $config_image_proportion[$ac];

$arr_p = explode(" || ",$data_str);
