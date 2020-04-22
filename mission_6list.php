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
.cp_ipselect {
	overflow: hidden;
	width: 90%;
	margin: 2em auto;
	text-align: center;
}
.cp_ipselect select {
	width: 100%;
	padding-right: 1em;
	cursor: pointer;
	text-indent: 0.01px;
	text-overflow: ellipsis;
	border: none;
	outline: none;
  border-radius:20px;

	background: transparent;
	background-image: none;
	box-shadow: none;
	-webkit-appearance: none;
	appearance: none;
}
.cp_ipselect select::-ms-expand {
    display: none;
}
.cp_ipselect.cp_sl02 {
	position: relative;
	border: 1px solid #bbbbbb;
	border-radius: 2px;
	background: #ffffff;
}
.cp_ipselect.cp_sl02::before {
	position: absolute;
	top: 0.8em;
	right: 0.9em;
	width: 0;
	height: 0;
	padding: 0;
	content: '';
	border-left: 6px solid transparent;
	border-right: 6px solid transparent;
	border-top: 6px solid #666666;
	pointer-events: none;
}
.cp_ipselect.cp_sl02:after {
	position: absolute;
	top: 0;
	right: 2.5em;
	bottom: 0;
	width: 1px;
	content: '';
	border-left: 1px solid #bbbbbb;
}
.cp_ipselect.cp_sl02 select {
	padding: 8px 38px 8px 8px;
	color: black;
}


.btn-flat-border {
  display: inline-block;
  padding: 0.3em 1em;
  text-decoration: none;
  position:center;
   width: 280px;
  height: 135px;
  font-size:65px;
  color: #67c5ff;
  background:white;
  
  border: solid 2px #67c5ff;
  border-radius: 3px;
  transition: .4s;
  position:absolute; right:10% bottom:50%;
}

.btn-flat-border:hover {
  background: #67c5ff;
  color: white;
}
.btn-circle-border-simple:hover{
background: #191970;
  color: white;
}
select{
font-size:50px;
border:1px;
}




.btn-circle-border-simple {
  display: inline-block;
  text-decoration: none;
  color: #191970;
  width: 260px;
  height: 260px;
  line-height: 260px;
  border-radius: 50%;
  border: solid 3px #191970;
  text-align: center;
  overflow: hidden;
  font-weight: bold;
  transition: .4s;
  background-color:white;
  font-size:100px;
   position: absolute;
        top: 90%;
        left: 80%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
font-family: 'M PLUS Rounded 1c', sans-serif;
position:fixed;
}
h1{

font-size:50px;
margin: 5; 
    padding: 0;
}
p{
font-family: 'Sawarabi Gothic', sans-serif;

}
.box{
 background: none;
 border: 2px solid #00ffff;	/* 線の太さ・種類・色 */
 margin: 10px; /* 外側の余白 */
 padding: 20px; /* 内側の余白 */
 position: relative;
 background:#fafdff;

 
}
.box:after{
 background: none;
 border: 2px solid #00ffff;	/* 線の太さ・種類・色 */
 content: '';
 position: absolute;
 top: 3px;
 left: 3px;
 width: 100%;
 height: 100%;
 z-index: -1;
}
.situation{
margin-right:5%;
font-family: 'M PLUS Rounded 1c', sans-serif;
font-size:50px

}
a:link, a:visited, a:hover, a:active {
  color: black;
  text-decoration: none;
}
</style>
</head>
<body>



<?php
session_start();
$email = $_SESSION['email'];

$dsn = 'mysql:dbname=tb210891db;host=localhost';
	$user = 'tb-210891';
	$password = 'dX8Jufv2St';
	
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//DBに接続
	
$sql = "SELECT * FROM firminfo WHERE email ='$email'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		?>
  <?php $_GET['id']=$row['id'];?>
 
	   <div class="box">
	  <form action="mission_6detail.php" method="get">
	  <input type="hidden" name="id" value=<?php echo $row['id']; ?> >
	  <br><br>		
	  <h1>  <?php echo $row['firmname']; ?>  <input type="submit" class="btn-flat-border" value="DETAIL"></form>
　　</h1>　　　　 
		<p class="situation"> <?php echo $row['situation']; ?>　<?php echo $row['date']; ?> <?php echo $row['hour']?>：<?php echo $row['minitue']?>  </p>
		</div>	
	<?php 
	}
?>

<?php 
if(isset($_POST["register"])){
$sql = "SELECT * FROM firminfo WHERE email ='$email' ORDER BY id ASC";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
?>
<div class="box">
	  <form action="mission_6detail.php" method="get">
	  <input type="hidden" name="id" value=<?php echo $row['id']; ?> >
	  <br><br>		
	  <h1>  <?php echo $row['firmname']; ?>  <input type="submit" class="btn-flat-border" value="DETAIL"></form>
　　</h1>　　　　 
		<p class="situation"> <?php echo $row['situation']; ?>　<?php echo $row['date']; ?> <?php echo $row['hour']?>：<?php echo $row['minitue']?>  </p>
		</div>	
<?php	}}
	?>



<a href="https://tb-210891.tech-base.net/mission_6add.php" class="btn-circle-border-simple">＋</a>
</body>
