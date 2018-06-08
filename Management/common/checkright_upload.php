<?PHP
if (!$_SESSION['adm_userid']) {
	echo '<script>show_confirm("系统提示","error","登录状态失效","","gologin()");</script>';
	exit;
}