<?php 
session_start();

//销毁SESSION
unset($_SESSION);

$appid = 'wxafe21b1b45787666';
$r_url = urlencode ( 'http://bmwvote.xiruiad.com/getUserInfo.php');
$url   = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$r_url&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
header("Location:".$url);