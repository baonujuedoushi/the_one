<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:56:02
         compiled from "admin\top.php" */ ?>
<?php /*%%SmartyHeaderCode:813356930bb2bebc29-93947001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cee46a8945668ec7fa49d07df7f1aeca140b507e' => 
    array (
      0 => 'admin\\top.php',
      1 => 1451271348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '813356930bb2bebc29-93947001',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930bb2ca2dd8_81966022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930bb2ca2dd8_81966022')) {function content_56930bb2ca2dd8_81966022($_smarty_tpl) {?><<?php ?>?php 
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
?<?php ?>>
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
</html><?php }} ?>
