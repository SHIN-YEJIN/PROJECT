<?php
	include "../connect_db.php";
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    * {
      padding: 0;
      margin: 0;
    }

    canvas {
      background: #eee;
      display: block;
      margin: 0 auto;
    }
  </style>
  <canvas id="myCanvas" width="500" height="400"></canvas>
  <script>
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "/media/HanSilogo.png";
    var ballRadius = 15;
    var dx =8;
    var dy = -8;
    var dx2 = 8;
    var dy2 = -8;
    var x = 0;
    var y = 0;
    var x2 = 0;
    var y2 = 0;
    var paddleHeight = 35;
    var paddleWidth = 35;
    var paddleX = (canvas.width - paddleWidth) / 2;
    var paddleY = (canvas.height - paddleHeight) / 2;
    var rightPressed = false;
    var leftPressed = false;
    var upPressed = false;
    var downPressed = false;
    var enterPressed = false;
    var score = 0;
    var lives = 2;
    var number = 0;
    var start = 0;
    var send=true;


    window.onload = function() {

      document.addEventListener("keydown", keyDownHandler, false);
      document.addEventListener("keyup", keyUpHandler, false);

      //마우스 이벤트 , 터치 이벤트 등록하기
      setInterval(draw, 15);
    }

    function setxy(num) {
      if (num == 0) {
        x = Math.floor(Math.random() * canvas.width);
        y = Math.floor(Math.random() * canvas.height);
        x2 = Math.floor(Math.random() * canvas.width);
        y2 = Math.floor(Math.random() * canvas.height);
      }
      number++;
    }
		function cancel(){
			location.href="/page/Game_choose.php";
		}
    function restart(){
      start=0;
      document.location.reload();
    }
    function drawBall() {
      ctx.beginPath();
      ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
      ctx.fillStyle = "#0095DD";
      ctx.fill();
      ctx.closePath();
    }

    function drawBall2() {
      ctx.beginPath();
      ctx.arc(x2, y2, ballRadius, 0, Math.PI * 2);
      ctx.fillStyle = "#0095DD";
      ctx.fill();
      ctx.closePath();
    }

    function drawScore() {
      ctx.font = "16px Arial";
      ctx.fillStyle = "#0095DD";
      sscore = parseInt(score);
      ctx.fillText("Score: " + sscore, 8, 20);
    }

    function drawLives() {
      ctx.font = "16px Arial";
      ctx.fillStyle = "#0095DD";
      ctx.fillText("Lives: " + lives, canvas.width - 65, 20);
    }

    /*
    function mouseMoveHandler(e) {
        var relativeX = e.clientX - canvas.offsetLeft;
        var relativeY = canvas.offsetTop-e.clientY;
        if(relativeX > 0 && relativeX < canvas.width) {
            paddleX = relativeX - paddleWidth/2;
        }
        if(relativeY > 0 && relativeY < canvas.height) {
            paddleY = relativeY - paddleheight/2;
        }
    }*/

    function keyDownHandler(e) {
      if (e.keyCode == 39) {
        rightPressed = true;
      } else if (e.keyCode == 37) {
        leftPressed = true;
      } else if (e.keyCode == 38) {
        upPressed = true;
      } else if (e.keyCode == 40) {
        downPressed = true;
      } else if (e.keyCode == 13) {
        enterPressed = true;
        if(start==0){
            start =1;
        }

      }
    }

    function keyUpHandler(e) {
      if (e.keyCode == 39) {
        rightPressed = false;
      } else if (e.keyCode == 37) {
        leftPressed = false;
      } else if (e.keyCode == 38) {
        upPressed = false;
      } else if (e.keyCode == 40) {
        downPressed = false;
      } else if (e.keyCode == 13) {
        enterPressed = false;
      }
    }

    function drawPaddle() {
      ctx.drawImage(img, paddleX, paddleY, paddleWidth, paddleHeight);
    }

    function draw() {
      //start=2;
     if (start==0) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.font = "30px Arial";
        ctx.fillStyle = "#0095DD";
        ctx.fillText("HANSI Ball Game", 120, 150);
        ctx.font = "15px Arial";
        ctx.fillText("Press 'Enter' Start", 175, 230);
      }
      else if(start==2){
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.font = "30px Arial";
        ctx.fillStyle = "black";
        ctx.fillText("GameOver", 180, 150);
        ctx.font = "15px Arial";
        ctx.fillText("Your Score : "+sscore, 200, 220);
        if(send){
          document.fm.submit();
          send=false;
        }
      }
      else {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        //pressStart();
        setxy(number);
        drawBall();
        drawBall2();
        drawPaddle();
        drawScore();
        drawLives();
        score += 0.6;
        if (x + dx > canvas.width - ballRadius || x + dx < ballRadius) {
          dx = -dx;
        }
        if (y + dy > canvas.height - ballRadius || y + dy < ballRadius) {
          dy = -dy;

        }
        if (x2 + dx2 > canvas.width - ballRadius || x2 + dx2 < ballRadius) {
          dx2 = -dx2;
        }
        if (y2 + dy2 > canvas.height - ballRadius || y2 + dy2 < ballRadius) {
          dy2 = -dy2;

        }

        if (x > paddleX && x < paddleX + paddleWidth && y > paddleY && y < paddleY + paddleHeight) {
          lives--;
          if (!lives) {
            //alert("GAME OVER\nscore:" + sscore);
          //  document.location.reload();
          draw();
          document.getElementById("score").value=sscore;
          start=2;
          } else {
            setxy(0);
            dx = 8;
            dy = -8;
            dx2 = 8;
            dy2 = -8;
            paddleX = (canvas.width - paddleWidth) / 2;
            paddleY = (canvas.height - paddleHeight) / 2;
          }
        }
        if (x2 > paddleX && x2 < paddleX + paddleWidth && y2 > paddleY && y2 < paddleY + paddleHeight) {
          lives--;
          if (!lives) {
            //alert("GAME OVER\nscore:" + sscore);
            //document.location.reload();
            draw();
            document.getElementById("score").value=sscore;
            start=2;
          } else {
            setxy(0);
            dx = 8;
            dy = -8;
            dx2 = 8;
            dy2 = -8;
            paddleX = (canvas.width - paddleWidth) / 2;
            paddleY = (canvas.height - paddleHeight) / 2;
          }
        }

        if (rightPressed && paddleX < canvas.width - paddleWidth) {
          paddleX += 7;
        } else if (leftPressed && paddleX > 0) {
          paddleX -= 7;
        } else if (upPressed && paddleY > 0) {
          paddleY -= 7;
        } else if (downPressed && paddleY < canvas.height - paddleHeight) {
          paddleY += 7;
        }
        x2 += dx2;
        y2 += dy2;
        x += dx;
        y += dy;
      }
    }

  </script>

</head>

<body>
  <div>
    <form id="sendsc" action="sendscore.php" method="post" name="fm">
      <input id="score" type="hidden" name="score">
<?php
	$id = $_SESSION['id'];
	echo ("<input type='hidden' name='id' value='".$id."' />");
?>

    </form>
    <button id="restart" type="button" name="button" onclick="restart()">재시작</button>
    <button id="cancel" type="button" name="button" onclick="cancel()">창닫기</button>
  </div>
</body>

</html>
