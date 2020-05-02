<?php
/**
 * Created by PhpStorm.
 * User: Axel
 * Date: 14/07/2019
 * Time: 19:54
 */

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('Login.html');
    }
    public function login_post(){
        if ($this->input->post()) {
            $userName = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('User_model');
            $user = $this->User_model->userValidate($userName, $password);
            if ($user) {
                $userData = array(
                    ID=>$user->iduser,
                    USERNAME=> $user->user,
                    CATEGORY => $user->iduserCategory,
                    LOGIN => TRUE
                );
                $this->session->set_userdata($userData);
                redirect('login/logged');

            } else {
                redirect('login/index');
            }
        }
    }
    public function logged() {
        if($this->session->userdata(LOGIN)) {
           redirect('main/index');
        }
        else {
            redirect('login/index');
        }
    }
    public function logOut() {

        $this->session->sess_destroy();
        redirect('login/index');
    }
}
