<?php
class Page{
	protected $page;
	protected $pagesize;
	protected $totpage;
	function __construct($nums,$pagesize=8){
		$page=isset($_GET['page'])?$_GET['page']:$_GET['page']=1;
		if($_GET['page']<=0 || $page==null ||!is_numeric($page)){
			$_GET['page']=1;
		}
		$totpage=ceil($nums/$pagesize);
		$this->page=$page;
		$this->pagesize=$pagesize;
		$this->totpage=$totpage;
	}
	function getstart(){
		return $start=($this->page-1)*$this->pagesize;
	}
	function diplayblock($bothnum=2){
		$totnum=$bothnum*1+1;
		if($this->totpage<$totnum){
			$start=1;
			$end=$this->totpage;
		}else{}
		if($this->page-$bothnum<=0){
			$start=1;
			$end=$totnum;
		}elseif($this->page+2>$this->totpage){
			$start=$this->totpage-$totnum+1;
			$end=$this->totpage;
		}else{
			$start=$this->page-$bothnum;
			$end=$this->page+$bothnum;
		}
		$prevpage=$this->page-1;
		$nextpage=$this->page+1;
		$firstpage=1;
		$pagestr='';
		$pagestr.="<a href='?act=newslist&ctl=News&page={$firstpage}'>首页</a>";
		if($this->page!=1){
			$pagestr.="<a href='?act=newslist&ctl=News&page={$prevpage}'>上一页</a>";
		}
		for($i=$start;$i<=$end;$i++){
			if($this->page==$i){
				$pagestr.="<a href='?act=newslist&ctl=News&page={$i}' style='background:red;'>{$i}</a>";
			}else{
				$pagestr.="<a href='?act=newslist&ctl=News&page={$i}'>{$i}</a>";
			}
		}
		if($this->page!=$this->totpage){
			$pagestr.="<a href='?act=newslist&ctl=News&page={$nextpage}'>下一页</a>";
		}
		$lastpage=$this->totpage;
		$pagestr.="<a href='?act=newslist&ctl=News&page={$lastpage}'>尾页</a>";
		return $pagestr;
	}
}