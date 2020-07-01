<?php include("head.php") ?>

<h2>
<?php
  // 로그인 되어 있는지 확인한다.
    session_start();
    //if( !isset($_SESSION["id"]) ) echo "로그인 정보 없음";
    //else echo "로그인 됨 : ".$_SESSION["id"];
?>
</h2>
<!--<div class="button" id="write_board1" onclick="location.href='login.php'">가상 로그인 / 로그아웃</div>-->

<h2>매칭 게시판</h2>
<div id="board1" class="board" ></div>
<div class="button" id="write_board1" onclick="location.href='write.php?table=board1'">글쓰기</div>

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
