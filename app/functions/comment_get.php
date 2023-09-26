<?php

  $comment_array = array(); // execute 함수를 저장하기 위한 변수

  /* comment데이터를 테이블로 부터 가져오기  */
  $sql = "SELECT * FROM comment";
  $statement = $pdo->prepare($sql);
  $statement->execute(); // execute : 실행하다

  $comment_array = $statement;
  // var_dump($comment_array->fetchAll());


  

  