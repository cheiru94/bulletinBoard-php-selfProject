
<?php
 // 데이터 베이스에서 comment값 가져오기
 include("app/functions/comment_get.php");
 // var_dump($comment_array);
?>


<section>
  <!-- $comment_array는 comment_get.php에서 가져옴 -->
  <?php foreach($comment_array as $comment) :?>  
    <?php if ($thread["id"] == $comment["thread_id"]) :?> <!-- 重要:　$thread["id"] $comment["thread_id"] 어디서 가져온 것들? -->
    <article>
        <div class="wrapper">
          <div class="nameArea">
            <span>名前 : </span>
            <p class="username"><?php echo $comment["username"] ?></p>
            <time> :<?php echo $comment["post_date"] ?></time>
          </div>
          <p class="comment"><?php echo $comment["body"] ?></p>
        </div>
    </article>
  <?php endif ?>
  <?php endforeach ?>
</section>


