<?php
define('IOURL',dirname(dirname(__FILE__)));
define('ShearURL',IOURL . DIRECTORY_SEPARATOR);

require(dirname(__FILE__).'/image_path.php');

$p   = $arr_p[0]/$arr_p[1];
$arr =	array(
			array($arr_p[2],true,$arr_p[4]."_"),
			array($arr_p[3],true,"small_".$arr_p[4]."_")
		);

$ShearPhoto["config"] = array(
	"proportional" => $p ,
	"quality" => 100,
	"force_jpg" => false,
	"width" => $arr,
	"water_scope" => 210,
	"temp" => ShearURL . "file" . DIRECTORY_SEPARATOR . "temp",
	"tempSaveTime" => 1,
	"saveURL" => ShearURL . "../../../uploadFiles" . DIRECTORY_SEPARATOR,
	"filename" => time() . mt_rand(100,999));