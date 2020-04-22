<?php
session_start();
echo $_SESSION['email'];
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
<?php

if(isset($_POST['submit'])){
header('Location: https://tb-210891.tech-base.net/mission_6addng.php');
exit();
}
?>

<form method="post" ><div class="cp_iptxt"><lavel class="ef"><input type="text" size="60" name="firmname" placeholder="企業名(※必須)"></label></div><br>


<div class="cp_ipselect cp_sl02"><select required name="situation">
<option value="">選考状況(※必須)</option>
<option value="ES・WEBテスト">ES・WEBテスト</option>
<option value="会社説明会">会社説明会</option>
<option value="GD・筆記試験">GD・筆記試験</option>
<option value="一次面接">一次面接</option>
<option value="二次面接">二次面接</option>
<option value="三次面接">三次面接</option>
<option value="最終面接">最終面接</option>
</select></div><br>

<lavel class="date"><span class="nitiji"> &nbsp;&nbsp;日時(※必須)&nbsp;</span><input type="date" name ="date" placeholder="2020-3-1"></label><br>

<div class="cp_ipselect cp_sl02">
<select name="hour" class="hour">
<option value="">時</option>
<option value="8時">8時</option>
<option value="9時">9時</option>
<option value="10時">10時</option>
<option value="11時">11時</option>
<option value="12時">12時</option>
<option value="13時">13時</option>
<option value="14時">14時</option>
<option value="15時">15時</option>
<option value="16時">16時</option>
<option value="17時">17時</option>
<option value="18時">18時</option>
<option value="19時">19時</option>
<option value="20時">20時</option>
<option value="21時">21時</option>
<option value="22時">22時</option>
<option value="23時">23時</option>
<option value="24時">24時</option>
</select></div>

<div class="cp_ipselect cp_sl02"><select name="minitue">
<option value="">分</option>
<option value="0分">0分</option>
<option value="5分">5分</option>
<option value="10分">10分</option>
<option value="15分">15分</option>
<option value="20分">20分</option>
<option value="25分">25分</option>
<option value="30分">30分</option>
<option value="35分">35分</option>
<option value="40分">40分</option>
<option value="45分">45分</option>
<option value="50分">50分</option>
<option value="55分">55分</option>
</select></div><br>

<div class="cp_ipselect cp_sl02">
<select name="wish" class="wish">
<option value="">志望度(※必須)</option>
<option value="高い">高い</option>
<option value="普通">普通</option>
<option value="低い">低い</option>
</select></div><br>

<div class="cp_iptxt"><lavel class="ef"><input type="text" name="adress"placeholder="住所">
</lavel></div><br>


<div class="cp_iptxt"><lavel class="ef"><input type="text" name="link"placeholder="採用ページURL"></lavel></div></p>

<div class="cp_iptxt"><lavel class="ef"><input type="text" name="others"placeholder="その他"></lavel></div></p>

<input type="submit"    name="add" value="ADD"/>
</form>


</body>
