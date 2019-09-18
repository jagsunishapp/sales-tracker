<?php

defined('BASEPATH') OR exit('Direct access not allowed');



class Sales_tracker extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->load->library('session');

		$this->load->library('form_validation');

		$this->load->helper('email');

		$this->load->model('user_model');

		$this->load->library('email');

		$this->load->helper('file');

		$this->load->library('CSVReader');

	}



	public function index()

	{
		if($this->session->userdata('email'))

		{

			$data['details'] = $this->session->userdata('details');

			$this->load->view('include/header',$data);

			$this->load->view('index');

			$this->load->view('include/footer');	

		}

		else

		{

			$this->load->view('login');

		}

	}



	public function view($page='index')

	{

		if($this->session->userdata('email'))

		{

			$data['purpose_data']=$this->user_model->display_purpose();

			$data['expense_data']=$this->user_model->display_expense();

			$data['territory_data']=$this->user_model->display_territory();

			$data['industry_data']=$this->user_model->display_industry();

			$data['location_data']=$this->user_model->display_location();

			$data['details'] = $this->session->userdata('details');

			$this->load->view('include/header',$data);

			$this->load->view($page);

			$this->load->view('include/footer');	

		}

		else

		{

			$this->load->view('login');

		}

	}



	public function login()

	{

		if(!$this->session->userdata('email'))

		{

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			$this->form_validation->set_rules('pass', 'Password', 'trim|required');

			if($this->form_validation->run())

			{

				$userdata = array(

				'email'=>$this->input->post('email'),

				'pass'=>$this->input->post('pass')

				);

				$data['details'] = $this->user_model->login($userdata);

				if($data['details'])

				{

					$this->session->set_userdata('email',$data['details'][0]['email']);

					// $this->session->set_userdata('name',$data['details'][0]['first_name']);

					// $this->session->set_userdata('pic',$data['details'][0]['photo']);

					$this->session->set_userdata('details',$data['details']);

					// $details = $this->session->userdata('details');

					$this->load->view('include/header',$data);

					$this->load->view('index');

					$this->load->view('include/footer');

				}

				else

				{

					$this->session->set_flashdata('Error','Wrong email or password!');

					$this->load->view('login');

				}

			}

			else

			{

				$this->load->view('login');

			}

		}

		else

		{

			$data['details'] = $this->session->userdata('details');

			$this->load->view('include/header',$data);

			$this->load->view('index');

			$this->load->view('include/footer');	

		}

	}



	public function adminProfile()

	{

		if($this->session->userdata('email'))

		{

		if($this->input->post())

		{

			$this->form_validation->set_rules('fname', 'First name', 'trim|required|regex_match[/^[A-Z a-z _ . \-]+$/]');

			$this->form_validation->set_rules('lname', 'Last name', 'trim|required|regex_match[/^[A-Z a-z _ . \-]+$/]');

			$this->form_validation->set_rules('desig', 'Designation', 'trim|required|regex_match[/^[A-Z a-z _ . \-]+$/]');

			$this->form_validation->set_rules('gender', 'Gender', 'trim|required');

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			$this->form_validation->set_rules('mob', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');

			if($this->form_validation->run())

			{

				$config['upload_path']          = 'img/';

                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                // $config['max_size']             = 100;

                // $config['max_width']            = 1024;

                // $config['max_height']           = 768;

				 $this->load->library('upload', $config);

				 if($this->upload->do_upload('file'))

				 {

				 	$imgs = $this->upload->data();

				 	$img = $imgs['file_name'];

				 }

				 else

				 {

				 	$img = $this->input->post('oldfile');

				 	if($img=='')

				 	{

						$this->session->set_flashdata('error',$this->upload->display_errors());

						$email = $this->session->userdata('email');

						$data['profile'] = $this->user_model->fetch_detail($email);

						$data['details'] = $this->session->userdata('details');

						$this->load->view('include/header',$data);

						$this->load->view('adminProfile',$data);

						$this->load->view('include/footer');

				 	}

				 }

					$profiles = array(

					'fname'=>$this->input->post('fname'),

					'lname'=>$this->input->post('lname'),

					'desig'=>$this->input->post('desig'),

					'gender'=>$this->input->post('gender'),

					'email'=>$this->input->post('email'),

					'mob'=>$this->input->post('mob'),

					'imgs'=>$img

					);

					$email = $this->session->userdata('email');

					$data['updt_st'] = $this->user_model->update_profile($profiles,$email);

					if($data)

					{

						$this->session->set_flashdata('Success','Profile updated successfully');

						$email = $this->session->userdata('email');

						$data['profile'] = $this->user_model->fetch_detail($email);

						$data['details'] = $this->session->userdata('details');

						$this->load->view('include/header',$data);

						$this->load->view('adminProfile',$data);

						$this->load->view('include/footer');

					}

					else

					{

						$this->session->set_flashdata('Errors','Some error occurred');

						$email = $this->session->userdata('email');

						$data['profile'] = $this->user_model->fetch_detail($email);

						$data['details'] = $this->session->userdata('details');

						$this->load->view('include/header',$data);

						$this->load->view('adminProfile',$data);

						$this->load->view('include/footer');

					}

			}

			else

			{

				$email = $this->session->userdata('email');

				$data['profile'] = $this->user_model->fetch_detail($email);

				$data['details'] = $this->session->userdata('details');

				$this->load->view('include/header',$data);

				$this->load->view('adminProfile',$data);

				$this->load->view('include/footer');	

			}

		}

		else

		{

			$email = $this->session->userdata('email');

			$data['profile'] = $this->user_model->fetch_detail($email);

			$data['details'] = $this->session->userdata('details');

			$this->load->view('include/header',$data);

			$this->load->view('adminProfile',$data);

			$this->load->view('include/footer');	

		}

		}

		else

		{

			redirect('Sales_tracker');

		}

	}

    public function admin_Change_Password()

	{

		if($this->session->userdata('email'))

		{

			if($this->input->post('save'))

			{

				$this->form_validation->set_rules('old_pass','Old password','required');

				$this->form_validation->set_rules('new_pass','New password','required');

				$this->form_validation->set_rules('confirm_pass','Confirm password','required');

				if($this->form_validation->run())

				{

					$password = array(

						'old_pass'=> $this->input->post('old_pass'),

						'new_pass'=> $this->input->post('new_pass'),

						'confirm_pass'=> $this->input->post('confirm_pass'),

						'email'=>$this->session->userdata('email')

					);

					$data = $this->user_model->chk_pass($password);

					if($data[0]['password']==$password['old_pass'])

					{

						if($password['new_pass']!=$password['confirm_pass'])

						{

							$this->session->set_flashdata('Confirm_Pass_err','Please enter the same password as above');

						}

						else

						{

							$data = $this->user_model->update_pass($password);

							if($data)

							{

								$this->session->set_flashdata('Success_pass','Password updated successfully!');

							}

							else

							{

								$this->session->set_flashdata('Error_pass','Error updating password!');

							}

						}

					}

					else

					{

						$this->session->set_flashdata('Pass_err','Please enter the correct old password');

					}

				}

			}

			$data = array('details'=>$this->session->userdata('details'));

			// $data['details'] = $this->session->userdata('details');

			$this->load->view('include/header',$data);

			$this->load->view('admin_Change_Password');

			$this->load->view('include/footer');

		}

		else

		{

			redirect('Sales_tracker');

		}

	}



	public function adminForms()

	{

		print_r($_POST);

		die;

	}



	// arjun

	public function add_purpose()

	{

		// update data

		if($this->input->post('update'))

		{

			$this->form_validation->set_rules('purpose','Purpose','required');

			if($this->form_validation->run())

			{

				$data = array(

					'purpose'=>$this->input->post('purpose'),

					'purpose_id'=>$this->input->post('purpose_id')

				);

				$data['up_st'] = $this->user_model->update($data);

				if($data['up_st'])

				{

					redirect(base_url().'sales_tracker/view/masterData');

				}

				else

				{

					redirect(base_url().'sales_tracker/view/masterData');

				}

			}

		}

		// add data

		$this->form_validation->set_rules('purpose','Purpose','required');

		if($this->form_validation->run())

		{

		  $formdata= array();

          $formdata['purpose']=$this->input->post('purpose');

          $data = $this->user_model->add_purpose($formdata);

          $this->session->set_flashdata('success','Record Added Successfully.');

          redirect(base_url().'sales_tracker/view/masterData');

          

        }

        else

        {

        $this->load->view('include/header');

        $this->load->view('masterData');

        $this->load->view('include/footer');

        }

      }

public function delete()

{

$del=$this->input->get('del');

$this->user_model->delete_purpose($del);

redirect(base_url().'sales_tracker/view/masterData');

}

public function update_status()

{

$id = $this->input->post('purpose_abc');

$status = $this->input->post('status');

$this->user_model->active_deactive($id,$status);

redirect(base_url().'sales_tracker/view/masterData');

}

public function update_purpose()

{

$id= $this->input->post('pur_id');

$data = $this->user_model->fetch_purpose($id);

echo json_encode($data);

}

public function add_expense()

{

$formdata= array();

$formdata['expense_name']=$this->input->post('expense_name');

$data = $this->user_model->addexpense($formdata);

echo json_encode($data);	

}

public function update_exp_status()

{

$id = $this->input->post('expense_abc');

$status = $this->input->post('status');

$this->user_model->active_expense($id,$status);

redirect(base_url().'sales_tracker/view/masterData');	

}

public function delete_exp()

{

$id = $this->input->post('id');

$this->user_model->delete_exp_model($id);



}

public function update_exp()

{

$id= $this->input->post('exp_id');

$data = $this->user_model->fetch_expense($id);

echo json_encode($data);

}

public function update_expense()

{

$formdata= array();

$formdata['exp_name']=$this->input->post('exp_name');

$formdata['exp_id']=$this->input->post('exp_id');

$data = $this->user_model->update_exp($formdata);

echo json_encode($data);	

}

public function add_territory()

{

		$formdata= array();

		$formdata['territory_cat']=$this->input->post('territory_cat');

		$data = $this->user_model->addterritory($formdata);

		echo json_encode($data);

}

public function update_terr_status()

{

$id = $this->input->post('terr_abc');

$status = $this->input->post('status');

$this->user_model->active_terr($id,$status);

redirect(base_url().'sales_tracker/view/masterData');

}

public function delete_trr()

{

$id = $this->input->post('id');

$this->user_model->delete_trr_model($id);

}

public function update_terr()

{

$id= $this->input->post('trr_id');

$data = $this->user_model->fetch_trr($id);

echo json_encode($data);

}



public function updt_territory()

{

	$terr = array(

		'id' => $this->input->post('territory_id'),

		'cat' => $this->input->post('territory_cat')

	);

	$data= $this->user_model->update_terr($terr);

	echo $data;

}

public function add_industry()

{

$formdata= array();

$formdata['industry_cat']=$this->input->post('industry_cat');

$data = $this->user_model->addindustry($formdata);

echo json_encode($data);	

}

public function update_industry_status()

{

$id = $this->input->post('industry_abc');

$status = $this->input->post('status');

$this->user_model->active_industry($id,$status);

redirect(base_url().'sales_tracker/view/masterData');	

}

public function delete_industry()

{

$id = $this->input->post('id');

$this->user_model->delete_industry_model($id);

}

public function update_industry()

{

$id= $this->input->post('industry_id');

$data = $this->user_model->fetch_industry($id);

echo json_encode($data);

}

public function updt_industry()

{

	$ind = array(

		'industry_cat' => $this->input->post('industry_cat'),

		'inds_id' => $this->input->post('inds_id')

	);

	$data= $this->user_model->update_ind($ind);

	echo $data;

}

public function add_location()

{

$formdata= array();

$formdata['office_location']=$this->input->post('office_location');

$formdata['address']=$this->input->post('address');

$formdata['city']=$this->input->post('city');

$formdata['zip_code']=$this->input->post('zip_code');

$formdata['state']=$this->input->post('state');

$formdata['country']=$this->input->post('country');

$data = $this->user_model->addlocation($formdata);

echo json_encode($data);	

}

public function delete_location()

{

$id = $this->input->post('id');

$this->user_model->delete_location_model($id);

}

public function update_location()

{

$id= $this->input->post('location_id');

$data = $this->user_model->fetch_location($id);

echo json_encode($data);

}

public function updt_location()

{

	$loc = array(

	'loct_id' => $this->input->post('loct_id'),

	'office_location' => $this->input->post('office_location'),

	'address' => $this->input->post('address'),

	'city' => $this->input->post('city'),

	'zip_code' => $this->input->post('zip_code'),

	'state' => $this->input->post('state'),

	'country' => $this->input->post('country')

	);

	$data= $this->user_model->update_loc($loc);

	echo $data;

}



public function masterDataImportPurposeCategory()

{

	$data = array();

	$memData = array();

	if($this->input->post('submit')){

		$this->form_validation->set_rules('file', 'CSV file','xlsx', 'callback_file_check');

		if($this->form_validation->run() == true){

		$insertCount = $updateCount = $rowCount = $notAddCount = 0;

		if(is_uploaded_file($_FILES['data_import']['tmp_name'])){

			$csvData = $this->csvreader->parse_csv($_FILES['data_import']['tmp_name']);

			if(!empty($csvData)){

				foreach($csvData as $row){

					$rowCount++;

                        // Prepare data for DB insertion

                            array_push($memData,array(

                            'purpose_cat' => $row['purpose_cat'],

                            'status' => $row['status'],

                            ));

                        }

                    $data=$this->user_model->import_pur_model($memData);

                    redirect(base_url().'sales_tracker/view/masterDataImportPurposeCategory');

					

				}	

			}

		}

	}

}

public function masterDataImportExpenseCategory()

{

	$data = array();

	$memData = array();

	if($this->input->post('submit')){

		$this->form_validation->set_rules('file', 'CSV file','xlsx', 'callback_file_check');

		if($this->form_validation->run() == true){

		$insertCount = $updateCount = $rowCount = $notAddCount = 0;

		if(is_uploaded_file($_FILES['data_import']['tmp_name'])){

			$csvData = $this->csvreader->parse_csv($_FILES['data_import']['tmp_name']);

			if(!empty($csvData)){

				foreach($csvData as $row){

					$rowCount++;

                        // Prepare data for DB insertion

                            array_push($memData,array(

                            'expense_cat' => $row['expense_cat'],

                            'status' => $row['status'],

                            ));

                        }

                    $data=$this->user_model->import_exp_model($memData);

                    redirect(base_url().'sales_tracker/view/masterDataImportExpenseCategory');

					

				}	

			}

		}

	}

}

public function masterDataImportTerritoryCategory()

{

	$data = array();

	$memData = array();

	if($this->input->post('submit')){

		$this->form_validation->set_rules('file', 'CSV file','xlsx', 'callback_file_check');

		if($this->form_validation->run() == true){

		$insertCount = $updateCount = $rowCount = $notAddCount = 0;

		if(is_uploaded_file($_FILES['data_import']['tmp_name'])){

			$csvData = $this->csvreader->parse_csv($_FILES['data_import']['tmp_name']);

			if(!empty($csvData)){

				foreach($csvData as $row){

					$rowCount++;

                        // Prepare data for DB insertion

                            array_push($memData,array(

                            'territory_cat' => $row['territory_cat'],

                            'status' => $row['status'],

                            ));

                        }

                    $data=$this->user_model->import_trr_model($memData);

                    redirect(base_url().'sales_tracker/view/masterDataImportTerritoryCategory');

				}	

			}

		}

	}

}

public function masterDataImportIndustryCategory()

{

	$data = array();

	$memData = array();

	if($this->input->post('submit')){

		$this->form_validation->set_rules('file', 'CSV file','xlsx', 'callback_file_check');

		if($this->form_validation->run() == true){

		$insertCount = $updateCount = $rowCount = $notAddCount = 0;

		if(is_uploaded_file($_FILES['data_import']['tmp_name'])){

			$csvData = $this->csvreader->parse_csv($_FILES['data_import']['tmp_name']);

			if(!empty($csvData)){

				foreach($csvData as $row){

					$rowCount++;

                        // Prepare data for DB insertion

                            array_push($memData,array(

                            'industry_cat' => $row['industry_cat'],

                            'status' => $row['status'],

                            ));

                        }

                    $data=$this->user_model->import_ind_model($memData);

                    redirect(base_url().'sales_tracker/view/masterDataImportIndustryCategory');

				}	

			}

		}

	}

}

	// arjun end



    public function admin_Account_Settings()

	{

		$config = Array(

		'protocol' => 'smtp',

		'smtp_host' => 'ssl://smtp.googlemail.com',

		'smtp_port' => 465,

		'smtp_user' => 'neerajsamad14@gmail.com', // change it to yours

		'smtp_pass' => 'nks9717054344', // change it to yours

		'mailtype' => 'html',

		'charset' => 'iso-8859-1',

		'wordwrap' => TRUE

		);

        $message = '';

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");

		$this->email->from('neerajsamad14@gmail.com'); // change it to yours

		$this->email->to('neerajsamad14@gmail.com');// change it to yours

		$this->email->subject('Resume from JobsBuddy for your Job posting');

		$this->email->message($message);

		if($this->email->send())

		{

		echo 'Email sent.';

		}

		else

		{

		show_error($this->email->print_debugger());

		}

 	}





	public function logout()

	{

		$this->session->sess_destroy();

		redirect(base_url().'Sales_tracker');

	}

}