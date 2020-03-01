
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
    <body>

        <form  method="post">
      名前：
            <input type="text" name="name" >
     コメント:
     	<input type="text" name ="comment">       
            <input type="submit" value="送信">

            
            
        </form>
        
        <form method="post">
        削除用パスワード　: 
        <input type ="text" name="delete_pass">
          <input type="submit" value="送信">
        </form>
        <?php
        if(isset($_POST['delete_pass'])){
    	$passdata ='mission_3-5pass.txt';
$file_pass = fopen($passdata,'r');
                  $password= fgets($file_pass);
                  fclose($file_pass);
                  $pass= (int)$password;

      if($pass == $_POST['delete_pass']){
      	?>
        <form method = "post">
        削除対象番号　:
            <input type ="text" name="delete">
        <input type="submit" value="削除">
        </form>
        <?php
       }}
       ?>
        <form method="post"> 
        編集用パスワード　:
        	<input type ="text" name="edit_pass">
        	<input type ="submit"  value="編集">
        	</form>
        	<?php
        if(isset($_POST['edit_pass'])){
    	$passdata ='mission_3-5pass.txt';
$file_pass = fopen($passdata,'r');
                  $password= fgets($file_pass);
                  fclose($file_pass);
                  $pass= (int)$password;

      if($pass == $_POST['edit_pass']){
      	?>
      	<form method = "post">
      	編集する投稿の番号を入力してください :
      			<input type ="text" name="edit">
        	<input type ="submit" name ="edit_btn" value="送信">
        	<?php
       }}
       ?>
      		<?php 
        	if(isset($_POST['edit_btn'])){
        		$edit = $_POST['edit'];
        		if(!empty($_POST['edit'])){
        			?>
<form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post">
  <input type="hidden" name="edit_num" value="<?= $edit ?>">
  <table>
    <tr><td>名前：</td>
    <td><input type="text" name="edit_name" ></td></tr>
    <tr><td>コメント：</td>
    <td><input type="text" name="edit_comment" ></td></tr>
   <tr><td><input type="submit" name="edit_submit" value="送信"></td></tr>
  </table>
  </form>
<?php
 }}
 ?>


        
    </body>
</html>

<?php
　$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //DBに接続
		
	$sql = "CREATE TABLE IF NOT EXISTS keijiban" //テーブルを作成
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT,"
	."date DATETIME"
	.");";
	$stmt = $pdo->query($sql);
	//フォームから受け取ったデータをDBに保存
	$sql = $pdo -> prepare("INSERT INTO keijiban(name, comment,date) VALUES (:name, :comment,:date)");
	if(isset($_POST['name']) && isset($_POST['comment'])){
	$date = date('Y-m-d H:i:s');
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$sql -> bindParam(':date', $date, PDO::PARAM_STR);
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$sql -> execute();
	
	}
?>

<?php
　$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		
	//削除機能
	if(isset($_POST['delete'])){
    	$id = $_POST['delete'];
	$sql = 'delete from keijiban where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	
	}
?>

<?php
//編集機能
if(isset($_POST['edit_name']) && isset($_POST['edit_comment'])){
$id = $_POST['edit_num'];
	$name = $_POST['edit_name'];
	$comment = $_POST['edit_comment'];
	$edit_date = date('Y-m-d H:i:s');
	$sql = 'update keijiban set name=:name,comment=:comment, date=:date where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	$stmt -> bindParam(':date', $edit_date, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
}


?>


<?php
 　$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';	
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//DBに接続
	
	$sql = 'SELECT * FROM keijiban';//dbの内容を表示
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo "<hr>";
		echo $row['id'].':';
		echo $row['name'].':';
		echo $row['comment'].':';
		echo $row['date'].'<br>';
	echo "<hr>";
	}


?>
