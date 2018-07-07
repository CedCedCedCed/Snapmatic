<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Controller 
{
	   
	public function index(){
		$this->load->view('admin/index');
	}

	public function dashboard(){
		//$get_all_barangay = $this->Crud_model->fetch('barangay');

		parent::mainpage('admin/index',
            [	
                'title'=>'Administrator',
                'barangay' => $get_all_barangay
            ]
        );
	}

}
