<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}
	public function index(){
		echo 'holaaa';
	}

}
