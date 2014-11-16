<?php 

	class header extends My_Controller {

		function __construct(){
			parent::__construct();
		}

		public function is_logged_in(){
			return ($this->session->userdata('is_logged_in') == 1);
		}
	}

?>