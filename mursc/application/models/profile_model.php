<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class profile_model extends CI_Model {

		public function password_checked(){
			$email = $this->session->userdata('email');
			$this->db->select('email, password');
			$this->db->from('mursc_users');
			$this-> db -> where('email', $email);
			$this-> db -> where('password', md5($this->input->post('old_password')));
			$query = $this -> db -> get();
			
			if($query -> num_rows() == 1){
				return true;
			}else {
				return false;
			}
		}


		public function replace_password($new_password){
				$email = $this->session->userdata('email');
				$this->db-> where('email', $email);
				$this->db->set('password', $new_password);
				$this->db->update('mursc_users');
		}
		

}

