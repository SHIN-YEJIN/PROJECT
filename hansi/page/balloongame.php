<?php
	include "../connect_db.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	  <meta charset="UTF-8">
	  <title>풍선 쏘기</title>
	  <script type="text/javascript">
	    var canvasObject;
	    var score = 0;
	    var num = 1;
	    var time = 5;
	    var start =0;
			var send = true;
	    var context;
	    var holes = []; //구멍객체를 담을 배열
	    var logoImage = new Image();
	    logoImage.src = "/media/background1.jpg";
	    //총알 구멍과 스나이프 이미지 로딩
	    var holeImage = new Image();
	    holeImage.src = "/media/hole.png";
	    var snipeImage = new Image();
	    snipeImage.src = "/media/aim.png";
	    //풍선 이미지 6개 로딩
	    var bubbleImg0 = new Image();
	    bubbleImg0.src = "/media/balloon1.png";
	    var bubbleImg1 = new Image();
	    bubbleImg1.src = "/media/balloon2.png";
	    var bubbleImg2 = new Image();
	    bubbleImg2.src = "/media/balloon3.png";
	    var bubbleImg3 = new Image();
	    bubbleImg3.src = "/media/balloon4.png";
	    var bubbleImg4 = new Image();
	    bubbleImg4.src = "/media/balloon5.png";
	    var bubbleImg5 = new Image();
	    bubbleImg5.src = "/media/balloon6.png";


	    //풍선이미지 담을 배열
	    var bubbles = [];

	    // 파편객체 담을 배열
	    var bubbleChip = [];
	    var bubbleImg = bubbleImg0; //초기 풍선 타겟 이미지
	    //효과음 로딩하기
	    var fireSound = new Audio("/media/fire.mp3");
	    var jangSound = new Audio("/media/jang1.mp3");
	    //반동효과를 주기위해서
	    var banY = 0; //y축반동
	    var isJanged = true;
	    //스나이프의 초기좌표
	    var snipeX = 1000;
	    var snipeY = 1000;
	    var targetX = 0,
	      targetY = 0; //풍선의 목표좌표
	    var bubbleX = 100,
	      bubbleY = 100;
	    var moveCount = 0;
	    var deltaX = 0,
	      deltaY = 0;
	    var stepX = 0.0;
	    stepY = 0.0;

	    window.onload = function restart() {
	      initImage(); //풍선 이미지 읽어오기
	      //캔바스 객체 얻어오기
	      canvasObject = document.getElementById("myCanvas");
	      context = canvasObject.getContext("2d");
	      //마우스 이벤트 , 터치 이벤트 등록하기
	      document.body.onmousedown = makeHole;
	      document.body.onmousemove = moveSnipe;
	      setInterval(drawScreen, 50);
	    }

	    //이미지 초기화
	    function initImage() {
	      bubbles[0] = bubbleImg0;
	      bubbles[1] = bubbleImg1;
	      bubbles[2] = bubbleImg2;
	      bubbles[3] = bubbleImg3;
	      bubbles[4] = bubbleImg4;
	      bubbles[5] = bubbleImg5;
	    }

	    //새로운 풍선 만드는 함수
	    function makeNewBubble() {
	      var x = Math.round(Math.random() * 890);
	      var y = Math.round(Math.random() * 500);
	      var imgIndex = Math.floor(Math.random() * 6);
	      bubbleX = x;
	      bubbleY = y;
	      bubbleImg = bubbles[imgIndex];
	      targetX = snipeX;
	      targetY = snipeY;
	      deltaX = targetX - bubbleX;
	      deltaY = targetY - bubbleY;
	      stepX = deltaX / 100.0;
	      stepY = deltaY / 100.0;
	      moveCount = 0;
	    }

	    //풍선파편 만드는 함수
	    function makeBubbleChip() {
	      var chipX = bubbleX;
	      var chipY = bubbleY;
	      score += 20;
	      //파편 10개 만들기
	      for (var i = 0; i < 10; i++) {
	        var chip = {};
	        var speedX = Math.round(Math.random() * 20 - 10);
	        var speedY = Math.round(Math.random() * 20 - 10);
	        var imgIndex = Math.floor(Math.random() * 6);
	        //파편 풍선 연관 배열을 만든후 배열에 담는다.
	        chip.x = chipX;
	        chip.y = chipY;
	        chip.speedX = speedX;
	        chip.speedY = speedY;
	        chip.isDead = false;
	        chip.img = bubbles[imgIndex];
	        bubbleChip[i] = chip;
	      }
	      //풍선 새로 만들기
	      makeNewBubble();
	    }
	    //칩 움직이기
	    function moveChip() {
	      for (var i = bubbleChip.length - 1; i >= 0; i--) { //배열의 뒤에서 부터 검사
	        bubbleChip[i].x += bubbleChip[i].speedX;
	        bubbleChip[i].y += bubbleChip[i].speedY;
	      }
	    }
			function cancel(){
				location.href="/page/Game_choose.php";
			}
	    //풍선 이 맞았는지 검사하기
	    function checkBubble(hole) {
	      if (hole.x > bubbleX - 25 && hole.x < bubbleX + 25 && hole.y > bubbleY - 25 && hole.y < bubbleY + 25) {
	        makeBubbleChip();
	      } else {
	        score -= 10;
	      }
	    }
	    //타겟의 위치로 천천히 움직이게 하는 함수
	    function moveToTarget() {
	      if (moveCount == 100) return;
	      bubbleX += stepX;
	      bubbleY += stepY;
	      moveCount++;
	    }
	    //스나이프 움직이는 함수
	    function moveSnipe(e) {
	      var eventX = e.offsetX;
	      var eventY = e.offsetY;
	      var target = e.target.nodeName;
	      if (target == "CANVAS") {
	        snipeX = eventX;
	        snipeY = eventY;
	        //풍선을 타겟으로 움직이게 하기위한 처리
	        targetX = eventX;
	        targetY = eventY;
	        deltaX = targetX - bubbleX;
	        deltaY = targetY - bubbleY;
	        stepX = deltaX / 100.0;
	        stepY = deltaY / 100.0;
	        moveCount = 0;
	      }
	    }
	    //총알 구멍만들기
	    function makeHole(e) {
	      if(start==0){
	        start=1;
	      }else{
	        var eventX = e.offsetX;
	        var eventY = e.offsetY;
	        var target = e.target.nodeName;
	        if (target == "CANVAS" && isJanged) {
	          //소리 초기화
	          fireSound.currentTime = 0;
	          //소리내기
	          fireSound.play();
	          var hole = {};
	          hole.x = eventX;
	          hole.y = eventY;
	          //생성한 구멍객체 배열에 담기
	          holes.push(hole);
	          //반동주기
	          banY = 50;
	          isJanged = false;
	          //풍선이 맞았는지 검사하기
	          checkBubble(hole);
	        }
	        e.preventDefault();
	      }
	    }
	    //장전소리내기
	    function makeJang() {
	      //소리 초기화
	      jangSound.currentTime = 0;
	      //소리내기
	      jangSound.play();
	    }

	    function restart(){
	      start=0;
	      document.location.reload();
	    }

	    function drawScreen() {
	      context.drawImage(logoImage, 0, 0, 890, 500);
	      if(start==0){
	        context.font = "30px Arial";
	        context.fillStyle = "white";
	        context.fillText("HANSI Balloon Game", 300, 200);
	        context.font = "15px Arial";
	        context.fillText("click Start", 400, 250);
	      }
	      else if(start==2){
	        context.font = "30px Arial";
	        context.fillStyle = "black";
	        context.fillText("GameOver", 370, 200);
	        context.font = "15px Arial";
	        context.fillText("Your Score : "+score, 395, 250);
					if(send){
						document.fm.submit();
						send=false;
					}

	      }
	      else{
	        time -= 0.06;
	        timeint = parseInt(time);
	        context.drawImage(logoImage, 0, 0, 890, 500);
	        context.font = "25px Arial";
	        context.fillStyle = "white";
	        context.fillText("Score: " + score, 8, 30);
	        context.fillText("Time: " + timeint, 770, 30);
	        if (timeint == 0) {
	          if (num == 1) {
	            num -= 1;
	            //alert("GAME OVER\nscore:" + score);
	            //document.location.reload();
	            drawScreen();
	            document.getElementById("score").value=score;
	            start=2;

	          }
	        } else {
	          for (index in holes) {
	            context.drawImage(holeImage, holes[index].x - 10, holes[index].y - 10, 20, 20);
	          }
	          context.drawImage(bubbleImg, bubbleX - 25, bubbleY - 35, 50, 70);

	          for (var i = 0; i < bubbleChip.length; i++) {
	            context.drawImage(bubbleChip[i].img, bubbleChip[i].x - 5, bubbleChip[i].y - 5, 10, 10);
	          }
	          moveChip();
	          context.drawImage(snipeImage, snipeX - 25, snipeY - 25 - banY, 50, 50);
	          moveToTarget();
	          //반동 줄이기
	          if (banY > 0) {
	            banY -= 5;
	            if (banY <= 0) {
	              banY = 0;
	              makeJang();
	              isJanged = true;
	            }
	          }
	        }
	      }
	    }

	  </script>
	</head>

	<body>
	  <div style="margin: auto;">
	    <canvas id="myCanvas" width="890" height="500"></canvas>
	  </div>
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
