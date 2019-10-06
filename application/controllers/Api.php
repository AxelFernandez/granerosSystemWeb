<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','users');
		$this->load->model('Category_model','category');
		$this->load->model('Registry_model','registry');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function categories(){
		echo $this->category->getAllApi();
	}
	public function registryFromCategory($param){
		echo $this->registry->getAllApi($param);
	}
	public function registryFromId($param){
		echo $this->registry->getAllApiList($param);
	}

}
