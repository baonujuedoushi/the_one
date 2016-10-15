<?php
require_once 'func/func.php';
class Upload{
	protected function buildinfo(){
		$n=0;
		$files=array();
		foreach($_FILES as $item){
			if(is_array($item['error'])){
				foreach($item['error'] as $key=>$error){
					if($error===UPLOAD_ERR_OK){
						$files[$n]['name']=$item['name'][$key];
						$files[$n]['size']=$item['size'][$key];
						$files[$n]['type']=$item['type'][$key];
						$files[$n]['tmp_name']=$item['tmp_name'][$key];
						$n++;
					}
				}
			}else{
				if($item['error']===UPLOAD_ERR_OK){
					unset($item['error']);
					$files[$n]=$item;
				}
			}
			$n++;
		}
		return $files;
	}
	function save($path,$keepoldname=true){
		$array=array();
		$files=$this->buildinfo();
		foreach($files as $file){
			$filename=$keepoldname?$file['name']:uuid().'.'.getex($file['name']);
			$bool=@move_uploaded_file($file['tmp_name'],$path.'/'.$filename);
			if($bool){
				$array[]=$filename;
			}
		}
		return $array;
	}
}