<?php
	include "../connect_db.php";
	include "../password.php";

	$id = $_POST['id'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$name = $_POST['name'];
	$birth = $_POST['birth'];
	$gender = $_POST['gender'];
	//$email = $_POST['email'].'@'.$_POST['emadress'];
	$email = $_POST['email'];

	$q_gender = $_POST['q_gender'];
	$q_character = $_POST['q_character'];
	$q_character_partner = $_POST['q_character_partner'];
	$q_type = $_POST['q_type'];
	$q_date = $_POST['q_date'];
	$q_age_partner = $_POST['q_age_partner'];
	$q_anniversary = $_POST['q_anniversary'];
	$q_smoke = $_POST['q_smoke'];
	$q_smoke_partner = $_POST['q_smoke_partner'];
	$q_drink = $_POST['q_drink'];

	$score = 0;

 	$sql = "INSERT INTO account_info (id,password,name,birth,gender,email) values('".$id."','".$password."','".$name."','".$birth."','".$gender."','".$email."')";
	$sql2 = "INSERT INTO account_like (id,name,birth,gender,q_gender,q_character,q_character_partner,q_type,q_date,q_age_partner,q_anniversary,q_smoke,q_smoke_partner,q_drink) values('".$id."','".$name."','".$birth."','".$gender."','".$q_gender."','".$q_character."','".$q_character_partner."','".$q_type."','".$q_date."','".$q_age_partner."','".$q_anniversary."','".$q_smoke."','".$q_smoke_partner."','".$q_drink."')";
	$sql3 = "INSERT INTO account_score (id, score) values('".$id."', '".$score."')";
	mysqli_query($connect, $sql);
	mysqli_query($connect, $sql2);
	mysqli_query($connect, $sql3);
?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">
