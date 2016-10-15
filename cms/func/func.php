<?php
@$curPage =$_GET['page'];

if($curPage==null ||$curPage<=0 ||!is_numeric($curPage)){
	$curPage=1;
}

function uuid(){
	$uuid=md5(uniqid(microtime().mt_rand()));
	$uuid = substr ( $uuid, 0, 8 ) . '-' . substr ( $uuid, 8, 4 ) . '-' . substr ( $uuid, 12, 4 ) . '-' . substr ( $uuid, 16, 4 ) . '-' . substr ( $uuid, 20 );
	return $uuid;
}
function getex($file){
	return strtolower(pathinfo($file,PATHINFO_EXTENSION));
}
$bothNum=2;
@$totalPage=$_SESSION['totalpage'];
function pageList(){
	global $totalPage,$curPage,$bothNum;
	$link='';

	for($i=$bothNum;$i>=1;$i--){
		$page= $curPage-$i; //(2-2=0 超出 continue ;  2-1=1)
		if($page<1){
			continue;
		}
		$link.='<a href="index.php?act=newslist&ctl=News&page='.$page.'">'.$page.'</a>&nbsp;';
	}
	
	$link.='<a style="color:red" herf="index.php?act=newslist&ctl=News&page='.$curPage.'">'.$curPage.'</a>&nbsp;';
	
	for($i=1;$i<=$bothNum;$i++){
		$page=$curPage + $i;// (5+1); (5+2)超出 break
		if($page>$totalPage){
			break;
		}
		$link.='<a href="index.php?act=newslist&ctl=News&page='.$page.'">'.$page.'</a>&nbsp;';
	}
	return $link;
}


function firstP(){
	global $curPage,$totalPage;
	$first=$curPage!=1?'<a href="index.php?act=newslist&ctl=News&page=1">首页</a>':'首页';
	return $first;
}

function prevP(){
	global $curPage,$totalPage;
	$prev=$curPage!=1?'<a href="index.php?act=newslist&ctl=News&page='.($curPage-1).'">上一页</a>':'上一页';
	return $prev;
}

function nextP(){
	global $curPage,$totalPage;
	$next=($curPage!=$totalPage?'<a id="next" href="index.php?act=newslist&ctl=News&page='.($curPage+1).'">下一页</a>':'下一页');
	return $next;
}

function lastP(){
	global $curPage,$totalPage;
	$last=$curPage!=$totalPage?'<a href="index.php?act=newslist&ctl=News&page='.$totalPage.'">尾页</a>':'尾页';
	return $last;
}

function showPage(){
	$link='';
	$link.=firstP().'&nbsp;';
	$link.=prevP().'&nbsp;';
	$link.=pageList();
	$link.=nextP().'&nbsp;';
	$link.=lastP();
	return $link;
}
