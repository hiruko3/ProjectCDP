<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User_model extends CI_Model {

	public function can_log_in(){
		$this->db->select('username, email, password');
		$this->db->from('mursc_users');
		$this-> db -> where('email', $this->input->post('email')) OR $this->db->where('username', $this->input->post('username'));
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
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'key' => $key
			);
		$query = $this->db->insert('mursc_tmp_users', $data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function is_key_valid($key){
		$this->db->where('key', $key);
		$query = $this->db->get('mursc_tmp_users');

		if($query->num_rows() == 1)
			return true;
		else return false;
	}

	public function add_user($key){

		$this->db->where('key',$key);
		$temp_user = $this->db->get('mursc_tmp_users');
		if($temp_user){
			$row = $temp_user->row();

			$data = array(
				'username' => $row->username,
				'email' => $row->email,
				'password' => $row->password,
				);

			$query = $this->db->insert('mursc_users', $data);
		}
		if($query){
			$this->db->where('key',$key);
			$this->db->delete('mursc_tmp_users');
			return $data['email'];
		} else return false;
	}
}

?>