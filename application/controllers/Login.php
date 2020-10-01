<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('login_model');

        $this->load->library('account');
    }

    public function index()
    {
        if( ! $this->account->isLoggedIn(FALSE))
        {
            $this->load->library('form_validation');

            if ( ! is_empty($this->input->post('usersubmit')))
            {
                $this->load->library('form_validation');

                $email = $this->input->post("email");
                $password = $this->input->post("password");

                $this->form_validation->set_rules("email", "User Name", "trim|required");
                $this->form_validation->set_rules("password", "Password", "trim|required");

                if ($this->form_validation->run() === TRUE)
                {
                    $user = $this->login_model->read_user_by_email($email);
                    if(! empty($user))
                    {
                        if(($user['userEmail'] == $email) AND ($user['userPassword'] == $password))
                        {
                            
                            $sessiondata = array(
                                                  'userID'          => $user['userID'],
                                                  'userName'        => $user['userFirstName'],
                                                  'userType'        => $user['userTypeKey'],
                                                  'isLoggedIn'      => TRUE
                                                );
                            $this->session->set_userdata($sessiondata);

                            redirect(base_url().'dashboard');
                        }

                    }
            
                    else
                    {
                        

                        $this->session->set_flashdata('form_message', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                        redirect(base_url().'login');
                        
                     }
                }
                else
                {
                    if( empty($useremail))
                    {
                        $this->session->set_flashdata('userEmail', '<div class="alert alert-danger text-center">The Username field is required.</div>');
                    }
                    if( empty($userpassword))
                    {
                        $this->session->set_flashdata('userPassword', '<div class="alert alert-danger text-center">The Password field is required.</div>');
                    }
                    redirect(base_url().'login');
                }
            }
            
            $this->load->view('login/login');
        }
        else
        {
            redirect (base_url());
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url().'login');
    }

    
    
}