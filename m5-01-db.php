<?php

    // DB接続設定
    $dsn = '********';
	$user = '*******';
	$password = '*******';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //データベース内にテーブルを作成
    $sql = "CREATE TABLE IF NOT EXISTS m501db"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT,"
	. "password INT(11),"
	. "created DATETIME"
	.");";
	$stmt = $pdo->query($sql);
	
	
	//データベースにどのようなテーブルが作成されているかを確認
	echo "<hr>";
	echo "データベースにどのようなテーブルが作成されているかを確認<br>";
	$sql ='SHOW TABLES';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[0];
		echo '<br>';
	}
	echo "<hr>";
	
	//テーブルの内容・構成詳細を確認
	echo "テーブルの内容・構成詳細を確認<br>";
	$sql ='SHOW CREATE TABLE m501db';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[1];
	}
	echo "<hr>";
?>