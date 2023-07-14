<?php
// 必ず最初にSESSIONを開始！！
session_start();

// 現在のセッションIDを取得
$old_sessionid = session_id();

// 新しいセッションIDを発行（前のSESSION IDは無効）
session_regenerate_id(true);

// 新しいセッションIDを取得
$new_sessionid = session_id();

// 旧セッションIDと新セッションIDを表示
echo '旧セッションID：'.$old_sessionid.'<br>';
echo '新セッションID：'.$new_sessionid.'<br>';