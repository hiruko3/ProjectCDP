<?php

class Task extends DataMapper {

    var $has_one = array('project');
    var $has_many = array(
        'userstory',
        'task' => array(
            'other_field' => 'relatedtask'),
        'relatedtask' => array(
            'class' => 'task',
            'other_field' => 'task')
    );
    
    var $validation = array(
        'taskname' => array(
            'label' => 'Task name',
            'rules' => array('required', 'trim', 'min_length' => 2, 'max_length' => 30)
        ),
        'statut' => array(
            'label' => 'Description',
            'rules' => array('enum_task_status', 'required', 'trim')
        ),
        'cost' => array(
            'label' => 'Cost',
            'rules' => array('required', 'trim', 'numeric', 'min_length' => 1, 'max_length' => 3)
        ),
        'datestart' => array(
            'label' => 'Start date',
            'rules' => array('required', 'trim', 'valid_date')
        ),
        'dateend' => array(
            'label' => 'End date',
            'rules' => array('required', 'trim', 'valid_date')
        ),
        'desctiption' => array(
            'label' => 'Description',
            'rules' => array('trim')
        )
    );

    function _enum_task_status($field)
    {
        $enum_list = $this->_get_task_status();
        foreach($enum_list as $e)
        {
            if($this->{$field} === $e)
            {
                return TRUE;
            }
        }
        return 'The task status must be in ' . implode(', ', $enum_list);
    }

    function _get_task_status()
    {
        return array('not ready', 'ready', 'in progress', 'dev done', 'done');
    }

    function _get_name($index)
    {
        return $this->_get_task_status()[$index];
    }
}
