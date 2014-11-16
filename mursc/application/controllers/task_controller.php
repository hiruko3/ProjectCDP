<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class task_controller extends My_Controller {

    public $taskDate;
    public $taskDescription;
    public $userAttached;
    public $taskName;


     function __construct() {
        parent::__construct();
           $taskDate = "";
     $taskDescription = "";
     $taskName = "";
        $taskData = array('date' => $taskDate,
        'description' => $taskDescription,
        'name' => $taskName
        );
        $this->load->library('table',$taskData);
     

    }

    function displayTask(){
        $this->load->view('task_view');
    }

    function setDate($date){
        $this->taskDate = $date;
    }

    function setDateFin($date){
        $this->dateFin = $date;
    }

    function setDescriptif($descriptif){
        $this->$taskDescription = $descriptif;
    }

    function setTaskName($name){
        $this->taskName = $name;
    }

    function taskSettings(){
        $this->load->view('task_edit');
    }

    function task_edit(){

        $this->form_validation->set_rules('task_name', 'Task', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_date', 'Date', 'xss_clean|callback_validate_edit');
        $this->form_validation->set_rules('task_description', 'Description', 'xss_clean|callback_validate_edit');
        if($this->form_validation->run()){
            $this->setDescriptif($this->input->post('description'));
            $this->setDate($this->input->post('date'));
            $this->setTaskName($this->input->post('task'));
        } else echo 'fail during edit this task try again !';
    }

    function validate_edit(){
        return true;
    }

}
?>
