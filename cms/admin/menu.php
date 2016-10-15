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
</head>
<style>
body{
	background:url(images/repeat.png) repeat;
	margin:0 auto;
	padding:0;
}
a{
	color:#EFFC73;
	font-family:微软雅黑;
	text-decoration: none;
	
}
li{
	background:url(images/libg.jpg) no-repeat;
	height:30px;
	line-height:30px;
	font-size:16px;
	
	text-indent:2em;
	border-bottom:0px;
	border-left:0;
	border-right:0;
}
span{
	color:#D0D4D0;
	font-size:26px;
	font-weight:bold;
	line-height:28px;
	margin-left:15px;
}
li{
	list-style:none;
	
	text-indent:2.4em;

}
#bottom{
	position:absolute;
	left:30px;
	bottom:40px;
	color:#EFFC73;
}
ul{
	padding-left:18px;
}
#ge{
	background:url(images/c_left.jpg) repeat-y right;
	width:198px;
	height:600px;
}
</style>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function(){
	$('#1').click(function(){
		$(this).next().slideToggle();
	})
	$('#2').click(function(){
		$('#2').next().slideToggle();
	})
	$('#3').click(function(){
		$(this).next().slideToggle();
	})
	$('#4').click(function(){
		$(this).next().slideToggle();
	})
})
</script>
<body>
<div id="ge">
<img src="images/menu.png" width="40px" alt="" /><span id="1">新闻管理</span>

<ul>
	<li><a href="index.php?act=add&ctl=News" target="mainFrame">发布新闻</a></li>
	<li><a href="index.php?act=newslist&ctl=Media" target="mainFrame">新闻列表</a></li>
</ul>
<img src="images/menu.png" width="40px" alt="" /><span id="2">栏目管理</span>

<ul>
	
	<li><a href="index.php?act=addlan&ctl=Lan" target="mainFrame">添加栏目</a></li>
		<li><a href="index.php?act=listlan&ctl=Lan" target="mainFrame">栏目列表</a></li>
</ul>
<img src="images/menu.png" width="40px" alt="" /><span id="3">媒体管理</span>

<ul>
	
	<li><a href="index.php?act=medialist&ctl=Media" target="mainFrame">添加媒体</a></li>
	<li><a href="index.php?act=listmedia&ctl=Media" target="mainFrame">媒体列表</a></li>
</ul>
<img src="images/menu.png" width="40px" alt="" /><span id="4">广告管理</span>

<ul>
	
	<li><a href="index.php?act=add&ctl=Ad" target="mainFrame">添加广告</a></li>
		<li><a href="index.php?act=adlist&ctl=Ad" target="mainFrame">广告列表</a></li>
</ul>
<div id="bottom">欢迎，<?php echo $_SESSION['username']?>&nbsp;<a href="index.php?act=loginout&ctl=Media" style="color:yellow">注销</a></div>
<div style="background:url(images/leftdown.jpg) no-repeat;width:200px;height:40px;position:absolute;left:0;bottom:0px;"></div>
</div>
</body>
</html>