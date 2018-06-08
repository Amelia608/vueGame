<?php
/**
 * @Author		Hardy
 * @Web			http://www.xiruiad.com
 * @Des 		
 */

require(dirname(__FILE__).'/../common/config.inc.php');

// $arr = $db->getall("select localid,count(*) as num from vote_log group by localid order by localid");

for ($i=1; $i < 7; $i++) { 
	$arr = $db->getone("select count(*) as num from vote_log where localid='{$i}' order by localid");
	$arr_fack = $db->getone("select num from fictitious where id='{$i}' order by id");
	$show_num = $arr['num']+$arr_fack['num'];
	$arr_num[] = $show_num;
}

$res['code'] = "success";
$res['info'] = "获取成功";
$res['list'] = $arr_num;

echo json_encode_api($res);