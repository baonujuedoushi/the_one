<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:admin/login.html');
} 
?>
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
    <frame src="index.php?ctl=top" scrolling="no"/>
    <frameset cols="200,*"  noresize="no" >
    	<frame src="index.php?ctl=menu"scrolling="no">
    	<frame src="index.php?ctl=init" name="mainFrame" >
    </frameset>
</frameset>
</html>