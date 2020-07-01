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
      padding-top: 30px;
      margin-left: 590px;
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
      height: 900px;
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

		* { padding:0; margin:0; position:relative; box-sizing:border-box;  font-size:14px;  }
		body { margin:200px; padding:100px; margin-top:20px; padding-top:50px; background: #fff;}
		input , textarea { display:block; width:100%; margin-bottom:10px; padding:10px; }
		.button { background: linear-gradient(#fff,#ccc); border:1px solid #777; text-align: center; cursor:pointer;
		   padding:7px; margin-top:5px; font-size:12px; display: inline-block; }
		#article { height:300px; }

		h2 { margin-top:100px; color:#A7A; margin-bottom:10px;}
		h2:first-child { margin-top:0; }

		.board {  margin-bottom:5px; background:#f2f2f2; padding:5px; }
		.board span { display:block; background:#fff; padding:5px; margin:3px; border-bottom: 1px solid #aaa;}
		.board span:hover { background:#def; cursor:pointer;}
		.board span p { display:inline-block; margin-right:10px;}

		#result { background:#eee; padding:10px; }
		#result p{ display::block; background:#fff; margin-bottom:10px; padding:10px; }


		p {  -webkit-touch-callout: none;    -webkit-user-select: none;     -khtml-user-select: none;
		        -moz-user-select: none;        -ms-user-select: none;  user-select: none;  }

		#comment { margin:30px; padding:30px; border-top:1px dotted #888;}
		#comment_read span { display:block; border-bottom:1px dotted #aaa; margin-bottom:5px; padding:5px;  }
		#comment_read p { display:inline-block;  }
		#comment_read p:first-child { margin-right:20px; font-size:14px; font-weight:bold;  }
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
          <li><a href="a">COMMUNITY</a></li>
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

				<?php include("head.php") ?>

				<h2>
				<?php
				  // 로그인 되어 있는지 확인한다.
				    session_start();
				    if( !isset($_SESSION["id"]) ) echo "로그인 정보 없음";
				    else echo "로그인 됨 : ".$_SESSION["id"];
				?>
				</h2>
				<!--<div class="button" id="write_board1" onclick="location.href='login.php'">가상 로그인 / 로그아웃</div>-->


				<h2>게시판</h2>
				<div id="board1" class="board" ></div>
				<div class="button" id="write_board1" onclick="location.href='write.php?table=board1'">글쓰기</div>

				<h2>익명게시판</h2>
				<div id="board2" class="board"></div>
				<div class="button" id="write_board2" onclick="location.href='write.php?table=board2'">글쓰기</div>


				<h2>메일발송</h2>
				<input type="text" id="title"></div>
				<textarea id="article"></textarea>
				<div class="button" id="mail_submit" onclick="click_event(this);">메일 발송</div>


				<script>


				// 게시판 1 , 게시판 2의 목록을 가져와서 표시해준다. 번호/작성자(익명은 없음)/제목만 표시하고, 본문은 표시하지 않는다.
				function board1_refresh(){
				  $.ajax({ type : "POST",  url : "db_read.php", dataType : "text",
				        data: { table:'board1',id:-1} ,
				        error : function(){ alert('ajax failed board1_refresh');  },
				        success : function(e){ board1.innerHTML = e; }
				   });
				}
				function board2_refresh(){
				  $.ajax({ type : "POST",  url : "db_read.php", dataType : "text",
				        data: { table:'board2',id:-1} ,
				        error : function(){ alert('ajax failed board2_refresh');  },
				        success : function(e){ board2.innerHTML = e; }
				   });
				}
				board1_refresh();
				board2_refresh();


				board1.addEventListener('click',click_event)
				board2.addEventListener('click',click_event)
				function click_event(e){

				  // 메일발송을 클릭하였을때
				  if( e == mail_submit ){
				    $.ajax({ type : "POST",  url : "mail.php", dataType : "text",
				          data: { subject:title.value,content:article.value} ,
				          error : function(){ alert('ajax failed mail');  },
				          success : function(e){  alert(e); title.value =""; article.value=""; }
				     });
				    return;
				  }

				  // 게시판의 게시물을 클릭했을때 read.php 로 이동한다.
				  if( e.target == e.currentTarget ) return
				  var span;
				  if( e.target.tagName == "P") span = e.target.parentNode;
				  if( e.target.tagName == "SPAN") span = e.target
				  location.href = 'read.php?table='+span.parentNode.id + "&id=" +  span.children[0].innerText;

				}

				</script>



				<?php include("footer.php") ?>
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
