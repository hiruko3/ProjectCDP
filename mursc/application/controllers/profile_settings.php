<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class profile_settings extends My_Controller {

		public function __construct(){

			parent::__construct();
			$this->load->model('profile_model');
		}


		public function settings(){
			$this->load->view('profile_view');
		}

		public function success_password(){
			$this->load->view('success_password');
		}

		public function replace_old_password(){

			$this->form_validation->set_rules('old_password', 'OPassword', 'required|md5|trim|min_length[7]|max_length[255]|callback_password_validation');
			$this->form_validation->set_rules('new_password', 'NPassword', 'required|md5|trim|min_length[7]|max_length[255]');
			$this->form_validation->set_rules('confirm_new_password', 'CNPassword', 'required|trim|min_length[7]|max_length[255]|matches[new_password]');
			
			if($this->form_validation->run()){	
				$new_password = $this->input->post('new_password');
				$this->profile_model->replace_password($new_password);
				$this->success_password();
			}else {
				$this->settings();
			}
		}


		public function password_validation(){
			if($this->profile_model->password_checked()){
				return true;
			} else {
				$this->form_validation->set_message('password_validation', 'Entry your password again please, it\'s not the good one !');
				return false;
			}
		}

	}