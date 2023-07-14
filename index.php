<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"type="text/css"href="css/style.css">
  <link rel="stylesheet"type="text/css"href="css/output.css">
  <title>お客様の声収集アプリ</title>
</head>
<body>



  <?php
  // セッションの開始
session_start();
// ログイン状態のチェック
// ログインせずにindex.phpにアクセスした場合とセッションIDが一致しない場合はexit()で処理を中断させ、LOGIN ERRORと表示させる
// if(
//   !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()
// ){
//   echo 'LOGIN ERROR';
//   exit();
// }else{
//   // セッションIDが一致した場合は、新しいセッションIDを発行（前のSESSION IDは無効）
//   session_regenerate_id(true);
//   $_SESSION['chk_ssid'] = session_id();
// }

include('func.php');
loginCheck();


// htmlspecialcharsでXSS対策
  // function h($str){
  // return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  // }

  include('header.php');
?>
<h1 class="text-6xl text-blue-700">Hello tailwind</h1>
<!-- ユーザーネームの表示 -->
<div class="bg-gray-500">
  <div>  
    <p class="m-1">ようこそ<?php echo $_SESSION['user_name']; ?>さん</p>
  </div>
  <div>  
    <a href="logout.php"><button>ログアウト</button></a>
  </div>
</div>

<?php  
  include('insert.php');
  include('list.php');
  include('footer.php');
?>

</body>
</html>