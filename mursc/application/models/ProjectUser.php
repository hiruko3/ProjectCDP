<?php

class ProjectUser extends DataMapper {

    var $has_many = array(
        'user',
        'project');
    
    var $validation = array(
        'status' => array(
            'label' => 'Status',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 3, 'max_length' => 20),
        )
    );

}
