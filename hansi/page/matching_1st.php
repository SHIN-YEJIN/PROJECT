
<?php
  include "../connect_db.php";

   $id = $_SESSION['id'];
   $i_sql = "SELECT * FROM account_like WHERE id ='".$id."'";
   $p_sql = "SELECT * FROM account_like WHERE id !='".$id."'";
   $i_result = mysqli_query($connect, $i_sql);
   $p_result = mysqli_query($connect, $p_sql); //나와 상대방의 테이블 검색

   $member = mysqli_fetch_object($i_result);//나의 객체
   $num = mysqli_num_rows($p_result);

   for($i=0;$i<$num;$i++){
      $partner[$i] = mysqli_fetch_object($p_result);//상대 객체배열 만들기
      $w[$i] = 0;//가중치 저장배열

      if($member->q_gender=="상관없다")
      {
         if($partner[$i]->q_gender!="상관없다")
               if($partner[$i]->p_gender!=$member->gender)
                    continue;
      }
      else
        if($partner[$i]->gender!=$member->q_gender)
             continue; //선호하는 성별


      if($member->q_character_partner=="상관없다")
         $w[$i] += 30;
      else
         if($partner[$i]->q_character==$member->q_character_partner)
            $w[$i] += 30;//선호하는 성격


      if($member->q_type==$partner[$i]->q_type)
         $w[$i] += 15;//활동유형이 같을 경우


      if($member->q_date==$partner[$i]->q_date)
         $w[$i] += 15;
      else if($member->q_date=="카페")
      {
         if($partner[$i]->q_date=="영화관")
            $w[$i] += 10;
         elseif($partner[$i]->q_date=="pc방")
            $w[$i] += 5;
      }
      else if($member->q_date=="영화관")
      {
         if($partner[$i]->q_date=="카페")
            $w[$i] += 10;
         elseif($partner[$i]->q_date=="pc방")
            $w[$i] += 5;
      }
      else if($member->q_date=="pc방")
      {
         if($partner[$i]->q_date=="영화관")
            $w[$i] += 10;
         elseif($partner[$i]->q_date=="경기장")
            $w[$i] += 5;
      }
      else
      {
         if($partner[$i]->q_date=="pc방")
            $w[$i] += 10;
         elseif($partner[$i]->q_date=="카페")
            $w[$i] += 5;
      }//선호하는 데이트 장소


      if($member->q_age_partner=="동갑")
          if($member->birth==$partner[$i]->birth)
              $w[$i]+=30;
          else
              $w[$i]+=20;
      else if($member->q_age_partner=="연상")
         if($member->birth>$partner[$i]->birth)
            $w[$i]+=30;
          else
            $w[$i]+=20;
      else if($member->q_age_partner=="연하")
         if($member->birth<$partner[$i]->birth)
            $w[$i]+=30;
         else
            $w[$i]+=20;//선호하는 연령


      if($member->q_anniversary==$partner[$i]->q_anniversary)
         $w[$i] += 20;
      else
         $w[$i] += 10;//기념일 여부


      if($member->q_smoke_partner=="상관없음")
      {
         if($partner[$i]->q_smoke_partner=="상관없음")
            $w[$i] += 30;
         else
            if($member->q_smoke="아니다")
               $w[$i] += 30;
      }
      else
         if($partner[$i]->q_smoke=="아니다")
            $w[$i] += 30;// 흡연 여부


      if($member->q_drink==$partner[$i]->q_drink)
         $w[$i] += 25;
      else if($member->q_drink=="0")
         if($partner[$i]->q_drink=="1")
            $w[$i] += 15;
      else if($member->q_drink=="1")
      {
         if($partner[$i]->q_drink=="0")
            $w[$i] += 15;
         else if($partner[$i]->q_drink=="2")
            $w[$i] += 10;
      }
      else if($member->q_drink=="2")
      {
         if($partner[$i]->q_drink=="1")
            $w[i] += 15;
         else if($partner[$i]->q_drink=="3")
            $w[$i] += 10;
      }
      else
         if($partner[$i]->q_drink=="2")
            $w[$i] += 15;//음주 여부
   }

   $max = 0;
   for($i=1;$i<$num;$i++)
      if($w[$i]>$w[$max])
         $max = $i;
    $per = round($w[$max]/165*100);
?>
<!DOCTYPE html>
<html>
<head>
  <title>한시 프로젝트</title>
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
      height: 900px;
      line-height: 5px;
      top: 760px;
      text-align: center;
      padding-top:100px;
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
    #mbbtn {
      align: center;
      padding-top: 40px;
      margin-left: 400px;
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
    #partner{
      margin-top:100px;
      padding-top:70px;
      height: 200px;
      background-color: #CEECF5;

    }
    #partnerinfo{
      font-size: 35px;
    }
    #partnerinfo2{
      font-size: 20px;
    }
    #bit{
      font-size: 70px;
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
          <li><a href="Game_choose.php">PLAY GAME</a></li>

        </ul>
      </nav>
      <a href=".html" target="search">
        <img id=heart src="/media/heart.png" width="500" height="250"></img></a>

      <nav class=menumain>
        <h1 id="bit">매칭 결과</h1>
        <div id="partner">
          <?php
            echo "<br><br><br>";
            echo "<h1 id='partnerinfo'>".$partner[$max]->name."</h1>";
            echo "<h1 id='partnerinfo2'>".$partner[$max]->id."</h1>";
            echo "<h1 id='partnerinfo2'>매칭률 : ".$per." %</h1>";
           ?>
        </div>
        <a href="matching_board.php"><img id="mbbtn" src="/media/mbbtn.png"></img></a>

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
