<?php
class Model_masyarakat extends CI_Model{
	function cari_user($username, $password){
		$query = $this->db->query("select * from user where  username='$username' and password='$password'");
		return $query;
	}
}

