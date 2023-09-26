<?php

$error_message = array(); // 에러메세지 담을 공간 

/* ⭐ 新規スレッド書き込み 버튼을 누르며 이 페이지의 코드들이 실행된다 ⭐ */
if (isset($_POST["threadSubmitButton"])) { 
  
/* 🟢 유효성 검사  */ 
  /* 🟢 스레드 이름 체크 */
  if (empty($_POST["title"])) {
    $error_message["title"] = "titleを入力して下さい。";
  } else {
    $escaped["title"] =  htmlspecialchars($_POST["title"] , ENT_QUOTES);
  }

  /* 🟢 사용자 이름과 입력 내용 */
  if (empty($_POST["username"])) {
    $error_message["username"] = "お名前を入力して下さい。";
  } else {
    $escaped["username"] =  htmlspecialchars($_POST["username"] , ENT_QUOTES);
  }
  
  /* 🟢 안의 내용 입력 */
  if (empty($_POST["body"])) {
    $error_message["body"] = "コメントを入力して下さい。";
  } else {
    $escaped["body"] =  htmlspecialchars($_POST["body"] , ENT_QUOTES);
  }

  /* ⭐ 🟠🟡에러 메세지가 없어야만 실행 된다. */
  if (empty($error_message)) {
    $post_date = date("Y-m-d H:i:s"); // bindParam에서 사용하자

    $pdo->beginTransaction();
    try {
    /* 🟠 스레드 추가 🟠 */
      // 🟠 SQL 쿼리 작성
      $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";

      // 🟠$sql 쿼리를 데이터베이스에서 실행하기 위해 준비
      $statement = $pdo->prepare($sql);

      // 🟠실제로 값을 설정
      $statement->bindParam(":title" , $escaped["title"] , PDO::PARAM_STR);
      
      // 🟠실행
      $statement->execute(); 

      
  /* 🟡 코멘트 추가 🟡 */ 
      // 🟡 SQL 쿼리 작성
      $sql = "INSERT INTO comment (username , body, post_date, thread_id) 
              VALUES (:username , :body, :post_date, (SELECT id FROM thread WHERE title = :title))";

      // 🟡$sql 쿼리를 데이터베이스에서 실행하기 위해 준비
      $statement = $pdo->prepare($sql);
      
      // 🟡실제로 값을 설정
      $statement->bindParam(":username", $escaped["username"],PDO::PARAM_STR);
      $statement->bindParam(":body", $escaped["body"],PDO::PARAM_STR);
      $statement->bindParam(":post_date", $post_date,PDO::PARAM_STR);
      $statement->bindParam(":title", $escaped["title"],PDO::PARAM_STR);

      // 🟡실행
      $statement->execute(); 

      $pdo->commit();

      /* 🟢 게시판 페이지로 이동 */
      header("Location: http://localhost:8080/2chan-bbs");
    } catch (Exception $error) {
      $pdo->rollback();
    }
 
  }
}


