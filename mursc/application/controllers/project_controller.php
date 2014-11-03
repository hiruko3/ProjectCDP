<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Library('form_validation');
        $this->load->library('table');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    ////////////////////////// NEW PROJECT ////////////////////////////

    function new_project() {
        $user_id = 3; //////////////////////////////////////////////////////// recup en session
        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        if (!empty($_POST)) {

            $p = new Project();

            $p->projectname = $_POST['projectname'];
            $p->description = $_POST['description'];
            $p->type = $_POST['type'];
            $p->giturl = $_POST['giturl'];

            // Save in bdd
            if (!$p->save()) {
                array_push($errorMsg1, $p->error->all);
                $errorMsg1 = $errorMsg1['0'];
            }

            // jointure
            $p = new Project();
            $p->where('projectname', $_POST['projectname'])->get();

            $this->load->model('join_projects_user');
            $j = new Join_Projects_User();
            $j->user_id = $user_id;
            $j->project_id = $p->id;
            $j->user_status = 'project manager';
            $j->relationship_type = 'member';

            if($j->save()){$validMsg['project_created'] = "<p>New project created ! </p>";}
            else
            {
                array_push($errorMsg2, $j->error->all);
                $errorMsg2 = $errorMsg2['0'];
            }
            ////
        }

        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;

        $this->load->view('header');
        $this->load->view('project_new', $data);
        $this->load->view('footer');
    }

////////////////////////// INDEX PROJECT ////////////////////////////

    function index_project($id) {

        $p = new Project();

        $p->where('id', $id)->get();
        $data['project'] = $p;

        $this->load->view('header');
        $this->load->view('project_index', $data);
        $this->load->view('footer');
    }

    ////////////////////////// EDIT PROJECT ////////////////////////////

    function edit_project($id) {

        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        if (!empty($_POST)) {

            $p = new Project();
            $p->id = $id;
            $p->projectname = $_POST['projectname'];
            $p->description = $_POST['description'];
            $p->type = $_POST['type'];
            $p->giturl = $_POST['giturl'];

            // Update in bdd
            if ($p->where('id', $id)->save()) {
                $validMsg['project_created'] = "<p> Project modified ! </p>";
            } else {
                if ($p->error->all != '') {
                    array_push($errorMsg1, $p->error->all);
                }
                $errorMsg1 = $errorMsg1['0'];
            }
        }
        $p = new Project();
        $p->where('id', $id)->get();

        $data['project'] = $p;

        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;

        $this->load->view('header');
        $this->load->view('project_edit', $data);
        $this->load->view('footer');
    }


///////////////////////// DELETE PROJECT ////////////////////////////

    function delete_project($id) {

        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        $p = new Project();

        if ($p->where('id', $id)->get()->delete()) {
            
        } else {
            if ($p->error->all != '') {
                $validMsg['project_delete'] = "<p> Project deleted ! </p>";
            }
            array_push($errorMsg1, $p->error->all);
            $errorMsg1 = $errorMsg1['0'];

            $data['validMsg'] = $validMsg;
            $data['errorMsg1'] = $errorMsg1;
        }
        
        redirect('user/projectList');
    }

}