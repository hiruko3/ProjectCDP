<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

            // relationships : project, dev, dependancies, TODO /////////////////////////////////us : input->post('us');
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



            //echo br(5) . $t->dev_id;

            ////
            if(!$r_t->save(/*$t_dep->all*/)){ $data['error'] = $r_t->error->string; }
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
}
?>
