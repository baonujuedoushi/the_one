<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
//设置时区
date_default_timezone_set ( 'Asia/Shanghai' );
//获取信息
$subject = $_POST ['subject'];
$content = $_POST ['content'];
//创建以日期命名的目录
$folderName = date ( 'Y-m-d' );
$folderPath = '../news/' . $folderName;
if (! file_exists ( $folderPath )) {
	mkdir ( $folderPath );
}
//创建以时间命名文件
$filename = date ( 'His' ) . '.html';
$filepath = $folderPath . '/' . $filename;
//写入文件内容 
if (! file_exists ( $filepath )) {
	//读取模板的内部
	$html = file_get_contents('../thems/default/index.html');
	//将模板中特定的部分替换成真实的新闻信息
	$html = str_replace('<!--subject-->', $subject, $html);
	$html = str_replace('<!--content-->', $content, $html);
	//将模板的内容写入到文件内
	file_put_contents ( $filepath, $html );
	//调用数据库配置文件
	require_once '../config.inc.php';
	//将相关的信息写入数据表	
	$link = mysql_connect ($config['db']['hostname'], $config['db']['username'],$config['db']['password']);
	mysql_select_db ( $config['db']['database']);
	$sql = "INSERT  news(subject,filepath,content) VALUES('{$subject}','{$folderName}/{$filename}','{$content}')";
	mysql_query ( $sql );
	mysql_close ();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
#span{
	color:#D0D4D0;
	
	
}
.span{
	margin-left:90px;
	color:#D0D4D0;
}
</style>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript">
var n='10';
function fun1(){
	
	$('#span').text(n+'秒后返回列表');
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
<p>发布成功,<a href="addNews.html">继续发布</a></p>

<span class="span"><a href="listNews.php" style="text-decoration:underline;">立即返回,</a></span><span id="span"></span>
</body>
</html>


