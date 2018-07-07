<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller 
{
	private function check_login() 
	{
        if(!$this->session->userdata('logged_in')) {
            redirect('');
        }
        
    }
	public function edit_page()
	{
		$role = $this->uri->segment(1);
		$username = $this->uri->segment(3);
		$page = $this->uri->segment(4);
		// $decrypt_id = secret_url('decrypt',$encyrpted_id);
		// $where = array('id' => $decrypt_id);

		switch ($role) 
		{
			case 'user':
				switch ($username) 
				{
					case $username:
						$this->check_login();
            			$name = strtolower(str_replace('.', ' ', $username));
            			$explode_name = explode(" ",$name);
            			$first_name = $explode_name[0];
            			$last_name = $explode_name[1];
						$where = array(
							'first_name' => $first_name,
							'last_name'  => $last_name
						);
						$get_account = $this->Crud_model->fetch_tag_row('*','users',$where);
						parent::mainpage('user/profile/edit-profile',
						        [
						            'title'          => 'Snapmatic | Edit Profile',
						            'account'        => $get_account
						        ]
						);

					break;

					default:
						echo "wala sa choices";
						break;
				}


			break;
			// If new entitity
			default:
				# code...
				echo "wala sa choices ng user";
				break;
		}
		
	}


}

?>