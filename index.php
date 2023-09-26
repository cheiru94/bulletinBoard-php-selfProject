<?php

include_once("./app/database/connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2J1掲示板</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <!-- 🟢 header -->
  <?php include("app/parts/header.php"); ?> 
  
  <!-- 🟢 유효성 검사 ,  에러 나타내기 -->
  <?php include("app/parts/validation.php"); ?> 
  
  <!-- 🟢 スレッド＿エリア -->
  <?php include("app/parts/thread.php"); ?> 
  
  <!-- 🟢 스레드 작성 버튼 -->
  <?php include("app/parts/newThreadButton.php"); ?> 
</body>

</html>


