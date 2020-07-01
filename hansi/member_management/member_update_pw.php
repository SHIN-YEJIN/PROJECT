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
<title>비밀번호 변경</title>
<style>
  body{
    background-color:#FAFAFA;
  }
  h1{
    color:FF0040;
    font-size:2em;
    text-align:center;
    text-shadow:0px 0px 3px black;
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
	<h1>HANBAT SIGNAL</h1>
	 <form method="post" action="/member_management/member_update_pw_ok.php">
     <fieldset>
     <legend align="center">비밀번호 변경</legend>
      <table align="center" border="0" cellspacing="0">
        <tr>
          <td class="question">새로운 비밀번호</td>
        </tr>
        <tr>
          <td><input type="password" size="26" name="pw" class="inph"></td>
        </tr>
      </table>
     </fieldset>
     <table align="center">
       <tr>
         <td><input type="submit" value="변경하기" /></td>
       </tr>
     </table>
    </form>
  </div>
</body>
</html>
<?php
//}
?>
