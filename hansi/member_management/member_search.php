<?php
  include "../connect_db.php";

  $id = $_SESSION['id'];
  $sql = "SELECT * FROM account_info WHERE id = '".$id."'";
  $sql2 = "SELECT * FROM account_score WHERE id = '".$id."'";

  $result = mysqli_query($connect, $sql);
  $result2 = mysqli_query($connect, $sql2);
  ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>한밭시그널 : 회원정보</title>
  <link rel="stylesheet" type="text/css" href="/css/common.css" />
  <style media="screen">
      body{
  			background-color:#FAFAFA;
        text-align: center;
  		}
      h1{
        color:#58ACFA;
  			font-size:2em;
        text-align:center;
        text-shadow:0px 0px 3px black;
      }
      a{
  			color:gray;
  		}
      a:visited{
        color:#58ACFA;
      }
      td{
        height:40px;
      }
      .signin{
        font-size:12px;
      }
      #member{
      display: inline-block;
      border:solid;
      padding:10px;
      }
      #delete{
        color:gray;
      }
      #delete:hover{
        color:red;
      }
  </style>
 </head>
 <body>
  <br><br><br><br><br><br>
  <h1><a href="http://hanbatsignal.online:99/page/hansi_main.php">HANBAT SIGNAL</a></h1>
  <br>
   <div id="member">
     <?php
       while($row = mysqli_fetch_array($result)){
         echo "학번 : ".$row['id']."<br>이름 : ".$row['name']."<br>출생년도: ".$row['birth']."<br>성별 : ".$row['gender']."<br>이메일 : ".$row['email']."<br> ";
       }
       while($row = mysqli_fetch_array($result2)){
         echo "점수 : ".$row['score']."<br>";
       }
     ?>
   </div>
   <div>
     	<table align="center" border="0" cellspacing="0" width="400">
        <tr>
          <td colspan="3" align="center" class="signin">
            <a href="/member_management/member_delete.php" id="delete">회원탈퇴</a>
          </td>
        </tr>
      </table>
   </div>

 </body>
 </html>
