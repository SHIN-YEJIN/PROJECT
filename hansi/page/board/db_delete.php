<?php

include_once( "db_info.php" );

$table = $_GET['table'];
$id = $_GET['id'];
$conn = mysqli_connect( db_url, db_id, db_pass , db_name );

// 게시물을 삭제한다. 테이블 이름과 게시물 아이디로 처리한다.
$sql = "DELETE FROM $table WHERE id=$id";
$query = mysqli_query( $conn , $sql );
if( $query ){ echo "<script>location.href='index.php'</script>"; }
else { echo mysqli_error($conn); }


mysqli_close($conn);

?>
