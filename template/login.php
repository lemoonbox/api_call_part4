<?php
include '../login_scheck.php';

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../js/ajax_ctrl.js"></script>

<script>
$('document').ready(function() {
	$("#login").click(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		if(username.length !=0 && password.length !=0){
			var action_url = $('#form1').attr('action');
			var form_data = {
				username : username,
				password : password,
			}
			var sc_fc = function(){window.location.replace('/template/menu.php');}
			ajax_call("POST", action_url, form_data, sc_fc, 'login');
		}else{
			$("#message").html("<p styple='color:green; font-weight:bold'>아이디 또는 비밀번호를 입력해주세요.</p>");
		}
	});
});

</script>
</head>
<body>
	<form id="form1" name="form1" action="../login_prcs.php" method="post">
		<label for="username">ID</label>
		<input type="text" name="username" id="username"><br>
		<label for='password'>PW</label>
		<input type="password" name="password" id="password"><br>
		<input type="button" id="login" value="로그인 하기">
	</form>
	<div id="message"></div>
</body>
</html>