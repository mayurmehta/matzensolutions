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

	public function steel_shop_drawings_services(){
		$this->data['page_title'] ="Steel Shop Drawings Services | Matzen Solution";
		$this->template->load("home_template","home/steel_shop_drawings_services", $this->data);
	}

	public function rebar_detailing_services(){
		$this->data['page_title'] ="Rebar Detailing Services | Matzen Solution";
		$this->template->load("home_template","home/rebar_detailing_services", $this->data);
	}

	public function mep_and_hvac_services(){
		$this->data['page_title'] ="MEP & HVAC Services | Matzen Solution";
		$this->template->load("home_template","home/mep_and_hvac_services", $this->data);
	}

	public function precast_detailing_services(){
		$this->data['page_title'] ="Precast Detailing Services | Matzen Solution";
		$this->template->load("home_template","home/precast_detailing_services", $this->data);
	}

	public function architectural_engineering_services(){
		$this->data['page_title'] ="Architectural Engineering Services | Matzen Solution";
		$this->template->load("home_template","home/architectural_engineering_services", $this->data);
	}

	public function contactus(){
		$this->data['page_title'] ="Contact Us | Matzen Solution";
		$this->template->load("home_template","home/contact", $this->data);
	}

	// Save Contact Us Data
	public function saveContactUs(){
		$this->load->model('save_data');
		$data = $_POST;

		$result = $this->save_data->save_contact_data($data);
		if($result == '1'){
			echo 'MF000';
			exit;
		}
	}

}