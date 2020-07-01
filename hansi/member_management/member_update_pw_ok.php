<?php
	include "../connect_db.php";
	include "../password.php";

	$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

	$sql = "UPDATE account_info SET password='".$pw."' WHERE id = '".$_SESSION['uid']."'";
	mysqli_query($connect, $sql);

	session_destroy();
	echo "<script>alert('비밀번호가 변경되었습니다.'); location.href='/index.php';</script>";

	?>
