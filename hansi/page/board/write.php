<?php include("head.php") ?>

<h2 style="margin-top:50px; margin-bottom:20px;">
<?php 
$tablesave = $_GET['table'] ;
if($tablesave == "board1") {
  echo "매칭 게시판에 글 작성";
}
if($tablesave == "board2") {
  echo "익명 게시판에 글 작성"; 
}
?></h2>

<input type="text" id="title"></div>
<textarea id="article"></textarea>
<div class="button" id="submit" >게시물 입력</div>

<script>

// 로그인 여부를 확인하여 로그인 되어 있지 않으면 되돌아 간다.
var login = '<?php session_start(); if( isset($_SESSION["id"]) ) echo $_SESSION["id"]; else echo ""; ?>';
var table = '<?php echo $_GET['table'] ?>';
if( login == "" && table == "board1"){
  alert("로그인을 먼저 해야 합니다.");
  location.href="index.php";
}

// 게시물 입력 버튼을 클릭 하였을때
submit.addEventListener("click",click_event)
function click_event(e){
  if( e.currentTarget == submit ){
    $.ajax({ type : "POST",  url : "db_write.php", dataType : "text",
          data: { table:'<?php echo $_GET['table'] ?>', title:title.value, article:article.value, name:"임시 닉네임" } ,
          error : function(){ alert('ajax failed submit');  },
          success : function(e){
            if( e == "inserted"){ location.href="index.php"; }
            else if( e == "no_id"){ alert("로그인 정보가 없습니다"); location.href="index.php"; }
            else  alert(e);
       }
     });
  }
}


</script>



<?php include("footer.php") ?>
