<?php


class Index extends CI_Controller
{
	private $data = array();

	public function __construct(){
		parent::__construct();
		// $this->load->model('user_model');
		$this->data['page_title'] = "Welcome to Index";
		$url_method = $this->router->fetch_method(); // controller action {method}
        $this->data['url'] = $url_method;
	}

	public function index(){
		$this->data['page_title'] ="Login to MMT v1.2 Admin Panel";
		$this->template->load("home_template","home/index", $this->data);
	}



}