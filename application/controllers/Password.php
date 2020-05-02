<?php


class Password extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model','users');


	}
	public function index(){
		if($this->session->userdata(LOGIN)) {
			$data['titulo']='Se cerrará la sesion una vez que la contraseña haya sido cambiada';
			$this->load->view('Password', $data);}
		else{redirect('login/index');}
	}
	public function change()
	{
		if ($this->session->userdata(LOGIN)) {
			$pass = $this->input->post('contraseñaactual');
			$newpass = $this->input->post('nuevacontraseña');
			$this->load->model('users');
			$user = $this->session->userdata(USERNAME);
			$boolean = $this->users->changePassword($user, $pass, $newpass);
			if ($boolean) {
				redirect('login/logout');
			} else {
				$data['titulo'] = 'La contraseña es incorrecta, compruebe la informacion';
				$this->load->view('Password', $data);
			}
		}
		else{redirect('login/index');}
	}
}
