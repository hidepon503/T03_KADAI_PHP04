<?php
// XSS対策
function h($str){
  return htmlspecialchars($str,ENT_QUOTES);
} 

// loginCheck関数
function loginCheck(){
  if(
    !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()
  ){
    echo 'LOGIN ERROR';
    exit();
  }else{
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
  }
}

// DB接続
function db_connect(){
  try {
    $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}