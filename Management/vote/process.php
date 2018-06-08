<?php
require(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrcommon.'session_regenerate.php');

require('column_right.php');

require(dirname(__FILE__).'/../common/checkright_json.php');
require(root_xrclass.'vote.class.php');

$id             = filter_var($_POST2['id'],FILTER_VALIDATE_INT);
$begin_time     = $_POST2['begin_time'];
$till_time      = $_POST2['till_time'];
$status         = filter_var($_POST2['formstatus'],FILTER_VALIDATE_INT);
$action         = $_POST2['action'];

$vote = new vote();

if ($action=="add") {
	$result = $vote->add($begin_time,$till_time,$status);
}elseif ($action=="modify") {
	$result = $vote->modify($id,$begin_time,$till_time,$status);
}elseif ($action=="chagestatus") {
	$result = $vote->change_status($id,$status);
}else{
    $result['code'] = "error";
    $result['info'] = "无效参数";
}

echo json_encode_api($result);
exit;