<?php
abstract class Table{
	protected $_table;
	protected $_link;
	protected static $_db;
	protected $_properties=array('fields' => '*' );
	function __construct(){
		$this->_table=strtolower(substr(get_class($this),0,-5));
		$this->_link=self::gettype();
	}
	public static function gettype(){
		return self::$_db;
	}
	public static function settype($db){
		self::$_db=$db;
	}
	function insert($data){
		return $this->_link->insert($this->_table,$data);
	}
	function lastinsertid(){
		return $this->_link->lastinsertid();
	}
	function update($data,$where=null){
		return $this->_link->update($this->_table,$data,$where);
	}
	function delete($where=null){
		return $this->_link->delete ( $this->_table, $where );
	}
	function fields($fields = '*') {
		$this->_properties ['fields'] = $fields;
		return $this;
	}
	function where($where) {
		$this->_properties ['where'] = $where;
		return $this;
	}
	function group($group) {
		$this->_properties ['group'] = $group;
		return $this;
	}
	function order($order) {
		$this->_properties ['order'] = $order;
		return $this;
	}
	function limit($offset, $row_count) {
		$this->_properties ['limit'] = $offset . ',' . $row_count;
		return $this;
	}
	protected function _buildsql() {
		$sql = 'SELECT ' . $this->_properties ['fields'] . ' FROM ' . $this->_table;
		if (@$this->_properties ['where']) {
			$sql .= ' WHERE ' . $this->_properties ['where'];
		}
		if (@$this->_properties ['group']) {
			$sql .= ' GROUP BY ' . $this->_properties ['group'];
		}
		if (@$this->_properties ['order']) {
			$sql .= ' ORDER BY ' . $this->_properties ['order'];
		}
		if (@$this->_properties ['limit']) {
			$sql .= ' LIMIT ' . $this->_properties ['limit'];
		}
	
		return $sql;
	}
	function fetch($fetch_style = Mysql::FETCH_ASSOC) {
		$this->_properties ['limit'] = '0,1';
		$sql = $this->_buildsql ();
		return $this->_link->fetch ( $sql, $fetch_style );
	
	}
	function fetchAll($fetch_style = Mysql::FETCH_ASSOC) {
		$sql = $this->_buildsql ();
		return $this->_link->fetchAll ( $sql, $fetch_style );
	}

}