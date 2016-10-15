<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
$content=$_POST['content'];
$subject=$_POST['subject'];
$id=$_GET['id'];
$pdo=new PDO('mysql:host=localhost;dbname=cms','root','');
$sql="UPDATE news SET subject=?,content=? WHERE id=?";
$stmt=$pdo->prepare($sql);
$stmt->execute(array($subject,$content,$id));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
body{
	background:#283C50;
}
p{
	color:#D0D4D0;
	font-size:30px;
	text-indent:2em;
}
a{
	color:#FCD208;
	text-decoration:none;
}
span{
	color:#D0D4D0;
	margin-left:110px;
}
</style>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript">
var n='3';
function fun1(){
	
	$('span').text(n+'秒后返回列表');
	if(n==0){
		window.clearTimeout($time);
		window.location.href="listNews.php";
		}
	n--;
}



var $time=window.setInterval('fun1()',1000);

</script>
</head>
<body>

<p></p>
<p>修改成功,<a href="listNews.php">立即返回</a></p>

<span></span>
</body>
</html>
