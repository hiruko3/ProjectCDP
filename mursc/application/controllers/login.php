<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends My_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   	$this->load->model('user_model');
	   	$this->load->library('email');
	 }

	 function index()
	 {
	    $this->login();
	 }

	 public function login(){
	 	$this->load->view('header');
	 	$this->load->view('login_view');
	 	$this->load->view('footer');
	 }

	 public function member(){
	 	$this->load->view('header');
	 	//if($this->session->userdata('is_logged_in')){
	 		$this->load->view('member_view');
	 	//}else {
	 	//	redirect('login/restricted');
	 	//}
	 	$this->load->view('footer');
	 }

	 public function restricted(){
	 	$this->load->view('header');
	 	$this->load->view('restricted_view');
	 	$this->load->view('footer');
	 }

	 public function login_validation(){

	 	$this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
	 	$this->form_validation->set_rules('password','Password','required|trim|md5|min_length[7]|max_length[255]');

	 	if($this->form_validation->run()){
	 		$data = array(
	 			'email' => $this -> input -> post('email'),
	 			'is_logged_in' => 1
	 			);
	 		$this -> session -> set_userdata($data);

	 		$u = new user();
	 		$u->where('email', $this->input->post('email'))->get();
	 		$this->session->set_userdata('user_id', $u->id);

	 		redirect('user_controller');
	 	} else {
	 		redirect('user_controller');
	 	}
	}

	public function validate_credentials(){

		if($this->user_model->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials','Incorrect Username/Password.');
			return false;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('user_controller');
	}

	public function sign_up(){
		$this->load->view('header');
		$this->load->view('sign_up');
		$this->load->view('footer');
	}

	public function sign_up_validation(){

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mursc_users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim|min_length[7]|max_length[255]');
		$this->form_validation->set_rules('confirm_password', 'CPassword', 'required|trim|min_length[7]|max_length[255]|matches[password]');
		
		$this->form_validation->set_message('is_unique', 'That email already exists');

		if($this->form_validation->run()){

			//Generate a random key for the user's token
			$key = md5(uniqid());

			//send a message to the user with a unique key to confirm account
			$this->email->from('romain3.verger3@gmail.com','Lemon');
			//$this->email->from('romainwownolife@hotmail.fr','Lemon');
			$this->email->to($this->input->post('email'));
			$this->email->subject("Confirm your account by validating your email adress");

			$message = "<p> Thank you for signing up !<p>";
			$message .="<p><a href ='".base_url()."login/register_user/$key' > Click here </a>
			to confirm your account </p>";

			$this->email->message($message);

			if($this->user_model->add_temp_user($key)){
				if($this->email->send()){
					echo "The email has been sent !";
				} else {
					 show_error($this->email->print_debugger());
				}
			} else echo "failed adding database !";
		} else {
			$this->sign_up();
		}
	}

	public function register_user($key){
		if($this->user_model->is_key_valid($key)){
			if($email = $this->user_model->add_user($key)){
				$data = array(
					'email' => $email,
					'is_logged_in' => 1
					);

				$this->session->set_userdata($data);
				redirect('login/member');
			} else echo "failed when adding you to our database";
		} else echo "key is not valid";
	}

}
?>