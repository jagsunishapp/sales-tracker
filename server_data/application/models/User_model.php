<?php

defined('BASEPATH') OR exit('No direct access');



class user_model extends CI_Model 

{

	

	public function __construct()

	{

		$this->load->database();

	}



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

	// arjun end

}

?>