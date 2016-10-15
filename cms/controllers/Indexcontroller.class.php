<?php
class Indexcontroller{
	function initAction(){
		require_once 'model/Newsmodel.class.php';
		$Newsmodel = new Newsmodel();
		$china_rowset = $Newsmodel->where('cid=1')->fields('id,subject,filepath')->limit(0,10)->order('id DESC')->fetchAll();
		$world_rowset = $Newsmodel->where('cid=2')->fields('id,subject,filepath')->limit(0,10)->order('id DESC')->fetchAll();
		$sport_rowset = $Newsmodel->where('cid=3')->fields('id,subject,filepath')->limit(0,10)->order('id DESC')->fetchAll();						
		require_once 'views/index.html';
	}
}