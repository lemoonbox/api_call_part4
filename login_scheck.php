<?php 
session_start();
$cs_rps = ['status'=>200, 'message'=>"login_OK"];
$smake_rps = ['status'=>200, 'message'=>"make session"];
$er_rps = ['status'=>400, 'message'=>"login_ERROR"];

$URL_arr = explode("/",$_SERVER['REQUEST_URI']);
$page_name = explode('.',end($URL_arr))[0];


//error func setting
$do_any=function (){
	return true;
};

$login_fc_arr= [
	"success" =>function(){
		echo "<script>window.location.replace('/template/menu.php');</script>";
	},
	"fail" =>$do_any
];
$server_fc_arr= [
	"success" =>$do_any,
	"fail" =>function(){
		$response = ['status'=>400, 'message'=>'token is fail to authentication'];
		echo json_encode($response);
	}
];
$other_fc_arr =[
	"success" =>$do_any,
	"fail" =>function(){
		echo "<script>window.location.replace('/template/login.php');</script>";
	}
];

$resp_fc_arr = [
	"login"=>$login_fc_arr,
	'product_ajax'=>$server_fc_arr,
	'other'=>$other_fc_arr
];

$choic_fc = function($page_name, $state){
	global $resp_fc_arr;
	$spec_pages =['login', 'product_ajax'];
	if(!in_array($page_name, $spec_pages)){
		$page_name = 'other';
	}
	$resp_fc_arr[$page_name][$state]();
};

//working code
if(isset($_SESSION['token'])){
	$status = 'success';
	$choic_fc($page_name, $status);
}else{
	if(isset($_COOKIE['token'])){
		$token = $_COOKIE['token'];
		$_SESSION['token']=$token;	
		$status = 'success';	
		$choic_fc($page_name, $status);	
		return ;
	}
	$status = 'fail';	
	$choic_fc($page_name, $status);
	return false;	
}
?>