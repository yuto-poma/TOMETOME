<?php 
session_start();

$dsn = 'mysql:dbname=tb210891db;host=localhost';
	$user = 'tb-210891';
	$password = 'dX8Jufv2St';
	
$id = $_GET['id'];

$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//DBに接続

$sql = "SELECT * FROM firminfo WHERE  id='$id' ";

$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
	?>	
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>LIST</title>
<style>
body{
background-image: url("illumination6_32d841f0cb2e514a852bb9c3b5c1e3c8_raw.jpeg");
background-size: cover;
top: 0;
left: 0;
width: 100vw;
height: 100vh;
z-index: -1;
opacity:0,5;
}
.info{
font-size:50px;
}

.box{
 background: none;
 border: 1px solid #f3cbd0;	/* 線の太さ・種類・色 */
 margin: 10px; /* 外側の余白 */
 padding: 20px; /* 内側の余白 */
 position: relative;
 background:white;
 
}
.box:after{
 background: none;
 border: 1px solid #f3cbd0;	/* 線の太さ・種類・色 */
 content: '';
 position: absolute;
 top: 3px;
 left: 3px;
 width: 100%;
 height: 100%;
 z-index: -1;
}
 .btn-circle-border-double {
  display: inline-block;
    text-decoration: none;
  color: #800080;
  background-color:white;
  width: 260px;
  height: 260px;
  line-height: 260px;
  border-radius: 80%;
  border: solid 5px #800080;
  text-align: center;
  overflow: hidden;
  transition: .6s;
  font-size:45px;
  position: relative;
    left: 0%;
    bottom: 10px;
      
       font-family: 'M PLUS Rounded 1c', sans-serif;
}
 .btn-circle-border-double2 {
  display: inline-block;
    text-decoration: none;
  color:  #00ffff;
  background-color:white;
  width: 260px;
  height: 260px;
  line-height: 260px;
  border-radius: 80%;
  border: solid 5px #00ffff;
  text-align: center;
  overflow: hidden;
  transition: .6s;
  font-size:45px;
  position: relative;
    left: 0%;
    bottom: 10px;
      
       font-family: 'M PLUS Rounded 1c', sans-serif;
}
 .btn-circle-border-double2:hover{color:white;
background:#00ffff;
}



 .btn-circle-border-double:hover{color:white;
background:#800080;
}

 .btn-circle-border-double:visited{color:#0068b7;
}
.edit{
text-align:right;
}

</style>
<body>
<?php $link=$row['link']; ?>
<div class="box">
<p class="info">FIRM : <?php echo $row['firmname'];?> </p> </div>
<div class="box">
<p class="info">SITUATION :<?php echo $row['situation'];?> </p> </div>
<div class="box">
<p class="info">DATE : <?php echo $row['date'];?>  </p> </div> 
<div class="box">
<p class="info">TIME: <?php echo $row['hour'];?> : <?php echo $row['minitue'];?> </p> </div> 
<div class="box">
<p class="info"> WISH :<?php echo $row['wish'];?> </p> </div> 
<div class="box">
<p class="info">URL : <a class="url" href="<?php echo $row['link'];?>"target="_blank">サイトへ </a></p> </div>
<div class="box">
<p class="info">ADRESS :<?php echo $row['adress'];?> </p> </div>
<div class="box">
<p class="info">INFO: <?php echo $row['others'];?> </p> </div> 
<div style="display:inline-flex">
<form  method="post" >
<input type="submit" class="btn-circle-border-double" name="delete" value="DELETE">
</form>
<form method="get" action="https://tb-210891.tech-base.net/mission_6edit.php">
<input type="submit" class="btn-circle-border-double2" name="edit" value="EDIT">
<input type="hidden" name="id" value=<?php echo $row['id']; ?> >
<input type="hidden" name="firmname" value=<?php echo $row['firmname']; ?> >
<input type="hidden" name="adress" value=<?php echo $row['adress']; ?> >
<input type="hidden" name="others" value=<?php echo $row['others']; ?> >
<input type="hidden" name="link" value=<?php echo $row['link']; ?> >
<input type="hidden" name="wish" value=<?php echo $row['wish']; ?> >
<input type="hidden" name="email" value=<?php echo $row['email']; ?> >

</form>
</div>

<?php

if(!empty($_POST['delete'])){
$id = $_GET['id'];
	$sql = 'delete from firminfo where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	header('Location: https://tb-210891.tech-base.net/mission_6list.php');
}
}	?>