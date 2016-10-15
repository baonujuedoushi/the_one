<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:58:24
         compiled from "admin\listmedia.php" */ ?>
<?php /*%%SmartyHeaderCode:1096756930c40764170-28416815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08a3e6f22b702255063f25fa4a605e15436dc8ba' => 
    array (
      0 => 'admin\\listmedia.php',
      1 => 1451640547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1096756930c40764170-28416815',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930c408583b9_42194613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930c408583b9_42194613')) {function content_56930c408583b9_42194613($_smarty_tpl) {?><<?php ?>?php

//调用数据库配置文件
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
require_once 'config.inc.php';
//连接数据库服务器
$link = mysql_connect('localhost','root','');
mysql_select_db('cms');
//执行SQL查询
$sql = "SELECT id,mname,siteurl FROM media";
$result = mysql_query($sql);
?<?php ?>>
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
		$(this).attr('title','双击修改');
	},
	function(){
		$(this).removeClass('light');
		$(this).attr('title','双击修改');
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
	$.post('index.php?act=deletemedia&ctl=Media&max='+maxid,'id='+arr,function(html){
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
		    $out=$(this).children().eq(2).text();
		$id=$(this).children().eq(0).children().eq(0).attr('data');
		$tr=$(this).children().eq(1);
		$tr2=$(this).children().eq(2);
		$(this).children().eq(1).text('');
		$input=$('<input id="in" type="text" value="'+$content+'">&nbsp;网址:<input id="out" type="text" value="'+$out+'"/><input type="button" value="确定" id="que"/>&nbsp;&nbsp;<input type="button" value="取消" id="qu"/>').appendTo($(this).children().eq(1));
		$inpval=$('#in').val();
		$outval=$('#out').val();
		$('#que').click(function(){//确定修改
			$inpval=$('#in').val();
			$outval=$('#out').val();
			
			
			$.get('index.php?act=modifymedia&ctl=Media&id='+$id+'&title='+$inpval+'&www='+$outval,function(){});
			$tr.text($inpval);
			$tr2.text($outval);
			$input.remove();
			})
			$('#qu').click(function(){//取消
				$inpval=$('#in').val();
				
				$input.remove();
				$tr.text($inpval);
				})
		})

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
<h2>媒体列表</h2>
<table width="100%" cellpadding="10" cellspacing="0" border="1">
<tr><td colspan="3"><a href="javascript:;" id="del"><img src="images/delete.png"/></a></td></tr>
	<tr>
		<td width="30px"><span id="zong" class="unchecked checkbox"></span></td>
		<td style="font-size:22px;text-align:center">域名</td>
		<td style="font-size:22px;text-align:center">网址</td>
		
	</tr>
	<tbody id="tb">
	<<?php ?>?php while(@$row = mysql_fetch_assoc($result)) {?<?php ?>>
	<tr class="tr">
		<td><span data="<<?php ?>?php echo $row['id']?<?php ?>>"  class="unchecked checkbox"></span></td>
		<td><<?php ?>?php echo $row['mname']?<?php ?>></td>
		<td><<?php ?>?php echo $row['siteurl']?<?php ?>></td>

	</tr>
	<<?php ?>?php }?<?php ?>>
	</tbody>
</table>
</body>
</html><?php }} ?>
