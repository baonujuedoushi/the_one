<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
$id=$_GET['id'];
$pdo=new PDO('mysql:host=localhost;dbname=cms','root','');
$sql='select subject,content from news where id=?';
$stmt=$pdo->prepare($sql);
$stmt->execute(array($id));
$row=$stmt->fetch(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../thems/default/styles/reset.css" type="text/css" />
<style >
body{
	background:#283C50;
}
#divbig{
	background:url(../images/tablebg.jpg);
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
	$ok.action="doupdatenews.php?id=<?php echo $id?>";
	}
function fun2(){
	$ok=$('#form1').get(0);
	
}
</script>
</head>
<body>

<form id="form1" action="doupdatenews.php?id=<?php echo $id?>" method="post">
<div id="divbig">

	<table width="700px" cellpadding="10" cellspacing="0" border="1 solid #3C7AA1" align="center">
		<tr>
			<td width="100" align="center">新闻标题</td>
			<td>&nbsp;<input type="text" name="subject" value="<?php echo $row['subject']?>"/></td>
		</tr>
		<tr>
			<td valign="top" align="center">新闻正文</td>
			<td><textarea name="content" rows="20" cols="60"><?php echo $row['content']?></textarea></td>
		</tr>
		<tr>
			
			<td colspan="2" align="center"><a href="javascript:;" id="ok" onclick="fun1()"><img src="../images/ok.jpg" title="确认" alt=""/></a>&nbsp;&nbsp;&nbsp;<a href="init.php" id="chance" onclick="fun2()"><img src="../images/chance.jpg" title="取消" alt=""/></a></td>
		</tr>
	</table>
	</div>
</form>
</body>
</html>