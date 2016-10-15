<?php
class Catemodel extends Table{
	function getall($asoption=false,$select=0){
		$rowset=$this->fields('id,cname')->fetchAll();
		$opt=null;
		if($asoption){
			foreach ($rowset as $row){
				$selected=$row['id']==$select?' selected="selected"':null;
				$opt.='<option value="'.$row['id'].'" '.$selected.'>'.$row['cname'].'</option>';
			}
			return $opt;
		}
		return $rowset;
	}
}