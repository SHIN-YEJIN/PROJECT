<?php
	include "connect_db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>한밭시그널 : 로그인</title>
  <link rel="stylesheet" type="text/css" href="/css/common.css" />
  <style>
		body{
			background-color:#FAFAFA;
		}
    #login_box{
			box-sizing: border-box;
      width:100%;
      height:50%;
      border:solid 1px white;
      background-image:url("media/index1_3.png");
			background-size:cover;
			background-position: center center;
			opacity:;
    }
    h1{
      color:#58ACFA;
			font-size:2em;
      text-align:center;
      text-shadow:0px 0px 3px gray;
    }
    td{
      height:40px;
    }
    .inph{
      font-size:15px;
      border:1px solid gray;
			height:30px;
    }
    .signin{
      font-size:12px;
    }
		a{
			color:gray;
		}
    a:visited{
      color:gray;
    }
    a:hover{
      color:#58ACFA;
    }
    #btn{
      width:240px;
      height:30px;
      color:white;
      background-color:#58ACFA;
      border:none;
      font-size:15px;
      font-weight:bold;
    }
  </style>
</head>
<body>
	<br><br><br><br>
	<div id="login_box">
    <br><br><br><br><br>
		<h1>HANBAT SIGNAL</h1>
		<form method="post" action="/member_management/login_ok.php">
			<table align="center" border="0" cellspacing="0" width="400">
        <tr>
          <td align="center">
          <input type="text" size="26" name="id" class="inph" placeholder="학번">
          </td>
        </tr>
        <tr>
          <td align="center">
        	<input type="password" size="26" name="password" class="inph" placeholder="비밀번호">
          </td>
        </tr>
        <tr>
          <td align="center">
          <button type="submit" id="btn">로그인</button>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center" class="signin">
					<a href="/member_management/member_find_id.php">아이디</a>&nbsp;
					<a href="/member_management/member_find_pw.php">비밀번호 찾기</a>&nbsp;&nbsp;
					<a href="/member_management/membership.php">회원가입</a>
          </td>
        </tr>
      </table>
     <form>
    </div>
</body>
</html>
