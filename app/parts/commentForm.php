<?php 
  $position =0;

  if (isset($_POST["position"])) {   // if (isset($_POST["position"])) 이렇게 조건 줘도 된다
      $position = $_POST["position"];
  }
?>

<form class="formWrapper" method="POST">
  
  <div>
    <input type="submit" value="書き込む" name="submitButton">
    <label 名前>名前 : </label>
    <input type="text" name="username" 
    value="<?php if ($thread["id"] == $comment["thread_id"]) echo $_SESSION['username']?>" >
    <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
  </div>

  <div>
    <textarea class="commentTextArea" name="body"></textarea>
  </div>

  <!-- 🟢위치 얻기 -->
  <input type="hidden" name="position" value="0">

</form> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  // console.log($(window).scrollTop());  // 그냥 확인용
  $(document).ready(()=>{
    $("input[type=submit]").click(()=>{
      // 현재 스크롤 위치
      let position = $(window).scrollTop();
      $("input:hidden[name=position]").val(position);
    })
    $(window).scrollTop(<?php echo $position; ?>);
  })
</script>





