<?php
	include "../connect_db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>한시:한밭시그널</title>
  <!--<meta charset="utf-8" name="viewport" content="user-scalable=no, initial-scale=1.0" />-->
  <meta name=viewport content="width=device-width,initial-scale=1">
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      height: 960px;
      position: absolute;
      background-color: #EAEAEA;
    }
    .header {
      width: 100%;
      height: 120px;
      background-image: ;
      /*background:yellow;*/
      font-family: 나눔바른고딕;
      font-size: 50px;
      /*  margin-left: 310px;*/
      background-color: white;
    }
    .header #center {
      align: center;
      padding-top: 25px;
      margin-left: 570px;
    }
    .nav {
      width: 309px;
      height: 1000px;
      float: left;
      background: #EAEAEA;
    }
    .menumain {
      background: white;
      position: absolute;
      width: 900px;
      height: 1300px;
      line-height: 5px;
      top: 760px;
      text-align: center;
    }
    .section {
      width: 900px;
      height: 640px;
      float: left;
      background-image: url(/media/love.png);
      background-repeat: no-repeat;
    }
    .aside {
      width: 309px;
      height: 1000px;
      float: left;
      background: #EAEAEA;
    }
    .footer {
      width: 1518px;
      height: 250px;
      clear: both;
      background: #EAEAEA;
    }
    #menubar {
      background: #FFFFFF;
      position: absolute;
      width: 900px;
      height: 90px;
      line-height: 5px;
      padding-top: 20px;
      top: 670px;
    }
    #menubar ul {
      /*text-align:center;*/
    }
    #menubar ul li {
      display: inline-block;
      list-style: none;
      padding: 0px 30px;
      /*text-align:center;*/
    }
    #menubar ul li a {
      color: black;
      text-decoration: none;
      text-align: center;
      font-family: 나눔바른고딕;
      font-size: 25px;
    }
    #menubar ul li a:hover {
      color: #B2EBF4;
    }
    #board {
      display: inline-block;
      margin: 40px;
      padding: 10px;
      margin-bottom: 0px;
      text-align: center;
    }
    #boardtitle {
      margin-top: 20px;
      font-family: 나눔바른고딕;
      font-size: 15px;
    }
    a {
      font-size: 17px;
    }
    img#game1 {
      width: 300px;
      height: 250px;
      padding-top: 50px;
    }
    img#game2 {
      width: 300px;
      height: 250px;
      padding: 20px;
    }
    img#heart {
      display: inline-block;
      z-index: 5;
      position: absolute;
      left: 506px;
      top: 570px;
    }
    img#heart:hover {
      -webkit-transform: scale(1.2);
      -moz-transform: scale(1.2);
      -ms-transform: scale(1.2);
      -o-transform: scale(1.2);
      transform: scale(1.2);
    }
    p {
      position: absolute;
    }
    .main-wrapper {
      text-align: center;
    }
    .main {
      width: 360px;
      height: 80px;
      line-height: 80px;
      color: black;
      font-size: 40px;
      text-align: center;
      display: inline-block;
      margin: 0 -2px;
      padding-top: 20px;
    }
    .sub {
      width: 100px;
      height: 80px;
      line-height: 80px;
      font-size: 15px;
      text-align: center;
      display: inline-block;
    }
    #headermenu {
      text-decoration: none;
      float: right;
      color: black;
      padding: 5px;
    }
    #headerdiv {
      margin-right: 310px;
    }
    /*  #wrap {
      position: relative;
      margin: 0 auto;
      height: 100%;
      width: 1080px;
    }  */
  </style>
</head>
<body>
  <?php
    if(isset($_SESSION['id'])){
  ?>

  <div id="wrap">
    <header class="header">
      <div id="headerdiv">
        <a id="headermenu" href="/member_management/logout.php">로그아웃</a>
				<a id="headermenu" href="/member_management/member_search.php">회원정보보기</a>
				<a id="headermenu">
				<?php
				echo "{$_SESSION['id']} 님이 로그인하셨습니다.";
				 ?></a>
      </div>
      <img id="center" src="/media/logo.png"></img>
    </header>

    <nav class="nav"></nav>
    <section class="section">

      <p style="color:white; font-size:50px; width:470px; left:560px; top:250px;">"졸업전에 연애하자"</p>
      <p style="color:white; font-size:20px; width:490px; left:550px; top:350px;">연애가 하고싶은 대학생을 위한 연애 매칭 프로그램</p>
      <nav id="menubar">
        <ul>
          <li><a href="hansi_main.php">COMMUNITY</a></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li><a href="Game_choose.php" target="_self">PLAY GAME</a></li>

        </ul>
      </nav>
      <a href="/page/matching_1st.php" target="_self">
        <img id=heart src="/media/heart.png" width="500" height="250"></img></a>
      <nav class=menumain>
        <div id="board">
          <iframe marginwidth="0" frameborder="0" scrolling="no" width="800" height="1000" src="board/index.php"></iframe>
        </div> 
      </nav>
    </section>


    <aside class="aside"></aside>
    <footer class="footer"></footer>
    </wrap>


    <?php
  		}
  		else{
  			echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
  		}
  	?>
</body>
</html>
