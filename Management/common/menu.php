<div id="sidebar" class="sidebar responsive sidebar-fixed">
	<ul class="nav nav-list">
		<li class="<?php if($adm_column=="idx"){echo ' active open';} ?>">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon iconfont icon-guanlizhongxin"></i>
				<span class="menu-text">管理中心</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="<?php if($adm_menu=="ins"){echo ' active';} ?>">
					<a href="../user/">
						<i class="menu-icon fa fa-caret-right"></i>使用说明
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?php if($adm_menu=="cpwd"){echo ' active';} ?>">
					<a href="../user/changepassword.php">
						<i class="menu-icon fa fa-caret-right"></i>修改密码
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="<?php if($adm_column=="vote"){echo ' active open';} ?>">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon iconfont icon-yuangongjiangliwodejianglijiangpinwodelipin"></i>
				<span class="menu-text">投票管理</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="<?php if($adm_column=="vote" && $adm_menu=="votelist"){echo ' active';} ?>">
					<a href="../vote/">
						<i class="menu-icon fa fa-caret-right"></i>活动设定
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
			<b class="arrow"></b>

			<ul class="submenu">
				<li class="<?php if($adm_column=="vote" && $adm_menu=="fictitious"){echo ' active';} ?>">
					<a href="../vote/fictitious.php">
						<i class="menu-icon fa fa-caret-right"></i>基础票数设定
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>