<?php

class Test extends DataMapper {

    var $has_one = array('userstory','user');
    
    var $validation = array(
        'testname' => array(
            'label' => 'Test name',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 3, 'max_length' => 30),
        ),
        'type' => array(
            'label' => 'Description',
            'rules' => array('required', 'trim', 'alpha_slash_dot', 'min_length' => 5, 'max_length' => 30),
        ),
        'dateexecution' => array(
            'label' => 'Execution date',
            'rules' => array('required', 'trim', 'valid_date'),
        ),
        'datecommit' => array(
            'label' => 'commit date',
            'rules' => array('required', 'trim', 'valid_date'),
        )
    );

}
