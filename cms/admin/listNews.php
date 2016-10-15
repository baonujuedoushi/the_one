<?php
//调用数据库配置文件
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
require_once 'config.inc.php';
require_once 'func/func.php';
require_once 'classes/page.class.php';

//连接数据库服务器
@$link = mysql_connect('localhost','root','');
mysql_select_db('cms');
//执行SQL查询
$pageSize=8;
@$curPage =$_GET['page'];

if($curPage==null ||$curPage<=0 ||!is_numeric($curPage)){
	$curPage=1;
}
$offset = ($curPage-1)*$pageSize;


$sql='select count(*) as num from news';
$res=mysql_query($sql);

$num=mysql_fetch_assoc($res);
$nums=$num['num'];


$page=new page($nums,8);
$start=$page->getstart();
$sql="select * from news limit $start,8";
$result = mysql_query($sql);
$totalRow = mysql_num_rows($result);
$totalPage = ceil($totalRow/$pageSize);
$_SESSION['totalpage']=$totalPage;
$bothNum =2;


if($curPage>$totalPage){
	$curPage=$totalPage;
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<style>
h2{
	color:#D0D4D0;
}
body{
	background:#283C50;
}
a{
	color:#D0D4D0;
}
td{
	color:#D0D4D0;
}
.unchecked{
	background:url(images/unchecked.png) no-repeat center;
}
.checked{
	background:url(images/checked.png) no-repeat center;
}
.checkbox{
	position:relative;
	width:14px;
	height:14px;
	display:block;
}
.light{
	background:#434645;
}
.page a{
	border:1px solid black;
	padding:5px 8px;
	margin-right:5px;
	text-decoration:none;
}
</style>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function(){
$('#zong').click(function(){//总复选控制
	if($(this).hasClass('unchecked')){
	$(this).removeClass('unchecked').addClass('checked');
$('#tb tr').each(function(){
	$(this).children().eq(0).children('span').removeClass('unchecked').addClass('checked');
})
	}else{
		$(this).removeClass('checked').addClass('unchecked');
		$('#tb tr').each(function(){
			$(this).children().eq(0).children('span').removeClass('checked').addClass('unchecked');
		})

		}
})
$('.tr').hover(//悬停效果
	function(){
		$(this).addClass('light');
		$(this).attr('title','双击修改标题');
	},
	function(){
		$(this).removeClass('light');
		$(this).attr('title','双击修改标题');
		}
	);
$('#del').live('click',function(){//删除传值
	maxid=$('#tb tr').nextAll().last().children().eq(0).children('span').attr('data');
	
	arr=new Array();
	$('#tb tr').each(function(){
		
		$span=$(this).children().eq(0).children('span');
		if($span.hasClass('checked')){
			arr.push($span.attr('data'));
			$(this).remove();
			}
		})
	$.post('index.php?act=delete&ctl=News&max='+maxid,'id='+arr,function(html){
		$(html).appendTo($('#tb'));
		},'html')
	
})
	
	$('.checkbox:not(:first)').live('click',function(){//单选控制全选
		//console.log($('.checkbox:not(:first)').eq(0));
		if($(this).hasClass('unchecked')){
			$(this).removeClass('unchecked').addClass('checked');
			}else{
				$(this).removeClass('checked').addClass('unchecked');
				}if(getCount()==$('.checkbox:not(:first)').length){
					$('#zong').addClass('checked').removeClass('unchecked');
					}else{
						$('#zong').addClass('unchecked').removeClass('checked');
						}
		})
	$('.tr').live('dblclick',function(){//双击修改
		$content=$(this).children().eq(1).text();
		
		$id=$(this).children().eq(0).children().eq(0).attr('data');
		$tr=$(this).children().eq(1);
		$(this).children().eq(1).text('');
		$input=$('<input id="in" type="text" value="'+$content+'">&nbsp;<input type="button" value="确定" id="que"/>&nbsp;&nbsp;<input type="button" value="取消" id="qu"/>').appendTo($(this).children().eq(1));
		$inpval=$('#in').val();
		$('#que').click(function(){//确定修改
			$inpval=$('#in').val();
			
			$.get('index.php?act=modifynews&ctl=News&id='+$id+'&title='+$inpval,function(){});
			$tr.text($inpval);
			$input.remove();
			})
			$('#qu').click(function(){//取消
				$inpval=$('#in').val();
				
				$input.remove();
				$tr.text($inpval);
				})
		})
		if($('.tr').length<8){
			$('#next').attr('href','javascript:;');
		}
		

})
function getCount(){
	var count=0;
	$zong=$('.checkbox:not(:first)');
	for(var n=0;n<$zong.length;n++){
		$dan=$zong.eq(n);
		if($dan.hasClass('checked')){
			count++;
			}
	}
	return count;
}
</script>
</head>
<body>
<h2>新闻列表</h2>
<table width="100%" cellpadding="10" cellspacing="0" border="1">
<tr><td colspan="3"><a href="javascript:;" id="del"><img src="images/delete.png"/></a></td></tr>
	<tr>
		<td width="30px"><span id="zong" class="unchecked checkbox"></span></td>
		<td style="font-size:22px;text-align:center">标题</td>
		<td width="100" style="font-size:22px">操作</td>
	</tr>
	<tbody id="tb">
	<?php while(@$row = mysql_fetch_assoc($result)) {?>
	<tr class="tr">
		<td><span data="<?php echo $row['id']?>"  class="unchecked checkbox"></span></td>
		<td><?php echo $row['subject']?></td>
		<td><a href="index.php?act=updatenews&ctl=News&id=<?php echo $row['id']?>" target="mainFrame" id="update">编辑</a></td>
	</tr>
	<?php }?>
	</tbody>
	<tr class="page">
		<td colspan="3"><?php echo $page->diplayblock();?></td>
	</tr>
</table>
</body>
</html>