<?php
session_start();
$dsn = 'mysql:dbname=tb210891db;host=localhost';
	$user = 'tb-210891';
	$password = 'dX8Jufv2St';
	
	
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//DBに接続
	
	if(isset($_POST['add'])){
		$id = $_GET['id'];
		$email = $_GET['email'];
$sql = ' update firminfo set firmname=:firmname,email=:email,situation=:situation,date=:date,hour=:hour,minitue=:minitue,
wish=:wish,link=:link,adress=:adress,others=:others where id=:id';
$stmt = $pdo->prepare($sql);
   $stmt->bindValue(':firmname', $_POST['firmname'], PDO::PARAM_STR);
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->bindValue(':situation', $_POST['situation'], PDO::PARAM_STR);
	$stmt->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
    $stmt-> bindValue(':hour', $_POST['hour'], PDO::PARAM_STR);
	$stmt-> bindValue(':minitue', $_POST['minitue'], PDO::PARAM_STR);
	$stmt  -> bindValue(':wish', $_POST['wish'], PDO::PARAM_STR);
	$stmt -> bindValue(':link', $_POST['link'], PDO::PARAM_STR);
	$stmt  -> bindValue(':adress', $_POST['adress'], PDO::PARAM_STR);
	$stmt  -> bindValue(':others', $_POST['others'], PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt -> execute();	
	
	header('Location: https://tb-210891.tech-base.net/mission_6list.php');

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<form method="post">
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>EDIT</title>
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

.btn-circle-border-simple {
  display: inline-block;
  text-decoration: none;
  color: #ffa54c;
  background-color:white;
  width: 260px;
  height: 260px;
  line-height: 260px;
  border-radius: 50%;
  border: solid 6px #ffa54c;
  text-align: center;
  overflow: hidden;
  font-weight: bold;
  transition: .4s;
  font-size:50px;
   position: absolute;
        top: 90%;
        left: 80%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
font-family: 'M PLUS Rounded 1c', sans-serif;
position:fixed;
}
.cp_iptxt {
	position: relative;
	width: 80%;
	margin: 40px 3%;
}
.cp_iptxt input[type='text'] {
	font: 15px/24px sans-serif;
	box-sizing: border-box;
	width: 100%;
	padding: 0.3em;
	transition: 0.3s;
	letter-spacing: 1px;
	color: black;
	border: none;
	border-bottom: 2px solid #1b2538;
	background: transparent;
	font-size:50px;
	background-color:white;
	  border-radius:20px;
	
}
.ef input[type='text']:focus {
	border-bottom: 2px solid #da3c41;
	outline: none;
}
text{
font-size:50px;
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
select{
font-size:50px;
border:1px;
}
input[type=date]::-webkit-inner-spin-button,
input[type=time]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
date {
  position: relative;
  display: inline-block;
  width: 200px;
  height: 36px;
  border: 2px solid #ccc;
  border-radius: 15px;
}
input[type="date"]{
font-size:50px;
}
.nitiji{
font-size:50px;
color:white;
}
.not{
font-size:50px
color:white;
}
</style>

</head>
<body>
<form method="post" ><div class="cp_iptxt"><lavel class="ef"><input type="text" size="60" name="firmname" value= "<?php echo $_GET['firmname']?>"  required></label></div><br>

<div class="cp_ipselect cp_sl02"><select required name="situation">
<option value="">選考状況(※必須)</option>
<option value="ES・WEBテ">ES・WEBテスト</option>
<option value="会社説明会">会社説明会</option>
<option value="GD・筆記">GD・筆記試験</option>
<option value="一次面接">一次面接</option>
<option value="二次面接">二次面接</option>
<option value="三次面接">三次面接</option>
<option value="最終面接">最終面接</option>
</select></div><br>

<lavel class="date"><span class="nitiji"> &nbsp;&nbsp;日時(※必須)&nbsp;</span><input type="date" name ="date" placeholder="2020-3-1" required></label><br>

<div class="cp_ipselect cp_sl02">
<select name="hour" class="hour">
<option value="">時</option>
<option value="8">8時</option>
<option value="9">9時</option>
<option value="10">10時</option>
<option value="11">11時</option>
<option value="12">12時</option>
<option value="13">13時</option>
<option value="14">14時</option>
<option value="15">15時</option>
<option value="16">16時</option>
<option value="17">17時</option>
<option value="18">18時</option>
<option value="19">19時</option>
<option value="20">20時</option>
<option value="21">21時</option>
<option value="22">22時</option>
<option value="23">23時</option>
<option value="24">24時</option>
</select></div>

<div class="cp_ipselect cp_sl02"><select name="minitue">
<option value="">分</option>
<option value="00">0分</option>
<option value="05">5分</option>
<option value="10">10分</option>
<option value="15">15分</option>
<option value="20">20分</option>
<option value="25">25分</option>
<option value="30">30分</option>
<option value="35">35分</option>
<option value="40">40分</option>
<option value="45">45分</option>
<option value="50">50分</option>
<option value="55">55分</option>
</select></div><br>

<div class="cp_ipselect cp_sl02">
<select name="wish" class="wish" value="<?php echo $_GET['wish']?>"reqired>
<option value="">志望度(※必須)</option>
<option value="高い">高い</option>
<option value="普通">普通</option>
<option value="低い">低い</option>
</select></div><br>

<div class="cp_iptxt"><lavel class="ef"><input type="text" name="adress"value="<?php echo $_GET['adress']?>"placeholder="住所">
</lavel></div><br>

<div class="cp_iptxt"><lavel class="ef"><input type="text" name="link"value="<?php echo $_GET['link']?>"placeholder="URL"></lavel></div></p>

<div class="cp_iptxt"><lavel class="ef"><input type="text" name="others"value="<?php echo $_GET['others']?>"placeholder="その他"></lavel></div></p>

<input type="submit"  class="btn-circle-border-simple"  name="add" value="EDIT"/>
</form>
</body>

