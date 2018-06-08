<?php
/**
 * @Author	Hardy
 * @Date    2018-04-27
 * @Web		http://www.xiruiad.com
 */

class vote {
    
    function __construct(){
        
    }

    //====================      投票活动设置     ==================================

    /**
     * 获取单条记录记录
     *
     * @param  [type] $id [description]
     *
     * @return [type] [description]
     */
    function get_one($id){
    	global $db,$xr_fn;
    	$sql = "select title,begin_time,still_time,status from vote where id='{$id}'";
    	$arr = $db->getone($sql);
    	return $arr;
    }

    /**
     * 获取翻页列表
     *
     * @param  [type] $type [description]
     * @param  [type] $keywords [description]
     * @param  [type] $sort [description]
     * @param  [type] $page [description]
     *
     * @return [type] [description]
     */
    function get_all_page($keywords,$sort,$page){
        global $db,$config,$page_fn;

        if ($page=="" or $page<=0) $page=1;

        $sql_where=" where 1=1";

        //获得分页
        $per_page = $config['num_per_page'];
        if (!$per_page) {
           $per_page = 15;
        }

        $total     = $db->getResultRows("select id from vote ".$sql_where );

        //翻页信息
        $page_info = $page_fn->get_page_info($total,$per_page,$page);
        
        //如果传输的页码大于总页码
        if ($page-$page_info['total_page']>0) {
           $page = $page_info['total_page'];
        }

        //获得数据
        $cur_pos=($page-1)*$per_page;

        $sql_str = "select id,status,begin_time,still_time,title from vote ".$sql_where.$sql_sort." limit ".$cur_pos.",".$per_page;
        $arr_str = $db->getall($sql_str);

        for ($i=0;$i<(count($arr_str));$i++){
			$info[$i]['id']       = $arr_str[$i]['id'];
			$info[$i]['status']   = $arr_str[$i]['status'];
			// $info[$i]['btime']    = $arr_str[$i]['begin_time'];
   //          $info[$i]['stime']    = $arr_str[$i]['still_time'];
            $info[$i]['title']    = $arr_str[$i]['title'];

            if($arr_str[$i]['status']==1) $info[$i]['status_cn']  = "启用中";
            else $info[$i]['status_cn']    = "停用中";
        }

        //构建json
        $json_data['total']     = $total;
        $json_data['sort_cn']   = $sort_cn;
        $json_data['page']      = $page;
        $json_data['last_page'] = $page_info['total_page'];
        $json_data['page_info'] = $page_info['page_info'];
        $json_data['list']      = $info;

        return $json_data;
    }

    
    /**
     * 添加一条记录
     *
     * @param [type] $title [description]
     * @param [type] $logo [description]
     * @param [type] $link [description]
     * @param [type] $target [description]
     * @param [type] $status [description]
     */
    function add($title,$begin_time,$till_time,$status){
    	// $b_time_gmt = strtotime($begin_time);
    	// $s_time_gmt = strtotime($till_time);
        if (!$title) {
            $arr_result['code'] = "error";
            $arr_result['info'] = "请填写活动标题";
        // }elseif (!$b_time_gmt) {
        //     $arr_result['code'] = "error";
        //     $arr_result['info'] = "请选择开始时间";
        // }elseif (!$s_time_gmt) {
        //     $arr_result['code'] = "error";
        //     $arr_result['info'] = "请选择结束时间";
        // }elseif ($b_time_gmt>$s_time_gmt) {
        //     $arr_result['code'] = "error";
        //     $arr_result['info'] = "结束时间不可早于开始时间";
        }else{
            global $db;
        	//检测所选时间内是否有已经存在的投票
        	// $sql_check_b = "select begin_time from vote where ".($b_time_gmt+1)." between begin_time_gmt and still_time_gmt";
        	// $arr_check_b = $db->getone($sql_check_b);
         //    $sql_check_s = "select begin_time from vote where ".($s_time_gmt-1)." between begin_time_gmt and still_time_gmt";
        	// $arr_check_s = $db->getone($sql_check_s);
        	// if ($arr_check_s['begin_time']) {
        	// 	$error_Str = "选择的时间段内已存在投票活动";
        	// }
         //    if ($error_Str) {
         //        $arr_result['code'] = "error";
         //        $arr_result['info'] = $error_Str;
         //    }else{
                unset($setsql);
                $setsql['title']  = $title;
                $setsql['status'] = $status;
                $newid = $db->insert($setsql,"vote");
                if ($newid) {
                    $arr_result['code'] = "success";
                    $arr_result['info'] = "添加完成";
                    $arr_result['id']   = $newid;
                }else{
                    $arr_result['code'] = "error";
                    $arr_result['info'] = "数据操作错误，请联系管理员";
                }
            // }
        }
        return $arr_result;
    }

    /**
     * 修改一条记录
     *
     * @param  [type] $id [description]
     * @param  [type] $title [description]
     * @param  [type] $logo [description]
     * @param  [type] $link [description]
     * @param  [type] $target [description]
     * @param  [type] $status [description]
     *
     * @return [type] [description]
     */
    function modify($id,$title,$begin_time,$till_time,$status){
    	// $b_time_gmt = strtotime($begin_time);
    	// $s_time_gmt = strtotime($till_time);
        if (!$title) {
            $arr_result['code'] = "error";
            $arr_result['info'] = "请填写活动标题";
        // }elseif (!$b_time_gmt) {
        //     $arr_result['code'] = "error";
        //     $arr_result['info'] = "请选择开始时间";
        // }elseif (!$s_time_gmt) {
        //     $arr_result['code'] = "error";
        //     $arr_result['info'] = "请选择结束时间";
        // }elseif ($b_time_gmt>$s_time_gmt) {
        //     $arr_result['code'] = "error";
        //     $arr_result['info'] = "结束时间不可早于开始时间";
        }else{
            global $db;
            $arr_check_title = $db->getone("select title from vote where title='{$title}' and id!='{$id}'");
            //检测所选时间内是否有已经存在的投票
            // $sql_check_b = "select begin_time from vote where (".($b_time_gmt+1)." between begin_time_gmt and still_time_gmt) and id!='{$id}'";
            // $arr_check_b = $db->getone($sql_check_b);
            // $sql_check_s = "select begin_time from vote where (".($s_time_gmt-1)." between begin_time_gmt and still_time_gmt) and id!='{$id}'";
            // $arr_check_s = $db->getone($sql_check_s);
            // if ($arr_check_s['begin_time']) {
            //     $error_Str = "选择的时间段内已存在投票活动";
            // }
            if ($arr_check_title['title']) {
                $arr_result['code'] = "error";
                $arr_result['info'] = "已存在同名活动";
            }else{
                unset($setsql);
                $setsql['title']          = $title;
                // $setsql['begin_time']     = $begin_time;
                // $setsql['begin_time_gmt'] = $b_time_gmt;
                // $setsql['still_time']     = $till_time;
                // $setsql['still_time_gmt'] = $s_time_gmt;
                $setsql['status']         = $status;
                $return = $db->update($setsql,"vote"," id='{$id}'");

                if ($return=="1") {
                    $arr_result['code'] = "success";
                    $arr_result['info'] = "修改完成";
                }elseif($return=="0"){
                    $arr_result['code'] = "success";
                    $arr_result['info'] = "内容没有变化，无需修改";
                }else{
                    $arr_result['code'] = "error";
                    $arr_result['info'] = "数据操作错误，请联系管理员";
                }
            }
        }
        return $arr_result;
    }

    /**
     * 修改状态
     *
     * @param  [type] $id [description]
     * @param  [type] $status [description]
     *
     * @return [type] [description]
     */
    function change_status($id,$status){
        if (!$id) {
            $arr_result['code'] = "error";
            $arr_result['info'] = "标签信息丢失";
        }else{
            global $db;

            //如果启用，检测是是否有冲突的活动
            // $arr_info = $db->getone("select begin_time_gmt,still_time_gmt from vote where id='{$id}'");
            // $b_time_gmt = $arr_info['begin_time_gmt'];
            // $s_time_gmt = $arr_info['still_time_gmt'];

            // $sql_check_b = "select id from vote where (".($b_time_gmt+1)." between begin_time_gmt and still_time_gmt) and id!='{$id}'";
            // $arr_check_b = $db->getone($sql_check_b);
            // $sql_check_s = "select id from vote where (".($s_time_gmt-1)." between begin_time_gmt and still_time_gmt) and id!='{$id}'";
            // $arr_check_s = $db->getone($sql_check_s);
            $sql[] = "update vote set status='{$status}' where id='{$id}'";
            $sql[] = "update fictitious set num=0";
            $sql[] = "delete from vote_log";
            $res = $db->transaction($sql);
        }
        return $status;
    }

    /**
     * 修改基础票数
     *
     * @param  [type] $id [description]
     * @param  [type] $num [description]
     *
     * @return [type] [description]
     */
    function modify_ballot($id,$num){
        global $db;
        $sql[] = "update fictitious set num='{$num}' where id='{$id}'";
        $res = $db->transaction($sql);
        if ($res=="success") {
            $arr_result['code'] = "success";
            $arr_result['info'] = "修改完成";
        }else{
            $arr_result['code'] = "error";
            $arr_result['info'] = "操作失败，请联系管理员";
        }
        return $arr_result; 
    }

    /**
     * 获取基础假数据
     *
     * @return [type] [description]
     */
    function get_all_ballot(){
        global $db,$config,$page_fn;

        $sql_str = "select id,title,num from fictitious order by id asc";
        $arr_str = $db->getall($sql_str);

        for ($i=0;$i<(count($arr_str));$i++){
            $info[$i]['id']    = $arr_str[$i]['id'];
            $info[$i]['title'] = $arr_str[$i]['title'];
            $info[$i]['num']   = $arr_str[$i]['num'];
        }

        //构建json
        $json_data['total']     = $total;
        $json_data['sort_cn']   = $sort_cn;
        $json_data['page']      = $page;
        $json_data['last_page'] = $page_info['total_page'];
        $json_data['page_info'] = $page_info['page_info'];
        $json_data['list']      = $info;

        return $json_data;
    }

    /**
     * 获取单条
     *
     * @param  [type] $id [description]
     *
     * @return [type] [description]
     */
    function get_one_ficitious($id){
        global $db,$xr_fn;
        $sql = "select num from fictitious where id='{$id}'";
        $arr = $db->getone($sql);
        return $arr;
    }

}