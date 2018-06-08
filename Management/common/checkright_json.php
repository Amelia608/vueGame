<?PHP
if (!$_SESSION['adm_userid']){
	$arr_result['code'] = "unlogin";
	$arr_result['info'] = "登录已失效";

	echo json_encode_api($arr_result);
	exit;
// }else{
// 	//判断权限
// 	$arr_checkpower = explode(",",$_SESSION['adm_right']);
// 	$isin = in_array($adm_columnright,$arr_checkpower);
// 	if($isin || $_SESSION['adm_right'] == "-1" || $adm_columnright == "0"){
// 	    //echo "";
// 	}else{
// 		$arr_result['code'] = "unlogin";
// 		$arr_result['info'] = "登录已失效";
// 		echo json_encode_api($arr_result);
// 		exit;
// 	}
}