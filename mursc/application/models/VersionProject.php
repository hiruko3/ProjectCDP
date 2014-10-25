<?php

class VersionProject extends DataMapper {

    var $has_one = array('project');
    
    var $validation = array(
        'versionname' => array(
            'label' => 'Version name',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 3, 'max_length' => 7),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim', 'alpha_slash_dot', 'min_length' => 10, 'max_length' => 200),
        ),
        'daterelease' => array(
            'label' => 'Date release',
            'rules' => array('required', 'trim', 'valid_date'),
        ),
        'contained' => array(
            'label' => 'Contained US',
            'rules' => array('trim', 'alpha_slash_dot', 'min_length' => 2),
        )
    );

}
