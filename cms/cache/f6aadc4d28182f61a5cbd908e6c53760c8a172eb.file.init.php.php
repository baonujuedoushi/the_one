<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:56:03
         compiled from "admin\init.php" */ ?>
<?php /*%%SmartyHeaderCode:2379556930bb30f4247-70207758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6aadc4d28182f61a5cbd908e6c53760c8a172eb' => 
    array (
      0 => 'admin\\init.php',
      1 => 1451403373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2379556930bb30f4247-70207758',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930bb3319756_97887306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930bb3319756_97887306')) {function content_56930bb3319756_97887306($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
body{
	background:url(images/mainbg.jpg);
	margin:0 auto;
	padding:0;
}
.d0{
	position:raletive;
	
}
.d1{
	margin-top:200px;
	margin-left:300px;

}
.d2{
	position:absolute;
	right:20px;
	bottom:40px;
	
}
#h3{
	border:1px dotted black;
}
</style>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function(){
	$('#h3').nextAll().slideUp();
	$('#h3').click(function(){
	$(this).nextAll().slideToggle();
		})
})

</script>
</head>
<body>
<div class="d0">
<div class="d1">
<img src="images/cms.jpg" alt=""/>
</div>
<div class="d2">
<h3 id="h3">系统相关</h3>
<p>系统名称:达内新闻系统</p>
<p>版本控制:1.0</p>
<p>开发团队:PSD1510班</p>
</div>
</div>
</body>
</html><?php }} ?>
