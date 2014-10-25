<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_controller extends CI_Controller {

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

}
