<?php
date_default_timezone_set('prc');
@$ctl=$_GET['ctl'];
define('SITEURL',str_replace('\\', '/', substr(dirname(dirname(__FILE__)),strlen($_SERVER['DOCUMENT_ROOT']))));
require_once 'classes/Mysql.class.php';
require_once 'classes/Table.class.php';
require_once 'config.inc.php';
require_once 'func/func.php';

$db=new Mysql($config['db']['hostname'],$config['db']['username'],$config['db']['password'],$config['db']['basename']);
#var_dump($ctl);exit;
Table::settype($db);
if($ctl==null){
	$ctl='Index';
}

@$act=strtolower($_GET['act']);
if($act==null){
	$act='init';
}

$methodname=$act.'action';
$classname=ucfirst(strtolower($ctl)).'Controller';
$classfile='controller/' . $classname . '.class.php';
if(!file_exists($classfile)){
	die('类文件不存在');
}
require_once $classfile;
$obj=new $classname();
if(!method_exists($obj, $methodname)){
	die('方法不存在');
}
$obj->$methodname();




