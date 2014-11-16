<?php (defined('BASEPATH')) OR exit ('No direct script access allowed');

class My_Controller extends CI_Controller {


	protected $no_access_control = array(
		'login/sign_up',
		'login/index',
		'login/login',
		'login/restricted',
		'login/login_validation',
		'login/sign_up_validation',
		'login/register_user'
		);

	public function __construct() {
		parent::__construct();
		$this->check_auth();
	}

	// On vérifie les authorisations

	private function check_auth(){

		//Construction de l'uri
		$uri = $this->router->fetch_class().'/'.$this->router->fetch_method();

		//Si la personne n'est pas connecté et qu'elle veut aller sur un lien non autorisé
		if( ! $this->session->userdata('is_logged_in') && ! in_array($uri, $this->no_access_control)) {
			$this->kick();
		}
	}

	private function kick(){
		if ($this->input->is_ajax_request()){
			$response = array('status' => 'disconnected');
			echo (json_encode($response));
			die();
		}
		else redirect('login/restricted');
	}


}