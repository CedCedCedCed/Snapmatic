<?php
class MY_Controller	extends CI_Controller
{

	function __construct() {
		date_default_timezone_set('Asia/Manila');

		parent::__construct();
		$this->load->helper('encryption');
		$this->load->model('Crud_model');
		$this->load->model('User_model');
	}

	function loginpage($location,$data=array()) {

		$this->load->view('partials/header',$data);
		$this->load->view($location);
		$this->load->view('partials/footer');

	}

	function mainpage($location,$data=array()) {

		$this->load->view('user/partials/header',$data);
		$this->load->view('user/partials/navbar');
		$this->load->view($location);
		$this->load->view('user/partials/footer');
	}


}
