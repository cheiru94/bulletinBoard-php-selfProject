<?php

  $thread_array = array(); // execute 함수를 저장하기 위한 변수

  /* thread데이터를 테이블로 부터 가져오기  */
  $sql = "SELECT * FROM thread";  // thread 테이블에 있는거 다가온다 
  $statement = $pdo->prepare($sql); // 실행시킬 준비 시키라
  $statement->execute(); // execute : 실행하다

  $thread_array = $statement ;
  




  