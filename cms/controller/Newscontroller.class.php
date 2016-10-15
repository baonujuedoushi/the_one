<?php
require_once 'model/Newsmodel.class.php';
class Newscontroller{
	protected $_pdo;
	function __construct(){
		$this->_pdo=new Newsmodel();
	}
	function addAction(){
		require_once 'model/Catemodel.class.php';
		require_once 'model/Mediamodel.class.php';
		$ms=new Mediamodel();
		$cc=new Catemodel();
		$crows=$cc->fetchAll();
		$rowset=$ms->fetchAll();
		require_once 'admin/addNews.html';
		
	}
	function doaddAction(){
		require_once 'classes/Filework.class.php';
		require_once 'model/Catemodel.class.php';
		require_once 'model/Mediamodel.class.php';
		$data=$_POST;//接收到的数据
		$fso=new Filework();
		$foldername=date('Y-m-d');
		$folderpath='news/'.$foldername;
		if(!file_exists($folderpath)){
			$fso->createdir($folderpath);
		}
		$filename=uuid().'.html';
		$filepath=$folderpath.'/'.$filename;
		
		
		$data['addtime']=time();//时间戳
		$cmodel=new Catemodel();
		$crow=$cmodel->where('id='.$_POST['cid'])->fetch();
		$mmodel=new Mediamodel();
		$mrow=$mmodel->where('id='.$_POST['mid'])->fetch();
	
		$path='thems/model.html';
		$html=$fso->readfile($path);
		
		$html=str_replace('<!--subject-->', $_POST['subject'], $html);
		$html=str_replace('<!--content-->', $_POST['content'], $html);
		$html = str_replace ( '<!--cname-->', $crow ['cname'], $html );
		$html = str_replace ( '<!--mediaurl-->', $mrow ['siteurl'], $html );
		$html = str_replace ( '<!--medianame-->', $mrow ['mname'], $html );
		$html = str_replace ( '<!--addtime-->', date ( 'Y年m月d日 H:i', $data ['addtime'] ), $html );
		$html = str_replace('<!--SITEURL-->', SITEURL, $html);
		$data['filepath']=$foldername.'/'.$filename;//2015/sadj-231.html
		$this->_pdo->insert($data);
		$id=$this->_pdo->lastinsertid();
		$html = str_replace('<!--id-->',$id,$html);
		$fso->fileput($filepath, $html);
		require_once 'admin/newscom.html';
	}
	function getCommentNumAction(){
		$id = $_GET['id'];
		$row = $this->_pdo->fields('commentcount')->where('id='.$id)->fetch();
		echo $row['commentcount'];
	}
	function newscomAction(){
		require_once 'admin/addNews.html';
	}
	function newslistAction(){
		require_once 'admin/listNews.php';
	
		
	}
	function updatenewsAction(){
		require_once 'model/Catemodel.class.php';
		require_once 'model/Mediamodel.class.php';
		$ms=new Mediamodel();//媒体
		$cc=new Catemodel();//栏目
		$id=$_GET['id'];
		$row=$this->_pdo->where('id='.$id)->fetch();//新闻信息
		$opt=$ms->getall(true,$row['mid']);//媒体
		$ccrow=$cc->getAll(true,$row['cid']);//栏目
		
		require_once 'admin/updatenews.html';
	}
	function initAction(){
		require_once 'admin/init.php';
	}
	function modifynewsAction(){
		$id=$_GET['id'];
		$title=$_GET['title'];
		$this->_pdo->update(array('subject'=>$title),'id='.$id);
	}
	function doupdatenewsAction(){
		$id=$_GET['id'];
	
		$this->_pdo->update($_POST,'id='.$id);
		require_once 'admin/doupdatenews.html';
	}
	function deleteAction(){
		require_once 'classes/Filework.class.php';
		$max=$_GET['max'];
		@$arrid=$_POST['id'];
		if($arrid){
		$info=$this->_pdo->where('id in('.$arrid.')')->fetchAll();
		$fileobj=new Filework();
		$fileobj->del($info);
		$this->_pdo->delandreturn($arrid, $max);
		}
	}
}
