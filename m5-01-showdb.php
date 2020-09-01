<?php
//DBを表示する
echo "<hr>";
//投稿一覧DBからを表示させる
        echo "<hr>DBの投稿一覧<br>";
        $sql = 'SELECT * FROM m501db';
    	$stmt = $pdo->query($sql);
    	$results = $stmt->fetchAll();
    	foreach ($results as $row){
    		//$rowの中にはテーブルのカラム名が入る
    		echo $row['id'].',';
    		echo $row['name'].',';
    		echo $row['comment'].',';
    		echo $row['password'].',';
    		echo $row['created'].'<br>';
    	echo "<hr>";
    	}
        //
echo "<hr>";
//
?>