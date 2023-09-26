<?php


$user = "root";
// $pass = "root";

// DB와 접속 = PHP에서 PDO(PHP Data Objects)를 사용하여 MySQL 데이터베이스에 연결하는 코드
try { //     mysql:DB드라이버 적용, host= 로컬에서 적용 , dbname= 연결하려는 DB이름
  $pdo = new PDO('mysql:host=localhost;dbname=2chan-bbs', $user);
  // echo "DB와의 접속에 성공했습니다!";
} catch (PDOException $error) {
  echo $error->getMessage();
}


