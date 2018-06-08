<?PHP
if (!$_SESSION['adm_userid']) {
	echo '<script>show_confirm("系统提示","error","登录状态失效","","gologin()");</script>';
	exit;
// }else{
// 	//判断权限
// 	$arr_checkpower = explode(",",$_SESSION['adm_right']);
// 	$isin = in_array($adm_columnright,$arr_checkpower);
// 	if($isin || $_SESSION['adm_right'] == "-1" || $adm_columnright == "0"){
// 	    //echo "";
// 	}else{
// 	    echo '<script>show_confirm("系统提示","ok","您没有操作此栏目的权限","","goback()");</script>';
// 	    exit;
// 	}
}