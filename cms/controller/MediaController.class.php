<?php
require_once 'model/Mediamodel.class.php';
class MediaController{
	protected $_model;
	function __construct(){
		$this->_model=new Mediamodel();
	}
	function doaddnewsaction(){
		require_once 'admin/addNews.html';
	}
	function newslistAction(){
		require_once 'admin/listNews.php';
	}
	function loginoutAction(){
		require_once 'admin/loginout.php';
	}
	function addmediaAction(){
		$this->_model->insert($_POST);
		
			require_once 'admin/doaddmedia.html';
		
		
	}
	function medialistAction(){
		require_once 'admin/addmedia.php';
	}
	function listmediaAction(){
		require_once 'admin/listmedia.php';
	}
	function modifymediaAction(){
		$data=$_GET['title'];
		$id=$_GET['id'];
		$www=$_GET['www'];
		$this->_model->update(array('mname'=>$data,'siteurl'=>$www),'id='.$id);
	}
	function deletemediaAction(){
	$max=$_GET['max'];
		@$arrid=$_POST['id'];
		
		
		
		
		$this->_model->delandreturn($arrid, $max);
	}
	
}