<?php

class Save_data extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

	public function getCountryCodeData(){
		$this->db->select('name, phonecode');
		$this->db->order_by('name', 'asc');
		$q = $this->db->get('countries');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[] = $value;
		}
		return $results;
	}

	public function save_contact_data($data){
		$data_ins = array(
			'name' => $data['name'],
			'phone' => $data['phone'],
			'email' => $data['email'],
			'message' => $data['message']
		);

		$flag = $this->db->insert('contact_us', $data_ins);
		return $flag;
	}

	public function save_quotation_data($data){
		$data_ins = array(
			'name' => $data['name'],
			'country_code' => $data['country_code'],
			'country_name' => $data['country_name'],
			'phone' => $data['phone'],
			'email' => $data['email'],
			'project_title' => $data['project_title'],
			'subject' => $data['subject'],
			'message' => $data['message']
		);

		$flag = $this->db->insert('quotation', $data_ins);
		return $flag;
	}

}

?>
