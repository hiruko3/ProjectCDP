<?php

class Contributor extends DataMapper {

    var $has_one = array('project','user');

    var $validation = array(

    );
}