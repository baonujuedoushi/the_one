<?php
class Mediamodel extends Table{
	function getall($asoption=false,$select=0){
		$rowset=$this->fields('id,mname')->fetchAll();
		$opt=null;
		if($asoption){
			foreach ($rowset as $row){
				$selected=$row['id']==$select?' selected="selected"':null;
				$opt.='<option value="'.$row['id'].'" '.$selected.'>'.$row['mname'].'</option>';
			}
			return $opt;
		}
		return $rowset;
	}
	function delandreturn($arrid,$max){
		$this->delete('id in('.$arrid.')');
	
		$idarray=explode(',',$arrid);
		$rows=$this->where('id>'.$max)->limit(0,count($idarray))->fetchAll();
	
		$html='';
		for($n=0;$n<count($rows);$n++){
			$html.='<tr class="tr">';
			$html.='<td><span data="'.$rows[$n]['id'].'"  class="unchecked checkbox"></span></td>';
			$html.='<td>'.$rows[$n]['mname'].'</td>';
			$html.='<td>'.$rows[$n]['siteurl'].'</td>';
			$html.='</tr>';
		}
	
		echo $html;
	}
}