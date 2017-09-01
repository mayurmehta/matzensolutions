<?php

class Save_data extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

	public function get($data = array()){
		$results = array();
		if(!empty($data)){
			$this->db->where($data);
		}
		$this->db->limit(25);
		$q = $this->db->get('user');
		$results['data'] = $q->result_array();
		$results['count'] = $q->num_rows;
		return $results;
	}

	public function get_userdata($data = array()){
		$results = array();
		if(!empty($data)){
			$this->db->where($data);
		}
		$q = $this->db->get('user');
		$results = $q->result_array();
		if(isset($results[0]) && !isset($results[1])){
			return $results[0];
		} else {
			return $results;
		}
	}

	public function get_all_vids(){
		$results = array();
		$q = $this->db->get('vids');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[$value['vid']] = $value['name'];
		}
		return $results;
	}

	public function get_all_talents(){
		$results = array();
		$q = $this->db->get('talents');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[$value['id']] = $value['name'];
		}
		return $results;
	}

	public function get_all_agents(){
		$results = array();
		$this->db->select('agent_id');
		$this->db->group_by('agent_id');
		$q = $this->db->get('calling');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[] = $value['agent_id'];
		}
		return $results;
	}

	public function get_specializations_by_talid($talentid){
		$results = array();
		$this->db->select('id,name');
		$this->db->where('talentid', $talentid);
		$q = $this->db->get('talents_specializations');
		$data = $q->result_array();
		$c=0;
		foreach ($data as $key => $value) {
			$results[$c]['id'] = $value['id'];
			$results[$c]['name'] = $value['name'];
			$c++;
		}
		return $results;
	}

	public function get_specifications_by_spid($spid){
		$results = array();
		$this->db->select('id,name');
		$this->db->where('spid', $spid);
		$q = $this->db->get('talents_specifications');
		$data = $q->result_array();
		$c=0;
		foreach ($data as $key => $value){
			$results[$c]['id'] = $value['id'];
			$results[$c]['name'] = $value['name'];
			$c++;
		}
		return $results;
	}

	public function get_all_languages(){
		$results = array();
		$q = $this->db->get('language');
		$data = $q->result_array();
		return $data;
	}

	public function save_user_data($id, $data_user){
		$this->db->where('id', $id);
		$update_user = $this->db->update('user', $data_user);
		return $update_user;
	}

	public function save_user_talent($id, $data_pri_talent, $talent_pri){
		$this->db->where('userid', $id);
        $this->db->where('talent_pri', $talent_pri);
		$update_user = $this->db->update('user_talents', $data_pri_talent);
	}

	public function get_usertalent_by_talpri_id($id, $talent_pri){
		$this->db->select('id');
		$this->db->where('userid', $id);
        $this->db->where('talent_pri', $talent_pri);
        $q = $this->db->get('user_talents');
        $data = $q->row()->id;
        return $data;
	}

	public function delete_uts_n_utss_by_utid($utid){
		$this->db->select('id');
		$this->db->where('usertalentid', $utid);
        $q = $this->db->get('user_talent_specialization');
        $data = $q->result_array();

		$this->db->delete('user_talent_specialization', array('usertalentid' => $utid));

        foreach ($data as $key => $value) {
        	$this->db->delete('user_talent_specialization_specification', array('usertalentspeid' => $value['id']));
        }

		/*echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit;*/
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

	public function delete_add_user_talent($userid, $tal_pri, $new_talent_id){
		
		$utid = $this->get_usertalent_by_talpri_id($userid, $tal_pri);
		$this->delete_uts_n_utss_by_utid($utid);
		$this->db->delete('user_talents', array('id' => $utid));
		$data2 = array(
		   'talent_pri' => $tal_pri,
		   'userid' => $userid,
		   'talentid' => $new_talent_id,
		);
		
		$flag = $this->db->insert('user_talents', $data2);
		return $flag;
	}

	public function add_uts_n_utss_uid($specializations_ids, $utid){
		/*echo '<pre>';
		print_r($specializations_ids);
		echo '</pre>';
		echo '<pre>';
		print_r($utid);
		echo '</pre>';
		exit;*/
		if($specializations_ids != NULL){
			foreach ($specializations_ids as $key => $value) {
				$data = array(
				   'usertalentid' => $utid,
				   'speid' => $key,
				);
				$this->db->insert('user_talent_specialization', $data);
				$utsid = $this->db->insert_id();
				if(!empty($value)){
					foreach ($value as $k => $v) {
						$data2 = array(
						   'usertalentspeid' => $utsid,
						   'spid' => $k,
						);
						$this->db->insert('user_talent_specialization_specification', $data2);
					}
				}
			}
		}
	}

	public function get_uts_n_utss_by_utid($utid){
		$results = array();
		$this->db->select('id,speid');
		$this->db->where('usertalentid', $utid);
		$q = $this->db->get('user_talent_specialization');
		// echo $this->db->last_query().'<br>';
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			// echo $value['id'].'<br>';
			$this->db->select('id,spid');
			$this->db->where('usertalentspeid', $value['id']);
			$q2 = $this->db->get('user_talent_specialization_specification');
			// echo $this->db->last_query().'<br>';
			$data2 = $q2->result_array();
			// echo '<pre>';
			// print_r('data 2 : '.$data2);
			// echo '</pre>';
			// exit;
			if(count($data2) != 0){
				foreach ($data2 as $k => $v) {
					$results[$value['speid']][] = $v['spid'];
				}
			} else {
				$results[$value['speid']] = 0;
			}
			// $results[$value['speid']][] = $value['speid'];
		}
		/*echo '<pre>';
		print_r($results);
		echo '</pre>';
		exit;*/
		return $results;
	}

	public function get_all_countries(){
		$results = array();
		$this->db->select('country_id,country');
		$q = $this->db->get('country');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[$value['country_id']] = $value['country'];
		}
		return $results;
	}

	public function get_all_countries_with_code(){
		$results = array();
		$this->db->select('country_code,country');
		$q = $this->db->get('country');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[$value['country_code']] = $value['country'];
		}
		return $results;
	}

	public function get_countryid_by_countrycode($code){
		$this->db->select('country_id');
		$this->db->where('country_code', $code);
		$q = $this->db->get('country');
		$data = $q->row()->country_id;
		return $data;
	}

	public function get_cities_by_country_code($country_code){
		$results = array();
		$this->db->select('city_id,city');
		$this->db->where('country_code', $country_code);
		$q = $this->db->get('cities');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[$value['city_id']] = $value['city'];
		}
		return $results;
	}

	public function check_profile_completion($userid, $get_type = '0'){
		/*$sql_profile_strength = "SELECT id,status,profile_strength,profile_url,registration_step,callverified,current_setup_step from `users_v11` where id='".$userid."'";
		$pro_strength = Yii::app()->db->createCommand($sql_profile_strength)->queryRow();*/	

		$this->db->select('id,status,profile_strength,profileurl,registration_step,call_verification_status');
		$this->db->where('id', $userid);
		$q = $this->db->get('user');
		$pro_strength = $q->row();

		$strength = unserialize($pro_strength->profile_strength);

		$tot_tal = count($strength['talentsper']);
		$tal_attr = array();

		if(isset($strength['talentsper']) && !empty($strength['talentsper'])){
			foreach ($strength['talentsper'] as $value) {
				$tal_attr[] = $value['attributes'];
			}
		} else {
			$tal_attr = array();
		}

		$sum_attr = array_sum($tal_attr);

		if($tot_tal != 0){
			$attr_percentages = ($sum_attr/$tot_tal);
		} else {
			$attr_percentages = 0;
		}

		$sumOfProfile = $strength['call_verification']+$strength['profilepic']+$strength['settings']+$strength['social']+$attr_percentages;

		if($get_type == '1'){
			$val = $sumOfProfile;
		} else {
			if($sumOfProfile == 0){
				$val = 'Not Started Yet';
			} else if($sumOfProfile > 0 && $sumOfProfile < 50){
				$val = 'Partially Done';
			} else if($sumOfProfile == 50){
				$val = 'Completed';
			}
		}

		return $val;
	}

	public function update_language($id,$new_lang_value){
		$data = array(
		   'language' => $new_lang_value,
		);

		$this->db->where('id', $id);
		$res = $this->db->update('language', $data);
		if($res){
			return $new_lang_value;
		} else {
			echo 'Language not getting updated. Please try again';
		}		
	}

	public function add_language($new_lang_value){
		$data = array(
		   'language' => $new_lang_value,
		);
		$res = $this->db->insert('language', $data);
		return $res;
	}

	public function add_city($country,$city){
		$check_city = $this->check_city_exist($city);
		$final_code = $this->find_valid_city_code($city);
		if($check_city == 0){
			$data = array(
			   'country_id' => $country,
			   'city' => $city,
			   'code' => $final_code
			);
			$res = $this->db->insert('cities', $data);
			return $res;
		} else {
			return 0;
		}
	}

	public function add_task($task_title,$task_description,$due_date,$priority,$assignee,$followers){
		$data = array(
		   'task_title' => $task_title,
		   'task_description' => $task_description,
		   'due_date' => $due_date,
		   'priority' => $priority,
		   'creator' => $this->session->userdata('id'),
		   'assignee' => $assignee,
		   'followers' => $followers,
		   'status' => 1,
		   'cdate' => date('Y-m-d h:i:s'),
		);
		$res = $this->db->insert('agile_tasks', $data);
		return $res;
	}

	public function add_task_comment($userid,$taskid,$comment){
		$results = array();
		$data = array(
		   'admin_id' => $userid,
		   'task_id' => $taskid,
		   'comment' => $comment,
		   'cdate' => date('Y-m-d h:i:s'),
		);
		$results['res'] = $this->db->insert('agile_task_comments', $data);
		$results['comment_id'] = $this->db->insert_id();
		$results['taskid'] = $taskid;
		return $results;
	}

	public function update_task($id,$task_title,$task_description,$due_date,$priority,$assignee,$followers){
		$data_task = array(
		   'task_title' => $task_title,
		   'task_description' => $task_description,
		   'due_date' => $due_date,
		   'priority' => $priority,
		   'assignee' => $assignee,
		   'followers' => $followers,
		   'mdate' => date('Y-m-d h:i:s'),
		);
		$this->db->where('id', $id);
		$update_task = $this->db->update('agile_tasks', $data_task);
		return $update_task;
	}

	public function get_all_active_tasks(){
		$results = array();
		$this->db->where('is_deleted', 0);
		$this->db->order_by('priority', 'asc');
		$this->db->order_by('reassigned', 'desc');
		$q = $this->db->get('agile_tasks');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$value['due_date'] = strtotime($value['due_date']);
			if($value['status'] == 1){
				$results['todo'][] = $value;
			} else if($value['status'] == 2){
				$results['progress'][] = $value;
			} else if($value['status'] == 3){
				$results['testing'][] = $value;
			} else if($value['status'] == 4){
				$results['completed'][] = $value;
			}
		}
		return $results;
	}

	public function get_all_comments_of_task($taskid){
		$results = array();
		$this->db->where('task_id', $taskid);
		$q = $this->db->get('agile_task_comments');
		$data = $q->result_array();
		return $data;
	}

	public function change_task_status($id,$status,$reassigned){
		$results = array();
		$this->db->set('status', $status, FALSE);
		if($reassigned == 1){
			$this->db->set('reassigned', 'reassigned+1', FALSE);
		}
		$this->db->where('id', $id);
		$update_task = $this->db->update('agile_tasks');
		return $update_task;
	}

	public function update_task_activity($id,$activity){
		$results = array();
		$data = array(
		   'task_activity' => $activity
		);
		$this->db->where('id', $id);
		$update_task = $this->db->update('agile_tasks', $data);
		return $update_task;
	}

	public function get_task_details($id, $flag='all'){
		$results = array();
		if($flag == '1'){
			$this->db->select('task_activity');
		} else {
			$this->db->select('task_title,task_description,creator,assignee,followers,priority,due_date,task_activity,status,reassigned,cdate,mdate');
		}
		$this->db->where('id', $id);
		$q = $this->db->get('agile_tasks');
		$data = $q->row();
		$data = (array) $data;
		return $data;
	}

	public function check_city_exist($city){
		$results = array();
		$data = $this->db->query("SELECT city_id FROM `cities` where upper(`city`) = upper('".$city."')")
				->result_array();
		$count = count($data);
		return $count;
	}

	public function check_duplicate_email($email,$id){
		$this->db->select('id');
		$this->db->where('email', $email);
		$this->db->where('id !=', $id);
		$q = $this->db->get('user');
		$data = $q->result_array();
		if(count($data) > 0){
			return false;
		} else {
			return true;
		}
	}

	public function check_duplicate_mobile($mobile,$id,$type){
		$this->db->select('id');
		$this->db->where('contactnumber', $mobile);
		if($type != 1){
			$this->db->where('id !=', $id);
		}
		$q = $this->db->get('user');
		$data = $q->result_array();
		if(count($data) > 0){
			return false;
		} else {
			return true;
		}
	}

	public function check_duplicate_profileurl($profileurl,$id){
		//echo $profileurl." - - ".$id;
		$this->db->select('id');
		$this->db->where('profileurl', $profileurl);
		$this->db->where('id !=', $id);
		$q = $this->db->get('user');
		
		$data = $q->result_array();
		
		if(count($data) > 0){
			return false;
		} else {
			return true;
		}
	}

	public function get_user_feedback($id){
		$this->db->where('userid', $id);
		$q = $this->db->get('user_feedback');
		$data = $q->row();
		$data = (array) $data;
		return $data;
	}

	public function get_user_talents($id){
		$this->db->where('userid', $id);
		$this->db->order_by('talent_pri', 'asc');
		$q = $this->db->get('user_talents');
		$data = $q->result_array();
		if(count($data) > 0){
			return $data;
		} else {
			return 0;
		}		
	}

	public function get_talentname_by_id($talentid){

	}

	public function get_admin_active_members(){
		$this->db->select('id,fullname');
		$this->db->where('status', '1');
		$q = $this->db->get('admin');
		$data = $q->result_array();
		foreach ($data as $key => $value) {
			$results[$value['id']] = $value['fullname'];
		}
		return $results;
	}

	public function get_admin_details($id, $flag='all'){
		if($flag == '1'){
			$this->db->select('id,fullname,email');
		}
		$this->db->where('id', $id);
		$q = $this->db->get('admin');
		$data = $q->row();
		$data = (array) $data;
		return $data;
	}

	public function get_all_admin_types(){
		$results = array();
		$this->db->select('id,name');
		$this->db->order_by('id', 'asc');
		$q = $this->db->get('admin_permissions');
		$data = $q->result_array();
		$c = 1;
		foreach ($data as $key => $value) {
			$results[$c]['id'] = $value['id'];
			$results[$c]['name'] = $value['name'];
			$c++;
		}
		return $results;
	}

	public function get_admin_types_by_usertype($usertype){
		$this->db->select('name');
		$this->db->where('id', $usertype);
		$q = $this->db->get('admin_permissions');
		$data = $q->row();
		return $data;
	}

	public function check_feedback_exist($id){
		$this->db->select('userid');
		$this->db->where('userid', $id);
		$q = $this->db->get('user_feedback');
		$data = $q->row();
		if(count($data) > 0){
			return 1;
		} else {
			return 0;
		}
	}

	public function find_valid_city_code($city,$digit=3){
		$code = substr(strtoupper($city), 0, $digit);
		$this->db->select('city_id');
		$this->db->where('code', $code);
		$q = $this->db->get('cities');
		$data = $q->result_array();
		if(count($data) > 0){
			$digit++;
			return $this->findValidCityCode($city,$digit);
		} else {
			return $code;
		}
	}

	public function get_dispositions_from_call_type($call_type){
		return $GLOBALS['DISPOSITION_WITH_TYPE'][$call_type];
	}

	public function delete_user_by_id($id,$type=''){

		/* Check user is Artist */
		if($type == 1){ // Delete Artist

			/* Get user's all projects */
			$q = $this->db->get_where('artist_talent_project', array('userid' => $id));
			$res = $q->result_array();

			/* If user has project(s) */
			if(!empty($res)){
				foreach ($res as $key => $value) {
					/* Get user's project media */
					$sql1 = $this->db->get_where('artist_talent_project_media', array('pid'=>$value["id"]));
					$data1 = $sql1->result_array();
					if(!empty($data1)){
						/* Delete project media */
						$this->db->delete('artist_talent_project_media', array('pid' => $value["id"]));
					}
				}
				/* Delete user's projects */
				$this->db->delete('artist_talent_project', array('userid' => $id));
			}

			/* Get user's all talents */
			$q2 = $this->db->get_where('user_talents', array('userid' => $id));
			$res2 = $q2->result_array();

			/* If user has talent(s) */
			if(!empty($res2)){
				foreach ($res2 as $key => $value) {
					/* Get user's talent specialization */
					$sql2 = $this->db->get_where('user_talent_specialization', array('usertalentid'=>$value["id"]));
					$data2 = $sql2->result_array();
					if(!empty($data2)){
						foreach ($data2 as $k => $v) {
							/* Get user's specialization specifications */
							$sql3 = $this->db->get_where('user_talent_specialization_specification', array('usertalentspeid'=>$v["id"]));
							$data3 = $sql3->result_array();
							if(!empty($data3)){
								/* Delete user's specialization specifications */
								$this->db->delete('user_talent_specialization_specification', array('usertalentspeid' => $v["id"]));
							}
						}
						/* Delete user's talent specializations */
						$this->db->delete('user_talent_specialization', array('usertalentid' => $value["id"]));
					}
				}
				/* Delete user's talents */
				$this->db->delete('user_talents', array('userid' => $id));
			}
			
			
			/* List of all non-dependency tables */
			$tables = array(
							'artist_project_worked_with',
							'profile_images',
							'profile_setting',
							'user_activity_log',
							'user_feedback',
							'user_work',
							'user_talent_attributes'
							);

			/* Delete user from $tables Array Tables */
			$this->db->where('userid', $id);
			$this->db->delete($tables);

			/* Delete user from main User table */
			$this->db->delete('user', array('id' => $id));

			redirect(site_url('dashboard/users'));


		} else if($type == 2){ // Delete Producer

			$sql = $this->db->delete('user', array('id' => $id));

		}

	}

	public function delete_admin_by_id($id){
		/* Delete admin from $tables Array Tables */
		$this->db->where('id', $id);
		$this->db->delete('admin');

		redirect(site_url('dashboard/administrators'));
	}

	public function delete_language_by_id($id){
		/* Delete user from $tables Array Tables */
		$this->db->where('id', $id);
		$this->db->delete('language');

		redirect(site_url('dashboard/languages?reset=1'));
	}

	public function delete_city_by_id($id){
		/* Delete user from $tables Array Tables */
		$this->db->where('city_id', $id);
		$this->db->delete('cities');

		redirect(site_url('dashboard/cities?reset=1'));
	}

	public function delete_task_by_id($id){
		/* Set is_deleted=1 for that task */
		$this->db->set('is_deleted', 1, FALSE);
		$this->db->where('id', $id);
		$update_task = $this->db->update('agile_tasks');

		return $update_task;
	}

	public function get_language_name($langid){
		//global $connection;
		//$languagenm = '';
		$this->db->query("set names 'utf8'");
		$this->db->select('language');
		$this->db->where('id',$langid);
		$languagesql = $this->db->get('language');

		$res = $languagesql->result_array();
		$languagenm = $res[0]['language'];
		//mysql_query("set names 'utf8'");
		//$languagesql = mysql_query("Select language from language WHERE id='".$langid."'",$connection);		
		//$row = mysql_fetch_assoc($languagesql);
		//$languagenm = $row['language']; 
		
		return $languagenm;
	}

	public function get_talent_attributes_strength($talent_fields){
		
		/*echo '<pre>';
		print_r($talent_fields);
		echo '</pre>';
		exit;*/

		$userid = $talent_fields['userid'];
		$this->db->select('gender');
		$this->db->where('id',$userid);
		$q_gender = $this->db->get('user');
		$res_gender = $q_gender->result_array();
		$user_gender = $res_gender[0]['gender'];

		/*echo $user_gender;
		exit;*/

		$html = '';
		$usertalent = array();
		$usersteps = array();
		$attribute_step_id = 0;
		$attribute_step_id_q = 0;
		$attribute_step_id_types = array();


		/*echo '<pre>';
		print_r($talent_fields);
		echo '</pre>';
		exit;*/

			$usertalent = $talent_fields;
			$usertalent['talentstep'] = array();

			/*echo '<pre>';
			print_r($usertalent);
			echo '</pre>';
			exit;*/

			/*echo '<pre>';
			print_r($talent_fields['talentid']);
			echo '</pre>';
			exit;*/

			// query for specialization wise steps
			$spec_where="";
			if($talent_fields['talentid']==5 || $talent_fields['talentid']==8){
				
				$this->db->select('speid');
				$this->db->where('usertalentid',$talent_fields['id']);
				$utspsql = $this->db->get('user_talent_specialization');

				$data = $utspsql->result_array();

				/*echo '<pre>';
				print_r($data);
				echo '</pre>';
				exit;*/

				//$utspsql = "select speid from user_talent_specialization where usertalentid = '".$talent_fields['id']."'";
				//$rowutsp = mysql_fetch_assoc($utspsql);
				//$data = Yii::app()->db->createCommand($utspsql)->queryAll();
				/*echo '<pre>';
				print_r($number);
				echo '</pre>';*/
				//exit;


				$rownum_utsp = count($data);
				$sparr=array();
				$spstr="";
				if($rownum_utsp>0){
					foreach($data as $row_utsp){
						$sparr[] = $row_utsp['speid']; 
					}
					// check for musician specialization 60,61 and other
					if($talent_fields['talentid']==8){
						$flg=0;
						if(in_array('60',$sparr,FALSE) || in_array('61',$sparr,FALSE)){
							$flg = 1;
						}
						if($flg!==1)
							$sparr[] = 0; 
					}
					//-----------------------------------------------------
					$spstr = implode(',',$sparr);
					$spec_where =" and specializationid IN (".$spstr.") ";
				}
				else{
				$spec_where = "";
				}
			}

			/*echo '<pre>';
			print_r("select * from talent_step_set where talentid = '".$talent_fields['talentid']."' $spec_where and active = '1'");
			echo '</pre>';
			exit;*/

			// -------------------------------------	
			$usertalentstep = array();
			$utsssql = $this->db->query("select * from talent_step_set where talentid = '".$talent_fields['talentid']."' $spec_where and active = '1'");
			$utsssqlData = $utsssql->result_array();

			//$utsssql = "select * from talent_step_set where talentid = '".$talent_fields['talentid']."' $spec_where and active = '1'";
			//exit;
			//$utsssqlData = Yii::app()->db->createCommand($utsssql)->queryAll();

			/*echo '<pre>';
			print_r($utsssqlData);
			echo '</pre>';
			exit;*/
			foreach($utsssqlData as $row1){
				/*echo '<pre>';
				print_r($row1);
				echo '</pre>';
				exit;*/
				$usertalentstep[] = $row1;
				//print_r($usertalentstep);
				$ststep = explode(',',$row1['stepid']);
				
				/*echo '<pre>';
				print_r($ststep);
				echo '</pre>';
				exit;*/
				foreach($ststep as $stkey=>$stvalue){
					echo '<pre>';
					print_r($usersteps[$stvalue]);
					echo '</pre>';
					exit;
					if(!isset($usersteps[$stvalue])){

						$this->db->select('name,id,alias');
						$this->db->where('id',$stvalue);
						$this->db->where('active','1');
						$utspsql = $this->db->get('talent_step');

						$utsdata = $utspsql->result_array();

						//$utssql = "select name,id,alias from talent_step where id = '".$stvalue."' and active = '1'";
						//$utsdata = Yii::app()->db->createCommand($utssql)->queryRow();
						/*echo '<pre>';
						print_r($utsdata);
						echo '</pre>';
						exit;*/

						$utsdata = $utsdata[0];

						if(($user_gender==1 && $utsdata['id']!=4) || 
									($user_gender==2 && $utsdata['id']!=3)){

							$usersteps[$stvalue] = $utsdata;
							$usersteps[$stvalue]['questions'] = array();
							$usertalent['talentstep'][$stvalue] = array();
							$usertalent['talentstep'][$stvalue]['id'] = $utsdata['id'];
							$usertalent['talentstep'][$stvalue]['stepname'] = $utsdata['name'];
							$usertalent['talentstep'][$stvalue]['alias'] = $utsdata['alias'];
							$usertalent['talentstep'][$stvalue]['question'] = array();
							
							/*echo '<pre>';
							print_r($usertalent);
							echo '</pre>';
							exit;*/
							$usertalentstepquestion = array();

							$this->db->where('stepid',$utsdata['id']);
							$this->db->where('active','1');
							$this->db->order_by("theorder", "asc");
							$utspsql = $this->db->get('talent_step_questions');

							$utsdata2 = $utspsql->result_array();

							/*echo '<pre>';
							print_r($utsdata2);
							echo '</pre>';
							exit;*/

							//$utsqsql = "select * from talent_step_questions where stepid = '".$utsdata['id']."' and active = '1' order by theorder";
							//$utsdata2 = Yii::app()->db->createCommand($utsqsql)->queryAll();
							foreach($utsdata2 as $row2){
								$usersteps[$stvalue]['questions'][$row2['id']] = $row2;
								$usertalentstepquestion[] = $row2; 
								//$usertalent[$row['talentid']]['talentstep'][$stvalue]['question'][$stvalue] = $row2; 
								$usertalent['talentstep'][$stvalue]['question'][$row2['id']] = $row2;
							}

						}
						
					}
				}
			}


		/*echo '<pre>';
		print_r($usertalent);
		echo '</pre>';
		exit;*/
		
		// get user talent attributes data

		$usertalent_attributes = array();
		$this->db->where('userid',$userid);
		$this->db->where('active','1');
		$usql_attr = $this->db->get('user_talent_attributes');
		$row_attr = $usql_attr->result_array();

		$row_attr = $row_attr[0];

		/*echo '<pre>';
		print_r($row_attr);
		echo '</pre>';
		exit;*/

		//$usql_attr = "Select * from user_talent_attributes where user_id = '".$userid."' and active = '1'";
		//$row_attr = Yii::app()->db->createCommand($usql_attr)->queryRow();
		/*echo '<pre>';
		print_r($usertalent);
		echo '</pre>';
		exit;*/
		$usertalent_attributes = $row_attr;


		$tal_filled_question = 0;
		$tal_total_q = 0;
		$cnti = 1;	
		$tald_arr = array();

		


			if(!empty($usertalent['talentstep'])){

				$this->db->where('id',$usertalent['talentid']);
				$this->db->where('active','1');
				$tsql = $this->db->get('talents');
				$talentDetail = $tsql->result_array();
				$talentDetail = $talentDetail[0];

				/*echo '<pre>';
				print_r($talentDetail);
				echo '</pre>';
				exit;*/

				//$talentDetail  = gettalentdata($usertalent['talentid']);
			}

			/*echo '<pre>';
					print_r($usertalent);
					echo '</pre>';
					exit;*/

			$x = 0;
			//echo "<pre>";print_r($usertalent['id']);echo "</pre>";
			$tal_total_q = 0;
			$tal_filled_question = 0;
			// mandatory fields array for talent
				$talsparr = array();
				$talent_mandatory_fileds = array();

				/*echo '<pre>';
					print_r($usertalent['id']);
					echo '</pre>';
					exit;*/	

				if($usertalent['talentid']==5 || $usertalent['talentid']==8){
					//$talsp_sql = mysql_query("SELECT DISTINCT (`speid`) FROM `user_talent_specialization` WHERE `usertalentid` = '".$usertalent['id']."'");			
					
					$this->db->distinct();
					$this->db->where('usertalentid',$usertalent['id']);
					$talsp_sql = $this->db->get('user_talent_specialization');
					$row_sp1 = $talsp_sql->result_array();

					/*echo '<pre>';
					print_r($row_sp1);
					echo '</pre>';
					exit;*/

					foreach ($row_sp1 as $key => $row_sp) {
						/*echo '<pre>';
						print_r($usertalent['talentid']);
						echo '</pre>';

						echo '<pre>';
						print_r($row_sp['speid']);
						echo '</pre>';
						exit;*/

						$talsparr[] = $row_sp['speid'];
						if($usertalent['talentid']==8){
							if($row_sp['speid']==60)
								$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][$row_sp['speid']]; 
							else
								$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][0]; 
						}
						else if($usertalent['talentid']==5){
							if($row_sp['speid']==26 || $row_sp['speid']==27 || $row_sp['speid']==30)
								$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][$row_sp['speid']];
						}
						else{
							$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][$row_sp['speid']]; 
						}
					}

					/*echo '<pre>';
					print_r($row_array);
					echo '</pre>';*/
					//exit;

					/*while($row_sp = mysql_fetch_array($talsp_sql)){	
						$talsparr[] = $row_sp['speid'];										
						if($usertalent['talentid']==8){
							if($row_sp['speid']==60)
								$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][$row_sp['speid']]; 
							else
								$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][0]; 
						}
						else if($usertalent['talentid']==5){
							if($row_sp['speid']==26 || $row_sp['speid']==27 || $row_sp['speid']==30)
								$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][$row_sp['speid']]; 							
						}
						else{
							$row_array[] = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][$row_sp['speid']]; 
						}
					}*/	
										
					$merged = array_unique(call_user_func_array('array_merge', $row_array));
					$talent_mandatory_fileds = $merged;
				}
				else{
					$talent_mandatory_fileds = $GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']];					
				}
				//print_r($talsparr);
			// ---------------------------------
			
			/*echo '<pre>';
				print_r($usertalent['talentstep']);
				echo '</pre>';
				exit;*/

			foreach($usertalent['talentstep'] as $skey=>$step){
				
				if($step['id'] == 3 && $user_gender == 2){
					continue;
				}else if($step['id'] == 4 && $user_gender == 1){
					continue;
				}								
			  	foreach($step['question'] as $question){
					$element_name = $question['element_name'];
					/*echo '<pre>';
					print_r($usertalent_attributes);
					echo '</pre>';
					exit;*/
					$question_name = ($element_name == 'tatoo_photo') ? 'Tattoo Picture' : $question['question'];
					if($question['question'] != ''){
						$value="";
						if($element_name=="primary_language" && $usertalent_attributes[$element_name]!=""){
						 	$value = $this->get_language_name($usertalent_attributes[$element_name]);
						}else if($element_name=="secondary_language"){
							if($usertalent_attributes[$element_name]!=""){
								 $slangarr = explode(',',$usertalent_attributes[$element_name]);
								 foreach($slangarr as $slang){
									$value .= $this->get_language_name($slang['secondary_language']).",";
								 }
								 $value = substr($value,0,-1);
							}
						}elseif($element_name == 'weight'){
							$value = $usertalent_attributes[$element_name].' '.$usertalent_attributes['weight_type'];
						}else{
						 $value = str_replace(',',', ',$usertalent_attributes[$element_name]);
						}
						//print_r($GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']]);
						//if($usertalent['talentid']==8) { print_r($GLOBALS['MANDATORY_ATTRIBUTES'][$usertalent['talentid']][60]);						}
						if(in_array($element_name,$talent_mandatory_fileds)){
							if($value){ $tal_filled_question++; }
							$tal_total_q++;
							
						}
						
					}
			  	}
				$x++;					
			}

			echo '<pre>';
			print_r($usertalent['talentid']);
			echo '</pre>';
			//exit;

			echo '<pre>';
		print_r($tal_filled_question);
		echo '</pre>';
		echo '<pre>';
		print_r($tal_total_q);
		echo '</pre>';
		exit;

			if($usertalent['talentid']==5){	
				$flg_4 = 0;
				if(in_array(26,$talsparr)){ $flg_4 = 1; }
				if(in_array(28,$talsparr)){ $flg_4 = 1; }
				if(in_array(30,$talsparr)){ $flg_4 = 1; }

				if($flg_4==1)
					$tald_arr['strength'] = round(15*($tal_filled_question/($tal_total_q)),2); 
				else
					$tald_arr['strength'] = 15;
			}
			else if($usertalent['talentid']==7){
					$tald_arr['strength'] = 15;
			}
			else{
				
				$tald_arr['strength'] = round(15*($tal_filled_question/($tal_total_q)),2); 
			}

		$tald_arr['total'] = $tal_total_q;
		$tald_arr['filled'] = $tal_filled_question;

		
		
		/*echo '<pre>';
		print_r($tald_arr);
		echo '</pre>';
		exit;*/

		return $tald_arr;

	}


	public function get_all_other_strength($userid){			
		$all_percentage = array();
		$all_percentage['call_verification'] = 0;
		$all_percentage['privacy_setting'] = 0;
		$all_percentage['social_network'] = 0;
		$all_percentage['profile_pic'] = 0;
		$all_percentage['all'] = 0;

		$this->db->select('p.profileimage,u.profileurl,u.call_verification_status,s.settings');
		$this->db->from('profile_images p');
		$this->db->join('user u', 'u.id = p.userid');
		$this->db->join('profile_setting s', 'u.id = s.userid');
		$this->db->where('u.id',$userid);
		$udata_qry = $this->db->get();
		$udata_row = $udata_qry->result_array();
		$udata_row = $udata_row[0];

		/*echo '<pre>';
		print_r($udata_row);
		echo '</pre>';
		exit;*/

		//$udata_qry = "SELECT p.profileimage,u.profileurl,u.call_verification_status,s.settings FROM profile_images p, user u, profile_setting s WHERE u.id='".$userid."' and s.userid=u.id and p.userid=u.id";
		//$udata_res = mysql_query($udata_qry,$connection);
		//$udata_row = mysql_fetch_assoc($udata_res);	
		// call verification			
		if($udata_row['call_verification_status']==1)
			$all_percentage['call_verification'] = 20;
		// -----------------
		// profile setting
		$settings = unserialize($udata_row['settings']);

		/*echo '<pre>';
					print_r($settings);
					echo '</pre>';
					exit;*/			
		if($settings['contact_roles']!="" && $settings['apc']!="" && $settings['dvp']!="" && $settings['dvpub']!="" && $settings['rightclik_photographs']!=""){
			$all_percentage['privacy_setting'] = 5; 
		}
		// -----------------
		// social network
		if($udata_row['profileurl']!="")
			$all_percentage['social_network'] = 5; 			
		// -----------------
		// profile pic
		$profileimg = unserialize($udata_row['profileimage']);
		/*echo '<pre>';
					print_r($profileimg);
					echo '</pre>';
					exit;*/
		if($udata_row['profileimage']!="" && count($profileimg)>0)
			$all_percentage['profile_pic'] = 5; 			
		// -----------------

		$all_percentage['all'] = $all_percentage['call_verification'] + $all_percentage['privacy_setting'] + $all_percentage['social_network'] + $all_percentage['profile_pic'];			
		/*echo '<pre>';
		print_r($all_percentage);
		echo '</pre>';
		exit;*/
		return $all_percentage;
	}

	public function get_user_profile_strength($id){

		$this->db->where('userid', $id);
		$q = $this->db->get('user_talents');
		$data = $q->result_array();
		$count_talents = count($data);

		/*echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit;*/

		if($count_talents == 3){
			$attribute_strength1 = $this->get_talent_attributes_strength($data[0]);
			$attribute_strength2 = $this->get_talent_attributes_strength($data[1]);
			$attribute_strength3 = $this->get_talent_attributes_strength($data[2]);
		} else if($count_talents == 2){
			$attribute_strength1 = $this->get_talent_attributes_strength($data[0]);
			$attribute_strength2 = $this->get_talent_attributes_strength($data[1]);
		} else if($count_talents == 1){
			$attribute_strength1 = $this->get_talent_attributes_strength($data[0]);
		}

		/*if(isset($attribute_strength1)){
			echo '<pre>';
			print_r($attribute_strength1);
			echo '</pre>';
		}

		if(isset($attribute_strength2)){
			echo '<pre>';
			print_r($attribute_strength2);
			echo '</pre>';
		}

		if(isset($attribute_strength3)){
			echo '<pre>';
			print_r($attribute_strength3);
			echo '</pre>';
		}		
		exit;*/

		$other_percentages = $this->get_all_other_strength($id);

		$talents = $this->get_all_talents();

		/*echo '<pre>';
		print_r($data[0]);
		echo '</pre>';
		exit;*/

		/*echo $talents[$data[0]['talentid']];
		exit;*/

		$profile_completion = "<div class=\"profile_complete\" >";
		$seprate_tag = "</div><div class=\"profile_complete\">";
		$profile_completion .= "<b>".$talents[$data[0]['talentid']]."</b> ";
		
		$profile_completion .= $seprate_tag;
		$profile_completion .= '<hr style="margin : 0px;" />';
		
		$span_start = "<span class='calumns'> = ";
		$span_mid = "</span><span style='margin-bottom: 5px;' class='calumns'> ";
		$span_end = "</span>";
		$total_colimns = 0; $filled_colimns = 0;
		
		if(isset($attribute_strength1)){
			$profile_completion .= "<span><b>STEPS</b> </span><span class='calumns'> = <b>FIELDS</b></span><span class='calumns'> <b>PERCENT</b></span>";
			$profile_completion .= "<span>Talent Attributes </span>";
			$profile_completion .= $span_start.$attribute_strength1['filled']." (".$attribute_strength1['total'].") ".$span_mid."".$attribute_strength1['strength']." (15)%".$span_end;
			$profile_completion .= $seprate_tag;
		}

		if(isset($attribute_strength2)){
			$profile_completion .= '<hr style="clear: both;margin-top : 10px;margin-bottom: 31px;" />';
			$profile_completion .= "<b>".$talents[$data[1]['talentid']]."</b> ";
			$profile_completion .= $seprate_tag;
			$profile_completion .= '<hr style="margin : 0px;" />';
			$profile_completion .= "<span><b>STEPS</b> </span><span class='calumns'> = <b>FIELDS</b></span><span class='calumns'> <b>PERCENT</b></span>";
			$profile_completion .= "<span>Talent Attributes </span>";
			$profile_completion .= $span_start.$attribute_strength2['filled']." (".$attribute_strength2['total'].") ".$span_mid."".$attribute_strength2['strength']." (15)%".$span_end;
			$profile_completion .= $seprate_tag;
		}

		if(isset($attribute_strength3)){
			$profile_completion .= '<hr style="clear: both;margin-top : 10px;margin-bottom: 31px;" />';
			$profile_completion .= "<b>".$talents[$data[2]['talentid']]."</b> ";
			$profile_completion .= $seprate_tag;
			$profile_completion .= '<hr style="margin : 0px;" />';
			$profile_completion .= "<span><b>STEPS</b> </span><span class='calumns'> = <b>FIELDS</b></span><span class='calumns'> <b>PERCENT</b></span>";
			$profile_completion .= "<span>Talent Attributes </span>";
			$profile_completion .= $span_start.$attribute_strength3['filled']." (".$attribute_strength3['total'].") ".$span_mid."".$attribute_strength3['strength']." (15)%".$span_end;
			$profile_completion .= $seprate_tag;
		}

		// echo '<pre>';
		// print_r($other_percentages);
		// echo '</pre>';
		//exit;

		$profile_completion .= '<hr style="clear: both;margin-top : 10px;" />';
		$profile_completion .= "<b>Other</b> ";
		$profile_completion .= $seprate_tag;
		$profile_completion .= '<hr style="margin : 0px;" />';
		$profile_completion .= "<span><b>STEPS</b> </span><span class='calumns'> <b>PERCENT</b></span>";
		$profile_completion .= "<span>Verification</span>";
		$profile_completion .= $span_start.$other_percentages['call_verification']." (20) ";
		$profile_completion .= $seprate_tag;
		$profile_completion .= "<span>Social Details </span>";
		$profile_completion .= $span_start.$other_percentages['social_network']." (5) ";
		$profile_completion .= $seprate_tag;
		$profile_completion .= "<span>Privacy Settings </span>";
		$profile_completion .= $span_start.$other_percentages['privacy_setting']." (5) ";
		$profile_completion .= $seprate_tag;
		$profile_completion .= "<span>Profile Pic </span>";
		$profile_completion .= $span_start.$other_percentages['profile_pic']." (5) ";
		$profile_completion .= $seprate_tag;
		
		if(!empty($attribute_strength3)){
			$total = floor((($attribute_strength1['strength']+$attribute_strength2['strength']+$attribute_strength3['strength'])/3) + $other_percentages['all']);
		} else if(!empty($attribute_strength2)){
			$total = floor((($attribute_strength1['strength']+$attribute_strength2['strength'])/2) + $other_percentages['all']);
		} else if(!empty($attribute_strength1)){
			$total = $attribute_strength1['strength'] + $other_percentages['all'];
		}

		$total = ($total == 0)?"<font color=red>".$total."</font>":$total;
		$profile_completion .= "<hr style='margin : 0px;float: left;width: 100%;'><span><strong>Total</strong></span><span class='calumns' style='width: 75px;'> = <b>".$total."</b> (50)%</span>";
		$profile_completion .= "</div><br clear=\"all\" />";
       	return $profile_completion;
	}

}

?>
