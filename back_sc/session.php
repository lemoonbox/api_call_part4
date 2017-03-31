<?php 
//every session start here
//must include this module if want use session.
session_start();

function Redirect($url, $permanent = false){
    header('Location: ' . $url);
    exit();
}


function wr_session($key, $value){
	$_SESSION[$key] = $value;
	if($key=='token'){
		setcookie('token', $value, time()+3600*24*365, '/');	
	}, 
}

//working code
function login_check($page_name="other"){
	global $choic_fc;
	if(isset($_SESSION['token'])){
		$status = 'success';
		if($page_name == 'login'){
			Redirect('/template/menu.php');}
	}else{
		if(isset($_COOKIE['token'])){
			$token = $_COOKIE['token'];
			wr_session('token', $token);
			if($page_name != 'login'){
				Redirect('/template/menu.php');}
		}	
		if($page_name == 'other'){
			Redirect('/templatea/login.php');	
		}
	}
}

?>