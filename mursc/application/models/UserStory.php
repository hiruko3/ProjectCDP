<?php

class UserStory extends DataMapper {

    var $table = 'userstories';
    
    //var $has_many = array('test','user','task');
    
    var $has_one = array('project');
    var $has_many = array('task');
    
    var $validation = array(
        'userstoryname' => array(
            'label' => 'User story name',
            'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 30),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim', 'min_length' => 10, 'max_length' => 200),
        ),
        'statut' => array(
            'label' => 'Type',
            'rules' => array('required'),
        ),
        'cost' => array(
            'label' => 'Cost',
            'rules' => array('required', 'trim', 'numeric'),
        ),
        'datestart' => array(
            'label' => 'Start date',
            'rules' => array('trim', 'valid_date'),
        ),
        'dateend' => array(
            'label' => 'End date',
            'rules' => array('trim', 'valid_date'),
        )
    );

}
