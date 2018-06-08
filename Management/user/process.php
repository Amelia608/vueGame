<?php
require(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrcommon.'session_regenerate.php');

require('column_right.php');

require(dirname(__FILE__).'/../common/checkright_json.php');
require(root_xrclass.'user.class.php');

$oldpwd  = $_POST2['opwd'];
$newpwd1 = $_POST2['npwd1'];
$newpwd2 = $_POST2['npwd2'];

$adm = new adm();

$result = $adm->change_pwd($_SESSION['adm_userid'],$oldpwd,$newpwd1,$newpwd2);

echo json_encode_api($result);
exit;