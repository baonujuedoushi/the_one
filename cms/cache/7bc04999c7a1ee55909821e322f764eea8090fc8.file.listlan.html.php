<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:58:22
         compiled from "admin\listlan.html" */ ?>
<?php /*%%SmartyHeaderCode:2722256930c3ebaeb91-26494026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bc04999c7a1ee55909821e322f764eea8090fc8' => 
    array (
      0 => 'admin\\listlan.html',
      1 => 1451637597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2722256930c3ebaeb91-26494026',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930c3eca2dd9_01294038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930c3eca2dd9_01294038')) {function content_56930c3eca2dd9_01294038($_smarty_tpl) {?><<?php ?>?php

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
$sql = "SELECT id,lname FROM lan";
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
	$.post('index.php?act=deletelan&ctl=Lan&max='+maxid,'id='+arr,function(html){
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
			
			$.get('index.php?act=modifylan&ctl=Lan&id='+$id+'&title='+$inpval,function(){});
			$tr.text($inpval);
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
<h2>栏目列表</h2>
<table width="100%" cellpadding="10" cellspacing="0" border="1">
<tr><td colspan="3"><a href="javascript:;" id="del"><img src="images/delete.png"/></a></td></tr>
	<tr>
		<td width="30px"><span id="zong" class="unchecked checkbox"></span></td>
		<td style="font-size:22px;text-align:center">栏目</td>
		
		
	</tr>
	<tbody id="tb">
	<<?php ?>?php while(@$row = mysql_fetch_assoc($result)) {?<?php ?>>
	<tr class="tr">
		<td><span data="<<?php ?>?php echo $row['id']?<?php ?>>"  class="unchecked checkbox"></span></td>
		<td><<?php ?>?php echo $row['lname']?<?php ?>></td>
		

	</tr>
	<<?php ?>?php }?<?php ?>>
	</tbody>
</table>
</body>
</html><?php }} ?>
