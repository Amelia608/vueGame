<?PHP
require(dirname(__FILE__).'/../../../common/config.inc.php');

if (!$_SESSION['adm_userid']) {
    echo '登录状态失效';
    exit;
}

require(dirname(__FILE__).'/php/image_path.php');
?>
<!DOCTYPE html>
<html style="width: 300px;">

    <head>
        <meta charset="UTF-8">
        <script src="../js/jquery-2.1.4.min.js"></script>
        <link type="text/css" href="css/ShearPhoto.min.css" rel="stylesheet" media="all">
        <script  type="text/javascript" src="js/ShearPhoto.min.js" ></script>
        <script  type="text/javascript" src="js/alloyimage.min.js" ></script>
        <script  type="text/javascript" src="js/handle.min.js" id="shearphoto" data="<?php echo $ac." @xirui@ ".$arr_p[0]." @xirui@ ".$arr_p[1] ?>"></script>
    </head>
    <body style="margin:0px; padding:0px;">
        <!--导航栏 st-->
        <!--主体部分 st-->
        <section class="container">
            <div class="grzx am-cf am-margin-top-lg">
                <div class="detinfo">
                    <!--个人信息-->
                    <div class="grzl-box" id="grzl">
                        <div class="p-user-info cl">
                            <div class="p-user-info-left fl">
                                <div id="shearphoto_loading">
                                    程序加载中......
                                </div>
                                <div id="shearphoto_main">
                                    <div class="primary">
                                        <div id="main">
                                            <div class="point"></div>
                                            <div id="SelectBox" class="SelectBox">
                                                <form id="ShearPhotoForm" enctype="multipart/form-data" method="post" target="POSTiframe">
                                                    <input name="shearphoto" type="hidden" value="" autocomplete="off">
                                                 <!--    <a href="javascript:;" id="selectImage"> -->
                                                        <div class="upload-btn-box">
                                                           <span class="load-bg"></span>
                                                             <input type="file" name="UpFile" autocomplete="off" id="selectImage" value="上传图片" />
                                                        </div>
                                                       
                                                    <!-- </a> -->
                                                </form>
                                            </div>
                                            <div id="relat">
                                                <div id="black"></div>
                                                <div id="movebox">
                                                    <div id="smallbox">
                                                        <img class="MoveImg" />
                                                        <!--截框上的小图-->
                                                    </div>
                                                    <!--动态边框开始-->
                                                    <i id="borderTop"></i>
                                                    <i id="borderLeft"></i>
                                                    <i id="borderRight"></i>
                                                    <i id="borderBottom"></i>
                                                    <!--动态边框结束-->
                                                    <i id="BottomRight"></i>
                                                    <i id="TopRight"></i>
                                                    <i id="Bottomleft"></i>
                                                    <i id="Topleft"></i>
                                                    <i id="Topmiddle"></i>
                                                    <i id="leftmiddle"></i>
                                                    <i id="Rightmiddle"></i>
                                                    <i id="Bottommiddle"></i>
                                                </div>
                                                <img class="BigImg" width="200" />
                                                <!--MAIN上的大图-->
                                            </div>
                                        </div>
                                        <!--main范围结束-->
                                        <div style="clear: both">
                                        </div>
                                        <!--工具条开始-->
                                        <div id="Shearbar">
                                            <div class="ZoomDist" id="ZoomDist">
                                                <div id="Zoomcentre"></div>
                                                <div id="ZoomBar"></div>
                                                <span class="progress"></span>
                                            </div>
                                            <p class="Psava">
                                                <a id="againIMG" href="javascript:;">重新选择</a>
                                                <a id="saveShear" href="javascript:;">保存截图</a>
                                            </p>
                                        </div>
                                        <!--工具条结束-->
                                    </div>
                                    <!--primary范围结束-->
                                    <div style="clear: both">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--主体部分 end-->
        <!--底部-->
    </body>
</html>