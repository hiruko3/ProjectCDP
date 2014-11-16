<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

<<<<<<< HEAD
class task_controller extends My_Controller {

    public $taskDate;
    public $taskDescription;
    public $userAttached;
    public $taskName;


     function __construct() {
        parent::__construct();
           $taskDate = "";
     $taskDescription = "";
     $taskName = "";
        $taskData = array('date' => $taskDate,
        'description' => $taskDescription,
        'name' => $taskName
        );
        $this->load->library('table',$taskData);
     

    }

    function displayTask(){
        $this->load->view('task_view');
    }

    function setDate($date){
        $this->taskDate = $date;
    }

    function setDateFin($date){
        $this->dateFin = $date;
    }

    function setDescriptif($descriptif){
        $this->$taskDescription = $descriptif;
    }

    function setTaskName($name){
        $this->taskName = $name;
    }

    function taskSettings(){
        $this->load->view('task_edit');
    }

    function task_edit(){

        $this->form_validation->set_rules('task_name', 'Task', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_date', 'Date', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_description', 'Description', 'xss_clean|callback_validate_edit');
        if($this->form_validation->run()){
            $this->setDescriptif($this->input->post('description'));
            $this->setDate($this->input->post('date'));
            $this->setTaskName($this->input->post('task'));
        } else echo 'fail during edit this task try again !';
    }

    function validate_edit(){
        return true;
    }

=======
session_start();

class Task_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

	function index()
	{
        $this->load->view('header');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);

        $t = new task();
        $task_list = $t->where_related('userstory/project', 'id', $p->id)->distinct()->get();
        $data = array(
            'p' => $p,
            'task_list' => $task_list
            );
        $this->load->view('task_list', $data);

        $this->load->view('footer');
	}

    function new_task()
    {
        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array('project_id' => $p->id, 'project_name' => $p->projectname);

        $t = new task();
        $data = array();
        $data['status'] = $t->_get_task_status();

        $users = $p->user->where_join_field($p, 'relationship_type', 'member')->get();
        $data['dev_list'] = array();
        foreach($users as $d){ $data['dev_list'][$d->id] = $d->username; }

        $tasks = $p->task->get();
        $data['task_list'] = array();
        foreach($tasks as $t){ $data['task_list'][$t->id] = $t->taskname; };

        $us = $p->userstory->get();
        $data['us_list'] = array();
        foreach($us as $b){ $data['us_list'][$b->id] = $b->userstoryname; }

        if (!empty($_POST))
        {
            $r_t = new task();
            $r_t->taskname = $this->input->post('name');
            $r_t->statut = $t->_get_name($this->input->post('status'));
            $r_t->cost = $this->input->post('cost');
            $r_t->datestart = $this->input->post('date_start');
            $r_t->dateend = $this->input->post('date_end');
            $r_t->description = $this->input->post('desc');

            // relationships : project, dev, dependancies tasks), us
            $r_t->project_id = $p->id;
            $u = new user();
            $r_t->dev_id = $this->input->post('dev');

            $t_dep = new task();
            $deps = array();
            if($this->input->post('dep'))
            {
                foreach($this->input->post('dep') as $dep){ array_push($deps, $dep); }
                $t_dep->where_in('id', $deps)->get();
            }

            $asso_us = new userstory();
            $tab_asso_us = array();
            if($this->input->post('us'))
            {
                foreach($this->input->post('us') as $post_us){ array_push($tab_asso_us, $post_us); }
                $asso_us->where_in('id', $tab_asso_us)->get();
            }
            ////

            if(!$r_t->save(array($t_dep->all, $asso_us->all))){ $data['error'] = $r_t->error->string; }
            else
            {
                $data['succes'] = 'Registered task.';

                // recharger la liste des taches
                $tasks = $p->task->get();
                $data['task_list'] = array();
                foreach($tasks as $t){ $data['task_list'][$t->id] = $t->taskname; };
                ////
            }
        }

        $this->load->view('header');
        $this->load->view('project_header', $header_project_data);
        $this->load->view('task_new', $data);
        $this->load->view('footer');
    }

    function delete_task($task_id)
    {
        echo "delete";
    }

    function view($task_id)
    {
        echo "view";
    }

    function edit_task($task_id)
    {
        echo "edit";
    }
>>>>>>> 033f295a89cc02c34a725d165e511b2c40d87c1b
}
?>
