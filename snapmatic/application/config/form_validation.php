<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = 
[
		
	'edit-profile'
	=>	[
			[
	          	'field'   	=>	'first_name',
	          	'label'   	=> 	'First Name',
	          	'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
	          	'errors'	=> 	[
	          						'regex_match' 	=>	'Remove special characters in %s'
	          					],
	        ],

			[
	          	'field'   	=>	'last_name',
	          	'label'   	=> 	'Last Name',
	          	'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
	          	'errors'	=> 	[
	          						'regex_match' 	=>	'Remove special characters in %s'
	          					],
	          
	        ],

	        [
	          	'field'   	=>	'username',
	          	'label'   	=> 	'Username',
	          	'rules'   	=> 	'required|regex_match[/^([A-z0-9]|\s)+$/]',
	          	'errors'	=> 	[
	          						'regex_match' 	=>	'Remove special characters in %s'
	          					],
	          
	        ],

			[
            	'field'		=> 	'email',
            	'label'   	=> 	'Email Address',
            	'rules'   	=> 	'required|valid_email'
	        ]


		],
	'edit-password'
	=>	[
			
	        [
	          	'field'		=> 	'old_password',
	          	'label'   	=> 	'Old Password',
	          	'rules'  	=> 	'required|regex_match[/^([A-z0-9_]|\s)+$/]|min_length[6]',
            	'errors'  	=>	[
                          			'regex_match'   => 'Only capital A-Z, small a-z and 0-9 only with 6 minimum characters!'
                         		],
	        ],

	        [
	          	'field'		=> 	'new_password',
	          	'label'   	=> 	'New Password',
	          	'rules'  	=> 	'required|regex_match[/^([A-z0-9_]|\s)+$/]|min_length[6]',
            	'errors'  	=>	[
                          			'regex_match'   => 'Only capital A-Z, small a-z and 0-9 only with 6 minimum characters!'
                         		],
	        ],

	        [
	          	'field'		=> 	'confirm_password',
	          	'label'   	=> 	'Confirm Password',
	          	'rules'  	=> 	'required|regex_match[/^([A-z0-9_]|\s)+$/]|min_length[6]',
            	'errors'  	=>	[
                          			'regex_match'   => 'Only capital A-Z, small a-z and 0-9 only with 6 minimum characters!'
                         		],
	        ]


		],
	'login_validate'
	=>	[
			[
            	'field'		=> 	'username',
            	'label'   	=> 	'Username',
            	'rules'   	=> 	'required',
	        ],

	        [
	          	'field'		=> 	'password',
	          	'label'   	=> 	'Password',
	          	'rules'  	=> 	'required',
	        ]


		],
	'registration'
	=>	[
			[
	          	'field'   	=>	'first_name',
	          	'label'   	=> 	'First Name',
	          	'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
	          	'errors'	=> 	[
	          						'regex_match' 	=>	'Remove special characters in %s'
	          					],
	        ],

			[
	          	'field'   	=>	'last_name',
	          	'label'   	=> 	'Last Name',
	          	'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
	          	'errors'	=> 	[
	          						'regex_match' 	=>	'Remove special characters in %s'
	          					],
	          
	        ],

	        [
	          	'field'   	=>	'username',
	          	'label'   	=> 	'Username',
	          	'rules'   	=> 	'required|regex_match[/^([A-z0-9.]|\s)+$/]',
	          	'errors'	=> 	[
	          						'regex_match' 	=>	'Only capital A-Z, small a-z and 0-9 and dot(.) is allowed in %s!'
	          					],
	          
	        ],

			[
            	'field'		=> 	'email',
            	'label'   	=> 	'Email Address',
            	'rules'   	=> 	'required|valid_email'
	        ],

	        [
	          	'field'		=> 	'password',
	          	'label'   	=> 	'Password',
	          	'rules'  	=> 	'required|regex_match[/^([A-z0-9_]|\s)+$/]|min_length[6]',
            	'errors'  	=>	[
                          			'regex_match'   => 'Only capital A-Z, small a-z and 0-9 only with 6 minimum characters!'
                         		],

	        ]



		],
	
	'new-content'
	=>	[
			[
            	'field'		=> 	'image_description',
            	'label'   	=> 	'Image Description',
            	'rules'  	=> 	'required|regex_match[/^([A-z0-9_]|\s)+$/]|min_length[6]'
	        ],

	        [
            	'field'		=> 	'image',
            	'label'   	=> 	'Content',
            	'rules'   	=> 	'callback_handleimage'
	        ]


		],
	

];