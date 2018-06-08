<?PHP
session_start();

//************************禁用错误提示***********************************
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//************************定义时区***********************************
date_default_timezone_set("PRC");
define("root_web",$_SERVER['DOCUMENT_ROOT']);
define("root_xrclass",root_web.DIRECTORY_SEPARATOR."xr_class".DIRECTORY_SEPARATOR);
define("root_xrcommon",$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."common".DIRECTORY_SEPARATOR);
define("root_xrcommon_adm",$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."management".DIRECTORY_SEPARATOR."common".DIRECTORY_SEPARATOR);

require_once(root_xrcommon.'function.php');

//************************定义系统常量********************************

$tss_company   = "XiruiAD";
$tss_url       = "http://www.xiruiad.com";
$company_title = "宝马投票活动";
$web_url       = "http://".$_SERVER["HTTP_HOST"];

//************************管理后台页面配置************************************
$adm_title    = $company_title . " 管理后台";
$adm_homepage = "/Management/user/";

//************************数据传输安全性*******************************

//单引号双引号转义+消除HTML标签时请使用+ 取消">"以防止恶意破坏input结构
if (!empty($_GET))$_GET2	= addslashes_deep($_GET);
if (!empty($_POST))$_POST2	= addslashes_deep($_POST);
$_COOKIE2	= addslashes_deep($_COOKIE);
$_REQUEST2	= addslashes_deep($_REQUEST);

//单引号双引号转义时请使用
if (!empty($_GET))$_GET3	= addslashes_deep2($_GET);
if (!empty($_POST))$_POST3	= addslashes_deep2($_POST);
$_COOKIE3	= addslashes_deep2($_COOKIE);
$_REQUEST3	= addslashes_deep2($_REQUEST);

//**********************定义数组配置**************************************************
//常用变量配置
$config['online_ip']    = getip();
$config['time_gmt']     = time();
$config['time_ymd']     = date("Y-m-d H:i:s");
$config['this_day']     = date("Y-m-d");
$config['web_host']     = $web_url;
$config['copyright']    = $TSS_company;
$config['url']          = $web_url;
$config['num_per_page'] = 10;

//系统维护
$config['show_sql_error']    = 0; 	//是否关闭显示错误，0=显示，1=关闭
$config['ip_restrictions']   = 0; 	//IP约束，开启后，只有指定IP白名单可登录，0=关闭，1=启用
$config['login_trial']       = 0; 	//尝试登录次数显示，0=关闭，1=启用

//********************** 通用类 **************************************************
require(root_xrclass.'mysql.class.php');
$db = new mysql();

require(root_xrclass.'page.class.php');
$page_fn = new fn_page_info();

require(root_xrclass.'xr_fn.class.php');
$xr_fn   = new xr_fn();
?>