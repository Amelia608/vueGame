<?php
require(dirname(__FILE__).'/../../../common/config.inc.php');

require('../column_right.php');

require(root_xrcommon_adm.'checkright_json.php');
require(root_xrclass.'vote.class.php');

$id  = filter_var($_POST2['id'],FILTER_VALIDATE_INT);

$vote = new vote();
$arr  = $vote->get_one_ficitious($id);

$json_str['code'] = "success";
$json_str['info'] = $arr;

echo json_encode_api($json_str);
exit;