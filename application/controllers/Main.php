<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Main extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','users');
		$this->load->library('session');
		$this->load->helper('url');
	}


	/**
	 *	Hello Yamila, this will be you main class where you will start to Develop
	 * You most Create a model, for example "User_model" in this model you will must initializate a Grocery Crud object
	 * and call it from here and pass away to the view.
	 * I Will do one, for example, User Mangament
	 */
	public function index(){
		echo 'holaaa';

	}

	/**
	 * This Method Show user with Grocery Crud, you Must do the same for Category and Registry, but must make the correct grants
	 * for ever user, in this case, this only available for Administrador user
	 * To entrer this, change the url from localhost/index.php/main/index to ...../main/user to call this method
	 *
	 * ADMIN is a Constant defined in config/constants.php folder
	 *
	 *
	 * The View had nothing, only the Grocery Crud Library you can see it in /views/MainView.php folder.
	 */
	public function user(){
		if ($this->session->userdata('login') && $this->session->userdata('category')== ADMIN) { // Grants only for user was logged and Admin user
			$output = $this->users->showUsers();
			$this->load->view('MainView', $output);
		}else{redirect('login/index');} //if the user was an common user, the program redirect to login page.
	}





}
