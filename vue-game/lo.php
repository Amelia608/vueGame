<?php

/**
 * @Author      Hardy
 * @Web         http://www.xiruiad.com
 * @Des         
 */
// require(dirname(__FILE__).'/common/config.inc.php');

function get_rand($proArr)
{
    global $db;
    $result = array();
    foreach ($proArr as $key => $val) {
        $arr[$key] = $val['v'];
    } 
    // 概率数组的总概率  
    $proSum = 100;        
    // 概率数组循环   
    foreach ($arr as $k => $v) {
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $v) {
            $result = $proArr[$k];
            break;
        } else {
            $proSum -= $v;
        }
    }
    return $result;
}   

// echo $arr_log['num']."<br>";
// echo $arr_total['num']."<br>";
// exit;
$prize_arr[0]["id"] = 1;
$prize_arr[0]["prize_title"] = "奖品1";
$prize_arr[0]["prize_url"] = "http://www.baidu.com";
$prize_arr[0]["v"] = 99;

$prize_arr[1]["id"] = 2;
$prize_arr[1]["prize_title"] = "奖品2";
$prize_arr[1]["prize_url"] = "http://www.baidu.com";
$prize_arr[1]["v"] = 10;

// $rid = get_rand($prize_arr);
// if ($rid==2) {
//     if ($arr_log['id']) {
//         $sql_update = "update log set num=num+1 where day_str='{$arr_log['id']}'";
//     }else{
//         $sql_update = "insert log ('num') values (0)";
//     }
//     $db->query($sql_update);
// }
// 
//     if ($result['id']=="2") {
    //     $arr_log = $db->getone("select id,num from log where day_str='{$daystr}'");
    //     $arr_total = $db->getone("select sum(num) as num from log");
    //     if ($arr_log['id']) {
    //         if ($arr_log['num']<20 || $arr_total['num'] < 200) {
    //             // $p_1 = 99;
    //             // $p_2 = 10;
    //         }else{
    //             $result['id']==1;
    //         }
    //     }else{
    //         // $p_1 = 99;
    //         // $p_2 = 10;
    //     }
    // }

// $r_1 = $r_2 =0;
// for ($i=0; $i < 1000; $i++) {
$rid = get_rand($prize_arr);
if ($rid['id'] == "1") {
    $r_1 = $r_1 + 1;
} elseif ($rid['id'] == "2") {
    $daystr = date("Ymd", time());
        // $daystr = '20180601';
        // $arr_log   = $db->getone("select id,num from log where day_str='{$daystr}'");
        // $arr_total = $db->getone("select sum(num) as num from log");
    $arr_log['num'] = 10;
    $arr_total['num'] = 100;
        //总数小于200 发放
    if ($arr_total['num'] < 200) {
        if ($arr_log['id']) {
            if ($arr_log['num'] < 20) {
                $go = "yes";
                $sql_log = "update log set num=num+1 where id='{$arr_log['id']}'";
            } else {
                $go = "no";
            }
        } else {
            $go = "yes";
            $sql_log = "insert into log (day_str,num) values ('" . $daystr . "', '1')";
        }
    } else {
        $go = "no";
    }
    if ($go == "yes") {
            // $res = $db->query($sql_log);
    }
}
// }
// echo $r_1."<br>";
// echo $r_2."<br>";

$res['url'] = $rid['prize_url'];

echo json_encode($res, JSON_UNESCAPED_UNICODE);
// print_r($rid);