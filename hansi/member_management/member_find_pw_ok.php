<?php
  include "../connect_db.php";

  if($_POST["id"] == "" || $_POST["name"] == "" || $_POST["birth"] == "" || $_POST["email"] == ""){
		echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
	}
  else{
     $id = $_POST['id'];
	   $name = $_POST['name'];
     $birth = $_POST['birth'];
	   $email = $_POST['email'];

    $sql = "SELECT * FROM account_info WHERE id = '{$id}' && name = '{$name}' && birth = '{$birth}' && email = '{$email}'";
    $sql = $connect->query($sql);
    $result = $sql->fetch_array();

    if($result["id"] == $id){
      $_SESSION['uid'] = $id;
	    echo "<script>alert('비밀번호를 변경합니다.'); location.href='member_update_pw.php';</script>";
    }
    else{
      echo "<script>alert('가입되지 않은 사용자입니다.'); history.back();</script>";
    }
  }
?>
