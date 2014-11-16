<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Test_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('html');
    }

	function index($id)
	{
        $this->load->view('header');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);
        
        $this->load->view('test_list');
        $this->load->view('footer');
	}
}
?>
