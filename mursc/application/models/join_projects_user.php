<?php

class Join_Projects_User extends DataMapper
{
	var $has_one = array('user', 'project');
    
	var $validation = array
	(
		'user_id' => array
		(
			'label' => 'Uid',
			'rules' => array('required', 'trim', 'primary_couple_with_project_id'),
		),
		'project_id' => array
		(
			'label' => 'Pid',
			'rules' => array('required', 'trim'),
		),
		'user_status' => array
		(
			'label' => 'User_status',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 20, 'enum_user_status'),
		),
		'relationship_type' => array
		(
			'label' => 'Relationship_type',
			'rules' => array('required', 'trim', 'enum_relationship_type'),
		),
	);

	function _enum_user_status($field)
	{
		$enum_list = array('contributor', 'watcher', 'product owner', 'scrum master', 'project manager', '');
		foreach($enum_list as $e)
		{
			if($this->{$field} === $e)
			{
				return TRUE;
			}
		}
		return 'The user_status must be in ' . implode(', ', $enum_list);
	}

	function _enum_relationship_type($field)
	{
		$enum_list = array('member', 'invitation', 'candidacy');
		foreach($enum_list as $e)
		{
			if($this->{$field} === $e)
			{
				return TRUE;
			}
		}
		return 'The user_status must be in ' . implode(', ', $enum_list);
	}

	function _primary_couple_with_project_id($field)
	{
		$j = new Join_Projects_User();

		$j->where('user_id', $this->{$field})->where('project_id', $this->project_id)->get();

		if($j->result_count() > 0){return "A relationship between this user an this project already exists.";}
	}
}

?>