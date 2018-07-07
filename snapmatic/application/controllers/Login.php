<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
    public function index()
    {   
     parent::loginpage('partials/main',
        [   
                'title'=>'Snapmatic'
        ]
        );
 }

 public function auth()
 {
    if($this->form_validation->run('login_validate') == FALSE) 
    {
        echo json_encode(validation_errors());
    } 
    else 
    {

        $email = clean_data($_POST['username']);
        $password = clean_data($_POST['password']);
        $where = array('email'=>$email);
        $where = "(email = '$email' OR username = '$email')";
        $get_user = $this->Crud_model->fetch_tag_row('*','users',$where);
        if($get_user) 
        {
            $check_password = $get_user->password;

            if($this->session->tempdata('penalty'))
            {
                $penalty_time = $this->session->tempdata('penalty_time');
                $penalty_start_time = $this->session->tempdata('penalty_start_time');
                $end_time = date('g:i A', strtotime('+5 minutes', $penalty_start_time));
                echo json_encode("Your account has been locked for 5 minutes. <br>Please login again on ".$end_time);
            } 
            else 
            {
                if(password_verify($password,$check_password)) 
                {

                    if($get_user->status == '1') 
                    {
                            
                                $user_session = [
                                'id'                => $get_user->id,
                                'first_name'        => $get_user->first_name,
                                'last_name'         => $get_user->last_name,
                                'profile_picture'   => $get_user->profile_picture,
                                'username'          => $get_user->username,
                                'email'             => $get_user->email
                                ];

                                $this->session->set_userdata('logged_in',$user_session);
                                $session = $this->session->userdata('logged_in');                  
                                $this->session->user_id             = $session['id'];
                                $this->session->profile_picture     = $session['profile_picture'];
                                $this->session->email               = $session['email'];
                                $this->session->fullname            = $session['first_name'] .' '. $session['last_name'];

                                echo json_encode("success");
                            }
                            else if ($get_user->status == '0')
                            {
                                echo json_encode("Your account is inactive. Contact our human resource department regarding this problem.");
                            }

                        }
                        else 
                        {
                            $attempt = $this->session->userdata('attempt');
                            $attempt++;
                            $this->session->set_userdata('attempt', $attempt);

                            if($attempt == 3)
                            {
                                echo json_encode("Your account is locked");

                                $this->session->set_tempdata('penalty', true, 300);
                                $this->session->set_tempdata('penalty_time', 300, 300);
                                $this->session->set_tempdata('penalty_start_time', now(), 300);
                                $this->session->set_userdata('attempt', 0);

                            }
                            else
                            {
                                echo json_encode("Invalid Credentials");
                            }

                        }
                    }     
                }
                else
                {
                    echo json_encode("Invalid Credentials");
                } 
            }
        }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user');
    }
}
?>