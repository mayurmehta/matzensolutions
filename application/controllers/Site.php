<?php


class Site extends CI_Controller
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

	public function about(){
		$this->data['page_title'] ="About | Matzen Solution";
		$this->template->load("home_template","home/about", $this->data);
	}

	public function services(){
		$this->data['page_title'] ="Services | Matzen Solution";
		$this->template->load("home_template","home/services", $this->data);
	}

	public function contactus(){
		$this->data['page_title'] ="Contact Us | Matzen Solution";
		$this->template->load("home_template","home/contact", $this->data);
	}



}