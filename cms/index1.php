<?php
define('SITEURL',str_replace('\\', '/', substr(dirname(dirname(__FILE__)),strlen($_SERVER['DOCUMENT_ROOT']))));
require_once 'classes/Mysql.class.php';
require_once 'classes/Table.class.php';
require_once 'config.inc.php';
require_once 'func/func.php';
date_default_timezone_set ( 'Asia/Shanghai' );
//实例化数据库
$db = new Mysql ( $config ['db'] ['hostname'], $config ['db'] ['username'], $config ['db'] ['password'], $config ['db'] ['basename'] );
//指定所有的数据表所依赖的数据库引擎为$db
Table::settype ( $db );
//获取ctl参数值(文件名称兼类名称)
@$ctl = $_GET ['ctl'];
if ($ctl == '') {
	$ctl = 'Index';
}
//获取act参数(方法名称)
@$act = strtolower ( $_GET ['act'] );
if ($act == '') {
	$act = 'init';
}
$methodName = $act . 'Action';
$className = ucfirst ( strtolower ( $ctl ) ) . 'Controller';
$classFile = 'controllers/' . $className . '.class.php';
if (! file_exists ( $classFile )) {
	exit ( '指定的类文件不存在' );
}
require_once $classFile;
$obj = new $className ();
if (! method_exists ( $obj, $methodName )) {
	die ( '指定的方法名称不存在' );
}
$obj->$methodName ();
