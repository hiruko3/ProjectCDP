<?php

class Table_gantt extends DataMapper {

	var $table = 'table_gantt';
    var $has_one = array('project');

    var $validation = array();
}

?>
