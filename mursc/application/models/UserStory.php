<?php

class UserStory extends DataMapper {

    var $table = 'userstories';
    
    var $has_many = array('test','user','task');
    var $has_one = array('project');
    
    var $validation = array(
        'userstoryname' => array(
            'label' => 'User story name',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 5, 'max_length' => 30),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim', 'alpha_slash_dot', 'min_length' => 10, 'max_length' => 200),
        ),
        'statut' => array(
            'label' => 'Type',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 5, 'max_length' => 30),
        ),
        'cost' => array(
            'label' => 'giturl',
            'rules' => array('required', 'trim', 'numeric', 'min_length' => 10),
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
