<?php require_once(dirname(__FILE__).'/../../common/config.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>登录 - <?php echo $adm_title ?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<?php require_once(dirname(__FILE__).'/../common/assets.php'); ?>
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row" style="margin-top: 80px;">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h3>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red"><?php echo $company_title ?></span>
									<span class="white" id="id-text2">管理后台</span>
								</h3>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter">
												<i class="ace-icon fa fa-coffee green"></i>
												请输入系统管理员登录账号
											</h4>

											<div class="space-6"></div>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input type="text" name="username" id="username" class="form-control" placeholder="请输入用户名" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input type="password" name="password" id="password" class="form-control" placeholder="请输入密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110" id="login_btn_text">登录</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											<div id="login_error_info" class="hidden"><i class="ace-icon fa fa-remove red"></i> <span id="error_info"></span></div>
										</div><!-- /.widget-main -->
										<div class="toolbar clearfix">
											<div style="text-align:center;width:100%;color:#fff">
												推荐使用 Chrome, Firefox 浏览器获得最佳效果
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
		<div class="poweredby1">
			&copy;2017 <?php echo $company_title ?> 
			Powerd by <a href="<?php echo $tss_url ?>" target="_blank"><?php echo  $tss_company ?></a>
		</div>
		<?php require_once(dirname(__FILE__).'/../common/basic_scripts.php'); ?>
		<script type="text/javascript" src="js/login.min.js"></script>
	</body>
</html>
