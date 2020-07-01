<?php include("head.php") ?>


<div id="result"></div>


<div id="comment">
  <div id="comment_read">
  </div>
  <div id="comment_write">
    <input type="text" id="comment_input"/>
    <div class="button" onclick="comment_click(this);">댓글 작성</div>
  </div>
</div>

<div class="button" onclick="location.href='index.php'">이전으로</div>
<div class="button" onclick="location.href='db_delete.php?table=<?php echo $_GET['table'] ?>&id=<?php echo $_GET['id'] ?>
  '">글 삭제</div>

<script>

// 게시물 내용을 가져와서 result 엘리먼트에 표시한다.
$.ajax({ type : "POST",  url : "db_read.php", dataType : "text",
      data: { table:'<?php echo $_GET['table'] ?>',id:<?php echo $_GET['id'] ?>} ,
      error : function(){ alert('ajax failed board2_refresh');  },
      success : function(e){ result.innerHTML = e; }
 });

// 댓글 작성 버튼 클릭시, 댓글 등록
function comment_click(e){
  comment_load('insert');
}

function comment_load( sql_type ){

  $.ajax({ type : "POST",  url : "db_comment.php", dataType : "text",
        data: { table_name:'<?php echo $_GET['table'] ?>',post_id:<?php echo $_GET['id'] ?>,
        sql_type:sql_type, article:comment_input.value , name:"임시닉네임"},
        error : function(){ alert('ajax failed comment_click');  },
        success : function(e){
          //일반 게시판에서 비로그인 상태로 댓글을 등록하려 한 경우
          if( e == "no_id"){ alert("비로그인 사용자는 이 게시판에 댓글을 달 수 없습니다."); return;}
          //댓글 등록하고, 댓글 목록 가져와서 등록
          comment_input.value = "";
          comment_read.innerHTML = e;
        }
   });
}

comment_load('read');




</script>



<?php include("footer.php") ?>
