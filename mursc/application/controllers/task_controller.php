<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Task_controller extends My_Controller {
    function __construct() {
        parent::__construct();
    }

    function setDescriptif($description,$id){
        $task = $this->getTaskById($id);
        $task->description = $description;
        $this->saveModificationTask($task);
    }

    function setDateDebut($date,$id){
        $task = $this->getTaskById($id);
        $task->datedebut = $date;
        $this->saveModificationTask($task);
    }

     function setTaskName($name,$id){
        $task = $this->getTaskById($id);
        $task->taskname = $name;
        $this->saveModificationTask($task);
    }

    function setCost($cost, $id){
        $task = $this->getTaskById($id);
        $task->cost = $cost;
        $this->saveModificationTask($task);
    }

    function getTaskById($id){
        $task = new task();
        return $task->get_by_id($id);
    }

    function saveModificationTask($task){
        if($task->save()){
            $data['succes'] = "Modifications succeed"; 
        } else {
           $data['error'] = $task->error->string;
        }
    }

    function displayTask($t_id){
        // recupetation de la tache
        $task = new task();
        $data['task'] = $task->get_by_id($t_id);
        ////

        // recuperation des us correspendantes
        $data['us_list'] = $task->userstory->get();
        ////

        // recuperation des taches dont la tache courrante depend
        $data['task_list'] = $task->task->get();
        ////

        $this->load->view('header');$p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);
        $this->load->view('task_view',$data);
        $this->load->view('footer');
    }


    function taskSettings($t_id)
    {
        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));

        // recuperation de la task
        $t = new task();
        $data['task'] = $t->get_by_id($t_id);
        $this->load->view('header');
        ////

        if(!empty($_POST))
        {
            $t->taskname = $this->input->post('taskname');
            $t->statut = $this->input->post('status');
            $t->cost = $this->input->post('cost');
            $t->dev_id = $this->input->post('dev');
            $t->description = $this->input->post('description');
            $t->datestart = $this->input->post('datestart');
            $t->dateend = $this->input->post('dateend');

            $us = new Userstory();
            $us->where_in('id', $this->input->post('us'))->get();

            $ta = new Task();
            $ta->where_in('id', $this->input->post('dep'))->get();

            $timestamp_datestart = strtotime($t->datestart);
            $timestamp_dateend = strtotime($t->dateend);
            if($timestamp_datestart <= $timestamp_dateend) //verification datestart <= dateend
            {
                if(!$t->save()){ $data['error'] = $t->error->string; }
                else // si la tache est persistee
                {
                    // on supprime toutes les relations avant d en recreer
                    $old_us_link = $t->userstory->get();
                    $old_task_link = $t->task->get();
                    $t->delete(array($old_us_link->all, $old_task_link->all));
                    ////

                    if(!$t->save(array($us->all, $ta->all))){ $data['error'] = 'Error while linking userstories and dependencies'; }
                    else{ $data['success'] = 'Modified task'; } // tache et jointures ont ete sauvegardees
                }
            }
            else
            {
                $data['error'] = 'Please enter a start date older than the end date';
            }
        }

        // recuperation des devs
        $dev_list = array();
        $devs = $p->user->where_join_field($p, 'relationship_type', 'member')->include_join_fields()->get(); // tous les membres
        foreach($devs as $d)
            if($d->join_user_status != 'watcher'){ $dev_list[$d->id] = $d->username; }// on vire les watchers

        $data['project_devs'] = $dev_list; // devs du projet

        $data['task_dev'] = $t->dev_id; // dev de la tache
        ////

        // recuperation des us associees
        $us_list = array();
        $userstories = $p->userstory->get();
        foreach($userstories as $us){ $us_list[$us->id] = character_limiter($us->userstoryname, 30); }
        $data['us_list'] = $us_list; // toutes les us du projet

        $associated_us_list = array();
        $userstories = $t->userstory->get();
        foreach($userstories as $us){ array_push($associated_us_list, $us->id); }
        $data['us_associated'] = $associated_us_list; // us deja associees (pre selection)
        ////

        // recuperation des dependances
        $task_list = array();
        $tasks = $p->task->get();
        foreach($tasks as $task){ $task_list[$task->id] = character_limiter($task->taskname, 30); }
        $data['task_list'] = $task_list; // toutes les tasks du projet

        $task_dependencies = array();
        $tasks = $t->task->get();
        foreach($tasks as $task){ array_push($task_dependencies, $task->id); }
        $data['task_dependencies'] = $task_dependencies;
        ////

        $data['fibonacci'] = array(0=>0, 1=>1, 2=>2, 3=>3, 5=>5, 8=>8, 13=>13, 21=>21, 34=>34, 55=>55, 89=>89);

        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);
        $this->load->view('task_edit',$data);
        $this->load->view('footer');
    }

    function task_edit($t_id)
    {

        $this->form_validation->set_rules('task_name', 'Task', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_date_debut', 'Date', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_description', 'Description', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_cost', 'Cost', 'xss_clean|callback_validate_edit');

        if($this->form_validation->run()){
            $this->setDescriptif($this->input->post('task_description'),$t_id);
            $this->setDateDebut($this->input->post('task_date_debut'),$t_id);
            $this->setTaskName($this->input->post('task_name'),$t_id);
            $this->setCost($this->input->post('task_cost'),$t_id);
            $this->displayTask($t_id);
        }
        else echo 'fail during edit this task try again !';
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
            //$tasks = $task->task->get(); // liste des taches dont depend la tache

            ////////// pour avoir la liste des taches (et non le nombre de taches), decommenter ce qui suit... //////////
            /*$tasks_list_string = '';
            foreach($tasks as $ta){ $tasks_list_string .= $ta->taskname . ',' . br(); }
            $task->dep_list = $tasks_list_string;*/
            ////////// ...et commenter cette ligne //////////
            //$task->dep_list = $tasks->result_count();
            ////////////////////////////////////////

            ////
            // us
            //$userstories = $task->userstory->get(); // liste des us auxquelles appartient la tache

            ////////// pour avoir la liste des us (et non le nombre d us), decommenter ce qui suit... //////////
            /*$us_list_string = '';
            foreach($userstories as $ustory) { $us_list_string .= $ustory->userstoryname . ',' . br(); }
            $task->us_list = $us_list_string;*/
            ////////// ...et commenter cette ligne //////////
            //$task->us_list = $userstories->result_count();
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

            $timestamp_datestart = strtotime($r_t->datestart);
            $timestamp_dateend = strtotime($r_t->dateend);
            if($timestamp_datestart <= $timestamp_dateend) //verification datestart <= dateend
            {
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
            else
            {
                $data['error'] = 'Please enter a start date older than the end date';
            }
        }

        $data['fibonacci'] = array(0=>0, 1=>1, 2=>2, 3=>3, 5=>5, 8=>8, 13=>13, 21=>21, 34=>34, 55=>55, 89=>89);

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
