<?php 
include './session.php';
include './api_call.php';


if(isset($_POST["username"]) && isset($_POST["password"])){
	$username = trim($_POST["username"]);
	$passowrd = trim($_POST["password"]);

	$optarry =[
	CURLOPT_POST => 1,
	CURLOPT_POSTFIELDS => array(
		'username' => $username,
		'password' => $passowrd,
		)
	];

	$resps = api_call($optarry, '/rest-auth/login/');
	$resps_status = $resps[0];
	$resps_data = json_decode($resps[1], true);

	if($resps_status == 200){
		$token = $resps_data['key'];
		wr_session('token', $token);
		$response = ['status'=>$resps_status, 'message'=>$token];
		echo json_encode($response);
	}else{
		$response = ['status'=>$resps_status, 'message'=>''];
		echo json_encode($response);
	}
}else{
	echo $response = ['status'=>'400', 'message'=>''];
}
?>