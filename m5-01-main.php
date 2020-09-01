<?php
    
    //変数の宣言
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $number = $_POST["number"];
    $password = $_POST["password"];
    //
    
    //投稿フォームに関するコード
    if(empty($comment) || empty($name)){
        echo "※入力してください<br>";
    } elseif($_POST["submit"] && $_POST['postnum'] == null){
        
        //時間の設定とDBへの書き込み
        date_default_timezone_set('Asia/Tokyo');
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $sql = $pdo -> prepare("INSERT INTO m501db (name, comment, password, created) VALUES (:name, :comment, :password, :created)");
    	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
    	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    	$sql -> bindParam(':password', $password, PDO::PARAM_STR);
    	$sql -> bindParam(':created', $date, PDO::PARAM_STR);
    	$sql -> execute();
        //
        echo "Writing completed!";
    } 
    //編集に関するコード
    elseif($_POST["submit"] && $_POST['postnum'] != null) {
        echo "編集依頼を受けつけました<br>";
        $postnum = $_POST['postnum'];
        //$postnum確認用
        echo "$postnum確認用<br>";
        echo '$postnum = '. $postnum;
        echo "<br>";
        //
        
        //DBのidの一致するところに編集
    	$sql = 'UPDATE m501db SET name=:name,comment=:comment,password=:password 
    	WHERE id=:id';
    	$stmt = $pdo->prepare($sql);
    	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
    	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    	$stmt->bindParam(':password', $password, PDO::PARAM_STR);
    	$stmt->bindParam(':id', $postnum, PDO::PARAM_INT);
    	$stmt->execute();
        echo "<br><hr>";
        //
    }
    //
    
    //削除に関するコード
    if($_POST["delete"]){
        echo "<hr>削除する番号は" . $number . "<br>";
        $password = $_POST['password'];
        
        //DBからIDが$numberのpasswordを拾う
        $sql = 'SELECT * FROM m501db WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $number, PDO::PARAM_INT);
        $stmt->execute(); 
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            $passworddb = $row['password'];
        }
        echo "DBからのpassword：" . $passworddb . "<br>";
        //
        if($_POST['number'] && $passworddb == $password){
            //$numberの投稿をDBから削除する
        	$sql = 'delete from m501db where id=:id';
        	$stmt = $pdo->prepare($sql);
        	$stmt->bindParam(':id', $number, PDO::PARAM_INT);
        	$stmt->execute();            
            //
        } elseif($passworddb != $password) {
            echo "パスワードが違います<br>";
        }
        echo "<hr>";
        //
    }
    //
    
?>