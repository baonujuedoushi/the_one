<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script type="text/javascript">

	function fun1(){
	$ok=$('#form1').get(0);
	$ok.submit();
	$ok.action="index.php?act=addmedia&ctl=Media";
	}

</script>
</head>
<body>

<form id="form1" action="index.php?act=addmedia&ctl=Media" method="post">
<div id="divbig">

	<table width="700px" cellpadding="10" cellspacing="0" border="0" align="center">
		<tr>
			<td width="100" align="center">添加媒体</td>
			<td>&nbsp;<input type="text" name="mname"/></td>
		</tr>
		<tr>
			<td valign="top" align="center">媒体域名</td>
			<td><input name="siteurl" value=""/></td>
		</tr>
		<tr>
			
			<td colspan="2" align="center"><a href="javascript:;" id="ok" onclick="fun1()"><img src="images/ok.jpg" title="确认" alt=""/></a>&nbsp;&nbsp;&nbsp;<a href="index.php?act=init&ctl=Init" id="chance"><img src="images/chance.jpg" title="取消" alt=""/></a></td>
		</tr>
	</table>
	</div>
</form>
</body>
</html>