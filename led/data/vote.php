<?php
	$arr=array(1254,255,300,200,600,200000);
	$result["code"]="success";
	$result["info"]="获取数据成功";
	$result["list"] = $arr;
	echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>