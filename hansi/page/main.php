<?php
	include "../connect_db.php";
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>메인페이지</title>
</head>
<body>
	<form method="post" action="/page/matching_1st.php">
	<?php
		if(isset($_SESSION['id'])){
			echo "<h2>{$_SESSION['id']} 님이 로그인하셨습니다.</h2>";

			//	$userid=$_SESSION['id']

			/*
			if($_SESSION['service']=='1'){
				echo "<h2>도어락을 제어하겠습니다.</h2>";

			}
			else{
				echo "<h2>제어권한이 없습니다.</h2>";
			}
			*/
	?>
	<a href="http://cocky-wing-d49626.netlify.com/">게임 1 시작</a><br>
	<a href="https://musing-kepler-795877.netlify.com/">게임 2 시작</a><br>
  <input type="hidden" name="id" value = '20161703'>
	<button type="submit" hi="btn">매칭하기</button>
	<!--<a href="/page/matching_1st.php">매칭하기</a><br> -->
	<a href="/member/logout.php"><input type="button" value="Logout" /></a>

	<?php
		}
		else{
			echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
		}
	?>
</body>
</html>
