<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormSubmit extends MY_Controller 
{
	public function new_form_submit()
	{
		$type = $_POST['type'];

		
		switch ($type) 
		{

			case 'registration':
				if($this->form_validation->run('registration') == FALSE) 
				{
					 $error = [
					'first_name_error'				=> form_error('first_name'),
					'last_name_error'				=> form_error('last_name'),
					'username_error'				=> form_error('username'),
					'email_error'					=> form_error('email'),
					'password_error'				=> form_error('password')
					];
					echo json_encode($error);
				}
				else
				{
					
					$insert_user = array(
						'first_name'				=> clean_data(ucwords($_POST['first_name'])),
						'last_name' 				=> clean_data(ucwords($_POST['last_name'])),
						'profile_picture'			=> "profile-picture.jpg",
						'username'					=> clean_data($_POST['username']),
						'email'						=> $_POST['email'],
						'password'                	=> hash_password($_POST['password']),
						'status'					=> 1,
					);
					
						$this->Crud_model->insert('users',$insert_user);
					
					
					echo json_encode("success");
				}
				break;
			case 'newsfeed':
					$config = array(
		            'upload_path'   => 'uploads',
		            'allowed_types' => 'jpg|png|PNG|JPG|jpeg',
		            'max_size'      => '2048', //2MB
		            'encrypt_name'  => TRUE //encrypt filename
		            );

			        $this->load->library('upload', $config);

					if($this->form_validation->run('new-content') == FALSE) 
			        {
			             $error = [
			                 'image_description_error'        => form_error('image_description'),
			                 'content_image_error'            => form_error('image')
			           
			            ];
			            echo json_encode($error);
			        }
			        else
			        {
			            
			            $new_content = array(
			             	'user_id'						=> $this->session->user_id,
			                'image'               			=> $this->upload->data('file_name'),
			                'image_description'             => clean_data(ucwords($_POST['image_description'])),
			                'image_added'            		=> date("Y-m-d")
			            );
			            $this->Crud_model->insert('newsfeed',$new_content);
			            echo json_encode("success");
			        }
				break;
			default:
				# code...
				break;
		}
	}
	public function edit_form_submit()
	{
		$type = $_POST['type'];
		switch ($type) 
		{
			
			case 'edit_password':

				$encrypted_id = $_POST['id'];
			   	$decrypted_id = secret_url('decrypt',$encrypted_id);
				$where = array('id' => $decrypted_id);
			

			    if($this->form_validation->run('edit-password') == FALSE) 
			    {
			         $error = [

			            'old_password_error'                => form_error('old_password'),
			            'new_password_error'                => form_error('new_password'),
			            'confirm_password_error'            => form_error('confirm_password')
			       
			        ];
			    	echo json_encode($error);
			    }
			    else
			    {
		    		$old_password = hash_password($_POST['old_password']);
					$new_password = hash_password($_POST['new_password']);
					$confirm_password = hash_password($_POST['confirm_password']);
					
					$get_account = $this->Crud_model->fetch_tag_row('password','users',$where);
					$get_password = $get_account->password;
				    if(password_verify($old_password,$get_password))
			        {
			        	echo json_encode("old_password_mismatch");
			        }
			        else
			        {
			        	if(password_verify($new_password,$confirm_password))
			        	{
			        		echo json_encode("new_and_confirm_password_mismatch");
			        	}
			        	else
			        	{
			        		$update_password = array(
			            		'password'    => hash_password($_POST['new_password'])
				        		);
				       
				        $this->Crud_model->update('users',$update_password,$where);
				        echo json_encode("success");
				        $this->session->sess_destroy();
			        	}
			        }
			     
			    }
				break;
			case 'edit_profile':
				   	$encrypted_id = $_POST['id'];
				   	$decrypted_id = secret_url('decrypt',$encrypted_id);
					$where = array('id' => $decrypted_id);
			        if($this->form_validation->run('edit-profile') == FALSE) 
			        {
			             $error = [
			                'first_name_error'              => form_error('first_name'),
			                'last_name_error'               => form_error('last_name'),
			                'email_error'                   => form_error('email'),
			                'username_error'                => form_error('username'),
			                'password_error'                => form_error('password')
			           
			            ];
			        echo json_encode($error);
			        }
			        else
			        {
			        	$name = array(
			        			'first_name' => $_POST['first_name'],
			        			'last_name' => $_POST['last_name']
			        		);
			        	$this->session->set_userdata('names',$name);
			        	$session = $this->session->userdata('names');
			        	$this->session->fullname = $session['first_name'] .' '. $session['last_name'];
			        	$username = clean_data($_POST['username']);
			        	$where_username = array('username' => $username);
			        	$check_username = $this->Crud_model->count_result('username','users',$where_username);
			        	if($check_username >= 1)
			        	{
			        		echo json_encode("existed");
			        	}
			        	else
			        	{
			        		 $update_account = array(
			                'first_name'              => clean_data(ucwords($this->input->post('first_name'))),
			                'last_name'               => clean_data(ucwords($this->input->post('last_name'))),
			                'username'                => clean_data($this->input->post('username')),
			                'email'                   => $this->input->post('email')
			 
				            );
				           
				            $this->Crud_model->update('users',$update_account,$where);
				            echo json_encode("success");
			        	}
			           
			        }
					break;
			default:
				# code...
				break;
		}
	}
	function handleimage()
	 {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])):
            if ($this->upload->do_upload('image')):
                return true;
            else:
                $this->form_validation->set_message('handleimage', 'You can only upload the following type: JPG,PNG,jpg,png');
                return false;
            endif;
        else:
          // throw an error because nothing was uploaded
          $this->form_validation->set_message('handleimage', "You must upload an image!");
          return false;
        endif;
    } 
}
?>