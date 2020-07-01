<?php

/*
로그인 세션을 확인한다. 로그인 되지 않았다면 로그인 하고, 로그인 되어 있으면 로그아웃한다.
마치고 나면 메인페이지로 돌아간다.
*/

session_start();
if( isset($_SESSION["id"]) ) unset($_SESSION['id']);
else $_SESSION["id"] ="id001";
echo "<script>location.href='index.php'</script>";
?>
