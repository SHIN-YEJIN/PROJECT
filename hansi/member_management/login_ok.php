<?php
	include "../connect_db.php";
	include "../password.php";

	if($_POST["id"] == "" || $_POST["password"] == "")
	{
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}
	else
	{
	$password = $_POST['password'];
	$sql = "SELECT * FROM account_info WHERE id='".$_POST['id']."'";
	$result = $connect->query($sql);
	$account_info = $result->fetch_array();
	$hash_pw = $account_info['password']; //$hash_pw에 POST로 받아온 아이디열의 비밀번호를 저장한다.

	if(password_verify($password, $hash_pw)) //password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어간다.
	{
		$_SESSION['id'] = $account_info["id"];
		$_SESSION['name'] = $account_info["name"];
		$_SESSION['password'] = $account_info["password"];

		echo "<script>alert('로그인되었습니다.'); location.href='../page/hansi_main.php';</script>";
	}
	else{
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>
<meta charset="utf-8" />
