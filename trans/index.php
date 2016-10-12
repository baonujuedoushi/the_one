<?php
/**
数据库事务操作 by huangKaiQin
 */
$connect = '数据库对象';
$transAction = $connect -> beginTransaction();
try{
	$sql1 = 'SELECT * FROM ....';
	$sql2 = 'SELECT * FROM ....';
	$connect -> createCommand($sql1) -> execute();
	$connect -> createCommand($sql2) -> execute();
	$transAction -> commit();
}catch(Exception $e){
	$transAction -> rollback();
	echo $e -> getMessage();//操作回滚抛出异常
}