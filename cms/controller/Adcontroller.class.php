<?php
require_once 'model/Admodel.class.php';
class AdController{
	protected $_pdo;
	function __construct(){
		$this->_pdo=new Admodel();
	}
	function addAction(){
		require_once 'admin/addad.html';
	}
	function doaddAction(){
		require_once 'classes/Upload.class.php';
		require_once 'classes/Filework.class.php';
		$upload=new Upload();
		$files=$upload->save('ad',false);
		$data['linkurl']=$_POST['linkurl'];
		$data['imageurl']=join(null,$files);
		
		$this->_pdo->insert($data);
		$rowset=$this->_pdo->fetchAll();
		$js=null;
		$js.="var addArr=new Array();\n";
		$js.="var lkarr=new Array();\n";
		foreach($rowset as $key=>$row){
			$js.="addArr[{$key}]='{$row['imageurl']}';\n";
			$js.="lkarr[{$key}]='{$row['linkurl']}';\n";
		}
		$fso=new Filework();
		$fso->fileput('ad/ad.js', $js);
		require_once 'admin/overad.html';
	}
	function adlistAction(){
		
		require_once 'admin/adlist.html';
	}
	function deleteadAction(){
		$max=$_GET['max'];
		@$arrid=$_POST['id'];
		$this->_pdo->delandreturn($arrid, $max);
	}
	function modifyadAction(){
		$id=$_GET['id'];
		$title=$_GET['title'];
		$this->_pdo->update(array('linkurl'=>$title),'id='.$id);
	}
}