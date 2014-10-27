<?php

class Task extends DataMapper {

    var $has_one = array('userstory','user');
    
    var $validation = array(
        'taskname' => array(
            'label' => 'Task name',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 3, 'max_length' => 30),
        ),
        'statut' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim', 'alpha_slash_dot', 'min_length' => 5, 'max_length' => 20),
        ),
        'cost' => array(
            'label' => 'Cost',
            'rules' => array('required', 'trim', 'numeric', 'min_length' => 1, 'max_length' => 2),
        ),
        'datestart' => array(
            'label' => 'Start date',
            'rules' => array('required', 'trim', 'valid_date'),
        ),
        'dateend' => array(
            'label' => 'End date',
            'rules' => array('required', 'trim', 'valid_date'),
        )
    );

}
