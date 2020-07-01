<?php
	include "../connect_db.php";
  $id = $_POST['id'];
  $score = $_POST['score'];
  if($score== ""){
  echo '<script> alert("점수를 얻은 뒤 제출하세요"); history.back(); </script>';

  }
  else{
  //  $id = $_POST['id'];
    //$score = $_POST['score'];
    $sql = "SELECT * FROM account_score WHERE id ='".$id."'";
    $sql = $connect->query($sql);
    $result = $sql->fetch_array();
    $scoreplus = $result["score"] + $score;
    $sql = "UPDATE account_score SET score='".$scoreplus."' WHERE id ='".$id."'";
    $scoreresult = $connect->query($sql);
    if($scoreresult){
        echo "<script>alert('회원님의 총점수는".$scoreplus."입니다.'); history.back();</script>";
    }

  }

?>
