<?php
/**
 * @Author	Hardy
 * @Date    2018-03-14
 * @Web		http://www.xiruiad.com
 */

class xr_fn {

    function __construct(){

    }

	/**
	 * 隐藏电话号码中间
	 *
	 * @param  [type] $phone [description]
	 *
	 * @return [type] [description]
	 */
	function hidden_tel($phone){
    	$IsWhat = preg_match('/(0[0-9]{2,3}[\-]?[2-9][0-9]{6,7}[\-]?[0-9]?)/i',$phone); //固定电话
	    if($IsWhat == 1){
	    	return preg_replace('/(0[0-9]{2,3}[\-]?[2-9])[0-9]{3,4}([0-9]{3}[\-]?[0-9]?)/i','$1****$2',$phone);
	    }else{
	    	return  preg_replace('/(1[3456789]{1}[0-9])[0-9]{4}([0-9]{4})/i','$1****$2',$phone);
	    }
	}

		/**
	 * 模拟POST
	 *
	 * @param  [type] $url [description]
	 * @param  [type] $data_string [description]
	 *
	 * @return [type] [description]
	 */
	function http_post_json($url, $data_string) {  
	    $ch = curl_init();  
	    curl_setopt($ch, CURLOPT_POST, 1);
	    //windows下会校验HTTPS，强制关闭掉
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_URL, $url);  
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
	        "Content-Type: application/json; charset=utf-8",  
	        "Content-Length: " . strlen($data_string))  
	    );  
	    ob_start();  
	    curl_exec($ch);  
	    $return_content = ob_get_contents();  
	    ob_end_clean();  
	    $return_code = curl_getinfo($ch);
	    $arr_content = json_decode($return_content,true);
	    return array($return_code, $return_content);
	}

    //获取access_token
    function get_access_token($force,$appid,$secret){
		$token_filePath = $_SERVER['DOCUMENT_ROOT']."/access_token.json";	
        $data = json_decode(file_get_contents($token_filePath),true);
        if ($data['expire_time']< time() || $force==1) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
            $res = self::getJson($url);
            $access_token = $res['access_token'];
            if ($access_token) {
                $data['expire_time']  = time() + 7000;
                $data['access_token'] = $access_token;
                $fp = fopen($token_filePath, "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        }else{
            $access_token = $data['access_token'];
        }
        return $access_token;
    }

    //获取json
	function getJson($url){
	    $html = file_get_contents($url);  
	    $arr_temp = json_decode($html,true);
	    return $arr_temp;
	}
}