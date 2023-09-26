<?php

  // 데이터 베이스 연결 시키기  
  include_once("./app/database/connect.php");
  
  // 게시글 추가하기 
  include("app/functions/comment_add.php");

  // 데이터 베이스에서 스레드값 가져오기
  include("app/functions/thread_get.php");                                           
  // var_dump($thread_array);

?>
 
<?php foreach ($thread_array as $thread) :?>

 <!-- 🟢スレッド＿エリア -->
 <div class="threadWrapper">
    <div class="childWrapper">
      <div class="threadTitle">
        <span>【タイトル】</span>
        <h1><?php echo $thread["title"] ?></h1>
      </div>

      <?php include("commentSection.php"); ?> <!-- 작성된 게시글 표시  -->

      <?php include("commentForm.php"); ?> <!-- 게시글 작성 form -->

    </div> 
  </div>
<?php endforeach ?>






