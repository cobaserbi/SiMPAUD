<?php
class M_data extends CI_Model{	
	function getSelect($table){		
		return $this->db->get($table)->result();
	}
	function getSelectWhere($table,$where){		
		return $this->db->get_where($table,$where)->result();
	}	
	function setSimpan($table,$input){
		$this->db->insert($table,$input);
	}
	function getJoin($query){
		$hasil = $this->db->query($query);
		return $hasil->result();
	}
	function setHapus($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function setEdit($table,$where,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}

?>