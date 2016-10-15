<?php
class Mysql {
	const FETCH_NUM = PDO::FETCH_NUM;
	const FETCH_ASSOC = PDO::FETCH_ASSOC;
	const FETCH_BOTH = PDO::FETCH_BOTH;
	const FETCH_OBJ = PDO::FETCH_OBJ;
	protected $_link;
	function __construct($hostname, $username, $password, $database) {
		$this->_link = new PDO ( 'mysql:host=' . $hostname . ';dbname=' . $database, $username, $password );
	}
	function insert($table, $data) {
		$keys = join ( ',', array_keys ( $data ) );
		$placeHolds = '?' . str_repeat ( ',?', count ( $data ) - 1 );
		$sql = 'INSERT ' . $table . ' (' . $keys . ') VALUES(' . $placeHolds . ')';
		$stmt = $this->_link->prepare ( $sql );
		$stmt->execute ( array_values ( $data ) );
		return $stmt->rowCount ();
	}
	function lastinsertid() {
		return $this->_link->lastInsertId ();
	}
	function update($table, $data, $where = NULL) {
		$string = NULL;
		$arr = array ();
		foreach ( $data as $key => $val ) {
			$string .= $string == NULL ? $key . '=?' : ',' . $key . '=?';
			$arr [] = $val;
		}
		$sql = 'UPDATE ' . $table . ' SET ' . $string . ($where == NULL ? $where : ' WHERE ' . $where);
		$stmt = $this->_link->prepare ( $sql );
		$stmt->execute ( $arr );
		return $stmt->rowCount ();
	}
	function delete($table,$where=null){
		$sql='delete from '.$table.($where==null?$where:' where '.$where);
		$stmt=$this->_link->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}
	function fetch($sql,$fetch_style = self::FETCH_ASSOC) {
		$stmt = $this->_link->prepare ( $sql );
		$stmt->execute ();
		$row = $stmt->fetch ($fetch_style);
		return $row;
	}
	function fetchAll($sql,$fetch_style=self::FETCH_ASSOC) {
		$stmt=$this->_link->prepare($sql);
		$stmt->execute();
		$rowset = $stmt->fetchAll($fetch_style);
		return $rowset;
	}
}