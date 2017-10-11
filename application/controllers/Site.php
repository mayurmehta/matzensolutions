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
		$this->data['page_title'] ="Home | Matzen Solutions";
		$this->template->load("home_template","home/index", $this->data);
	}

	public function about(){
		$this->data['page_title'] ="About | Matzen Solutions";
		$this->template->load("home_template","home/about", $this->data);
	}

	public function projects(){
		$this->data['page_title'] ="Our Projects | Matzen Solutions";
		$this->template->load("home_template","home/projects", $this->data);
	}

	public function services(){
		$this->data['page_title'] ="Services | Matzen Solutions";
		$this->template->load("home_template","home/services", $this->data);
	}

	public function steel_shop_drawings_services(){
		$this->data['page_title'] ="Steel Shop Drawings Services | Matzen Solutions";
		$this->template->load("home_template","home/steel_shop_drawings_services", $this->data);
	}

	public function rebar_detailing_services(){
		$this->data['page_title'] ="Rebar Detailing Services | Matzen Solutions";
		$this->template->load("home_template","home/rebar_detailing_services", $this->data);
	}

	public function mep_and_hvac_services(){
		$this->data['page_title'] ="MEP & HVAC Services | Matzen Solutions";
		$this->template->load("home_template","home/mep_and_hvac_services", $this->data);
	}

	public function precast_detailing_services(){
		$this->data['page_title'] ="Precast Detailing Services | Matzen Solutions";
		$this->template->load("home_template","home/precast_detailing_services", $this->data);
	}

	public function architectural_engineering_services(){
		$this->data['page_title'] ="Architectural Engineering Services | Matzen Solutions";
		$this->template->load("home_template","home/architectural_engineering_services", $this->data);
	}

	public function contactus(){
		if(isset($_GET['msg']) && $_GET['msg'] == '1'){
			$this->data['show_msg'] = 1;
		}
		$this->data['page_title'] ="Contact Us | Matzen Solutions";
		$this->template->load("home_template","home/contact", $this->data);
	}

	public function get_quote(){
		if(isset($_GET['msg']) && $_GET['msg'] == '1'){
			$this->data['show_msg'] = 1;
		}
		$this->load->model('save_data');

		$this->data['page_title'] ="Get A Quote | Matzen Solutions";
		$this->data['country_codes'] = $this->save_data->getCountryCodeData();
		$this->template->load("home_template","home/get_quote", $this->data);
	}

	// Save Contact Us Data
	public function saveContactUs(){
		$this->load->model('save_data');
		$data = $_POST;

		$result = $this->save_data->save_contact_data($data);

		$config = Array(
			'smtp_host' => 'mail.matzensolutions.com',
			'smtp_port' => 587,
			'_smtp_auth' => true,
			'smtp_user' => 'info@matzensolutions.com',
			'smtp_pass' => 'info@matzensolutions',
			'mailtype'  => 'html',
		);

		$from = "info@matzensolutions.com";
		$to = "info@matzensolutions.com";
		$subject = "Contact Enquiry";
		$message = "
		<!DOCTYPE html>
		<html>
		<head>
		<style>
		table, th, td {
		   border-collapse: collapse;
		   border: 1px solid #d9d7ce ;
		}
		th, td {
		   padding: 5px;
		   text-align: left;
		   
		}

		td{
		    width:100%;
		   padding:10px;
		   text-align:center;
		}

		th {
		   background-color: #d9d7ce;
		   color: black;
		   padding:10px;
		}
		</style>
		</head>
		<body>
		<table>
		<tr>
		    <th colspan='2' style='text-align:center; background-color:#1d97bf ; border: none; color:#fff;'>Contact Enquiry</th>
		</tr>
		 <tr>
		   <th>Name:</th>
		   <td>".$data['name']."</td>
		 </tr>
		 <tr>
		   <th>Email:</th>
		   <td>".$data['email']."</td>
		 </tr>
		 <tr>
		   <th>Contact:</th>
		   <td>".$data['phone']."</td>
		 </tr>
		 <tr>
		   <th>Message:</th>
		   <td>".$data['message']."</td>
		 </tr>
		</table>

		</body>
		</html>
		";
		
		$this->load->library('email', $config);
		$this->email->from($from, 'Contact Enquiry');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		//Send mail 
		if($this->email->send()){
			header('location: '. site_url('site/contactus?msg=1'));
		} else { 
			die("Email not sent. Try again");
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

		$config = Array(
			'smtp_host' => 'mail.matzensolutions.com',
			'smtp_port' => 587,
			'_smtp_auth' => true,
			'smtp_user' => 'info@matzensolutions.com',
			'smtp_pass' => 'info@matzensolutions',
			'mailtype'  => 'html',
		);

		$from = "info@matzensolutions.com";
		$to = "info@matzensolutions.com";
		$subject = "Quotation Requested";
		$message = "
		<!DOCTYPE html>
		<html>
		<head>
		<style>
		table, th, td {
		   border-collapse: collapse;
		   border: 1px solid #d9d7ce ;
		}
		th, td {
		   padding: 5px;
		   text-align: left;
		   
		}

		td{
		    width:100%;
		   padding:10px;
		   text-align:center;
		}

		th {
		   background-color: #d9d7ce;
		   color: black;
		   padding:10px;
		}
		</style>
		</head>
		<body>
		<table>
		<tr>
		    <th colspan='2' style='text-align:center; background-color:#1d97bf ; border: none; color:#fff;'>Requested Quotation</th>
		</tr>
		 <tr>
		   <th>Name:</th>
		   <td>".$data['name']."</td>
		 </tr>
		 <tr>
		   <th>Email:</th>
		   <td>".$data['email']."</td>
		 </tr>
		 <tr>
		   <th>Contact:</th>
		   <td>+".$data['country_code']."-".$data['phone']."</td>
		 </tr>
		 <tr>
		   <th>Country:</th>
		   <td>".ucfirst($country_name)."</td>
		 </tr>
		 <tr>
		   <th>Project Title:</th>
		   <td>".$data['project_title']."</td>
		 </tr>
		 <tr>
		   <th>Project Subject:</th>
		   <td>".$data['subject']."</td>
		 </tr>
		 <tr>
		   <th>Message:</th>
		   <td>".$data['message']."</td>
		 </tr>
		</table>

		</body>
		</html>
		";
		
		$this->load->library('email', $config);
		$this->email->from($from, 'Quotation Requested');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		//Send mail 
		if($this->email->send()){
			header('location: '. site_url('site/get_quote?msg=1'));
		} else { 
			die("Email not sent. Try again");
		}

	}

}