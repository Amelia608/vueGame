<?php
/**
 * 
 * @authors Hardy (hardy@xiruiad.com)
 * @date    2017
 * 
 */
require(dirname(__FILE__).'/../../../common/config.inc.php');

require('../column_right.php');

require(root_xrcommon_adm.'checkright_json.php');
require(root_xrclass.'vote.class.php');

$vote = new vote();

$page = filter_var($_POST2['page'],FILTER_VALIDATE_INT);

$result = $vote->get_all_ballot();

echo json_encode_api($result);
exit;