<div id="navbar" class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-container" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">快捷按钮</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>
		<div class="navbar-header pull-left">
			<a href="../user/" class="navbar-brand">
				<small>
					<i class="fa fa-laptop"></i>
					<?php echo $adm_title ?>
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<span class="user-info">
							<small>Welcome,</small>
							<?php echo $_SESSION['adm_nickname'] ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="../user/changepassword.php">
								<i class="ace-icon fa fa-cog"></i>
								修改密码
							</a>
						</li>

						<li class="divider"></li>
						<li>
							<a href="#" id="navbar_quit">
								<i class="ace-icon fa fa-sign-out"></i>
								退出登录
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
