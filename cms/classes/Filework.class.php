<?php
class Filework{
	function createdir($path,$mode=0777,$recursive=true){
		if(file_exists($path)){
			return false;
		}
		mkdir($path,$mode,$recursive);
	}
	function fileput($filename,$string){
		return file_put_contents($filename, $string);
	}
	function readfile($path){
		return file_get_contents($path);
	}
	function delete($data,$where){
		
	}
	static function isEm($path) {
		if (! file_exists ( $path )) {
			return FALSE;
		}
		$handle = opendir ( $path );
		while ( ($item = readdir ( $handle )) !== FALSE ) {
			if ($item != '.' && $item != '..') {
				closedir ( $handle );
				return FALSE;
			}
		}
		closedir ( $handle );
		return TRUE;
	}
	function del($data){
	
		for($n = 0; $n < (count ( $data )); $n ++) {
			$filepath = 'news/' . $data [$n] ['filepath'];
		
			unlink ( $filepath ); // 删除文件
			$foderpath = dirname ( $filepath );
			if (self::isEm( $foderpath )) {
				rmdir ( $foderpath ); // 为空删除文件夹
			}
		}
		
	}
}