<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>
<body>
<?php 
  include('header.php');
?>

<h1>ログイン</h1>
  <form action="login_act.php" method="POST">
    <div class="login_container">
      <fieldset>
        <legend>投稿</legend>
          <label for="user_id">ログインID：<input type="text" name="user_id" id="lid"></label><br>
          <label for="pw">パスワード：<input type="text" name="pw" id=""lpw></label><br>
          <input type="submit" value="ログイン">
      </fieldset>
    </div>
  </form>


<?php
  include('footer.php');
?>
</body>
</html>