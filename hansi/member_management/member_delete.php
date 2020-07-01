<?php
  include "../connect_db.php";

  $id = $_SESSION['id'];
  $sql = "DELETE FROM account_info WHERE id = '".$id."'";
  $sql2 = "DELETE FROM account_like WHERE id = '".$id."'";
  $sql3 = "DELETE FROM account_score WHERE id = '".$id."'";

  $result = mysqli_query($connect, $sql);
  $result2 = mysqli_query($connect, $sql2);
  $result3 = mysqli_query($connect, $sql3);

  echo "<script>alert('정상적으로 탈퇴되었습니다.'); location.href='/index.php';</script>";
 ?>
