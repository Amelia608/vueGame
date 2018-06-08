<?php
require(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrcommon.'session_regenerate.php');
require('column_right.php');

$adm_column = "idx";
$adm_menu   = "ins";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $adm_title ?></title>

		<meta name="description" content="Common UI Features &amp; Elements" />
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
							<li>使用说明</li>
						</ul>
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="tab-content no-border">
									<div class="row">
										<div class="col-xs-12">
											<div id="accordion" class="accordion-style1 panel-group">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
																<i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																&nbsp;登录密码安全
															</a>
														</h4>
													</div>

													<div class="panel-collapse collapse in" id="collapse1">
														<div class="panel-body">
															<ul class="list-unstyled spaced">
																<li><i class="ace-icon fa fa-exclamation-triangle orange"></i> 长度建议：8-20位</li>
																<li><i class="ace-icon fa fa-exclamation-triangle orange"></i> 强度建议：大小写字母，数字混合</li>
																<li><i class="ace-icon fa fa-exclamation-triangle orange"></i> 为了保障管理后台的安全性，建议最多每3个月修改一次您的的密码。</li>
															</ul>
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
																<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																&nbsp;搜索功能说明
															</a>
														</h4>
													</div>

													<div class="panel-collapse collapse" id="collapse2">
														<div class="panel-body">
															<ul class="list-unstyled spaced">
																<li><i class="ace-icon fa fa-bell-o bigger-110 green"></i>
																	 在界面右上角输入关键字，点击回车按钮即可完成搜索</li>
																<li><i class="ace-icon fa fa-bell-o bigger-110 green"></i> 
																	 搜索非精确匹配，包含输入的文字的集合即可显示
																</li>
																<li><i class="ace-icon fa fa-bell-o bigger-110 green"></i> 系统会保留最后一次搜索及排序的内容，如需清空保留内容，点击『所有列表』按钮即可</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
	</body>
</html>
