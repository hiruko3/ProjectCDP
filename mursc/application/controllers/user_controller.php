<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Library('form_validation');
        $this->load->library('table');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {

        $user = new User();
        $user->where('id', '3')->get();

        $projects_list = array();

        $user->project->get_iterated();

        foreach ($user->project as $project) {
            array_push($projects_list, $project->projectname);
        }

        $data['projects_list'] = $projects_list;
        $data['username'] = $user->username;

        $this->load->view('header');
        $this->load->view('user_index', $data);
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
        $this->load->view('user_projects_lists', $data);
        $this->load->view('footer');
    }

}
