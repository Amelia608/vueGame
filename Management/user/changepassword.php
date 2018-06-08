<?php
require(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrcommon.'session_regenerate.php');

$adm_column = "idx";
$adm_menu   = "cpwd";

require('column_right.php');

$sql_gettime = "select changepwdtime from adm_users where id='{$_SESSION['adm_userid']}'";
$arr_gettime = $db->getone($sql_gettime);

if ($arr_gettime['changepwdtime']) {
	$time2 = $arr_gettime['changepwdtime'];
}else{
	$time2 = 0;
}
$str = DateDiff("s",$time2,time());

if (time()-$time2 > 90*24*3600) {
	$alert_class = "remove";
	$alert_color = "danger";
}else{
	$alert_class = "check";
	$alert_color = "success";
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv ="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $adm_title ?></title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<?php require(dirname(__FILE__).'/../common/assets.php'); ?>

	</head>

	<body class="no-skin">
		<?php require(dirname(__FILE__).'/../common/navbar.php'); ?>

		<div class="main-container ace-save-state" id="main-container">

			<?php require(dirname(__FILE__).'/../common/menu.php'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo $adm_homepage ?>">首页</a>
							</li>
							<li>管理中心</li>
							<li>修改密码</li>
						</ul>
					</div>

					<div class="page-content">

						<?php require(dirname(__FILE__).'/../common/loadingdiv.php'); ?>

						<div class="row">
							<div class="col-xs-12">
								<div class="tab-content no-border">
									<div class="alert alert-block alert-<?php echo $alert_color ?>">
										<i class="ace-icon fa fa-<?php echo $alert_class?>"></i> 上次修改密码于 <b><?php echo date("Y-m-d",$time2) ?></b>。建议每3个月修改你的密码，以确保系统最佳安全性。
									</div>

									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 原密码 </label>

											<div class="col-sm-8">
												<span class="block input-icon input-icon-left">
													<input type="password" name="oldpwd" id="oldpwd" class="col-xs-4" placeholder=" 原始密码" />
													<i class="ace-icon fa fa-key"></i>
												</span>
											</div>
										</div>

										<div class="space-4"></div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码 </label>

											<div class="col-sm-8">
												<span class="block input-icon input-icon-left">
													<input type="password" name="newpwd1" id="newpwd1" class="col-xs-4" placeholder=" 新密码" />
													<i class="ace-icon fa fa-key orange"></i>
												</span>
											</div>
										</div>

										<div class="space-4"></div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 确认密码 </label>

											<div class="col-sm-8">
												<span class="block input-icon input-icon-left">
													<input type="password" name="newpwd2" id="newpwd2" class="col-sm-4" placeholder=" 确认密码" />
													<i class="ace-icon fa fa-key orange"></i>
												</span>
											</div>
										</div>

										<div class="space-4"></div>

										<div class="clearfix form-actions">
											<div class="col-xs-12 text-center">
												<button class="btn btn-info" type="button" id="submit_btn">
													<i class="ace-icon fa fa-check bigger-110"></i>提交
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php require(dirname(__FILE__).'/../common/footer.php'); ?>

		</div>
		
		<?php require_once(dirname(__FILE__).'/../common/basic_scripts.php'); ?>
		<?php require_once(dirname(__FILE__).'/../common/checkright.php'); ?>

		<script type="text/javascript" src="js/changepwd.min.js"></script>
	</body>
</html>
