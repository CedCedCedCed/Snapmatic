<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends MY_Controller 
{
	private function check_login() 
	{
        if(!$this->session->userdata('logged_in')) {
            redirect('');
        }
        
    }
	public function view_page()
	{
		$role = $this->uri->segment(1);
		$page = $this->uri->segment(2);

		
		$name =  $this->session->fullname;
        $username = strtolower(str_replace(' ', '.', $name));
		switch ($role) 
		{
			case 'user':
				switch ($page) 
				{
					case 'register':
							parent::loginpage('user/register',
						        [   
						        	'title'				=> 'Snapmatic'
						        ]
					        );
							
						break;
						
					case 'explore':
							$id = $this->session->user_id;

							$where = "(id != '$id')"; 
							parent::mainpage('user/explore/view-explore',
						        [   
						        	'title'				=> 'Snapmatic',
						        	'accounts'			=> $this->Crud_model->fetch_tag('*','users',$where)
						        ]
					        );
						break;

					

					// case $username:
					// 		$id = $this->session->user_id;
					// 		$where = array('user_id',$id);
							
					// 		parent::mainpage('user/profile/view-profile',
					// 	        [   
					// 	        	'title'				=> 'Snapmatic',
					// 	        	'photos'			=> $this->Crud_model->fetch_tag('*','newsfeed',$where)

					// 	        ]
					//         );
							
					// 	break;

					case 'following':
							$this->check_login();
							$id = $this->session->user_id;
							$where = array('following.user_id' => $id);
							$join_table = 'following';
							$join_on = 'following.user_following = users.id';

							// $fetch_following = $this->Crud_model->get_following($id);
							$fetch_following = $this->Crud_model->join_where('*','users',$where,$join_table,$join_on);
						
								parent::mainpage('user/following/view-following',
							        [
							            'title'          => 'Snapmatic',
							            'following'        => $fetch_following
							        ]
							);
						break;

					case 'follower':
							$this->check_login();
							$id = $this->session->user_id;
							$where = array('follower.user_id' => $id);
							$join_table = 'follower';
							$join_on = 'follower.user_followed = users.id';

							$fetch_follower = $this->Crud_model->join_where('*','users',$where,$join_table,$join_on);

								parent::mainpage('user/following/view-follower',
							        [
							            'title'          => 'Snapmatic',
							            'follower'       => $fetch_follower
							        ]
							);
						break;
					
					case $page:
						
							$explode_name = explode('.', $page);
							$first_name = $explode_name[0];
							$last_name = $explode_name[1];
							$where_name = array(
								'first_name' => $first_name,
								'last_name'	 => $last_name

							);
							$get_info = $this->Crud_model->fetch_tag_row('*','users',$where_name);
							$id = $get_info->id;
							$account = array('user_id' => $id);
							$where_username = array('username' => $username);
							$where_following = array('user_following' => $id);
							$where_follower = array('user_followed' => $id);
			        		$check_following = $this->Crud_model->count_result('*','following',$where_following);
			        		$check_follower= $this->Crud_model->count_result('*','follower',$where_follower);
							parent::mainpage('user/profile/view-profile',
						        [   
						        	'title'				=> 'Snapmatic',
						        	'account'			=> $get_info,		
						        	'following'			=> $check_following,		
						        	'follower'			=> $check_follower,		
						        	'photos'			=> $this->Crud_model->fetch_tag('*','newsfeed',$account)

						        ]
					        );

						break;
					default:
							echo "wala sa choicesss";
						break;
				}


			break;
			// If new entitity
			default:
				# code...
				echo "WALAAA";
				break;
		}
		
	}

}
?>