<?php

class User_model extends CI_Model {

	public function can_log_in(){
		$this->db->select('email, password');
		$this->db->from('user');
		$this-> db -> where('email', $this->input->post('email'));
		$this-> db -> where('password', md5($this->input->post('password')));
		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1){
			return true;
		}else {
			return false;
		}
	}

	public function add_temp_user($key){

		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'key' => $key
			);
		$query = $this->db->insert('tmp_user', $data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function is_key_valid($key){
		$this->db->where('key', $key);
		$query = $this->db->get('tmp_user');

		if($query->num_rows() == 1)
			return true;
		else return false;
	}

	public function add_user($key){

		$this->db->where('key',$key);
		$temp_user = $this->db->get('tmp_user');
		if($temp_user){
			$row = $temp_user->row();

			$data = array(
				'email' => $row->email,
				'password' => $row->password,
				);

			$query = $this->db->insert('user', $data);
		}
		if($query){
			$this->db->where('key',$key);
			$this->db->delete('tmp_user');
			return $data['email'];
		} else return false;
	}
}

?>