<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Main extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','users');
		$this->load->model('Category_model','category');
		$this->load->model('Registry_model','registry');
		$this->load->model('Validator_model','validator');
		$this->load->library('session');
		$this->load->helper('url');
	}



	public function index(){
		$params = $this->uri->segment(3);
		$params = $this->validator->validate($params);
		$output = null;

		$categorys = $this->category->getAllCategories($params);




	    $data['category'] = $categorys;
        $this->load->view('MainWelcome');
		if (!is_null($params) && !$this->validator->hadChildren($params)){
			$output = $this->registry->showForUsers($params);
			$this->load->view('GCHeaders',$output);
			$this->load->view('MainWelcomePost');

			//$this->load->view('SuperCategories',array('output'=>$this->category->getSuperCategories()));
			//$this->load->view('CategoryMenu', $data);
			$this->load->view('Content', $output);
		}else{

			$this->load->view('MainWelcomePost');

			//$this->load->view('SuperCategories',array('output'=>$this->category->getSuperCategories()));
			$this->load->view('CategoryMenu', $data);
		}


	}

    public function category(){
        if ($this->session->userdata(LOGIN) && $this->session->userdata(CATEGORY) == ADMIN) { // Grants only for user was logged and Admin user
            $output = $this->category->showCategory();
            $this->load->view('MainWelcome',$output);
			$this->load->view('GCHeaders',$output);
			$this->load->view('MainWelcomePost');
			$this->load->view('Content',$output);
        }else{redirect('login/index');} //if the user was an common user, the program redirect to login page.

    }
	public function user(){
		if ($this->session->userdata(LOGIN) && $this->session->userdata(CATEGORY) == ADMIN) { // Grants only for user was logged and Admin user
			$output = $this->users->showUsers();
            $this->load->view('MainWelcome',$output);
			$this->load->view('GCHeaders',$output);
			$this->load->view('MainWelcomePost');
            $this->load->view('Content',$output);
		}else{redirect('login/index');} //if the user was an common user, the program redirect to login page.
	}

	public function pending(){
		$output = $this->registry->showPending();
		//$categorys = $this->category->getAllCategories();
		//$data['category'] = $categorys;
		$this->load->view('MainWelcome',$output);
		$this->load->view('GCHeaders',$output);
		$this->load->view('MainWelcomePost');
		//$this->load->view('CategoryMenu',$data);
		$this->load->view('Content',$output);
	}



}
