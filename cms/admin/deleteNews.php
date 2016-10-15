<?php
header ( 'content-type:text/html;charset=utf8' );
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
function isEm($path) {
	if (! file_exists ( $path )) {
		return FALSE;
	}
	$handle = opendir ( $path );
	while ( ($item = readdir ( $handle )) !== FALSE ) {
		if ($item != '.' && $item != '..') {
			closedir ( $handle );
			return FALSE;
		}
	}
	closedir ( $handle );
	return TRUE;
}
// 是否为空文件夹 ↑
$id = $_POST ['id'];
$max=$_GET['max'];
// 获取数据

$arr = explode ( ',', $id );//装入一维数组
$retruncount=count($arr);
$a = new PDO ( 'mysql:host=localhost;dbname=cms', 'root', '' );
$place = str_repeat ( ',?', count ( $arr ) - 1 );
$sql = 'select filepath from news where id in(?' . $place . ')';
$stmt = $a->prepare ( $sql );

$stmt->execute ( $arr );
$info = $stmt->fetchAll ( PDO::FETCH_ASSOC );

for($n = 0; $n < (count ( $info )); $n ++) {
	$filepath = '../news/' . $info [$n] ['filepath'];
	
	unlink ( $filepath ); // 删除文件
	$foderpath = dirname ( $filepath );
	if (isEm ( $foderpath )) {
		rmdir ( $foderpath ); // 为空删除文件夹
	}
} 
$sql = 'delete from news where id in(?' . $place . ')';
$stmt = $a->prepare ( $sql );

$stmt->execute ( $arr );//删除数据库记录
$sql="select id,subject,filepath from news where id>:id limit $retruncount";
$stmt=$a->prepare($sql);
$stmt->execute(array(':id'=>$max));
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$html='';
for($n=0;$n<count($rows);$n++){
$html.='<tr class="tr">';
$html.='<td><span data="'.$rows[$n]['id'].'"  class="unchecked checkbox"></span></td>';
$html.='<td>'.$rows[$n]['subject'].'</td>';
$html.='<td><a href="javascript:;">编辑</a></td>';
$html.='</tr>';
}

echo $html; 




