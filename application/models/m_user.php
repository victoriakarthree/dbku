
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {

	public function login($post)
	{
			$this->db->select('*');
			$this->db->from('tbuser'); 
			$this->db->where('username', $post['username']);
			$this->db->where('password', sha1($post['password']));
			$query = $this->db->get();
			return $query;

	}

	public function get($id =null){
		$this->db->from('tbuser');
		if($id !=null){
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}