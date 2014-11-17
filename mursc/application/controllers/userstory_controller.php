<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Userstory_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

////////////////////////// NEW USER STORY ////////////////////////////

    function new_userstory() {
        $user_id = 3; //////////////////////////////////////////////////////// recup en session
        $project_id = $this->session->userdata('project_id');
        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        if (!empty($_POST)) {

            $us = new UserStory();

            $us->userstoryname = $_POST['userstoryname'];
            $us->description = $_POST['description'];
            $us->statut = 'new';
            $us->cost = $_POST['cost'];
            $us->datestart = $_POST['datestart'];
            $us->dateend = $_POST['dateend'];

            // jointure
            $p = new Project();
            $p->where('id', $project_id)->get();

            // Save in bdd
            if (!$us->save($p)) {
                array_push($errorMsg1, $us->error->all);
                $errorMsg1 = $errorMsg1['0'];
            } else {
                $validMsg['userstory_created'] = "<p> New user story created ! </p>";
            }
        }

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

    function index($id)
    {
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

        $us = new UserStory();

        $us->where('id', $id)->get();
        $data['userstory'] = $us;
        $data['project_id'] = $this->session->userdata('project_id');

        $this->load->view('header');

        $p = new project();
        $p->get_by_id($this->session->userdata('project_id'));
        $header_project_data = array(
            'project_id' => $p->id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);
        
        $this->load->view('userstory_index', $data);
        $this->load->view('footer');
    }

    ////////////////////////// EDIT USER STORY ////////////////////////////

    function edit_userstory($id) {

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
            $us->datestart = $_POST['datestart'];
            $us->dateend = $_POST['dateend'];

            // Save in bdd
            if (!$us->save()) {
                array_push($errorMsg1, $us->error->all);
                $errorMsg1 = $errorMsg1['0'];
            } else {
                $validMsg['userstory_edited'] = "<p> User story edited ! </p>";
            }
        }

        $us->where('id', $id)->get();

        $data['userstory'] = $us;
        $data['project_id'] = $this->session->userdata('project_id');

        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;

        $this->load->view('header');
        $this->load->view('userstory_edit', $data);
        $this->load->view('footer');
    }

}
