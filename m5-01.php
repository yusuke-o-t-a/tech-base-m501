<!--データベースの設定-->
<?php require('m5-01-db.php'); ?>

<!--編集時の再表示-->
<?php require('m5-01-initialEdit.php'); ?>

<!--html部分-->
<?php include('m5-01.html'); ?>

<!--投稿や編集、削除機能-->
<?php require('m5-01-main.php') ?>

<!-- DBを表示 -->
<?php require('m5-01-showdb.php') ?>