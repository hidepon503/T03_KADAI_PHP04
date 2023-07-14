<?php
// 必ず最初にSESSIONを開始！！
session_start();

// SESSIONを初期化（空にする）
$_SESSION = array();

// Cookieに保存してある"Session IDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time()-42000, '/');
}

// サーバ側での、セッションIDの破棄
session_destroy();

// 処理後、login.phpへリダイレクト
header("Location: login.php");
exit();


?>