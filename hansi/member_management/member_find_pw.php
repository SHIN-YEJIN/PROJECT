<?php
	include "../connect_db.php";
//  if(isset($_SESSION['id'])){
//    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
//  }
//  else{
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>비밀번호 찾기</title>
<style>
  body{
    background-color:#FAFAFA;
  }
  h1{
    color:#58ACFA;
    font-size:2em;
    text-align:center;
    text-shadow:0px 0px 3px black;
  }
	a{
		text-decoration: none;
		color:#58ACFA;
	}
	a:visited {
		color:#58ACFA;
	}
  fieldset{
    border:1px solid gray;
    width:100px;
    margin:0 auto;
  }
  .inph{
    font-size:15px;
    border:1px solid gray;
    height:30px;
  }
  td{
    height:30px;
    font-size:12px;
  }
  .question{
    font-weight:bold;
  }
</style>
</head>
<body>
  <br><br><br><br>
  <div id="login_box">
  <br>
	<h1><a href="http://hanbatsignal.online:99/index.php">HANBAT SIGNAL</a></h1>
	 <form method="post" action="/member_management/member_find_pw_ok.php">
     <fieldset>
     <legend align="center">비밀번호 찾기</legend>
      <table align="center" border="0" cellspacing="0">
        <tr>
          <td class="question">학번</td>
        </tr>
        <tr>
          <td><input type="text" size="26" name="id" class="inph"></td>
        </tr>
        <tr>
          <td class="question">이름</td>
        </tr>
        <tr>
          <td><input type="text" size="26" name="name" class="inph"></td>
        </tr>
        <tr>
          <td class="question">출생년도</td>
        </tr>
        <tr>
          <td><input type="text" size="26" name="birth" class="inph" placeholder="예)1993"></td>
        </tr>
        <tr>
          <td class="question">이메일</td>
        </tr>
        <tr>
          <td><input type="email" size="26" name="email" class="inph" placeholder="예)id@host"></td>
        </tr>
      </table>
     </fieldset>
     <table align="center">
       <tr>
         <td><input type="submit" value="비밀번호 찾기" /></td>
       </tr>
     </table>
    </form>
  </div>
</body>
</html>
<?php
//}
?>
