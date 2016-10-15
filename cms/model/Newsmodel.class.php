<?php

class Newsmodel extends Table{
	function delandreturn($arrid,$max){
		$this->delete('id in('.$arrid.')');
	
		$idarray=explode(',',$arrid);
		$rows=$this->where('id>'.$max)->limit(0,count($idarray))->fetchAll();
	
		$html='';
		for($n=0;$n<count($rows);$n++){
			$html.='<tr class="tr">';
			$html.='<td><span data="'.$rows[$n]['id'].'"  class="unchecked checkbox"></span></td>';
			$html.='<td>'.$rows[$n]['subject'].'</td>';
			$html.='<td><a href="javascript:;">编辑</a></td>';
			$html.='</tr>';
		}
	
		echo $html;
	}
	
}
