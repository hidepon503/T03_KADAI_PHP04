<?php
session_start();
// $sid = session_id();

$user_id = $_POST['user_id'];
$pw = $_POST['pw'];

// DB接続
// try {
//   $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DbConnectError:'.$e->getMessage());
// }

// DB接続関数をPDOで呼び出し
include('func.php');
$pdo = db_connect();

// データ登録SQL作成
$sql="SELECT * FROM menber WHERE user_id=:user_id AND pw=:pw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':pw', $pw, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行時にエラーがある場合
if($status==false){
  $error = $stmt->errorInfo();
  exit('QueryError:'.$error[2]);
}

// 抽出データ数を取得
// $count = $stmt->fetchColumn();
$val = $stmt->fetch(); // 該当レコードだけ取得

// 該当レコードがあればSESSIONに値を代入
if( $val['id'] != "" ){
  $_SESSION['chk_ssid'] = session_id();
  $_SESSION['user_id'] = $val['user_id'];
  $_SESSION['pw'] = $val['pw'];
  $_SESSION['user_name'] = $val['user_name'];
  // ログイン成功の場合はセッション変数に値を代入し、index.phpへ移動
  header('Location: index.php');
}else{
  //ログイン失敗の場合はログイン画面へ戻る
  header('Location: login.php');
}
// 処理終了
exit();


?>

