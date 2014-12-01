<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Userstory_controller extends My_Controller {

    function __construct() {
        parent::__construct();
    }

////////////////////////// NEW USER STORY ////////////////////////////

    function new_userstory() {
        if(!($this->session->userdata('my_status') == 'project manager') || !($this->session->userdata('my_relation') == 'member')) // acl : acces project manager only
        {
            redirect('login/restricted');
            return;
        }

        $project_id = $this->session->userdata('project_id');
        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        if (!empty($_POST)) {

            $us = new UserStory();

            $us->userstoryname = $_POST['userstoryname'];
            $us->description = $_POST['description'];
            $us->statut = 'Not ready';
            $us->cost = $_POST['cost'];
            //$us->datestart = $_POST['datestart'];
            //$us->dateend = $_POST['dateend'];
            $us->datestart = '';
            $us->dateend = '';

            // jointure
            $p = new Project();
            $p->where('id', $project_id)->get();

            $asso_task = new Task();
            $tab_asso_task = array();
            if (!empty($_POST['task'])) {
            if ($_POST['task']) {
                foreach ($_POST['task'] as $post_task) {
                    array_push($tab_asso_task, $post_task);
                }
                $asso_task->where_in('id', $tab_asso_task)->get();
            }
            }

            // Save in bdd
            if (!$us->save(array($p, $asso_task->all))) {
                array_push($errorMsg1, $us->error->all);
                $errorMsg1 = $errorMsg1['0'];
            } else {
                $validMsg['userstory_created'] = "<p> New user story created ! </p>";
            }
        }

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));

        $t = new task();
        $tasks = $p->task->get();
        $data['task_list'] = array();
        foreach ($tasks as $t) {
            $data['task_list'][$t->id] = $t->taskname;
        };

        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;
        $data['project_id'] = $this->session->userdata('project_id');

        $this->load->view('header');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);

        $this->load->view('userstory_new', $data);
        $this->load->view('footer');
    }

////////////////////////// DELETE USER STORY ////////////////////////////

    function delete_userstory($id) {
        if(!($this->session->userdata('my_status') == 'project manager') || !($this->session->userdata('my_relation') == 'member')) // acl : acces project manager only
        {
            redirect('login/restricted');
            return;
        }

        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        $us = new UserStory();

        if ($us->where('id', $id)->get()->delete()->all) {
            
        } else {
            if ($us->error->all != '') {
                $validMsg['us_delete'] = "<p> User story deleted ! </p>";
            }
            array_push($errorMsg1, $us->error->all);
            $errorMsg1 = $errorMsg1['0'];

            $data['validMsg'] = $validMsg;
            $data['errorMsg1'] = $errorMsg1;
        }

        redirect('userstory_controller/index/' . $this->session->userdata('project_id'));
    }

////////////////////////// INDEX  ////////////////////////////

    function index($id) {
        if($this->session->userdata('project_type') == 'private' && !($this->session->userdata('my_relation') == 'member')) // si le projet est prive, seuls les members, watchers compris peuvent voir
        {
            redirect('login/restricted');
            return;
        }

        $this->load->view('header');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);

        $us = new UserStory();

        $list_us = $p->userstory->include_join_fields()->get();
        $data = array(
            'project' => $p,
            'list_us' => $list_us
        );


        $this->load->view('userstory_list', $data);
        $this->load->view('footer');
    }

    ////////////////////////// INDEX USER STORY ////////////////////////////

    function index_userstory($id) {
        if($this->session->userdata('project_type') == 'private' && !($this->session->userdata('my_relation') == 'member')) // si le projet est prive, seuls les members, watchers compris peuvent voir
        {
            redirect('login/restricted');
            return;
        }

        $us = new UserStory();

        $us->where('id', $id)->get();
        $data['userstory'] = $us;
        $data['project_id'] = $this->session->userdata('project_id');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);

        $t = new task();
        $u = new User();
        $data['tasks_list_associated'] = array();
        $tasks = $us->task->get();
        foreach ($tasks as $t) {
            $u->get_by_id($t->dev_id);
            $t->dev_name = $u->username;
            array_push($data['tasks_list_associated'], $t);
        };


        $this->load->view('header');
        $this->load->view('project_header', $header_project_data);
        $this->load->view('userstory_index', $data);
        $this->load->view('footer');
    }

    ////////////////////////// EDIT USER STORY ////////////////////////////

    function edit_userstory($id) {
        if(!($this->session->userdata('my_status') == 'project manager') || !($this->session->userdata('my_relation') == 'member')) // acl : acces project manager only
        {
            redirect('login/restricted');
            return;
        }

        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        $us = new UserStory();

        if (!empty($_POST)) {

            $us->where('id', $id)->get();

            $us->userstoryname = $_POST['userstoryname'];
            $us->description = $_POST['description'];
            $us->statut = $_POST['statut'];
            $us->cost = $_POST['cost'];
            //$us->datestart = $_POST['datestart'];
            //$us->dateend = $_POST['dateend'];
            $us->datestart = '';
            $us->dateend = '';

            $task_added = new Task();
            $tab_asso_task_added = array();

            if (!$us->save()) {
                array_push($errorMsg1, $us->error->all);
                $errorMsg1 = $errorMsg1['0'];
            } else {
                $validMsg['userstory_added'] = "<p> US edited ! </p>";
            }


            if (!empty($_POST['tasks_added'])) {
                foreach ($_POST['tasks_added'] as $post_task) {
                    array_push($tab_asso_task_added, $post_task);
                }
                $task_added->where_in('id', $tab_asso_task_added)->get();

                // ADD
                if (!$us->save($task_added->all)) {
                    array_push($errorMsg1, $us->error->all);
                    $errorMsg1 = $errorMsg1['0'];
                } else {
                    $validMsg['userstory_added'] = "<p> Tasks added ! </p>";
                }
            }

            $task_deleted = new Task();
            $tab_asso_task_deleted = array();
            if (!empty($_POST['tasks_deleted'])) {
                foreach ($_POST['tasks_deleted'] as $post_task) {
                    array_push($tab_asso_task_deleted, $post_task);
                }
                $task_deleted->where_in('id', $tab_asso_task_deleted)->get();

                // DELETE
                if (!$us->delete($task_deleted->all)) {
                    array_push($errorMsg1, $us->error->all);
                    $errorMsg1 = $errorMsg1['0'];
                } else {
                    $validMsg['userstory_deleted'] = "<p> Tasks deleted ! </p>";
                }
            }
        }

        $us->where('id', $id)->get();

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));

        $t = new task();
        $tasks = $us->task->get();

        $data['tasks_list_associated'] = array();

        foreach ($tasks as $t) {
            $data['tasks_list_associated'][$t->id] = $t->taskname;
        };

        $tasks_of_project = $p->task->get();
        $tasks_list_project = array();
        foreach ($tasks_of_project as $t) {
            $tasks_list_project[$t->id] = $t->taskname;
        };

        $data['tasks_list_possible_to_add'] = array_diff_assoc($tasks_list_project, $data['tasks_list_associated']);

        $data['userstory'] = $us;
        $data['project_id'] = $this->session->userdata('project_id');

        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;


        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);

        $this->load->view('header');
        $this->load->view('project_header', $header_project_data);
        $this->load->view('userstory_edit', $data);
        $this->load->view('footer');
    }

}

?>
