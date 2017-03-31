<?php
include '../back_sc/session.php';
login_check();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="../js/ajax_ctrl.js"></script>
	<script src="../js/paging.js"></script>	
	<script>
		$(document).ready(function(){
			mobli_paging(0);
		});
	</script>
</head>
<body>
<h1>상품 리스트 입니다.</h1>
<div id = "token" data-token="<?php echo $_SESSION['token']?>"></div>
 <table id='prd_table'>
 	<tr class='table_title'>
 		<th>ID</th>
 		<th>이름</th>
 		<th>용량,중량,크기</th>
 		<th>포장단위</th>
 		<th>공급업체</th>
 		<th>면세상품</th>
 	</tr>
 </table>
<ul id="pagination">
</ul>
</body>
</html>