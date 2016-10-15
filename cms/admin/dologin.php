<?php
session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
$vf=strtolower($_POST['vf']);
$pdo=new PDO('mysql:host=localhost;dbname=cms','root','');
$sql="select username from admin where username=? AND password=?";
$stmt=$pdo->prepare($sql);
$stmt->execute(array($user,$pass));
$stmt->fetch(PDO::FETCH_ASSOC);
$rows=$stmt->rowCount();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
body{
	background:url(../images/loginbg.jpg) no-repeat;
}
p{
	font-size:24px;
	line-height:320px;
}
#d1{
	position:relative;
	margin:0 auto;
	margin-top:100px;
	background:#6A8399;
	width:300px;
	height:200px;
}
#d2{
	position:relative;
	margin:0 auto;
	margin-top:100px;
	background:#6A8399;
	width:300px;
	height:200px;
}
#img1{
	position:absolute;
	top:30px;
	left:80px;
}
#img2{
	position:absolute;
	top:30px;
	left:80px;
}
</style>
</head>
<body>
<?php if($vf==$_SESSION['vf']){ 
if($rows){
   $_SESSION['username']=$user;
   $_SESSION['password']=$pass;
   header('Location:../');
}else{?>
<div id="d1"><div id="img1"><img src="../images/eoerr.png"/></div><p align="center">登录失败，<a href="login.html">重新登录</a></p></div>
<?php }?>
<?php }else{?>

	<div id="d2"><div id="img2"><img src="../images/eoerr.png"/></div><p align="center">验证码错误,<a href="login.html">重新登录</a></p></div>
<?php }

?>
</body>
</html>