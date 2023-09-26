<?php

$error_message = array();

session_start();

if (isset($_POST["submitButton"])) { // 버튼 눌렀으면 실행

  /* 이름 입력 체크 */
  if (empty($_POST["username"])) { // 값이 비어있다면 실행될 코드
    $error_message["username"] = "お名前を入力して下さい。";
  } else {
    // 이스케이프 처리
    $escaped["username"] = htmlspecialchars($_POST["username"] , ENT_QUOTES);
    $_SESSION['username'] = $escaped["username"];
  }

  /* 코멘트 입력 체크 */
  if (empty($_POST["body"])) { // 값이 비어있다면 실행될 코드
    $error_message["body"] = "コメントを入力して下さい。";
  } else {
    // 이스케이프 처리
    $escaped["body"] = htmlspecialchars($_POST["body"] , ENT_QUOTES);
  }

  if (empty($error_message)) {
    $post_date = date("Y-m-d H:i:s"); // 버튼을 누를 때 마다 해당 되는 날짜 시간이 저장된다

    // 트렌젝션 작동
    $pdo->beginTransaction();

    try{
      $sql = "INSERT INTO `comment` (`username`, `body`, `post_date` ,`thread_id`) VALUES (:username, :body , :post_date , :thread_id);";
      $statement = $pdo->prepare($sql); // PDO클래스 안의 prepare 메소드를 실행 시킨다
       
      // 실제로 값을 설정
      $statement->bindParam(":username" , $escaped["username"] , PDO::PARAM_STR);
      $statement->bindParam(":body" , $escaped["body"] , PDO::PARAM_STR);
      $statement->bindParam(":post_date" , $post_date , PDO::PARAM_STR);
      $statement->bindParam(":thread_id" ,$_POST["threadID"]  , PDO::PARAM_STR);
  
      // 실행
      $statement->execute();

      $pdo->commit();

    } catch(Exception $error) {
      $pdo->rollback();
    }
  }
}

