<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>ログイン</title>
<style>
body{
background-image: url("illumination6_32d841f0cb2e514a852bb9c3b5c1e3c8_raw.jpeg");
background-size: cover;
top: 0;
left: 0;
width: 100vw;
height: 100vh;
z-index: -1;
positipn:relative;
}

.header-logo{
font-size:150px; 
color:white;
text-align:center;
font-family: 'Noto Serif JP', sans-serif;
padding-top:220px;}
.sentence1{
font-size:50px; 
color:white;
  text-align: center;
font-family:  'M PLUS Rounded 1c', sans-serif;
}
.cp_iptxt {
	
	align-items:center;
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
	border-bottom: 2px solid #ff3333;
	background: transparent;
	font-size:50px;
	background-color:white;
	  border-radius:20px;
	
}
.ef input[type='text']:focus {
	border-bottom: 2px solid #ff3333;
	outline: none;
}
text{
font-size:50px;
}
p{
text-align: center;
font-family: 'Noto Serif JP', sans-serif;
font-size:80px;
color:white;
margin:0px;
padding:0px;
border:0px;
font-weight:600;
}
.btn-circle-border-double:hover{
background:#dc143c;
  color: white;
}
 .btn-circle-border-double {
  display: inline-block;
    text-decoration: none;
  color: #dc143c;
  background-color:white;
  width: 260px;
  height: 260px;
  line-height: 260px;
  border-radius: 80%;
  border: solid 5px #dc143c;
  text-align: center;
  overflow: hidden;
  transition: .6s;
  font-size:50px;
  position: relative;
    left: 0%;
    bottom: 10px;
font-family: 'M PLUS Rounded 1c', sans-serif;
}
.notmember{font-size:35px; 
color:white;
  text-align: center;
font-family:  'M PLUS Rounded 1c', sans-serif;
}
.touroku{color:#ff3333;
}
a:visited{
color:#ff3333;
}
ul {
  list-style: none;
}







</style>
</head>
<body>
 <div class="header-logo">SYUKATU.GO</div>
 <h1 class="sentence1"> 就活を、マネジメントする。</h1>
 
 <p>YOUR NAME</p>
 <form method="post"><div class="cp_iptxt"><lavel class="ef"><input type="text" name="name"></lavel></div><br>
  <p>G-MAIL ADRESS</p>
 <div class="cp_iptxt"><lavel class="ef"><input type="text" name="email"></lavel></div><br>
 <p></p><br>
  <p></p><br>
  <p><input type="submit" class=" btn-circle-border-double" name="login" value="LOG IN">
  </p></form>
 <ul>
<li class="notmember">会員登録していない方は→<span class="touroku"><a href="https://tb-210891.tech-base.net/mission_6register.php">登録</a></span></li>
</ul>
  </body>

 <?php
//データベースへ接続、テーブルがない場合は作成

 $dsn = ??
	
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//DBに接続
if(isset($_POST['name']) && isset($_POST['email'])){
$name = $_POST['name'];
$email = $_POST['email'];
 $sql = "SELECT COUNT(*) AS count FROM userDeta WHERE email ='$email' AND name='$name' ";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $count = $row['count'];
    }
    $count = intval($count);
    var_dump($count);

    if($count === 1){
    	session_start();
 $_SESSION['email'] = $_POST['email'];
    	
      header('Location: https://tb-210891.tech-base.net/mission_6list.php');
exit();
}
else { header('Location: https://tb-210891.tech-base.net/mission_6loginng.php');
}}
?>
