<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>登録</title>
<style>
body{
background-image: url("illumination6_32d841f0cb2e514a852bb9c3b5c1e3c8_raw.jpeg");
background-size: cover;
top: 0;
left: 0;
width: 100vw;
height: 100vh;
z-index: -1;
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
 .btn-circle-border-double {
  display: inline-block;
    text-decoration: none;
  color: #0068b7;
  background-color:white;
  width: 260px;
  height: 260px;
  line-height: 260px;
  border-radius: 80%;
  border: solid 5px #0068b7;
  text-align: center;
  overflow: hidden;
  transition: .6s;
  font-size:45px;
  position: relative;
    left: 0%;
    bottom: 10px;
      
       font-family: 'M PLUS Rounded 1c', sans-serif;
}
.btn-circle-border-double:hover{
background:#0068b7 ;
  color: white;
}


a:hover{color:#0068b7;
}
.touroku{color:#0068b7;
}
a:visited{color:#0068b7;
}


ul {
  list-style: none;

}
.register{
  color: #0068b7;
  }
.notmember{
font-size:35px; 
color:white;
  text-align: center;
font-family:  'M PLUS Rounded 1c', sans-serif;
!important
}







</style>
</head>
<body>
 <div class="header-logo">SYUKATU.GO</div>
 <h1 class="sentence1"> 就活を、マネジメントする。</h1>
 <p>YOUR NAME</p>
 <form method="post"><div class="cp_iptxt"><lavel class="ef"><input type="text" name="name" placeholder="ニックネームも可"></lavel></div><br>
  <p>E-MAIL ADRESS</p>
 <div class="cp_iptxt"><lavel class="ef"><input type="text" name="email"placeholder="">
 </div><br>
 <p></p><br>
  <p></p><br>
  <p class="register"><input type="submit" class=" btn-circle-border-double" name="register" value="REGISTER"></p></form>
 <ul>
<li class="notmember">既に会員登録した方は→<span class="touroku"><a href="https://tb-210891.tech-base.net/mission_6login.php">ログイン</a></span></li>
</ul>
 </body>

 <?php
//データベースへ接続、テーブルがない場合は作成

 $dsn = 'mysql:dbname=tb210891db;host=localhost';
	$user = 'tb-210891';
	$password = 'dX8Jufv2St';
	
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//DBに接続

  $sql = "CREATE TABLE IF NOT EXISTS userDeta" //テーブルを作成
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "email VARCHAR( 35 )"
	.");";
        $stmt = $pdo->query($sql);
        $sql = $pdo -> prepare("INSERT INTO userDeta(name, email) VALUES (:name,:email)");


//POSTの確認
if(isset($_POST['register'])){
if(!isset($_POST['name']) || !isset($_POST['email'])){
header('Location: https://tb-210891.tech-base.net/mission_6registerng.php');
}

if(isset($_POST['name']) && isset($_POST['email'])){
$name = $_POST['name'];
$email = $_POST['email'];
 $sql = "SELECT COUNT(*) AS count FROM userDeta WHERE email ='$email'";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $count = $row['count'];
    }
    $count = intval($count);
    var_dump($count);

    if($count === 1){
      header('Location: https://tb-210891.tech-base.net/mission_6registerng.php');
exit();
}
if($count === 0){
 $sql = $pdo -> prepare("INSERT INTO userDeta(name, email) VALUES (:name,:email)");
      $sql -> bindParam(':name', $_POST['name'], PDO::PARAM_STR);
	$sql -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	    $sql -> execute();	

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'setting.php';

// PHPMailerのインスタンス生成
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP(); // SMTPを使うようにメーラーを設定する
    $mail->SMTPAuth = true;
    $mail->Host = MAIL_HOST; // メインのSMTPサーバー（メールホスト名）を指定
    $mail->Username = MAIL_USERNAME; // SMTPユーザー名（メールユーザー名）
    $mail->Password = MAIL_PASSWORD; // SMTPパスワード（メールパスワード）
    $mail->SMTPSecure = MAIL_ENCRPT; // TLS暗号化を有効にし、「SSL」も受け入れます
    $mail->Port = SMTP_PORT; // 接続するTCPポート

    // メール内容設定
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->setFrom(MAIL_FROM,MAIL_FROM_NAME);
    $email = $_POST['email'];
    $name =$_POST['name'];
    $mail->addAddress($email); //受信者（送信先）を追加する
//    $mail->addReplyTo('xxxxxxxxxx@xxxxxxxxxx','返信先');
//    $mail->addCC('xxxxxxxxxx@xxxxxxxxxx'); // CCで追加
//    $mail->addBcc('xxxxxxxxxx@xxxxxxxxxx'); // BCCで追加
    $mail->Subject = MAIL_SUBJECT; // メールタイトル
    $mail->isHTML(false);    // HTMLフォーマットの場合はコチラを設定します
    $body = 
    "SYUKATU.GO運営事務局より". PHP_EOL . PHP_EOL .
    "{$name}様 ".PHP_EOL . PHP_EOL .
    
    "この度はSYUKATU.GOにご登録いただきありがとうございます！". PHP_EOL . PHP_EOL .
    
    "就活スケジュールの管理などにぜひSYUKATU.GOを活用してください！"
    . PHP_EOL . PHP_EOL .
        
   " {$name}様の就活が成功することを心より願っています。". PHP_EOL . PHP_EOL .
    
    "お手数ですが下記のリンクよりログインをお願いします。". PHP_EOL . PHP_EOL .
    
    "URL: https://tb-210891.tech-base.net/mission_6login.php";

    $mail->Body  = $body; // メール本文
 $mail->send();
    	
    	
    header('Location: https://tb-210891.tech-base.net/mission_6registerok.php');
}
}
}
?>
