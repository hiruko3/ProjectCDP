<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sprint extends My_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('template');
 }

 function index(){
 	$data = array();
 	$all_tasks = array(); // tableau contenant toutes les tasks
 	$p = new Project();
 	$p->get_by_id($this->session->userdata['project_id']);

 	$userstory = $p->userstory->get();

 	foreach($userstory as $us)
 	{
 		$tab_task = array(); // on clear le tableau
 		$tasks = $us->task->get();
 		$i = 0;
 		foreach($tasks as $t)
 		{
 			$tab_task[$i] = $t; // on stocke les tasks d une us dans un tableau
 			++$i;
 			if(!in_array($t->id, $all_tasks)){ array_push($all_tasks, $t->id); } // on stocke l id de la task dans le tableau de toutes les tasks s il n y est pas deja
 		}
 		$tab_userstory[$us->id] = $tab_task; // on stocke les tableaux de tasks par us
 	}

 	$tab_userstory[-1] = $p->task->get()->where_not_in('id', $all_tasks)->get();


 	// manque les sans US !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 	$data['userstories'] = $tab_userstory;


 	/*$tasks = $p->task->get();
 	$data['tasks'] = $tasks;

 	foreach($tasks as $t)
 	{
 		echo 'id : ' . $t->id . br();
 		echo 'name : ' . $t->taskname . br();
 		$userstories = $t->userstory->get();
 		foreach($userstories as $us)
 		{
 			echo 'us id : ' . $us->id . br();
 			echo 'us name : ' . $us->userstoryname . br();
 		}
 		echo br();
 	}*/

	$this->load->view('header');
	$header_project_data = array('project_id' => $p->id, 'project_name' => $p->projectname);
    $this->load->view('project_header', $header_project_data);
    
	$this->load->view('sprint', $data);
    $this->load->view('footer');
 }

}
?>