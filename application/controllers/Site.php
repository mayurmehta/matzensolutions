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

	public function projects(){
		$this->data['page_title'] ="Our Projects | Matzen Solution";
		$this->template->load("home_template","home/projects", $this->data);
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
		if(isset($_GET['msg']) && $_GET['msg'] == '1'){
			$this->data['show_msg'] = 1;
		}
		$this->data['page_title'] ="Contact Us | Matzen Solution";
		$this->template->load("home_template","home/contact", $this->data);
	}

	public function get_quote(){
		if(isset($_GET['msg']) && $_GET['msg'] == '1'){
			$this->data['show_msg'] = 1;
		}
		$this->load->model('save_data');

		$this->data['page_title'] ="Get A Quote | Matzen Solution";
		$this->data['country_codes'] = $this->save_data->getCountryCodeData();
		$this->template->load("home_template","home/get_quote", $this->data);
	}

	// Save Contact Us Data
	public function saveContactUs(){
		$this->load->model('save_data');
		$data = $_POST;

		$result = $this->save_data->save_contact_data($data);
		if($result == '1'){
			header('location: '. site_url('site/contactus?msg=1'));
		}
	}

	// Save Quotation Data
	public function saveQuotation(){
		$this->load->model('save_data');
		
		$data = $_POST;
		
		$country_data = explode("-", $data['country_code']);
		$code = $country_data[0];
		$country_name = $country_data[1];

		$data['country_code'] = $code;
		$data['country_name'] = $country_name;

		$result = $this->save_data->save_quotation_data($data);

		$from = "info@matzensolutions.com";
		$to = "info@matzensolutions.com";
		$subject = "Second subject";
		$message = "Second This is message content";

		$this->load->library('email');		
		$this->email->from($from, 'Enquiry');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		//Send mail 
		if($this->email->send()){
			header('location: '. site_url('site/get_quote?msg=1'));
		} else { 
			die("Email not sent. Try again");
		}

		if($result == '1'){
			header('location: '. site_url('site/get_quote?msg=1'));
		}
	}

}