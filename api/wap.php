<?php
/**
 * @Author		Hardy
 * @Web			http://www.xiruiad.com
 * @Des 		
 */

require(dirname(__FILE__).'/../common/config.inc.php');

$id  = filter_var($_GET2['id'],FILTER_VALIDATE_INT);

//获取投票数
$arr = $db->getone("select count(*) as num from vote_log where localid='{$id}'");

$res['code'] = "success";
$res['info'] = "获取成功";
$res['list'] = $arr['num'];

echo json_encode_api($res);
