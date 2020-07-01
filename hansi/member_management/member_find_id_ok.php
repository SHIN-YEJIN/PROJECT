<?php
  include "../connect_db.php";

  if($_POST["name"] == "" || $_POST["email"] == ""){
		echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
	}
  else{
	  $name = $_POST['name'];
	  $email = $_POST['email'];

    $sql = "SELECT * FROM account_info WHERE name = '{$name}' && email = '{$email}'";
    $sql = $connect->query($sql);
    $result = $sql->fetch_array();

    if($result["name"] == $name){
	     echo "<script>alert('회원님의 학번은 ".$result['id']."입니다.'); history.back();</script>";
    }
    else{
       echo "<script>alert('가입되지 않은 사용자입니다.'); history.back();</script>";
    }
  }
?>
