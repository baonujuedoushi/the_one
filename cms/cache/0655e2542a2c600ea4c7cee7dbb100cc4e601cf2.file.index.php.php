<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:56:02
         compiled from "admin\index.php" */ ?>
<?php /*%%SmartyHeaderCode:159656930bb22625a3-89952265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0655e2542a2c600ea4c7cee7dbb100cc4e601cf2' => 
    array (
      0 => 'admin\\index.php',
      1 => 1451464165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159656930bb22625a3-89952265',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930bb23567e2_19504263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930bb23567e2_19504263')) {function content_56930bb23567e2_19504263($_smarty_tpl) {?><<?php ?>?php
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:admin/login.html');
} 
?<?php ?>>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript">

</script>
</head>
<frameset rows="80,*" noresize="no" border="0" >
    <frame src="index.php?ctl=top"/ scrolling="no">
    <frameset cols="200,*"  noresize="no" >
    	<frame src="index.php?ctl=menu"scrolling="no">
    	<frame src="index.php?ctl=init" name="mainFrame" >
    </frameset>
</frameset>
</html><?php }} ?>
