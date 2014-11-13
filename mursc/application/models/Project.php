<?php

class Project extends DataMapper {

    var $has_many = array(
        'user','userstory');
        /*
        '',
        'versionproject',
        'watcher',
        'contributor');*/
    
    var $validation = array(
        'projectname' => array(
            'label' => 'Projectname',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 5, 'max_length' => 30),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim', 'min_length' => 10, 'max_length' => 200),
        ),
        'type' => array(
            'label' => 'Type',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 5, 'max_length' => 30),
        ),
        'giturl' => array(
            'label' => 'Giturl',
            'rules' => array('trim', 'alpha_slash_dot', 'min_length' => 10),
        )
    );

}
