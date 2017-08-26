<?php


class Index extends CI_Controller
{
	private $data = array();

	public function __construct(){
		parent::__construct();
		
		$url_method = $this->router->fetch_method(); // controller action {method}
		$this->data['url'] = $url_method;
	}

	public function index(){
		$this->data['page_title'] ="Home | Matzen Solution";
		$this->template->load("home_template","home/index", $this->data);
	}



}