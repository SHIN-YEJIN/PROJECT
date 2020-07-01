<?php

include_once( "db_info.php" ); 

$table = $_POST['table'];
$title = $_POST['title'];
$article = $_POST['article'];
$article = addslashes( $article );
$conn = mysqli_connect( db_url, db_id, db_pass , db_name );

// 일반 게시판의 경우 로그인 되어 있는지 확인한다. write.php 에서도 이미 확인을 하였지만, 2중으로 확인하도록 하였다.
if( $table == "board1"){
  session_start();
  if( !isset($_SESSION["name"]) ){ echo "no_name"; return; }
  $name = $_SESSION["name"];
}

// 게시물을 테이블에 입력한다.
if( $table == "board1") $sql = "INSERT INTO $table (title,article,name) values ( '$title','$article','$name');";
if( $table == "board2") $sql = "INSERT INTO $table (title,article) values ( '$title','$article');";
$query = mysqli_query( $conn , $sql );
if( $query ){ echo "inserted"; }
else { echo mysqli_error($conn); }


mysqli_close($conn);

?>
