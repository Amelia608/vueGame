<?php
require(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrcommon.'session_regenerate.php');

require('column_right.php');

require(dirname(__FILE__).'/../common/checkright_json.php');
require(root_xrclass.'vote.class.php');

$id  = filter_var($_POST2['id'],FILTER_VALIDATE_INT);
$num = filter_var($_POST2['num'],FILTER_VALIDATE_INT);

$vote = new vote();

if (!$id) {
    $result['code'] = "error";
    $result['info'] = "无效参数";
}elseif (!$num) {
    $result['code'] = "error";
    $result['info'] = "请设定基础数据，数据不可为0";
}else{
    $result = $vote->modify_ballot($id,$num);
}

echo json_encode_api($result);
exit;