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

        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        if (!empty($_POST)) {

            $p = new Project();

            $p->projectname = $_POST['projectname'];
            $p->description = $_POST['description'];
            $p->type = $_POST['type'];
            $p->giturl = $_POST['giturl'];

            // Il faudra recuperer l'id du compte user en session
            $u = new User();
            $u->where('id', '3')->get();

            // Save in bdd
            if ($p->save($u)) {
                $validMsg['project_created'] = "<p>New project created ! </p>";
            } else {
                if ($p->error->all != '') {
                    array_push($errorMsg1, $p->error->all);
                }
                if ($u->error->all != '') {
                    array_push($errorMsg2, $u->error->all);
                }
                $errorMsg1 = $errorMsg1['0'];
                $errorMsg2 = $errorMsg2['0'];
            }
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

///////////////////////// LIST PERSONAL OF PROJECTS ////////////////////////////

    function projectList() {

        // Il faudra recuperer l'id du compte user en session
        $user = new User();
        $user->where('id', '3')->get();

        $projects_list_as_contributor = array();

        $projects = $user->project->get_iterated();

        $number_projects_as_contributor = $user->project->result_count();

        foreach ($projects as $project) {

            $project_in_table = array();
            $project_in_table['id'] = $project->id;
            $project_in_table['projectname'] = $project->projectname;
            $project_in_table['type'] = $project->type;
            $project_in_table['description'] = $project->description;
            $project_in_table['giturl'] = $project->giturl;

            array_push($projects_list_as_contributor, $project_in_table);
        }

        $data['projects_list_as_contributor'] = $projects_list_as_contributor;
        $data['projects_list_as_follower'] = array();
        $data['number_projects_as_contributor'] = $number_projects_as_contributor;

        $this->load->view('header');
        $this->load->view('project_list', $data);
        $this->load->view('footer');
    }

///////////////////////// LIST PERSONAL OF PROJECTS ////////////////////////////

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
        
        redirect('Project_controller/projectList');
    }

}
