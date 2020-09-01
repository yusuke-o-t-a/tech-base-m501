<?php
	
    //編集に関する記述
    if($_POST['edit']){
        $number = $_POST['number'];
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

        //編集フォームに数値があれば動作
        if($_POST['number'] && $passworddb == $password){
            //入力された投稿番号の確認用
            echo '入力された投稿番号:';
            var_dump($number);
            echo "<br>";
            //
            
            //
            $sql = 'SELECT * FROM m501db WHERE id=:id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $number, PDO::PARAM_INT);
            $stmt->execute(); 
            $results = $stmt->fetchAll();
            foreach ($results as $row) {
                $name = $row['name'];
                $comment = $row['comment'];
                $password = $row['password'];
            }
            //
        } else if($passworddb != $password) {
            echo "パスワードが違います<br>";
        } else {
            echo "編集する投稿番号を入力してください<br>";
        }
        echo "<hr>";
    }
    //
?>