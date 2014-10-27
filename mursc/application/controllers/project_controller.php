<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_controller extends CI_Controller {

    function index() {
        $this->load->view('header');
        $this->load->view('project_list');
        $this->load->view('footer');
    }

    function new_project() {

        // Create project object
        
        // Remplacement par les valeurs des posts de la view
        $p = new Project();
        $p->projectname = "projectname5";
        $p->description = "description";
        $p->type = "public";
        $p->giturl = "giturl/giturl/giturl";

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

        $this->load->view('header');
        $this->load->view('project_new');
        $this->load->view('footer');
    }

}
