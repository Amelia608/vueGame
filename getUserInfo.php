<?php
/**
 * @Author  Hardy
 * @Date    2018-04-21
 * @Web     http://www.xiruiad.com
 */
require(dirname(__FILE__).'/common/config.inc.php');

$appid  = "wxafe21b1b45787666";  
$secret = "da8a8199bbe64cade3fa282eafcb8807";  

$code  = $_GET["code"];

//第一步:取全局access_token
$access_token = $xr_fn->get_access_token(0,$appid,$secret);


//第二步:取得openid
$oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
$oauth2    = $xr_fn->getJson($oauth2Url);

$openid = $oauth2['openid'];  

if ($openid) {
    $_SESSION['openid'] = $openid;
    header("Location:wap/index.html");
}