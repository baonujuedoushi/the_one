<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:58:35
         compiled from "admin\addNews.html" */ ?>
<?php /*%%SmartyHeaderCode:2861256930c4bb71b08-81636754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d2c3435cdcc159d56277fbf13e80c809fb31422' => 
    array (
      0 => 'admin\\addNews.html',
      1 => 1451642519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2861256930c4bb71b08-81636754',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930c4bc28cb4_53001173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930c4bc28cb4_53001173')) {function content_56930c4bc28cb4_53001173($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>


<link rel="stylesheet" href="thems/default/styles/reset.css" type="text/css" />
<style >
body{
	background:#283C50;
}
#divbig{
	background:url(images/tablebg.jpg);
	width:700px;
	margin:0 auto;
	position:relative;
	top:50px;
	border:1px solid #3C7AA1;
	font-size:20px;
}
</style>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
 <script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
var ue = UE.getEditor('editor');
	function fun1(){
	$ok=$('#form1').get(0);
	$ok.submit();
	$ok.action="index.php?act=doadd&ctl=News";
	}
	
</script>

</head>
<body>

<form id="form1" action="index.php?act=doadd&ctl=News" method="post">
<div id="divbig">
<img src="images/addnews.jpg" />
	<table width="700px" cellpadding="10" cellspacing="0" border="1" align="center">
		<tr>
			<td width="100" align="center">新闻标题</td>
			<td width="680px">&nbsp;<input type="text" name="subject"/></td>
		</tr>
		<tr><td colspan="2">&nbsp;&nbsp;新闻来源:<select name="mid">
		
	<<?php ?>?php foreach($rowset as $row){?<?php ?>>
	<option value="<<?php ?>?php echo $row['id']?<?php ?>>"><<?php ?>?php echo $row['mname']?<?php ?>></option>
	<<?php ?>?php } ?<?php ?>>
		</select>&nbsp;&nbsp;新闻类型:<select name="cid">
				<<?php ?>?php foreach($crows as $crow):?<?php ?>>
				<option value="<<?php ?>?php echo $crow['id']?<?php ?>>"><<?php ?>?php echo $crow['cname']?<?php ?>></option>			
				<<?php ?>?php endforeach;?<?php ?>>		
			</select></td></tr>
		<tr>
			<td valign="top" align="center">新闻正文</td>
			<td><script name="content"id="editor" type="text/plain" style="width:580px;height:300px;"></script>
</td>
		</tr>
		<tr>
			
			<td colspan="2" align="center"><a href="javascript:;" id="ok" onclick="fun1()"><img src="images/ok.jpg" title="确认" alt=""/></a>&nbsp;&nbsp;&nbsp;<a href="index.php?act=init&ctl=Init" id="chance"><img src="images/chance.jpg" title="取消" alt=""/></a></td>
		</tr>
	</table>
	</div>
</form>
</body>
</html><?php }} ?>
