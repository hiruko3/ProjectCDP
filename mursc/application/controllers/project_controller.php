<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_controller extends CI_Controller {
    
     function __construct()
 {
   parent::__construct();
    $this->load->Library('form_validation');
 }

    function index() {
        $this->load->view('header');
        $this->load->view('project_list');
        $this->load->view('footer');
    }

    function new_project() {
        
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
                echo '<p> New project created ! </p>';
            } else {
                // Show all error messages
                echo '<p>' . $p->error->string . '</p>';
                echo '<p>' . $u->error->string . '</p>';
            }
        }


        $this->load->view('header');
        $this->load->view('project_new');
        $this->load->view('footer');
    }

}
