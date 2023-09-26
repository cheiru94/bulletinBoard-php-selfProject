<!-- 유효성 검사 ,  에러 나타내기 -->

<?php if (isset($error_message)) :?> <!-- 에러 메세지가 들어있다면?  실행 -->
    
  <ul class="errorMessage">
  
    <?php foreach ($error_message as $error) : ?>
      <li><?php echo $error ?></li>
    <?php endforeach; ?>
    
  </ul>

<?php endif; ?>



