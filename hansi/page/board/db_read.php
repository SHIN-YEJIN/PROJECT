<?php

include_once( "db_info.php" );

$table = $_POST['table'];
$id = $_POST['id'];
$conn = mysqli_connect( db_url, db_id, db_pass , db_name );
$s="";


// 게시물 목록 로드 : 아이디가 -1 이면 전체 게시물을 모두 불러온다. 본문은 echo 하지 않는다.
if( $id == -1 ){
   $sql = "SELECT * FROM $table";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
     while( $row = mysqli_fetch_assoc($result) ) {
       $s.="<span>";
       $s.="<p>".$row["id"]. "</p> ";
       if( isset($row["name"])) $s.="<p>".$row["name"]. "</p>";
       $s.="<p>".$row["title"]. "</p>";
       $s.="</span>";
     }
   }

 }
else{

  // 게시물 내용 로드 : 아이디 값에 해당하는 게시물을 읽어온다. 본문도 echo 한다.
  $sql = "SELECT * FROM $table WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while( $row = mysqli_fetch_assoc($result) ) {
      $s.="<span>";
      $s.="<p>".$row["id"]. "</p> ";
      if( isset($row["name"])) $s.="<p>".$row["name"]. "</p>";
      $s.="<p>".$row["title"]. "</p>";
      $s.="<p style='height:300px;'>".$row["article"]. "</p>";
      $s.="</span>";
    }
  }
}




echo $s;
mysqli_close($conn);

?>
