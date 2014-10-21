<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_controller extends CI_Controller {

	public function index()
	{
            $this->load->view('header');
            $this->load->view('account');
            $this->load->view('footer');
            
	}
}