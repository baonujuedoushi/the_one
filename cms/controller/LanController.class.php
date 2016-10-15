<?php
require_once 'model/Lanmodel.class.php';
class Lancontroller {
	protected $_pdo;
	function __construct(){
		$this->_pdo=new Lanmodel();
	}
	function addlanAction(){
		require_once 'admin/addlan.html';
	}
	function doaddlanAction(){
		require_once 'admin/doaddlan.html';
	}
	function insertaddlanAction(){
		
		$this->_pdo->insert($_POST);
		
			require_once 'admin/doaddlan.html';
		
	}
	function listlanAction(){
		require_once 'admin/listlan.html';
	}
	function deletelanAction(){
	
		$max=$_GET['max'];
		@$arrid=$_POST['id'];
		
		$info=$this->_pdo->where('id in('.$arrid.')')->fetchAll();
		
		
		$this->_pdo->delandreturn($arrid, $max);
	}
	function modifylanAction(){
		$id=$_GET['id'];
		$title=$_GET['title'];
		$this->_pdo->update(array('lname'=>$title),'id='.$id);
	}
}