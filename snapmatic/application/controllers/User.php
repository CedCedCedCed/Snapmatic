<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	private function check_login() 
	{
        if(!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        
    }
	public function index()
	{
		$this->check_login();
		$id = $this->session->user_id;
		// $where = array('user_id' => $id);
		// $join_table = 'newsfeed';
		// $join_on = 'newsfeed.user_id= following.user_following';
		$where = array('newsfeed.user_id' => $id);
		$join_table = 'newsfeed';
		$join_on = 'newsfeed.user_id = users.id';

		// $fetch_newsfeed= $this->User_model->get_follow($id);

		$fetch_newsfeed = $this->Crud_model->join_table('*','users',$join_table,$join_on);


		parent::mainpage('user/partials/main',
	            [
	                'title'        	=> 'Snapmatic',
	                'newsfeed'		=> $fetch_newsfeed
	            ]
	    );
	}
	public function follow()
	{
		$encrypted_id = $this->uri->segment(3);
		$decrypted_id = secret_url('decrypt',$encrypted_id);
		$insert_following = array(
				'user_id' 			=> $this->session->user_id,
				'user_following'	=> $decrypted_id
			);
		$this->Crud_model->insert('following',$insert_following);
		$insert_followed = array(
				'user_id' 			=> $decrypted_id,
				'user_followed'		=> $this->session->user_id

			);
		$this->Crud_model->insert('follower',$insert_followed);
		redirect('user/');

		

	}


	

}
