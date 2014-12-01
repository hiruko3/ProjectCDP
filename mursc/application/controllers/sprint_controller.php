<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sprint_controller extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
    }

    function index() {
        $data = array();
        //$all_tasks = array(); // tableau contenant toutes les tasks
        $p = new Project();
        $p->get_by_id($this->session->userdata['project_id']);
        /*
          $userstory = $p->userstory->get();

          foreach ($userstory as $us) {
          $tab_task = array(); // on clear le tableau
          $tasks = $us->task->get();
          $i = 0;
          foreach ($tasks as $t) {
          $tab_task[$i] = $t; // on stocke les tasks d une us dans un tableau
          ++$i;
          if (!in_array($t->id, $all_tasks)) {
          array_push($all_tasks, $t->id);
          } // on stocke l id de la task dans le tableau de toutes les tasks s il n y est pas deja
          }
          $tab_userstory[$us->id] = $tab_task; // on stocke les tableaux de tasks par us
          }

          $tab_userstory[-1] = $p->task->get()->where_not_in('id', $all_tasks)->get();
          $data['userstories'] = $tab_userstory;

         */
        $data['userstories'] = array();


        $project_id = $p->id;
        $time = date("Y-m-d");
        
        $calendar_week = date('W', strtotime($time));
        $calendar_week = intval($calendar_week);
        $before = $calendar_week-1;
        $after = $calendar_week+1;

        $this->load->database();

        // Recuperation du gantt sous forme d'un tableau
        $sqltest = "SELECT * FROM mursc_table_gantt WHERE project_id = " . $project_id . " AND semaine = " . $calendar_week . ";";
        $result = $this->db->query($sqltest);

        $data['gantt_lines'] = $result->result_array();
        $data['week'] = "Week " . $calendar_week;
        $data['before'] = $before;
        $data['after'] = $after;
        $data['project'] = $p;

        //////////////////////////////////////////////
        //////////////////////////////////////////////


        $header_project_data = array('project_id' => $p->id, 'project_name' => $p->projectname);
        $this->load->view('header');
        $this->load->view('project_header', $header_project_data);
        $this->load->view('sprint_view', $data);
        $this->load->view('footer');
    }

    function save_gantt() {

        $data = json_decode($_POST['data']);

        if (!empty($_POST)) {

            $project_id = $this->session->userdata['project_id'];
            $time = date("Y-m-d");
            $calendar_week = date('W', strtotime($time));


            // Si il existe deja un gantt de ce projet pour cette semaine...
            $sqltest = "SELECT * FROM mursc_table_gantt WHERE project_id = " . $project_id . " AND semaine = " . $calendar_week . ";";
            $result = $this->db->query($sqltest);
            if ($result->num_rows() > 0) {
                //On delete...
                $sqldelete = "DELETE FROM mursc_table_gantt "
                        . "WHERE project_id=" . $project_id . " AND semaine=" . $calendar_week;
                $this->db->query($sqldelete);
            }

            // On insert...
            for ($i = 0; $i < sizeof($data); $i++) {
                $sqlinsert = "INSERT mursc_table_gantt (project_id,developper_name,semaine,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche) "
                        . "VALUES (" . $project_id . ",'" . $data[$i][0] . "'," . $calendar_week . ",'" . $data[$i][1] . "','" . $data[$i][2] . "','" . $data[$i][3] . "','" . $data[$i][4] . "','" . $data[$i][5] . "','" . $data[$i][6] . "','" . $data[$i][7] . "')";
                $this->db->query($sqlinsert);
            }
        }
    }

    function get_another_gantt($week) {
        $data = array();
        //$all_tasks = array(); // tableau contenant toutes les tasks
        $p = new Project();
        $p->get_by_id($this->session->userdata['project_id']);
        $data['userstories'] = array();

        $before = (string)((intval($week))-1);
        $after = (string)((intval($week))+1);
        $project_id = $p->id;
        $time = date("Y-m-d");

        $this->load->database();

        // Recuperation du gantt sous forme d'un tableau
        $sqltest = "SELECT * FROM mursc_table_gantt WHERE project_id = " . $project_id . " AND semaine = " . $week . ";";
        $result = $this->db->query($sqltest);

        $data['gantt_lines'] = $result->result_array();
        $data['week'] = "Week " . $week;
        $data['before'] = $before;
        $data['after'] = $after;
        $data['project'] = $p;

        //////////////////////////////////////////////
        //////////////////////////////////////////////


        $header_project_data = array('project_id' => $p->id, 'project_name' => $p->projectname);
        $this->load->view('header');
        $this->load->view('project_header', $header_project_data);
        $this->load->view('sprint_view', $data);
        $this->load->view('footer');
    }

}
