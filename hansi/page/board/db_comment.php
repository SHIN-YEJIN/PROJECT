<?php

include_once( "db_info.php" );

$type = $_POST["sql_type"];
$post_id = $_POST["post_id"];
$table_name = $_POST['table_name'];
$article = $_POST['article'];
$article = addslashes( $article );
$conn = mysqli_connect( db_url, db_id, db_pass , db_name );


// 댓글을 테이블에 입력한다.
if( $type == "insert"){

  // 일반 게시판의 경우 로그인 되어 있는지 확인한다.
  if( $table_name == "board1"){
    session_start();
    if( !isset($_SESSION["name"]) ){ echo "no_name"; return; }
    $name = $_SESSION["name"];
  }
  if( $table_name == "board2"){
    session_start();
    if( !isset($_SESSION["name"]) ){ echo "no_name"; return; }
    $name = $_SESSION["name"];
  }
  $sql = "INSERT INTO comment (table_name,post_id,article,name) values ( '$table_name',$post_id,'$article','$name');";
  $query = mysqli_query( $conn , $sql );
}

// 댓글을 테이블에서 읽어 온다.
$sql = "SELECT * FROM comment WHERE post_id = $post_id AND table_name = '$table_name';";
$result = mysqli_query($conn, $sql);
$s="";
if (mysqli_num_rows($result) > 0) {
  while( $row = mysqli_fetch_assoc($result) ) {
    $s.="<span>";
    if( $table_name == "board1") $s.="<p>".$row["name"]. "</p>";
    $s.="<p>".$row["article"]. "</p>";
    $s.="</span>";
  }
}

echo $s;
mysqli_close($conn);

?>
