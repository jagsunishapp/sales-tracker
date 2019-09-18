<?php
defined('BASEPATH') OR exit('No direct access');

class user_model extends CI_Model 
{
	
	public function __construct()
	{
		$this->load->database();
	}

// neeraj start
	public function login($userdata)
	{
		$data = array(
			'email'=>$userdata['email'],
			'password'=>$userdata['pass']
		);
		$this->db->where($data);
		// $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
		//$this->db->where('email',$userdata['email']);
		$query = $this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function fetch_detail($email)
	{
		$this->db->where('email',$email);
		$query=$this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function update_profile($profiles,$email)
	{
		$data = [
            'first_name'=>$profiles['fname'],
            'last_name'=>$profiles['lname'],
            'designation'=>$profiles['desig'],
            'email'=>$profiles['email'],
            'mobile_no'=>$profiles['mob'],
            'photo'=>$profiles['imgs'],
            'gender'=>$profiles['gender']
        ];
		$this->db->where('email',$email);
        if($this->db->update('login_master', $data))
        {
        	return true;
        }
        else
        {
        	return false;
        }
	}

	public function chk_pass($password)
	{
		$this->db->where('email',$password['email']);
		$query = $this->db->get('login_master');
		return $query->result_array();
	}

	public function update_pass($password)
	{
		$data = array(
			'password'=>$password['new_pass']
		);
		$this->db->where('email',$password['email']);
		if($this->db->update('login_master',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function dyn_form($formdata)
	{
		$data = [
            'form_name'=>$formdata['form_name'],
            'active'=>$formdata['active'],
            'related_to'=>$formdata['related'],
            'filled_by'=>$formdata['filled'],
            'submit_caption'=>$formdata['submit_btn'],
            'mobile_only'=>$formdata['mobile']
        ];

        if($this->db->insert('forms', $data))
        {
        	$form_id = $this->db->insert_id();
			$cnt = COUNT($formdata['label']);
			for($i=0;$i<$cnt;$i++)
			{
				$data2 = [
				'forms_id'=>$form_id,
				'label'=>$formdata['label'][$i],
				'type'=>$formdata['type'][$i],
				'mandatory'=>$formdata['mandatory'][$i],
				'placeholder'=>$formdata['placeholder'][$i],
				'edittable'=>$formdata['editable'][$i]
				];
				$st = $this->db->insert('form_elements', $data2);
			}
			return $st;
        }
        else
        {
        	return 0;
        }
	}

	public function forms()
	{
		$query = $this->db->get('forms');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}

	public function form_data($form_id)
	{
		$data = array(
			'forms.forms_id'=>$form_id
		);
		$this->db->select('*');
		$this->db->from('forms');
		$this->db->join('form_elements', 'form_elements.forms_id = forms.forms_id');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function dlt_dyn_form($formdata)
	{
		$this->db->where('forms_id', $formdata);
		$d1 = $this->db->delete('forms');

		$d2 = $this->db->where('forms_id', $formdata);
		$this->db->delete('form_elements');
		if($d1 && $d2)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function updt_dyn_form($formdata,$forms_id)
	{
		$data = [
            'form_name'=>$formdata['form_name'],
            'active'=>$formdata['active'],
            'related_to'=>$formdata['related'],
            'filled_by'=>$formdata['filled'],
            'submit_caption'=>$formdata['submit_btn'],
            'mobile_only'=>$formdata['mobile']
        ];
        $this->db->where('forms_id',$forms_id);
        if($this->db->update('forms', $data))
        {
			$this->db->where('forms_id', $forms_id);
			$this->db->delete('form_elements');
			$cnt = COUNT($formdata['label']);
			for($i=0;$i<$cnt;$i++)
			{
				$data2 = [
				'forms_id'=>$forms_id,
				'label'=>$formdata['label'][$i],
				'type'=>$formdata['type'][$i],
				'mandatory'=>$formdata['mandatory'][$i],
				'placeholder'=>$formdata['placeholder'][$i],
				'edittable'=>$formdata['editable'][$i]
				];
				$st = $this->db->insert('form_elements', $data2);
			}
			return $st;
        }
        else
        {
        	return 0;
        }
	}
// neeraj end

	// arjun
	public function add_purpose($formdata)
{
return $this->db->query("INSERT INTO purpose(purpose_name,status) VALUES('".$formdata['purpose']."','1')");
}
function display_purpose()
{
$this->db->order_by("purpose_name", "asc");
$query=$this->db->get('purpose');
return $query->result_array();
}
public function delete_purpose($del)
{
$this->db->where('purpose_id',$del);
$this->db->delete('purpose');
}
public function active_deactive($id,$status)
{
$this->db->set('status', $status);   
$this->db->where('purpose_id', $id); 
$this->db->update('purpose');  
}
public function fetch_purpose($id)
{   
$this->db->where('purpose_id', $id);
$this->db->order_by('purpose_name',"asc");
$query=$this->db->get('purpose');
return $query->result_array();
}
public function update($data)
{
$purpose = array(
'purpose_name'=>$data['purpose']
);
$this->db->where('purpose_id',$data['purpose_id']);
if($this->db->update('purpose',$purpose))
{
return true;
}
else
{
return false;
}
}
public function addexpense($formdata)
{
return $this->db->query("INSERT INTO expense_categories(exp_category,status) VALUES('".$formdata['expense_name']."','1')");
}
public function display_expense()
{
$this->db->order_by("exp_category", "asc");
$query=$this->db->get('expense_categories');
return $query->result_array();	
}
public function active_expense($id,$status)
{
$this->db->set('status', $status);   
$this->db->where('exp_id', $id); 
$this->db->update('expense_categories'); 	
}
public function delete_exp_model($id)
{
$this->db->where('exp_id', $id); 
$this->db->delete('expense_categories');	
}
public function fetch_expense($id)
{   
$this->db->where('exp_id',$id);
$query=$this->db->get('expense_categories');
return $query->result_array();
}
public function update_exp($data)
{
$expense = array(
'exp_category'=>$data['exp_name']
);
$this->db->where('exp_id',$data['exp_id']);
if($this->db->update('expense_categories',$expense))
{
return true;
}
else
{
return false;
}
}
public function addterritory($formdata)
{
return $this->db->query("INSERT INTO territory_category(territory_name,status) VALUES('".$formdata['territory_cat']."','1')");
}
function display_territory()
{
$this->db->order_by("territory_name", "asc");
$query=$this->db->get('territory_category');
return $query->result_array();
}
public function active_terr($id,$status)
{
$this->db->set('status', $status);   
$this->db->where('territory_id', $id); 
$this->db->update('territory_category'); 	
}
public function delete_trr_model($id)
{
$this->db->where('territory_id', $id); 
$this->db->delete('territory_category');	
}
public function fetch_trr($id)
{   
$this->db->where('territory_id',$id);
$query=$this->db->get('territory_category');
return $query->result_array();
}

public function update_terr($terr)
{
$upd = array(
		'territory_name'=>$terr['cat']
	);

	$this->db->where('territory_id',$terr['id']);
	if($this->db->update('territory_category',$upd))
	{
	 return true;
	}
	else
	{
	 return false;
	}
}
public function addindustry($formdata)
{
return $this->db->query("INSERT INTO industry_category(industry_name,status) VALUES('".$formdata['industry_cat']."','1')");
}
function display_industry()
{
$this->db->order_by("industry_name", "asc");
$query=$this->db->get('industry_category');
return $query->result_array();
}
public function active_industry($id,$status)
{
$this->db->set('status', $status);   
$this->db->where('industry_id', $id); 
$this->db->update('industry_category');	
}
public function delete_industry_model($id)
{
$this->db->where('industry_id', $id); 
$this->db->delete('industry_category');	
}
public function fetch_industry($id)
{   
$this->db->where('industry_id',$id);
$query=$this->db->get('industry_category');
return $query->result_array();
}
public function update_ind($ind)
{
$upd = array(
		'industry_name'=>$ind['industry_cat']
	);

	$this->db->where('industry_id',$ind['inds_id']);
	if($this->db->update('industry_category',$upd))
	{
	 return true;
	}
	else
	{
	 return false;
	}
}
public function addlocation($formdata)
{
return $this->db->query("INSERT INTO `office_location`(`office_location`, `address`, `city`, `zipcode`, `state`, `country`, `status`) VALUES ('".$formdata['office_location']."','".$formdata['address']."','".$formdata['city']."','".$formdata['zip_code']."','".$formdata['state']."','".$formdata['country']."','1')");
}
 function display_location()
{
$query=$this->db->get('office_location');
return $query->result_array();
}
public function delete_location_model($del)
{
$this->db->where('office_loc_id',$del);
$this->db->delete('office_location');
}
public function fetch_location($id)
{   
$this->db->where('office_loc_id',$id);
$query=$this->db->get('office_location');
return $query->result_array();
}
public function update_loc($loc)
{
$upd = array(
		'office_location'=>$loc['office_location'],
		'address'=>$loc['address'],
		'city'=>$loc['city'],
		'zipcode'=>$loc['zip_code'],
		'state'=>$loc['state'],
		'country'=>$loc['country']
	);
   $this->db->where('office_loc_id',$loc['loct_id']);
	if($this->db->update('office_location',$upd))
	{
	 return true;
	}
	else
	{
	 return false;
	}
}
public function import_pur_model($memData)
{
	$count=COUNT($memData);

	 for ($i=0; $i<$count; $i++)
 { 
	$inser_data= $this->db->query("INSERT INTO purpose(purpose_name,status) VALUES('".$memData[$i]['purpose_cat']."','".$memData[$i]['status']."')");	
 }
 return $inser_data;
}
public function import_exp_model($memData)
{
	$count=COUNT($memData);

	 for ($i=0; $i<$count; $i++)
 { 
	$inser_data= $this->db->query("INSERT INTO expense_categories(exp_category,status) VALUES('".$memData[$i]['expense_cat']."','".$memData[$i]['status']."')");	
 }
 return $inser_data;
}
public function import_trr_model($memData)
{
	$count=COUNT($memData);

	 for ($i=0; $i<$count; $i++)
 { 
$inser_data= $this->db->query("INSERT INTO territory_category(territory_name,status) VALUES('".$memData[$i]['territory_cat']."','".$memData[$i]['status']."')");	
 }
 return $inser_data;
}
public function import_ind_model($memData)
{
	$count=COUNT($memData);

	 for ($i=0; $i<$count; $i++)
 { 
$inser_data= $this->db->query("INSERT INTO industry_category(industry_name,status) VALUES('".$memData[$i]['industry_cat']."','".$memData[$i]['status']."')");	
 }
 return $inser_data;
}
function display_users()
{
$query=$this->db->query("SELECT * FROM login_master WHERE role='admin' || role='user'");
return $query->result_array();
}
function display_users_details()
{
$query=$this->db->query("SELECT * FROM login_master WHERE role='user'");
return $query->result_array();
}
public function adduser($formdata)
{
return $this->db->query("INSERT INTO `login_master`(`first_name`, `last_name`, `emp_code`, `designation`, `role`, `report_to`, `office_location`, `email`, `password`, `mobile_no`, `accuracy`, `radius`, `allow_timeout`, `allow_offline`, `status`)
 VALUES ('".$formdata['fname']."','".$formdata['lname']."','".$formdata['emp_code']."','".$formdata['designation']."','".$formdata['role']."','".$formdata['report_to']."','".$formdata['off_loc']."','".$formdata['email']."','".$formdata['password']."','".$formdata['mobile_no']."','".$formdata['accuracy']."','".$formdata['radius']."','".$formdata['allow_timeout']."','".$formdata['allow_offline']."','1')");
}
public function user_expense_display()
	{
$this->db->where("status", "1");
$query=$this->db->get('expense_categories');
return $query->result_array();
	}
	public function addexpensedetails($formdata)
	{
return $this->db->query("INSERT INTO `expense`(`emp_id`,`emp_name`,`customer_name`, `visit`, `expense_cat`, `expense_head`, `expense_amount`, `date`, `atteched_image`,`atteched_reciept`,`status`) VALUES ('".$formdata['emp_code']."','".$formdata['emp_name']."','".$formdata['customer_name']."','".$formdata['visit']."','".$formdata['exp_category']."','".$formdata['exp_head']."','".$formdata['exp_amt']."','".$formdata['date']."','".$formdata['img']."','".$formdata['imgg']."','2')");
	}
public function user_expense_details($emp_codee)
{
$this->db->where("emp_id",$emp_codee);
$query=$this->db->get('expense');
return $query->result_array();
}
public function delete_exp_details($del)
{
$this->db->where('id', $del); 
if ($this->db->delete('expense')) 
{
 return true; 	
} 
else
{
return false;
}	
}
public function user_expense_total($emp_codee)
{
$query=$this->db->query("SELECT SUM(expense_amount) AS total FROM expense WHERE emp_id='$emp_codee'");
return $query->result_array();	
}
public function exp_user($emp_codee)
{
$this->db->where("report_to",$emp_codee);
$query=$this->db->get('login_master');
return $query->result_array();
}
public function expens_cat()
{
$query=$this->db->get('expense_categories');
return $query->result_array();
}
public function ind_exp_model($select_user,$select_status,$select_exp,$date)
{
$query=$this->db->query("SELECT * FROM `expense` WHERE emp_id='$select_user' AND status='$select_status' AND expense_cat='$select_exp' AND date='$date'");
return $query->result_array();	
}

public function fetch_exp($id)
{   
$this->db->where('id',$id);
$query=$this->db->get('expense');
return $query->result_array();
}
public function report_exp_model($select_user,$from_date_exp,$to_date_exp)
{
$query=$this->db->query("SELECT * FROM expense WHERE emp_id='$select_user' AND date BETWEEN '$from_date_exp' AND '$to_date_exp'");
return $query->result_array();	
}
public function report_visit_model($user_visit,$visit_to_date,$visit_from_date)
{
	$query=$this->db->query("SELECT * FROM visit WHERE emp_id='$user_visit' AND `date` BETWEEN '$visit_to_date' AND '$visit_from_date'");
return $query->result_array();	
}
public function report_travel_model($travel_user,$from_travel_date,$to_travel_date)
{
$query=$this->db->query("SELECT * FROM travel WHERE emp_code='$travel_user' AND t_date BETWEEN '$from_travel_date' AND '$to_travel_date'");
return $query->result_array();	
}
// arjun end
public function active_deactive_user($id,$status)
{
$this->db->set('status', $status);   
$this->db->where('login_id', $id); 
$this->db->update('login_master');  
}
public function delete_user_model($del)
{
$this->db->where('login_id',$del);
 $abc=$this->db->delete('login_master');
return $abc;
}
public function active_user_models($active_id)
{
$query=$this->db->query("SELECT * FROM login_master WHERE status='1' && role='user'");
return $query->result_array();
}
public function inactive_user_models($inactive_id)
{
$query=$this->db->query("SELECT * FROM login_master WHERE status='0' && role='user'");
return $query->result_array();
}
public function import_users_model($memData)
{
$count=COUNT($memData);
for ($i=0; $i<$count; $i++)
 { 
    $inser_data= $this->db->query("INSERT INTO `login_master`(`first_name`, `last_name`, `emp_code`, `designation`, `role`, `report_to`, `office_location`, `email`, `password`, `mobile_no`, `accuracy`, `radius`, `allow_timeout`, `allow_offline`, `status`) 
        VALUES ('".$memData[$i]['First_name']."','".$memData[$i]['Last_name']."','".$memData[$i]['Emp_code']."','".$memData[$i]['Designation']."','".$memData[$i]['Role']."','".$memData[$i]['Report']."','".$memData[$i]['Office_location']."','".$memData[$i]['Email']."','".$memData[$i]['Password']."','".$memData[$i]['Mobile']."','".$memData[$i]['Accuracy_in_meter']."','".$memData[$i]['Check_in_radius']."','".$memData[$i]['Allow_timeout']."','".$memData[$i]['Allow_offline']."','1')");   
 }
 return $inser_data;
}
public function fetch_users($id)
{   
$this->db->where('login_id',$id);
$query=$this->db->get('login_master');
return $query->result_array();
}
public function update_user_model($users)
{
$upd = array(
        'first_name'=>$users['fname'],
        'last_name'=>$users['lname'],
        'emp_code'=>$users['emp_code'],
        'designation'=>$users['designation'],
        'role'=>$users['role'],
        'report_to'=>$users['report_to'],
        'office_location'=>$users['off_loc'],
        'email'=>$users['email'],
        'password'=>$users['password'],
        'mobile_no'=>$users['mobile_no'],
        'accuracy'=>$users['accuracy'],
        'radius'=>$users['radius'],
        'allow_timeout'=>$users['allow_timeout'],
        'allow_offline'=>$users['allow_offline']
    );
    $this->db->where('login_id',$users['user_id']);
if($this->db->update('login_master',$upd))
{
return true;
}
else
{
return false;
}
}
	// arjun end

	// neeraj code2 start
	public function add_customer($cust)
	{
		$data = array(
		'customer_name'=>$cust['name'], 
		'territory'=>$cust['territory'],
		'customer_print_as'=>$cust['print_as'],
		'website'=>$cust['website'],
		'head_office'=>$cust['head_office'],
		'office_location'=>$cust['loc_ident'],
		'industry'=>$cust['industry'],
		'address'=>$cust['address'],
		'lat'=>$cust['lat_long'],
		'logn'=>$cust['lat_long'],
		'phone1'=>$cust['phone'],
		'phone2'=>$cust['phone2'],
		'phone3'=>$cust['phone3'],
		'fax1'=>$cust['fax'], 
		'fax2'=>$cust['fax2'],
		'email'=>$cust['email'],
		'email2'=>$cust['email2'],
		'email3'=>$cust['email3'],
		'added_by'=>$cust['added_by'],
		'status'=>1
		);
		if($this->db->insert('customers',$data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function fetch_customers()
	{
		// $this->db->select('*');
		// $this->db->from('customers');
		// $this->db->join('territory_category','territory_category.territory_id=customers.territory','LEFT');
		// $this->db->join('industry_category','industry_category.industry_id=customers.industry','LEFT');
		//$this->db->where($data);
		$query = $this->db->get('customers');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function delete_customer($id)
	{
		$data = array(
			'customer_id'=>$id
		);
		$this->db->where($data);
		return $this->db->delete('customers');
	}

	public function import_cust($memData)
	{
		$count=COUNT($memData);

		for ($i=0; $i<$count; $i++)
		{ 
			$data = array(
			'customer_name'=>$memData[$i]['customer_name'], 
			'territory'=>$memData[$i]['territory'],
			'customer_print_as'=>$memData[$i]['printas'],
			'website'=>$memData[$i]['website'],
			'head_office'=>$memData[$i]['headoffice'],
			'office_location'=>$memData[$i]['location'],
			'industry'=>$memData[$i]['industry'],
			'address'=>$memData[$i]['address'],
			'phone1'=>$memData[$i]['phone1'],
			'phone2'=>$memData[$i]['phone2'],
			'phone3'=>$memData[$i]['phone3'],
			'fax1'=>$memData[$i]['fax1'], 
			'fax2'=>$memData[$i]['fax2'],
			'email'=>$memData[$i]['email1'],
			'email2'=>$memData[$i]['email2'],
			'email3'=>$memData[$i]['email3'],
			'status'=>1
			);
			$st = $this->db->insert('customers',$data);	
		}
		return $st;
	}

	public function fetch_cust_by_id($id)
	{
		$data = array(
			'customers.customer_id'=>$id
		);

		// $this->db->select('*');
		// $this->db->from('customers');
		// $this->db->join('territory_category','territory_category.territory_id=customers.territory','LEFT');
		// $this->db->join('industry_category','industry_category.industry_id=customers.industry','LEFT');
		$this->db->where($data);
		$query = $this->db->get('customers');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function update_cust($cust)
	{
		$data = array(
		'customer_name'=>$cust['name'], 
		'territory'=>$cust['territory'],
		'customer_print_as'=>$cust['print_as'],
		'website'=>$cust['website'],
		'head_office'=>$cust['head_office'],
		'office_location'=>$cust['loc_ident'],
		'industry'=>$cust['industry'],
		'address'=>$cust['address'],
		'lat'=>$cust['lat_long'],
		'logn'=>$cust['lat_long'],
		'phone1'=>$cust['phone'],
		'phone2'=>$cust['phone2'],
		'phone3'=>$cust['phone3'],
		'fax1'=>$cust['fax'], 
		'fax2'=>$cust['fax2'],
		'email'=>$cust['email'],
		'email2'=>$cust['email2'],
		'email3'=>$cust['email3'],
		'status'=>1
		);

		$this->db->where('customer_id',$cust['customer_id']);
        return $this->db->update('customers', $data);
        
	}

	public function filter_customer($recent,$terr,$indus)
	{
		foreach($terr as $tr)
		{

		}
		foreach($indus as $ind)
		{

		}
		if(empty($tr) AND empty($ind))
		{
			$query = $this->db->get('customers');
		}
		else
		{
			$this->db->where_in('territory',$terr);
			$this->db->or_where_in('industry',$indus);
			$query = $this->db->get('customers');
		}
		return $query->result_array();

	}

	public function attendance($atte,$emp_codee)
	{
		if($atte['member']=='all')
		{
			$data = array(
				'login_master.report_to'=>$emp_codee
			);
			$this->db->select('*');
			$this->db->from('attendance');
			$this->db->join('login_master','login_master.emp_code=attendance.emp_code','LEFT');
			$this->db->where("punch_in_date BETWEEN '{$atte['st_dt']}' AND '{$atte['end_dt']}'");
			$this->db->where($data);
			$this->db->order_by('punch_in_date', 'DESC');
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}
		else
		{
			$data = array(
			'attendance.emp_code'=>$atte['member']
			);
			$this->db->select('*');
			$this->db->from('attendance');
			$this->db->join('login_master','login_master.emp_code=attendance.emp_code','LEFT');
			$this->db->where("punch_in_date BETWEEN '{$atte['st_dt']}' AND '{$atte['end_dt']}'");
			$this->db->where($data);
			$this->db->order_by('punch_in_date', 'DESC');
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}
	}

	public function count_attendance()
	{
		$data = array('punch_in_date' => date('Y-m-d'));
		$this->db->where($data);
		$query = $this->db->get('attendance');
		return $query->num_rows();
	}

	public function count_in_office()
	{
		$data = array('punch_in_date' => date('Y-m-d'));
		$data2 = array(
			'punch_in_loc'=>'centrum',
			'punch_in_loc'=>'sultanpur'
		);
		$this->db->like($data2);
		$this->db->where($data);
		$query = $this->db->get('attendance');
		return $query->num_rows();
	}
	public function monthly_attendance()
	{
			// $this->db->select('*');
			// $this->db->from('attendance');
			// $this->db->join('login_master','login_master.emp_code=attendance.emp_code','LEFT');
			// $this->db->where("punch_in_date BETWEEN '{$atte['st_dt']}' AND '{$atte['end_dt']}'");
			$query = $this->db->get('login_master');
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
	}

	public function get_att_status($at_data)
	{
		$this->db->where($at_data);
		$query = $this->db->get('attendance');
		return $query->num_rows();
	}

	public function monthly_travel($travel,$emp_codee)
	{
		if($travel['member']=='all')
		{
			$data = array(
				'login_master.report_to'=>$emp_codee
			);
			$this->db->select('login_master.first_name');
			$this->db->select_sum('travel.distance_kms');
			$this->db->from('travel');
			$this->db->join('login_master','login_master.emp_code=travel.emp_code');
			$this->db->where("travel.t_date BETWEEN '{$travel['st_dt']}' AND '{$travel['end_dt']}'");
			$this->db->where($data);
			$this->db->group_by('travel.emp_code');
			$query = $this->db->get();
			// return $query->num_rows();
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}
		else
		{
			$data = array(
			'travel.emp_code'=>$travel['member']
			);
			$this->db->select('login_master.first_name');
			$this->db->select_sum('travel.distance_kms');
			$this->db->from('travel');
			$this->db->join('login_master','login_master.emp_code=travel.emp_code');
			$this->db->where("travel.t_date BETWEEN '{$travel['st_dt']}' AND '{$travel['end_dt']}'");
			$this->db->where($data);
			$query = $this->db->get();
			// return $query->num_rows();
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}
	}

	public function form_elements($id)
	{
		$data = array(
			'forms_id'=>$id
		);
		$this->db->where($data);
		$query = $this->db->get('form_elements');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function form_elements_data($formdata,$emp_codee)
	{
		$data = array(
			'forms_data.forms_id'=>$formdata['form_id'],
			'forms_data.emp_code'=>$formdata['mem']
		);
		$data2 = array(
			'forms_data.forms_id'=>$formdata['form_id'],
			'login_master.report_to'=>$emp_codee
			);

		if($formdata['mem']=='all')
		{
			$this->db->select('*');
			$this->db->from('forms_data');
			$this->db->join('login_master','login_master.emp_code=forms_data.emp_code');
			$this->db->where("forms_data.submitted_on BETWEEN '{$formdata['st_dt']}' AND '{$formdata['end_dt']}'");
			$this->db->where($data2);
			$query = $this->db->get();
		}
		else
		{
			$this->db->select('*');
			$this->db->from('forms_data');
			$this->db->join('login_master','login_master.emp_code=forms_data.emp_code');
			$this->db->where("forms_data.submitted_on BETWEEN '{$formdata['st_dt']}' AND '{$formdata['end_dt']}'");
			$this->db->where($data);
			$query = $this->db->get();
		}
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function form_elements_data2($formdata)
	{
		$data = array(
			'forms_data.forms_id'=>$formdata['form_id'],
			'forms_data.emp_code'=>$formdata['mem']
		);
		$data2 = array(
			'forms_data.forms_id'=>$formdata['form_id'],
			);

		if($formdata['mem']=='all')
		{
			$this->db->select('*');
			$this->db->from('forms_data');
			$this->db->join('login_master','login_master.emp_code=forms_data.emp_code');
			$this->db->where("forms_data.submitted_on BETWEEN '{$formdata['st_dt']}' AND '{$formdata['end_dt']}'");
			$this->db->where($data2);
			$query = $this->db->get();
		}
		else
		{
			$this->db->select('*');
			$this->db->from('forms_data');
			$this->db->join('login_master','login_master.emp_code=forms_data.emp_code');
			$this->db->where("forms_data.submitted_on BETWEEN '{$formdata['st_dt']}' AND '{$formdata['end_dt']}'");
			$this->db->where($data);
			$query = $this->db->get();
		}
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	public function form_elem_count($id)
	{
		$data = array(
			'forms_id'=>$id
		);
			$this->db->where($data);
			$num_rows = $this->db->count_all_results('form_elements');
			return $num_rows;
	}

	public function update_log_time($emp_code2)
	{
		$data = array(
			'last_login'=>date('Y-m-d H:i')
		);
		$data2  = array(
			'emp_code'=>$emp_code2
		);
		$this->db->where($data2);
		return $this->db->update('login_master',$data);
	}

	public function never_logged_in()
	{
		$data = array(
			'last_login'=>''
		);
		$this->db->where($data);
		$query = $this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}

	public function users_for_msg($emp_codee)
	{
		// $data = array(
		// 	'emp_code'=>$emp_codee
		// );
		$this->db->select('lgn.*');
		$this->db->select_max('att.punch_in_date');
		$this->db->from('login_master as lgn');
		$this->db->join('attendance att','lgn.emp_code=att.emp_code','LEFT');
		$this->db->where_not_in('lgn.emp_code',$emp_codee);
		$this->db->group_by('lgn.emp_code',' DESC');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}

	public function not_punched_in()
	{
		// SELECT emp_code, last_punch_in, DATEDIFF(CURDATE(),last_punch_in) FROM login_master WHERE DATEDIFF(CURDATE(),last_punch_in)>3 || DATEDIFF(CURDATE(),last_punch_in) IS NULL
		$this->db->select("first_name,last_name,last_punch_in,mobile_no,DATEDIFF(CURDATE(),last_punch_in) AS days");
		$this->db->where("DATEDIFF(CURDATE(),last_punch_in)>3");
		$this->db->or_where("DATEDIFF(CURDATE(),last_punch_in) IS NULL");
		$query = $this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}

	public function no_visits()
	{
		$this->db->select('first_name,last_name,last_visit_added, mobile_no,DATEDIFF(CURDATE(),last_visit_added) AS days');
		$this->db->where("DATEDIFF(CURDATE(),last_visit_added)>3");
		$this->db->or_where("DATEDIFF(CURDATE(),last_visit_added) IS NULL");
		$query = $this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}

	public function no_forms()
	{
		$this->db->select('first_name,last_name,mobile_no,last_form_filled,DATEDIFF(CURDATE(),last_form_filled) as days');
		$this->db->where("DATEDIFF(CURDATE(),last_form_filled)>3");
		$this->db->or_where("DATEDIFF(CURDATE(),last_form_filled) IS NULL");
		$query = $this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}

	public function no_expenses()
	{
		$this->db->select('first_name,last_name,mobile_no,last_expense_added,DATEDIFF(CURDATE(),last_expense_added) as days');
		$this->db->where('DATEDIFF(CURDATE(),last_expense_added)>3');
		$this->db->or_where('DATEDIFF(CURDATE(),last_expense_added) IS NULL');
		$query = $this->db->get('login_master');
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}
	// neeraj code2 end

	public function report_travel_modell($select_travel,$travel_date)
	{
		$query=$this->db->query("SELECT * FROM travel WHERE emp_code='$select_travel' AND t_date='$travel_date'");
		return $query->result_array();	
	}
	public function attend_user_model($attend_from,$attend_to)
	{
		$query=$this->db->query("SELECT * FROM attendance WHERE  punch_in_date BETWEEN '$attend_from' AND '$attend_to'");
		return $query->result_array();	
	}

	public function fetch_messages($sender,$receiver)
	{
		$data = array(
			'sender'=>$sender,
			'receiver'=>$receiver
		);
		$data2 = array(
			'sender'=>$receiver,
			'receiver'=>$sender
		);
		$this->db->select('msg.*,u1.first_name as sender_name,u1.photo as sender_img,u2.first_name as receiver_name');
		$this->db->from('messages as msg');
		$this->db->join('login_master u1','u1.emp_code = msg.sender');
		$this->db->join('login_master u2','u2.emp_code = msg.receiver');
		$this->db->where($data);
		$this->db->or_where('sender',$receiver);
		$this->db->where('receiver',$sender);
		$this->db->order_by('msg.msg_date','ASC');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		//select msg.*, u1.first_name as sender_name,u2.first_name as receiver_name from messages as msg join login_master u1 on u1.emp_code = msg.sender join login_master u2 on u2.emp_code = msg.receiver where (msg.sender='pd003' and msg.receiver='jp001') || (msg.sender='jp001' and msg.receiver='pd003')
	}

	public function count_total_users($emp_code)
	{
		$data = array(
			'report_to'=>$emp_code
		);
		$this->db->where($data);
		$query = $this->db->get('login_master');
		return $query->num_rows();
	}

	public function count_users_attendance($emp_code)
	{
		$data = array('attendance.punch_in_date' => date('Y-m-d'),
		'login_master.report_to'=>$emp_code);
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->join('login_master','attendance.emp_code=login_master.emp_code');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_users_in_office($emp_code)
	{
		$data = array('attendance.punch_in_date' => date('Y-m-d'),
						'login_master.report_to'=>$emp_code
					);
		$data2 = array(
			'attendance.punch_in_loc'=>'centrum',
			'attendance.punch_in_loc'=>'sultanpur'
		);
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->join('login_master','attendance.emp_code=login_master.emp_code');
		$this->db->like($data2);
		$this->db->where($data);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function send_messages($data)
	{
		$data2 = array(
						'sender' => $data['sender'],
						'receiver' => $data['receiver'],
						'msgs' => $data['msg'],
						'msg_date'=>date('Y-m-d H:i:s')
					);
		return $this->db->insert('messages',$data2);
		// return $data2;
	}
}
?>