<?php
require(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrcommon.'session_regenerate.php');

$adm_column = "vote";
$adm_menu   = "fictitious";
require('column_right.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $adm_title ?></title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
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

							<li>投票管理</li>
							<li>基础票数设定</li>
						</ul>
					</div>

					<div class="page-content">
						<?php require(dirname(__FILE__).'/../common/loadingdiv.php'); ?>

						<div class="row">
							<div class="col-xs-12">
								<div class="tab-content no-border">
									<div id="rows_all" class="tab-pane active minheight1 fade in">
<!-- 										<div class="row">
											<div class="col-sm-12 list_btns">
												<button class="btn btn-sm btn-success btn_reload_data"><i class="ace-icon iconfont icon-shuaxin"></i>刷新列表</button>
												<button class="btn btn-sm btn-primary" id="add-btn"><i class="ace-icon iconfont icon-tianjia"></i>添 加</button>
											</div>
										</div>
 -->									
 										<div class="row" id="content_list_row"></div>
<!-- 										<div class="row">
											<div class="col-sm-12 text-right">
												<ul class="pagination" id="page_info"></ul>
											</div>
										</div>
 -->								
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php require(dirname(__FILE__).'/../common/footer.php'); ?>
		</div>

		<div id="edit_modal" class="modal fade" tabindex="-1" style="margin-top:10% ">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right" for="frm_num"> 基础数据 </label>

								<div class="col-sm-8">
									<span class="block">
										<input type="number" name="frm_num" id="frm_num" class="col-sm-6" />
									</span>
								</div>
							</div>

							<input type="hidden" name="id" id="id" value="">
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm btn-info pull-middle" id="sub-btn">
							<i class="ace-icon fa fa-check"></i>
							提交
						</button>

						<button class="btn btn-sm btn-danger pull-middle" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							关闭
						</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>

		<?php require_once(dirname(__FILE__).'/../common/basic_scripts.php'); ?>
		<?php require_once(dirname(__FILE__).'/../common/checkright.php'); ?>
		<script type="text/javascript" src="js/fictitious.min.js"></script>
	</body>
</html>
