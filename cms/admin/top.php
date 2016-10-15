<?php 
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
body{
	background:url(images/topbg.jpg) no-repeat center;
	overflow:hidden;
	
}
h1{
	color:#3c3c3c;
}
</style>
</head>
<body>
<h1 align="center">达内新闻系统V1.0</h1>
</body>
</html>