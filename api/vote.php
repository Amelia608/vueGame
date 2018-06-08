<?php
/**
 * @Author		Hardy
 * @Web			http://www.xiruiad.com
 * @Des 		
 */

require(dirname(__FILE__).'/../common/config.inc.php');

$id = filter_var($_POST2['id'],FILTER_VALIDATE_INT);

$userid = $_SESSION['openid'];

//检测下投票时间
$arr_vote = $db->getone("select id from vote where status=1 limit 1");

if ($arr_vote['id']) {
	if ($id) {
		if ($userid) {
			$arr_check = $db->getone("select id from vote_log where openid='{$userid}'");
			if ($arr_check['id']) {
				$res['code'] = "error";
				$res['info'] = "您已投票";
			}else{
				unset($setsql);
				$setsql['openid']  = $userid;
				$setsql['localid'] = $id;
				$setsql['vote_id'] = $arr_vote['id'];
		        $newid = $db->insert($setsql,"vote_log");

				$res['code'] = "success";
				$res['info'] = "投票成功，谢谢您的参与";
			}
		}else{
			$res['code'] = "error";
			$res['info'] = "请使用微信登录投票";
		}
	}else{
		$res['code'] = "error";
		$res['info'] = "场景信息丢失";
	}
}else{
	$res['code'] = "error";
	$res['info'] = "投票尚未开启";
}


echo json_encode_api($res);
