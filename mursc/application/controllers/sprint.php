<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sprint extends My_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('template');
 }

 function index(){
 	$p = new Project();
 	$p->get_by_id($this->session->userdata['project_id']);
 	$tasks = $p->task->get();
 	$data['tasks'] = $tasks;

	$this->load->view('header');
	$header_project_data = array('project_id' => $p->id, 'project_name' => $p->projectname);
    $this->load->view('project_header', $header_project_data);
    
	$this->load->view('sprint',$data);
    $this->load->view('footer');
 }

}
?>