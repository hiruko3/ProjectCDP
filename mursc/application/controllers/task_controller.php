<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Task_controller extends My_Controller {
    function __construct() {
        parent::__construct();
    }

    function displayTask($t_id){
        $task = new task();
        $task->get_by_id($t_id);
        $this->load->view('task_view',$task);
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

    function index($data = array())
    {
        $this->load->view('header');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);

        $t = new task();
        $task_list = $t->where_related('project', 'id', $p->id)->distinct()->get();

        foreach($task_list as $task)
        {
            // dev
            $u = new User();
            $u->get_by_id($task->dev_id);
            $task->dev_name = $u->username;
            ////
            // dep
            $tasks = $task->task->get(); // liste des taches dont depend la tache

            ////////// pour avoir la liste des taches (et non le nombre de taches), decommenter ce qui suit... //////////
            /*$tasks_list_string = '';
            foreach($tasks as $ta){ $tasks_list_string .= $ta->taskname . ',' . br(); }
            $task->dep_list = $tasks_list_string;*/
            ////////// ...et commenter cette ligne //////////
            $task->dep_list = $tasks->result_count();
            ////////////////////////////////////////

            ////
            // us
            $userstories = $task->userstory->get(); // liste des us auxquelles appartient la tache

            ////////// pour avoir la liste des us (et non le nombre d us), decommenter ce qui suit... //////////
            /*$us_list_string = '';
            foreach($userstories as $ustory) { $us_list_string .= $ustory->userstoryname . ',' . br(); }
            $task->us_list = $us_list_string;*/
            ////////// ...et commenter cette ligne //////////
            $task->us_list = $userstories->result_count();
            ////////////////////////////////////////

            ////
        }

        $data['p'] = $p;
        $data['task_list'] = $task_list;
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

        if(!empty($_POST))
        {
            $r_t = new task();
            $r_t->taskname = $this->input->post('name');
            $r_t->statut = $t->_get_name($this->input->post('status'));
            $r_t->cost = $this->input->post('cost');
            $r_t->datestart = $this->input->post('date_start');
            $r_t->dateend = $this->input->post('date_end');
            $r_t->description = $this->input->post('desc');

            // relationships : project, dev, dependancies (tasks), us
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
        $t = new Task();
        $task = $t->get_by_id($task_id);

        if($t->delete()){ $data['delete_succes'] = 'Task deleted.'; }
        else{ $data['delete_error'] = $t->error->string; }
        
        $this->index($data);  
    }
}
?>
