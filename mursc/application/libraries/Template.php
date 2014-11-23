<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template {

	

    public function show($ContentView)
   	{
   		$CI =& get_instance(); 
    	$CI->load->view('header');
    	$CI->load->view($ContentView);
    	$CI->load->view('footer');
    }
}


/* End of file Someclass.php */
