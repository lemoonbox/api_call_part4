<?php
include '../back_sc/session.php';
login_check();

?>
<!DOCTYPE html>
<html>
<head>
	<title>메인 메뉴</title>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<div id="sign_menu">
	<p><a href='./logout.php'>로그아웃 하기</a></p>
	<p><a href='./session_del.php'>쿠키 유지 세션만 삭제</a></p>
	<p><a href='./product_maj.php?a='>product_ajax</a></p>
</div>

</body>
</html>