<?php
define("LINE_API","https://notify-api.line.me/api/notify");
$thai_month =array("1"=>"มกราคม", "2"=>"กุมภาพันธ์", "3"=>"มีนาคม", "4"=>"เมษายน", "5"=>"พฤษภาคม", "6"=>"มิถุนายน",  "7"=>"กรกฎาคม", "8"=>"สิงหาคม", "9"=>"กันยายน", "10"=>"ตุลาคม", "11"=>"พฤศจิกายน", "12"=>"ธันวาคม");
class lib_Function{
 private $thai_month;
 function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}
	public function unno_redirect($to, $wait = 0){
		echo '<html>';
		echo '<head><meta http-equiv="refresh" content="'.$wait.'; URL=' .$to.'"></head>';
		echo '<body></body>' ;
		echo '</html>';
		exit();
	}
	public static function Login($UserName,$PassWord,$con){
 			$sql = "CALL sp_Loginuser('$UserName','$PassWord');";
			$query = $con->query($sql);
			$row = $query->fetch_array();
			$query->close();
			if($row["user_name"] != NULL) {
				$_SESSION['UserName'] =  $row["user_name"];
				$_SESSION['PassWord'] = $row["pass_word"];
				self::unno_redirect("./index.php");
			}
	}

	public static function upimge($file_name,$file_tmp, $path){
		$filename_new = rand(1,1000000).time();
		$filename_new .= strrchr($file_name,"."); 
		$array_last=explode (".",$filename_new);
		$c=count($array_last)-1;
		$lastname=strtolower($array_last[$c]);
    	if (is_uploaded_file($file_tmp)){
			$copied =  copy($file_tmp, "$path/$filename_new");
		}
		return $filename_new;
	}

	public static function delimge($Img, $path){
		$flgDelete = @unlink("$path/$Img");
		return $flgDelete;
	}

	public static function gen_enum_optlist($db, $field, $value=NULL, $title_config=NULL, $con){
		$SQL = "SHOW COLUMNS FROM $db LIKE '$field'";
		$result1 = $con->query($SQL) or die(mysql_error().' '.__FILE__.' '.__LINE__);
		$rs = $result1->fetch_assoc();
		
		$Type = str_replace('enum', 'array', $rs['Type']);
		eval( '$tmp = '."$Type;" );	// Add to array
		$word_type_opt = '';
		//natsort($tmp);
		foreach ($tmp as $val)
		{
			if($title_config){
				$title = $title_config[$val];
			}else{
				$title = $val;
			}
			$selected = '';
			if($val==$value)
			{
				$selected='selected="selected"';
			}
			$word_type_opt .= '<option value="'.$val.'" '.$selected.'> '.$title.' </option>'."\n";
		}
		return $word_type_opt;
	}
	public static function Sale_price($id,$con){
 			$sql = "CALL sp_newprice($id);";
			$query = $con->query($sql);
			$row = $query->fetch_array();
			$query->close();
			$con->next_result();
			return $row["sale_price"]."|".$row["sale"];

}
public  function MonthThai($key=1){
	return $GLOBALS['thai_month'][$key];
}
public static function selectMonthThai($mm){
		foreach ($GLOBALS['thai_month']  as $key => $value) {
				if($mm==$key)
					$word_type_opt .= "<option value=\"$key\" selected> $value</option>\n";
				else
					$word_type_opt .= "<option value=\"$key\"> $value</option>\n";
		}
		return $word_type_opt;
}
	
	public function CheckIn($n="./index.php"){
		if(empty($_SESSION["UserName"]) && empty($_SESSION["PassWord"])){
			self::unno_redirect($n);
		}
	}
	public function CheckOut($n="./index.php"){
		Session_destroy();
		self::unno_redirect($n,"2");
	}
}
?>