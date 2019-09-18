<?php
defined('BASEPATH') OR exit('Direct access not allowed');
date_default_timezone_set('Asia/Kolkata');
class Sales_tracker extends CI_Controller
{

// neeraj code start
	public function __construct()
	{
		parent::__construct();
		// helpers
		$this->load->helper('url');
		$this->load->helper('email');
		$this->load->helper('file');
		// libraries
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('CSVReader');
		// model
		$this->load->model('user_model');
	}

	public function index()
	{
		if($this->session->userdata('admin_email'))
		{
			$data['details'] = $this->session->userdata('details');
			$data['profile'] = $data['details'];
			$data['never_login'] = $this->session->userdata('never_login');
			if($data['never_login'])
			{
				$data['to_nvr_lgn'] = COUNT($data['never_login']);
			}
			else
			{
				$data['to_nvr_lgn'] = 0;
			}
			$data['not_punched_in'] = $this->session->userdata('not_punched_in');
			if($data['not_punched_in'])
			{
				$data['tot_not_punched_in'] = COUNT($data['not_punched_in']);
			}
			else
			{
				$data['tot_not_punched_in'] = 0;
			}
			$data['no_visit'] = $this->session->userdata('no_visit');
			if($data['no_visit'])
			{
				$data['to_no_visit'] = COUNT($data['no_visit']);
			}
			else
			{
				$data['to_no_visit'] = 0;
			}
			$data['no_forms'] = $this->session->userdata('no_forms');
			if($data['no_forms'])
			{
				$data['to_no_forms'] = COUNT($data['no_forms']);
			}
			else
			{
				$data['to_no_forms'] = 0;
			}
			$data['no_expenses'] = $this->session->userdata('no_expenses');
			if($data['no_expenses'])
			{
				$data['tot_no_expenses'] = COUNT($data['no_expenses']);
			}
			else
			{
				$data['tot_no_expenses'] = 0;
			}
			$data['users_data'] = $this->user_model->display_users();
			$data['total_users'] = COUNT($data['users_data']);
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
		if($this->session->userdata('admin_email'))
		{
			$data['purpose_data']=$this->user_model->display_purpose();
			$data['expense_data']=$this->user_model->display_expense();
			$data['territory_data']=$this->user_model->display_territory();
			$data['industry_data']=$this->user_model->display_industry();
			$data['location_data']=$this->user_model->display_location();
			$data['customers'] = $this->user_model->fetch_customers();
			$data['users_data'] = $this->user_model->display_users();
			$data['users_dataa'] = $this->user_model->display_users_details();
			$data['attend'] = $this->user_model->monthly_attendance();
			$data['details'] = $this->session->userdata('details');
			$data['profile'] = $data['details'];
			$data['forms'] = $this->user_model->forms();
			$data['never_login'] = $this->session->userdata('never_login');
			if($data['never_login'])
			{
				$data['to_nvr_lgn'] = COUNT($data['never_login']);
			}
			else
			{
				$data['to_nvr_lgn'] = 0;
			}
			$data['not_punched_in'] = $this->session->userdata('not_punched_in');
			if($data['not_punched_in'])
			{
				$data['tot_not_punched_in'] = COUNT($data['not_punched_in']);
			}
			else
			{
				$data['tot_not_punched_in'] = 0;
			}
			$data['no_visit'] = $this->session->userdata('no_visit');
			if($data['no_visit'])
			{
				$data['to_no_visit'] = COUNT($data['no_visit']);
			}
			else
			{
				$data['to_no_visit'] = 0;
			}
			$data['no_forms'] = $this->session->userdata('no_forms');
			if($data['no_forms'])
			{
				$data['to_no_forms'] = COUNT($data['no_forms']);
			}
			else
			{
				$data['to_no_forms'] = 0;
			}
			$data['no_expenses'] = $this->session->userdata('no_expenses');
			if($data['no_expenses'])
			{
				$data['tot_no_expenses'] = COUNT($data['no_expenses']);
			}
			else
			{
				$data['tot_no_expenses'] = 0;
			}
			$data['total_users'] = COUNT($data['users_data']);
			$this->load->view('include/header',$data);
			$this->load->view($page);
			$this->load->view('include/footer');	
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function dashboard()
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
				$data['profile'] = $data['details'];
				$this->session->set_userdata('log_emp_code',$data['details'][0]['emp_code']);
				if($data['details'])
				{
					$this->session->set_userdata('details',$data['details']);
					$emp_code2 = $data['details'][0]['emp_code'];
					$login_time = $this->user_model->update_log_time($emp_code2);
					if($data['details'][0]['role']=='admin')
					{
						$data['never_login'] = $this->user_model->never_logged_in();
						$data['not_punched_in'] = $this->user_model->not_punched_in();
						$this->session->set_userdata('not_punched_in',$data['not_punched_in']);
						if($data['not_punched_in'])
						{
							$data['tot_not_punched_in'] = COUNT($data['not_punched_in']);
						}
						else
						{
							$data['tot_not_punched_in'] = 0;
						}
						if($data['never_login'])
						{
							$data['to_nvr_lgn'] = COUNT($data['never_login']);
						}
						else
						{
							$data['to_nvr_lgn'] = 0;
						}
						$data['no_visit'] = $this->user_model->no_visits();
						$this->session->set_userdata('no_visit',$data['no_visit']);
						if($data['no_visit'])
						{
							$data['to_no_visit'] = COUNT($data['no_visit']);
						}
						else
						{
							$data['to_no_visit'] = 0;
						}
						$data['no_forms'] = $this->user_model->no_forms();
						$this->session->set_userdata('no_forms',$data['no_forms']);
						if($data['no_forms'])
						{
							$data['to_no_forms'] = COUNT($data['no_forms']);
						}
						else
						{
							$data['to_no_forms'] = 0;
						}
						$data['no_expenses'] = $this->user_model->no_expenses();
						$this->session->set_userdata('no_expenses',$data['no_expenses']);
						if($data['no_expenses'])
						{
							$data['tot_no_expenses'] = COUNT($data['no_expenses']);
						}
						else
						{
							$data['tot_no_expenses'] = 0;
						}
						$this->session->set_userdata('never_login',$data['never_login']);
						$this->session->set_userdata('admin_email',$data['details'][0]['email']);
						$this->session->set_userdata('email',$data['details'][0]['email']);
						$data['users_data'] = $this->user_model->display_users();
						$data['total_users'] = COUNT($data['users_data']);
						$this->load->view('include/header',$data);
						$this->load->view('index');
						$this->load->view('include/footer');
					}
					elseif($data['details'][0]['role']=='user')
					{
						$this->session->set_userdata('user_email',$data['details'][0]['email']);
						$this->session->set_userdata('email',$data['details'][0]['email']);
						$this->session->set_userdata('emp_code',$data['details'][0]['emp_code']);
						$data['users_data'] = $this->user_model->display_users();
						$data['total_users'] = $this->user_model->count_total_users($data['details'][0]['emp_code']);
						$data['attend_count'] = $this->user_model->count_users_attendance($data['details'][0]['emp_code']);
						$data['in_office_count'] = $this->user_model->count_users_in_office($data['details'][0]['emp_code']);
						$this->load->view('user/include/header',$data);
						$this->load->view('user/dashboard');
						$this->load->view('user/include/footer');
					}
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
				// $data['details'] = $this->session->userdata('details');
				// $data['profile'] = $data['details'];
				// if($data['details'][0]['role']=='admin')
				// {
				// $data['never_login'] = $this->session->userdata('never_login');
				// if($data['never_login'])
				// {
				// 	$data['to_nvr_lgn'] = COUNT($data['never_login']);
				// }
				// else
				// {
				// 	$data['to_nvr_lgn'] = 0;
				// }
				// $data['not_punched_in'] = $this->session->userdata('not_punched_in');
				// if($data['not_punched_in'])
				// {
				// 	$data['tot_not_punched_in'] = COUNT($data['not_punched_in']);
				// }
				// else
				// {
				// 	$data['tot_not_punched_in'] = 0;
				// }
				// $data['no_visit'] = $this->session->userdata('no_visit');
				// if($data['no_visit'])
				// {
				// 	$data['to_no_visit'] = COUNT($data['no_visit']);
				// }
				// else
				// {
				// 	$data['to_no_visit'] = 0;
				// }
				// $data['no_forms'] = $this->session->userdata('no_forms');
				// if($data['no_forms'])
				// {
				// 	$data['to_no_forms'] = COUNT($data['no_forms']);
				// }
				// else
				// {
				// 	$data['to_no_forms'] = 0;
				// }
				// $data['no_expenses'] = $this->session->userdata('no_expenses');
				// if($data['no_expenses'])
				// {
				// $data['tot_no_expenses'] = COUNT($data['no_expenses']);
				// }
				// else
				// {
				// $data['tot_no_expenses'] = 0;
				// }
				// $data['users_data'] = $this->user_model->display_users();
				// $data['total_users'] = COUNT($data['users_data']);
				// $this->load->view('include/header',$data);
				// $this->load->view('index');
				// $this->load->view('include/footer');
				// }	
				// elseif($data['details'][0]['role']=='user')
				// {
				// $data['users_data'] = $this->user_model->display_users();
				// $data['total_users'] = $this->user_model->count_total_users($data['details'][0]['emp_code']);
				// $data['attend_count'] = $this->user_model->count_users_attendance($data['details'][0]['emp_code']);
				// $data['in_office_count'] = $this->user_model->count_users_in_office($data['details'][0]['emp_code']);
				// $this->load->view('user/include/header',$data);
				// $this->load->view('user/dashboard');
				// $this->load->view('user/include/footer');
				// }
			}
		}
		else
		{
			$data['details'] = $this->session->userdata('details');
			$data['profile'] = $data['details'];
			if($data['details'][0]['role']=='admin')
			{
				$data['never_login'] = $this->session->userdata('never_login');
				if($data['never_login'])
				{
					$data['to_nvr_lgn'] = COUNT($data['never_login']);
				}
				else
				{
					$data['to_nvr_lgn'] = 0;
				}
				$data['not_punched_in'] = $this->session->userdata('not_punched_in');
				if($data['not_punched_in'])
				{
					$data['tot_not_punched_in'] = COUNT($data['not_punched_in']);
				}
				else
				{
					$data['tot_not_punched_in'] = 0;
				}
				$data['no_visit'] = $this->session->userdata('no_visit');
				if($data['no_visit'])
				{
					$data['to_no_visit'] = COUNT($data['no_visit']);
				}
				else
				{
					$data['to_no_visit'] = 0;
				}
				$data['no_forms'] = $this->session->userdata('no_forms');
				if($data['no_forms'])
				{
					$data['to_no_forms'] = COUNT($data['no_forms']);
				}
				else
				{
					$data['to_no_forms'] = 0;
				}
				$data['no_expenses'] = $this->session->userdata('no_expenses');
				if($data['no_expenses'])
				{
				$data['tot_no_expenses'] = COUNT($data['no_expenses']);
				}
				else
				{
				$data['tot_no_expenses'] = 0;
				}
				$data['users_data'] = $this->user_model->display_users();
				$data['total_users'] = COUNT($data['users_data']);
				$this->load->view('include/header',$data);
				$this->load->view('index');
				$this->load->view('include/footer');
			}	
			elseif($data['details'][0]['role']=='user')
			{
				$data['users_data'] = $this->user_model->display_users();
				$data['total_users'] = $this->user_model->count_total_users($data['details'][0]['emp_code']);
				$data['attend_count'] = $this->user_model->count_users_attendance($data['details'][0]['emp_code']);
				$data['in_office_count'] = $this->user_model->count_users_in_office($data['details'][0]['emp_code']);
				$this->load->view('user/include/header',$data);
				$this->load->view('user/dashboard');
				$this->load->view('user/include/footer');
			}
		}
	}

	public function adminProfile()
	{
		if($this->session->userdata('admin_email'))
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
						$email = $this->session->userdata('admin_email');
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
					$email = $this->session->userdata('admin_email');
					$data['updt_st'] = $this->user_model->update_profile($profiles,$email);
					if($data)
					{
						$this->session->set_flashdata('Success','Profile updated successfully');
						$email = $this->session->userdata('admin_email');
						$data['profile'] = $this->user_model->fetch_detail($email);
						$data['details'] = $this->session->userdata('details');
						$this->load->view('include/header',$data);
						$this->load->view('adminProfile',$data);
						$this->load->view('include/footer');
					}
					else
					{
						$this->session->set_flashdata('Errors','Some error occurred');
						$email = $this->session->userdata('admin_email');
						$data['profile'] = $this->user_model->fetch_detail($email);
						$data['details'] = $this->session->userdata('details');
						$this->load->view('include/header',$data);
						$this->load->view('adminProfile',$data);
						$this->load->view('include/footer');
					}
			}
			else
			{
				$email = $this->session->userdata('admin_email');
				$data['profile'] = $this->user_model->fetch_detail($email);
				$data['details'] = $this->session->userdata('details');
				$this->load->view('include/header',$data);
				$this->load->view('adminProfile',$data);
				$this->load->view('include/footer');	
			}
		}
		else
		{
			$email = $this->session->userdata('admin_email');
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
		if($this->session->userdata('admin_email'))
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
						'email'=>$this->session->userdata('admin_email')
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
			// $data = array('details'=>$this->session->userdata('details'));
			// $data = array('profile'=>$this->session->userdata('details'));
			$data['details'] = $this->session->userdata('details');
			$data['profile'] = $data['details'];
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
		$this->form_validation->set_rules('form_name','Form Name','required');
		$this->form_validation->set_rules('submit_button','Submit button caption','required');
		$this->form_validation->set_rules('label[]','Form field','required');
		if($this->form_validation->run())
		{
			$formdata = array(
				'form_name'=>$this->input->post('form_name'),
				'active'=>$this->input->post('active'),
				'related'=>$this->input->post('related_to'),
				'filled'=>$this->input->post('filled'),
				'submit_btn'=>$this->input->post('submit_button'),
				'mobile'=>$this->input->post('mobile_only'),
				'label'=>$this->input->post('label'),
				'type'=>$this->input->post('type'),
				'mandatory'=>$this->input->post('mandatory'),
				'placeholder'=>$this->input->post('placeholder'),
				'editable'=>$this->input->post('editable')
			);

			if($this->input->post('update'))
			{ 
				$forms_id = $this->input->post('form_id');
				$data['status'] = $this->user_model->updt_dyn_form($formdata,$forms_id);
				if($data['status']==1)
				{
					$this->session->set_flashdata('form_sucs',"Form Updated Successfully!");
					// $data['details'] = $this->session->userdata('details');
					// $this->load->view('include/header',$data);
					// $this->load->view('adminForms');
					// $this->load->view('include/footer');	
					redirect('sales_tracker/view/adminForms');			
				}
				else
				{
					$this->session->set_flashdata('form_err',"Some error occurred during updating form!");
					// $data['details'] = $this->session->userdata('details');
					// $this->load->view('include/header',$data);
					// $this->load->view('adminForms');
					// $this->load->view('include/footer');	
					redirect('sales_tracker/view/adminForms');
				}	
			}
			elseif($this->input->post('dlt_form'))
			{
				$forms_id = $this->input->post('form_id');
				$data['status'] = $this->user_model->dlt_dyn_form($forms_id);
				if($data['status']==1)
				{
					$this->session->set_flashdata('form_sucs',"Form deleted Successfully!");
					// $data['details'] = $this->session->userdata('details');
					// $this->load->view('include/header',$data);
					// $this->load->view('adminForms');
					// $this->load->view('include/footer');	
					redirect('sales_tracker/view/adminForms');			
				}
				else
				{
					$this->session->set_flashdata('form_err',"Some error occurred during deleting form!");
					// $data['details'] = $this->session->userdata('details');
					// $this->load->view('include/header',$data);
					// $this->load->view('adminForms');
					// $this->load->view('include/footer');	
					redirect('sales_tracker/view/adminForms');
				}	
			}
			else
			{
				$data['status'] = $this->user_model->dyn_form($formdata);
				if($data['status']==1)
				{
					$this->session->set_flashdata('form_sucs',"Form created Successfully!");
					// $data['details'] = $this->session->userdata('details');
					// $this->load->view('include/header',$data);
					// $this->load->view('adminForms');
					// $this->load->view('include/footer');	
					redirect('sales_tracker/view/adminForms');			
				}
				else
				{
					$this->session->set_flashdata('form_err',"Some error occurred during form creation!");
					// $data['details'] = $this->session->userdata('details');
					// $this->load->view('include/header',$data);
					// $this->load->view('adminForms');
					// $this->load->view('include/footer');	
					redirect('sales_tracker/view/adminForms');
				}	
			}
		}
		else
		{
			$data['details'] = $this->session->userdata('details');
			$data['forms'] = $this->user_model->forms();
			$data['profile'] = $data['details'];
			$this->load->view('include/header',$data);
			$this->load->view('adminForms');
			$this->load->view('include/footer');
		}
		// print_r($_POST);
		// die;
	}

	public function form_data()
	{
		$output = "";
		$form_id = $this->input->post('form_id');
		$data = $this->user_model->form_data($form_id);
		foreach($data as $d)
		{
			// echo $d['forms_id'];	
		}
		$output .='<form method="post" action="'.base_url('Sales_tracker/adminForms').'">
		<div class="form-group">
			<label for="email">Form name:</label>
			<input type="text" class="form-control" name="form_name" id="form_name" value="'.$d['form_name'].'">
			<input type="hidden" class="form-control" name="form_id" id="form_id" value="'.$d['forms_id'].'">
			<span style="font-weight: bold;color:red;">'.form_error('form_name').'</span>
		 </div>
		 <div class="form-group">
			<label for="active">Active:</label>
			<input type="checkbox" name="active" value="'.$d['active'].'">
		 </div>
		 
		 <div class="form-group">
			<label for="related_to">Related To:</label>
			 <select class="form-control" id="sel1" name="related_to">
				<option value="'.$d['related_to'].'">'.$d['related_to'].'</option>
				<option value="Customer">Customer</option>
				<option value="Visit">Visit</option>
				<option value="User">User</option>
			  </select>
		 </div>
		 <div class="form-group">
			<label for="filled">When to be filled by user:</label>
			 <select class="form-control" id="sel1" name="filled">
				<option value="'.$d['filled_by'].'">'.$d['filled_by'].'</option>
				<option value="On Demand">On Demand</option>
				<option value="After punch-in">After punch-in</option>
				<option value="After punch-out">After punch-out</option>
			  </select>
		 </div>
		 
		 <div class="form-group">
			<label for="submit_button">Submit Button Caption:</label>
			<input type="text" class="form-control" name="submit_button" id="submit_button" value="'.$d['submit_caption'].'">
			<span style="font-weight: bold;color:red;">'.form_error('submit_button').'</span>
		 </div>
		 
		 <div class="form-group">
			<label for="mobile_only">Mobile only:</label>
			<input type="checkbox" name="mobile_only" value="'.$d['mobile_only'].'">
		 </div>
		<div class="row" style="padding:10px 0px;">
		<div class="col-md-12 text-right">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus" aria-hidden="true"></i> Add Components</button>
		</div>
		</div>
		<span style="font-weight: bold;color:red;">'.form_error('label').'</span>
		<table class="table">
		<thead>
		<tr>
		<th>#</th>
		<th>Label</th>
		<th>Type</th>
		<th>mandatory</th>
		<th></th>
		</tr>
		</thead>
		<tbody id="new_row">';
		$j=1;
		foreach($data as $d)
		{
		$output .='<tr><td>'.$j++.'</td>
		<td><input type="text" value="'.$d['label'].'" name="label[]" readonly style="border:none;"></td>
		<td><input type="text" value="'.$d['type'].'" name="type[]" readonly style="border:none;"></td>
		<td><input type="text" value="'.$d['mandatory'].'" name="mandatory[]" readonly style="border:none;"></td>
		<td style="display:none;"><input type="text" value="'.$d['placeholder'].'" name="placeholder[]" readonly style="border:none;"></td>
		<td style="display:none;"><input type="text" value="'.$d['edittable'].'" name="editable[]" readonly style="border:none;"></td>
		</td><td><button type="button" class="btn btn-danger btn-lg" id="dlt"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
		}
		$output .='</tbody>
		</table>
		<div class="row" style="padding:20px 0px;">
		<div class="col-md-12">
		<button type="submit" class="btn btn-info" name="update" value="up">Update</button>
		<button class="btn btn-default">Reset</button>
		<div class="text-right">
		<button type="submit" class="btn btn-danger text-right" name="dlt_form" value="d">Delete</button>
		</div>
		<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Preview</button> -->
		</form>';
		echo $output;
	}

// neeraj code end

	// arjun code start
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

public function add_user()
{
$formdata= array();
$formdata['fname']=$this->input->post('fname');
$formdata['lname']=$this->input->post('lname');
$formdata['emp_code']=$this->input->post('emp_code');
$formdata['designation']=$this->input->post('designation');
$formdata['role']=$this->input->post('role');
$formdata['report_to']=$this->input->post('report_to');
$formdata['off_loc']=$this->input->post('off_loc');
$formdata['email']=$this->input->post('email');
$formdata['password']=$this->input->post('password');
$formdata['mobile_no']=$this->input->post('mobile_no');
$formdata['accuracy']=$this->input->post('accuracy');
$formdata['radius']=$this->input->post('radius');
$formdata['allow_timeout']=$this->input->post('allow_timeout');
$formdata['allow_offline']=$this->input->post('allow_offline');
$data = $this->user_model->adduser($formdata);
if($data==true)
{
    $this->session->set_flashdata('success', "User Add Successfully"); 
    redirect(base_url().'sales_tracker/view/adminUser');
}
else
{
    $this->session->set_flashdata('error', "Some Error Occure");
}
}
public function update_status_user()
{
$id = $this->input->post('user_abc');
$status = $this->input->post('status');
$result = $this->user_model->active_deactive_user($id,$status);
redirect(base_url().'sales_tracker/view/adminUser');
}
public function delete_users()
{
$id = $this->input->post('id');
$del=$this->user_model->delete_user_model($id);
if($del== '1')
{
    $this->session->set_flashdata('successs', "User Delete Successfully"); 
   
    
}
else
{
    $this->session->set_flashdata('error', "Some Error Occure");
}
die();
}
public function active_users_con()
{
$output="";
$active_id = $this->input->post('active_id');
$data=$this->user_model->active_user_models($active_id);
$output.=
            $i=0;
        	foreach ($data as $users_dataaa) 
        	{
            $i++;
        	
            $output .='<tr>
            <td>'. $i.'</td>
            <td>'.$users_dataaa['emp_code'].'</td>
			<td>'.$users_dataaa['first_name'].'</td>
			<td>'.$users_dataaa['email'].'</td>
			<td>'.$users_dataaa['mobile_no'].'</td>
			<td>
				<form action="'. base_url('Sales_tracker/update_status_user').'" method="post">
                 <input type="hidden" name="user_abc" value=" '.$users_dataaa['login_id'].'">';
            if($users_dataaa['status']==1)
            {
            $output .='<input type="hidden" name="status" value="0">
            <button type="submit" class="btn btn-success">Active</button>';
        	}
            else
            {
            $output.='<input type="hidden" name="status" value="1">
            <button type="submit" class="btn btn-danger">Inactive</a>';
            }
           $output.='</form>
            </td>
			<td></td>
			<td></td>
			<td><button type="button" class="btn btn-info user_update" value="'. $users_dataaa['login_id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
     <button type="button" class="btn btn-info delete_user" value="'. $users_dataaa['login_id'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
</td>
</tr>';
}
echo $output;
}
public function inactive_users_con()
{
$output="";
$inactive_id = $this->input->post('inactive_id');
$data=$this->user_model->inactive_user_models($inactive_id);
$output.=
			$i=0;
        	foreach ($data as $users_dataaa) 
        	{
            $i++;
        	
            $output .='<tr>
            <td>'. $i.'</td>
            <td>'.$users_dataaa['emp_code'].'</td>
			<td>'.$users_dataaa['first_name'].'</td>
			<td>'.$users_dataaa['email'].'</td>
			<td>'.$users_dataaa['mobile_no'].'</td>
			<td>
				<form action="'. base_url('Sales_tracker/update_status_user').'" method="post">
                 <input type="hidden" name="user_abc" value=" '.$users_dataaa['login_id'].'">';
            if($users_dataaa['status']==1)
            {
            $output .='<input type="hidden" name="status" value="0">
            <button type="submit" class="btn btn-success">Active</button>';
        	}
            else
            {
            $output.='<input type="hidden" name="status" value="1">
            <button type="submit" class="btn btn-danger">Inactive</a>';
            }
           $output.='</form>
            </td>
			<td></td>
			<td></td>
			<td><button type="button" class="btn btn-info user_update" value="'. $users_dataaa['login_id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
     <button type="button" class="btn btn-info delete_user" value="'. $users_dataaa['login_id'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
</td>
</tr>';
}
echo $output;
}
public function adminImportUser()
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
                            'First_name' => $row['First_name'],
                            'Last_name' => $row['Last_name'],
                            'Emp_code' => $row['Emp_code'],
                            'Designation' => $row['Designation'],
                            'Role' => $row['Role'],
                            'Report' => $row['Report'],
                            'Office_location' => $row['Office_location'],
                            'Email' => $row['Email'],
                            'Password' => $row['Password'],
                            'Mobile' => $row['Mobile'],
                            'Accuracy_in_meter' => $row['Accuracy_in_meter'],
                            'Check_in_radius' => $row['Check_in_radius'],
                            'Allow_timeout' => $row['Allow_timeout'],
                            'Allow_offline' => $row['Allow_offline']
                            ));
                        }
                    $data=$this->user_model->import_users_model($memData);
                    redirect(base_url().'sales_tracker/view/adminImportUser');
					
				}	
			}
		}
	}
}
public function update_users()
{
$login_id= $this->input->post('login_id');
$data = $this->user_model->fetch_users($login_id);
echo json_encode($data);
}
public function updt_users()
{
$users = array(
'fname'=>$this->input->post('fname'),
'lname'=>$this->input->post('lname'),
'emp_code'=>$this->input->post('emp_code'),
'designation'=>$this->input->post('designation'),
'role'=>$this->input->post('role'),
'report_to'=>$this->input->post('report_to'),
'off_loc'=>$this->input->post('off_loc'),
'email'=>$this->input->post('email'),
'password'=>$this->input->post('password'),
'mobile_no'=>$this->input->post('mobile_no'),
'accuracy'=>$this->input->post('accuracy'),
'radius'=>$this->input->post('radius'),
'allow_timeout'=>$this->input->post('allow_timeout'),
'allow_offline'=>$this->input->post('allow_offline'),
'user_id' => $this->input->post('user_id'),
);
$data= $this->user_model->update_user_model($users);
if($data==true)
{
    $this->session->set_flashdata('success', "User Update Successfully"); 
    redirect('sales_tracker/view/adminUser');
}
else
{
    $this->session->set_flashdata('error', "Some Error Occure");
}
}
	// arjun code end
// arjun code start 2 code
public function add_expensee()
{
$formdata= array();
$formdata['visit']=$this->input->post('visit');
$formdata['customer_name']=$this->input->post('customer_name');
$formdata['exp_category']=$this->input->post('exp_category');
$formdata['exp_head']=$this->input->post('exp_head');
$formdata['exp_amt']=$this->input->post('exp_amt');
$formdata['emp_code']=$this->session->userdata('emp_code');
$formdata['emp_name']=$this->session->userdata('first_name');
$formdata['date']=$this->input->post('date');
            $config['upload_path']  = 'img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) 
				{
					$imgs = $this->upload->data();
				 	$formdata['img'] = $imgs['file_name'];
				}
				else
				{
                   echo $this->upload->display_errors();
				}
			   $configg['upload_path']  = 'receipt/';
               $configg['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload',$configg);
				if ($this->upload->do_upload('receipt')) 
				{
					$imgss = $this->upload->data();
				 	$formdata['imgg'] = $imgss['file_name'];
				 	
				}
				else
				{
                   echo $this->upload->display_errors();
				}
$data = $this->user_model->addexpensedetails($formdata);
 redirect(base_url().'sales_tracker/user_view/expenses');
	}
public function delete_expensee()
{
$del=$this->input->post('id');
$data=$this->user_model->delete_exp_details($del);
if ($data=="1")
{
$this->session->set_flashdata('delete_succs','Expense Delete successfully!');
redirect(base_url().'sales_tracker/user_view/expenses');
}

}

public function total_expense()
{

$emp_codee=$this->session->userdata('emp_code');
$data=$this->user_model->user_expense_total($emp_codee);
echo json_encode($data);
}
public function ind_exp()
{
 $output="";
$select_user = $this->input->post('select_user');
$select_status = $this->input->post('select_status');
$select_exp = $this->input->post('select_exp');
$date = $this->input->post('date');
$data=$this->user_model->ind_exp_model($select_user,$select_status,$select_exp,$date);
$output.=
			$i=0;
        	foreach ($data as $users_dataaam) 
        	{
            $i++;
            $output .='<tr>
            <td>'. $i.'</td>
            <td>'.$users_dataaam['emp_name'].'</td>
			<td>'.$users_dataaam['expense_head'].'</td>
			<td>'.$users_dataaam['expense_cat'].'</td>
			<td>'.$users_dataaam['expense_amount'].'</td>
			<td>'.$users_dataaam['date'].'</td>
			<td>'.$users_dataaam['customer_name'].'</td>';
			$output.='<td>';
			if($users_dataaam['status']=='2')
            {
            $output .='
            <button class="btn btn-secondary">Pending</button>';
        	}
            elseif($users_dataaam['status']=='1')
            {
            $output.='
            <button class="btn btn-success">Approved</button>';
            }
            else
            {
            $output.='
            <button class="btn btn-danger">Reject</button>';
            }
          $output.='</td>
			<td>--</td>
			
</tr>';
}
echo $output;
}
public function upt_users()
{
$id= $this->input->post('id');
$data = $this->user_model->fetch_exp($id);
echo json_encode($data);
}

public function u_exp()
{

$exp_id=$this->input->post('exp_id');
$customer_name=$this->input->post('customer_name');
$visit=$this->input->post('visit');
$exp_category=$this->input->post('exp_category');
$exp_head=$this->input->post('exp_head');
$exp_amt=$this->input->post('exp_amt');
$date=$this->input->post('date');
$old_file=$this->input->post('old_file');
$old_recipt=$this->input->post('old_recipt');
$config['upload_path']  = 'img/';
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$this->load->library('upload',$config);
if ($this->upload->do_upload('image')) 
{
$imgs = $this->upload->data();
echo $imgs;
}
else
{
echo $this->upload->display_errors();
}
// echo $exp['image'];
// $data= $this->user_model->update_exp_model($users);
}
public function report_user_exp()
{
$output="";
$select_user = $this->input->post('select_user');
$from_date_exp = $this->input->post('from_date_exp');
$to_date_exp = $this->input->post('to_date_exp');
$data=$this->user_model->report_exp_model($select_user,$from_date_exp,$to_date_exp);
$output.=
			$i=0;
        	foreach ($data as $users_dataaam) 
        	{
            $i++;
            $output .='<tr>
            <td>'. $i.'</td>
            <td>'.$users_dataaam['expense_head'].'</td>
			<td>'.$users_dataaam['expense_cat'].'</td>
			<td>'.$users_dataaam['date'].'</td>
			<td>'.$users_dataaam['customer_name'].'</td>
			<td>'.$users_dataaam['visit'].'</td>
			<td>--</td>
			<td>--</td>
			<td>--</td>
			<td>'.$users_dataaam['expense_amount'].'</td>
			<td>'.$users_dataaam['disbursed_amount'].'</td>';
			$output.='<td>';
			if($users_dataaam['status']=='2')
            {
            $output .='
            <button class="btn btn-secondary">Pending</button>';
        	}
            elseif($users_dataaam['status']=='1')
            {
            $output.='
            <button class="btn btn-success">Approved</button>';
            }
            else
            {
            $output.='
            <button class="btn btn-danger">Reject</button>';
            }
          $output.='</td>
			
</tr>';
}
echo $output;
}
public function report_user_visit()
{
$output="";
$user_visit = $this->input->post('user_visit');
$visit_to_date = $this->input->post('visit_to_date');
$visit_from_date = $this->input->post('visit_from_date');
$data=$this->user_model->report_visit_model($user_visit,$visit_to_date,$visit_from_date);
			$i=0;
        	foreach ($data as $users_dataaam) 
        	{
            $i++;
            $output .='<tr>
            <td>'. $i.'</td>
            <td>'.$users_dataaam['customer'].'</td>
            <td>'.$users_dataaam['visit'].'</td>
			<td>'.$users_dataaam['date'].'</td>
			<td>'.$users_dataaam['start_time'].'</td>
			<td>'.$users_dataaam['end_time'].'</td>
			<td>'.$users_dataaam['purpose'].'</td>
			<td>'.$users_dataaam['owner'].'</td>
			<td>'.$users_dataaam['outcome'].'</td>
			<td>'.$users_dataaam['outcome_description'].'</td>';
			$output.='<td>';
			if($users_dataaam['status']=='0')
            {
            $output .='
            <button class="btn btn-secondary">Pending</button>';
        	}
            elseif($users_dataaam['status']=='1')
            {
            $output.='
            <button class="btn btn-success">Approved</button>';
            }
            else
            {
            $output.='
            <button class="btn btn-danger">Reject</button>';
            }
          $output.='</td>
		
			
</tr>';
}
echo $output;
}
public function report_user_travel()
{
$output="";
$travel_user = $this->input->post('travel_user');
$from_travel_date = $this->input->post('from_travel_date');
$to_travel_date = $this->input->post('to_travel_date');
$data=$this->user_model->report_travel_model($travel_user,$from_travel_date,$to_travel_date);
$output.=
			$i=0;
        	foreach ($data as $users_dataaam) 
        	{
            $i++;
            $output .='<tr>
            <td>'. $i.'</td>
            <td>'.$users_dataaam['time'].'</td>
            <td>'.$users_dataaam['location'].'</td>
			<td>'.$users_dataaam['lat'].'</td>
			<td>'.$users_dataaam['lon'].'</td>
			<td>'.$users_dataaam['distance_kms'].'</td>
			<td>'.$users_dataaam['battery_per'].'</td>
			<td>'.$users_dataaam['gps'].'</td>
			<td>'.$users_dataaam['connectivity'].'</td>
			<td>'.$users_dataaam['app_version'].'</td>
			<td>'.$users_dataaam['mobile_os_version'].'</td>
			<td>'.$users_dataaam['device_name'].'</td>
			<td>'.$users_dataaam['mock_location'].'</td>
</tr>';
}
echo $output;
}
// arjun 2nd code end
// neeraj 2nd code start
    public function admin_Account_Settings()
	{
        // $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        $to = 'neeraj@indiansmarthub.net';
        $subject = "Testing";
        $message = 'First mail using codeigniter';

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            echo show_error($this->email->print_debugger());
        }
 	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function add_customerAdmin()
	{
		// echo"<pre>";
		// print_r($_POST);
		$this->form_validation->set_rules('name','Name','required');
		// $this->form_validation->set_rules('territory','Territory','required|callback_territory');
		// $this->form_validation->set_message('territory', 'Please select territory');
		$this->form_validation->set_rules('loc_ident','Location identifier','required');
		// $this->form_validation->set_rules('industry','Industry','required|callback_industry');
		// $this->form_validation->set_message('industry','Please select industry');
		$this->form_validation->set_rules('address','Address','required');
		if($this->form_validation->run())
		{
			$cust = array(
			'name'=>$this->input->post('name'),
			'territory'=>$this->input->post('territory'),
			'print_as'=>$this->input->post('print_as'),
			'head_office'=>$this->input->post('head_office'),
			'loc_ident'=>$this->input->post('loc_ident'),
			'industry'=>$this->input->post('industry'),
			'address'=>$this->input->post('address'),
			'lat_long'=>$this->input->post('lat').','.$this->input->post('long'),
			'phone'=>$this->input->post('phone'),
			'phone2'=>$this->input->post('phone2'),
			'phone3'=>$this->input->post('phone3'),
			'fax'=>$this->input->post('fax'),
			'fax2'=>$this->input->post('fax2'),
			'email'=>$this->input->post('email'),
			'email2'=>$this->input->post('email2'),
			'email3'=>$this->input->post('email3'),
			'website'=>$this->input->post('website'),
			'added_by'=>$this->session->userdata('log_emp_code')	
			);
			$data['sta'] = $this->user_model->add_customer($cust);
			if($data['sta']==1)
			{
				$this->session->set_flashdata('cust_sucs','Customer added successfullly');
				redirect('sales_tracker/view/add_customerAdmin');
			}
			else
			{
				$this->session->set_flashdata('cust_err','Some error occurred');
				redirect('sales_tracker/view/add_customerAdmin');
			}
		}
		else
		{
			$data['territory_data']=$this->user_model->display_territory();
			$data['industry_data']=$this->user_model->display_industry();
			$data['details'] = $this->session->userdata('details');
			$data['profile'] = $data['details'];
			$this->load->view('include/header',$data);
			$this->load->view('add_customerAdmin');
			$this->load->view('include/footer');
		}
	}

	public function dlt_customerAdmin()
	{
		$id = $this->uri->segment(3);
		$data['st'] = $this->user_model->delete_customer($id);
		if($data['st'])
		{
			$this->session->set_flashdata('dlt_cust_sucs','Customer deleted successfully!');
			redirect('sales_tracker/view/AdminCustomer');
		}
	}

	public function adm_import_cst()
	{
		$data = array();
		$memData = array();
		if($this->input->post('imprt_cst')){
			$this->form_validation->set_rules('file', 'CSV file','xlsx', 'callback_file_check');
			if($this->form_validation->run() == true){
				$insertCount = $updateCount = $rowCount = $notAddCount = 0;
				if(is_uploaded_file($_FILES['cust']['tmp_name'])){
				$csvData = $this->csvreader->parse_csv($_FILES['cust']['tmp_name']);
				if(!empty($csvData)){
					foreach($csvData as $row){
					$rowCount++;
					// Prepare data for DB insertion
					array_push($memData,array(
					'customer_name' => $row['Customer Name'],
					'printas' => $row['Customer PrintAs'],
					'location'=>$row['Customer Location'],
					'headoffice'=>$row['Isheadoffice'],
					'territory'=>$row['Territory'],
					'industry'=>$row['Industry'],
					'phone1'=>$row['CustomerPhone1'],
					'phone2'=>$row['CustomerPhone2'],
					'phone3'=>$row['CustomerPhone3'],
					'fax1'=>$row['CustomerFax1'],
					'fax2'=>$row['CustomerFax2'],
					'email1'=>$row['CustomerEmail1'],
					'email2'=>$row['CustomerEmail2'],
					'email3'=>$row['CustomerEmail3'],
					'website'=>$row['CustomerWebsiteUrl1'],
					'address'=>$row['CustomerAddress']
					));
					}
					$data['st']=$this->user_model->import_cust($memData);
					if($data['st'])
					{
						$this->session->set_flashdata('imprt_succs','Data imported successfully!');
						redirect('sales_tracker/view/adm_import_cst');
					}
					}	
				}
			}
		}
	}

	public function edit_customerAdmin()
	{
		$id = $this->uri->segment(3);
		$data['cust'] = $this->user_model->fetch_cust_by_id($id);
		$data['territory_data']=$this->user_model->display_territory();
		$data['industry_data']=$this->user_model->display_industry();
		$data['details'] = $this->session->userdata('details');
		$data['profile'] = $data['details'];
		$this->load->view('include/header',$data);
		$this->load->view('edit_customerAdmin');
		$this->load->view('include/footer');	
	}

	public function update_customerAdmin()
	{
		$cust = array(
			'customer_id'=>$this->input->post('cust_id'),
			'name'=>$this->input->post('name'),
			'territory'=>$this->input->post('territory'),
			'print_as'=>$this->input->post('print_as'),
			'head_office'=>$this->input->post('head_office'),
			'loc_ident'=>$this->input->post('loc_ident'),
			'industry'=>$this->input->post('industry'),
			'address'=>$this->input->post('address'),
			'lat_long'=>$this->input->post('lat').','.$this->input->post('long'),
			'phone'=>$this->input->post('phone'),
			'phone2'=>$this->input->post('phone2'),
			'phone3'=>$this->input->post('phone3'),
			'fax'=>$this->input->post('fax'),
			'fax2'=>$this->input->post('fax2'),
			'email'=>$this->input->post('email'),
			'email2'=>$this->input->post('email2'),
			'email3'=>$this->input->post('email3'),
			'website'=>$this->input->post('website')	
			);
			$data['st'] = $this->user_model->update_cust($cust);
			if($data['st'])
			{
				$this->session->set_flashdata('dlt_cust_sucs','Data updated successfully');
				redirect('sales_tracker/view/AdminCustomer');
			}
	}

	public function filter()
	{
		$filter = $_POST['fil'];
		$recent = array();
		$terr = array();
		$indus = array();
		if($filter['Recent'])
		{
			foreach ($filter['Recent'] as $value) {
			array_push($recent,$value);
			}
		}
		if($filter['Territory'])
		{
			foreach ($filter['Territory'] as $value) {
			array_push($terr,$value);
			}
		}
		else
		{
			$terr[] = "";
		}
		if($filter['Industry'])
		{
			foreach ($filter['Industry'] as $value) {
			array_push($indus,$value);
			}
		}
		else
		{
			$indus[] = "";
		}
		// print_r($indus);

		$data['filtered'] = $this->user_model->filter_customer($recent,$terr,$indus);
		$len = COUNT($data['filtered']);
		$output = "";
        for($i=0;$i<$len;$i++)
        {
		$output .='<tr>
		<td>'.$data['filtered'][$i]['customer_name'].'</td>
		<td>'.$data['filtered'][$i]['phone1'].'</td>
		<td>'.$data['filtered'][$i]['email'].'</td>
		<td>'.$data['filtered'][$i]['industry'].'</td>
		<td>'.$data['filtered'][$i]['territory'].'</td>
		<td><a href="<?=base_url()?>sales_tracker/edit_customerAdmin/'.$data['filtered'][$i]['customer_id'].'" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		<a href="<?=base_url()?>sales_tracker/dlt_customerAdmin/'.$data['filtered'][$i]['customer_id'].'" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
		</tr>';
         }
        echo $output;
	}

	public function get_lat_long()
	{
		$data['details'] = $this->session->userdata('details');
		$this->load->view('include/header',$data);
		$this->load->view('get_lat_long');
	}
	// neeraj 2nd code end

	// neeraj 3rd code start 
	// user panel
	public function user_view($page='index')
	{
		if($this->session->userdata('user_email'))
		{
			$emp_codee=$this->session->userdata('emp_code');
			$email = $this->session->userdata('user_email');
			$data['purpose_data']=$this->user_model->display_purpose();
			$data['expense_data']=$this->user_model->display_expense();
			$data['territory_data']=$this->user_model->display_territory();
			$data['industry_data']=$this->user_model->display_industry();
			$data['location_data']=$this->user_model->display_location();
			$data['forms'] = $this->user_model->forms();
			$data['customers'] = $this->user_model->fetch_customers();
			$data['users_data'] = $this->user_model->display_users();
			$data['total_users'] = COUNT($data['users_data']);
			$data['profile'] = $this->user_model->fetch_detail($email);
			$data['attend'] = $this->user_model->monthly_attendance();
			// $data['attend_count'] = $this->user_model->count_attendance();
			// $data['in_office_count'] = $this->user_model->count_in_office();
			$data['total_users'] = $this->user_model->count_total_users($emp_codee);
			$data['attend_count'] = $this->user_model->count_users_attendance($emp_codee);
			$data['in_office_count'] = $this->user_model->count_users_in_office($emp_codee);
			$data['details'] = $this->session->userdata('details');
			$data['expense_datta']=$this->user_model->user_expense_display();
			$data['expens_cat']=$this->user_model->expens_cat();
			$data['expense_details']=$this->user_model->user_expense_details($emp_codee);
			$data['exp_user']=$this->user_model->exp_user($emp_codee);
			$data['users_for_msg'] = $this->user_model->users_for_msg($emp_codee);
			$this->load->view('user/include/header',$data);
			$this->load->view('user/'.$page);
			$this->load->view('user/include/footer');	
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function profile()
	{
		if($this->session->userdata('user_email'))
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
						redirect('sales_tracker/user_view/profile');
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
					$email = $this->session->userdata('user_email');
					$data['updt_st'] = $this->user_model->update_profile($profiles,$email);
					if($data)
					{
						$this->session->set_flashdata('Success','Profile updated successfully');
						redirect('sales_tracker/user_view/profile');
					}
					else
					{
						$this->session->set_flashdata('Errors','Some error occurred');
						redirect('sales_tracker/user_view/profile');
					}
			}
			else
			{
				$email = $this->session->userdata('user_email');
				$data['profile'] = $this->user_model->fetch_detail($email);
				$data['details'] = $this->session->userdata('details');
				$this->load->view('user/include/header',$data);
				$this->load->view('user/profile',$data);
				$this->load->view('user/include/footer');	
			}
		}
		else
		{
			redirect('sales_tracker/user_view/profile');	
		}
		}
		else
		{
			redirect('Sales_tracker');
		}
	}

	 public function Change_password()
	{
		if($this->session->userdata('user_email'))
		{
			if($this->input->post('submit'))
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
						'email'=>$this->session->userdata('user_email')
					);
					$data = $this->user_model->chk_pass($password);
					if($data[0]['password']==$password['old_pass'])
					{
						if($password['new_pass']!=$password['confirm_pass'])
						{
							$this->session->set_flashdata('Confirm_us_Pass_err','Please enter the same password as above');
						}
						else
						{
							$data = $this->user_model->update_pass($password);
							if($data)
							{
								$this->session->set_flashdata('Success_us_pass','Password updated successfully!');
							}
							else
							{
								$this->session->set_flashdata('Error_us_pass','Error updating password!');
							}
						}
					}
					else
					{
						$this->session->set_flashdata('Pass_err','Please enter the correct old password');
					}
				}
				else
				{
					// $data = array('details'=>$this->session->userdata('details'));
					$data['details'] = $this->session->userdata('details');
					$data['profile'] = $data['details'];
					$this->load->view('user/include/header',$data);
					$this->load->view('user/Change_password');
					$this->load->view('user/include/footer');
				}
			}
				$data = array('details'=>$this->session->userdata('details'));
				// $data['details'] = $this->session->userdata('details');
				$data['profile'] = $data['details'];
				$this->load->view('user/include/header',$data);
				$this->load->view('user/Change_password');
				$this->load->view('user/include/footer');
		}
		else
		{
			redirect('Sales_tracker');
		}
	}

	public function add_customer()
	{
		// echo"<pre>";
		// print_r($_POST);
		$this->form_validation->set_rules('name','Name','required');
		// $this->form_validation->set_rules('territory','Territory','required|callback_territory');
		// $this->form_validation->set_message('territory', 'Please select territory');
		$this->form_validation->set_rules('loc_ident','Location identifier','required');
		// $this->form_validation->set_rules('industry','Industry','required|callback_industry');
		// $this->form_validation->set_message('industry','Please select industry');
		$this->form_validation->set_rules('address','Address','required');
		if($this->form_validation->run())
		{
			$cust = array(
			'name'=>$this->input->post('name'),
			'territory'=>$this->input->post('territory'),
			'print_as'=>$this->input->post('print_as'),
			'head_office'=>$this->input->post('head_office'),
			'loc_ident'=>$this->input->post('loc_ident'),
			'industry'=>$this->input->post('industry'),
			'address'=>$this->input->post('address'),
			'lat_long'=>$this->input->post('lat').','.$this->input->post('long'),
			'phone'=>$this->input->post('phone'),
			'phone2'=>$this->input->post('phone2'),
			'phone3'=>$this->input->post('phone3'),
			'fax'=>$this->input->post('fax'),
			'fax2'=>$this->input->post('fax2'),
			'email'=>$this->input->post('email'),
			'email2'=>$this->input->post('email2'),
			'email3'=>$this->input->post('email3'),
			'website'=>$this->input->post('website'),
			'added_by'=>$this->session->userdata('log_emp_code')	
			);
			$data['sta'] = $this->user_model->add_customer($cust);
			if($data['sta']==1)
			{
				$this->session->set_flashdata('cust_sucs','Customer added successfullly');
				redirect('sales_tracker/user_view/add-customers');
			}
			else
			{
				$this->session->set_flashdata('cust_err','Some error occurred');
				redirect('sales_tracker/user_view/add-customers');
			}
		}
		else
		{
			$data['territory_data']=$this->user_model->display_territory();
			$data['industry_data']=$this->user_model->display_industry();
			$data['details'] = $this->session->userdata('details');
			$data['profile'] = $data['details'];
			$this->load->view('user/include/header',$data);
			$this->load->view('user/add-customers');
			$this->load->view('user/include/footer');
		}
	}

	public function filter_customer()
	{
		$filter = $_POST['fil'];
		$recent = array();
		$terr = array();
		$indus = array();
		if($filter['Recent'])
		{
			foreach ($filter['Recent'] as $value) {
			array_push($recent,$value);
			}
		}
		if($filter['Territory'])
		{
			foreach ($filter['Territory'] as $value) {
			array_push($terr,$value);
			}
		}
		else
		{
			$terr[] = "";
		}
		if($filter['Industry'])
		{
			foreach ($filter['Industry'] as $value) {
			array_push($indus,$value);
			}
		}
		else
		{
			$indus[] = "";
		}
		// print_r($indus);

		$data['filtered'] = $this->user_model->filter_customer($recent,$terr,$indus);
		$len = COUNT($data['filtered']);
		$output = "";
        for($i=0;$i<$len;$i++)
        {
			$output .='<tr>
			<td>'.$data['filtered'][$i]['customer_name'].'</td>
			<td>'.$data['filtered'][$i]['phone1'].'</td>
			<td>'.$data['filtered'][$i]['email'].'</td>
			<td>'.$data['filtered'][$i]['industry'].'</td>
			<td>'.$data['filtered'][$i]['territory'].'</td>
			<td><a href="<?=base_url()?>sales_tracker/edit_customer/'.$data['filtered'][$i]['customer_id'].'" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			<a href="<?=base_url()?>sales_tracker/dlt_customer/'.$data['filtered'][$i]['customer_id'].'" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></a>
			</td>
			</tr>';
         }
        echo $output;
	}

	public function edit_customer()
	{
		$id = $this->uri->segment(3);
		$data['cust'] = $this->user_model->fetch_cust_by_id($id);
		$data['territory_data']=$this->user_model->display_territory();
		$data['industry_data']=$this->user_model->display_industry();
		$data['details'] = $this->session->userdata('details');
		$data['profile'] = $data['details'];
		$this->load->view('user/include/header',$data);
		$this->load->view('user/edit-customers');
		$this->load->view('user/include/footer');	
	}

	public function update_customer()
	{
		$cust = array(
			'customer_id'=>$this->input->post('cust_id'),
			'name'=>$this->input->post('name'),
			'territory'=>$this->input->post('territory'),
			'print_as'=>$this->input->post('print_as'),
			'head_office'=>$this->input->post('head_office'),
			'loc_ident'=>$this->input->post('loc_ident'),
			'industry'=>$this->input->post('industry'),
			'address'=>$this->input->post('address'),
			'lat_long'=>$this->input->post('lat').','.$this->input->post('long'),
			'phone'=>$this->input->post('phone'),
			'phone2'=>$this->input->post('phone2'),
			'phone3'=>$this->input->post('phone3'),
			'fax'=>$this->input->post('fax'),
			'fax2'=>$this->input->post('fax2'),
			'email'=>$this->input->post('email'),
			'email2'=>$this->input->post('email2'),
			'email3'=>$this->input->post('email3'),
			'website'=>$this->input->post('website')	
			);
			$data['st'] = $this->user_model->update_cust($cust);
			if($data['st'])
			{
				$this->session->set_flashdata('dlt_cust_sucs','Data updated successfully');
				redirect('sales_tracker/user_view/customers');
			}
	}

	public function dlt_customer()
	{
		$id = $this->uri->segment(3);
		$data['st'] = $this->user_model->delete_customer($id);
		if($data['st'])
		{
			$this->session->set_flashdata('dlt_cust_sucs','Customer deleted successfully!');
			redirect('sales_tracker/user_view/customers');
		}
	}

	public function attendance()
	{
		$atte = array(
			'member'=>$_POST['mem'],
			'st_dt'=>$_POST['st_dt'],
			'end_dt'=>$_POST['end_dt']
		);
		$emp_codee=$this->session->userdata('emp_code');
		$data['attend'] = $this->user_model->attendance($atte,$emp_codee);
		$output = "";
		if($data['attend'])
		{
			$len = COUNT($data['attend']);
			for($i=0;$i<$len;$i++)
			{
				$output .='<tr>
				<td>'.$data['attend'][$i]['emp_code'].'</td>
                <td>'.$data['attend'][$i]['first_name'].'</td>
                <td>'.$data['attend'][$i]['punch_in_date'].'</td>
                <td>'.$data['attend'][$i]['punch_in_time'].'</td>
                <td>'.$data['attend'][$i]['punch_in_loc'].'</td>
                <td>'.$data['attend'][$i]['punch_out_date'].'</td>
                <td>'.$data['attend'][$i]['punch_out_time'].'</td>
                <td>'.$data['attend'][$i]['punch_out_loc'].'</td>
				 <td>'.$data['attend'][$i]['time_out'].'</td>
                <td>'.$data['attend'][$i]['worked_for'].'</td>
            	</tr>';
			}
		}
		else
		{
			$output .='<tr>
                <td colspan="10">No Data available</td>
            </tr>';
		}
		echo $output;
	}

		// create xlsx
		public function attendance_report() 
		{
			$atte = array(
			'member'=>$this->uri->segment(3),
			'st_dt'=>$this->uri->segment(4),
			'end_dt'=>$this->uri->segment(5)
		);
		$emp_codee=$this->session->userdata('emp_code');
		$attend = $this->user_model->attendance($atte,$emp_codee);
		// create file name
		$fileName = 'attendance-'.time().'.xlsx';  
		// load excel library
		$this->load->library('excel');
		// $mobiledata = $this->export->mobileList();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		// set Header

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'EMP code');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Puch in Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Punch in');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Punch in Location');       
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Punch out Date');       
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Punch out');       
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Punch out Location');       
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Time out');       
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Worked for');       
		// set Row
		$rowCount = 2;
		foreach ($attend as $att) 
		{
		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $att['emp_code']);
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $att['first_name']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $att['punch_in_date']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $att['punch_in_time']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $att['punch_in_loc']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $att['punch_out_date']);
		$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $att['punch_out_time']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $att['punch_out_loc']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $att['time_out']);
		$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $att['worked_for']);
		$rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect(site_url().$fileName);              
		}

		public function monthly_attendance()
		{
			$st_dt = $_POST['st_dt'];
			$end_dt = $_POST['end_dt'];
			$st_dt2 = $st_dt;
			$end_dt2 = $end_dt;
			$attend = $this->user_model->monthly_attendance();
			$output = "";
			$output .='<thead>
            <tr>
                <th><b>Emp Code</b></th>
                <th><b>Emp Name</b></th>
                <th><b>Reporting Head</b></th>';
                while(strtotime($st_dt)<=strtotime($end_dt))
                {
                  $output .='<th><b>'.date('d M', strtotime($st_dt)).'</b></th>';
                  $st_dt = date ("Y-m-d", strtotime("+1 day", strtotime($st_dt)));
                }
         $output .='</tr>
        </thead>
        <tbody>';
			foreach($attend as $att)
        	{
				$st_dt3 = $st_dt2;
				$end_dt3 = $end_dt2;
				$output .='<tr>
                <td>'.$att['emp_code'].'</td>
                <td>'.$att['first_name'].'</td>
                <td>'.$att['report_to'].'</td>';
                while(strtotime($st_dt3)<=strtotime($end_dt3))
                {
                	$at_data = array(
                		'emp_code'=>$att['emp_code'],
                		'punch_in_date'=>$st_dt3
                	);
                	$status = $this->user_model->get_att_status($at_data);
					if($status>0)
					{
						$at_st = "P";
					}
					else
					{
						$at_st = "A";
					}
                	$output .='<td>'.$at_st.'</td>';
                	$st_dt3 = date ("Y-m-d", strtotime("+1 day", strtotime($st_dt3)));
                }
            $output .='</tr></tbody>';
           }
           echo $output;
		}
		public function monthly_attendance_report()
		{
			$st_dt = $this->uri->segment(3);
			$end_dt = $this->uri->segment(4);
			$st_dt2 = $st_dt;
			$end_dt2 = $end_dt;
			$attend = $this->user_model->monthly_attendance();
			// create file name
		$fileName = 'monthly_attendance-'.time().'.xlsx';  
		// load excel library
		$this->load->library('excel');
		// $mobiledata = $this->export->mobileList();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		$alphas = range('A', 'Z');
		$alphas2 = range('A','Z');
		array_push($alphas2,'AA','AB','AC','AD','AE','AF','AG','AH');
		$date_diff2 = strtotime($end_dt)-strtotime($st_dt);
		$date_diff = date('d',$date_diff2);
		// set Header
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'EMP code');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Reporting Head');
		// $alphas = range('A', 'Z');
		$al = 3;
		$al_ind = 1;
		$al_st = 1;
		while(strtotime($st_dt)<=strtotime($end_dt))
        {
        	if($al_st!=1)
        	{
        		$objPHPExcel->getActiveSheet()->SetCellValue($alphas[0].$alphas[$al2].'1', date('d M', strtotime($st_dt)));
        		$al2 +=1;
        	}
        	else
        	{
        		$objPHPExcel->getActiveSheet()->SetCellValue($alphas[$al].$al_ind, date('d M', strtotime($st_dt)));
        	}
        	$al +=1;
			if($alphas[$al-1].$al_ind=='Z1')
			{
				$al = 0;
				$al2 = 0;
				$al_st += 1;
			}
			$st_dt = date ("Y-m-d", strtotime("+1 day", strtotime($st_dt)));
		}       
		// set Row
		$al3 = 3;
		$al_st2 = 1;
		$rowCount = 2;
		$al4 = 0;
		foreach($attend as $att)
		{
		$st_dt3 = $st_dt2;
		$end_dt3 = $end_dt2;
		
		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $att['emp_code']);
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $att['first_name']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $att['report_to']);
		while(strtotime($st_dt3)<=strtotime($end_dt3))
                {
                	$at_data = array(
                		'emp_code'=>$att['emp_code'],
                		'punch_in_date'=>$st_dt3
                	);
                	$status = $this->user_model->get_att_status($at_data);
					if($status>0)
					{
						$at_st = "P";
					}
					else
					{
						$at_st = "A";
					}
					$objPHPExcel->getActiveSheet()->SetCellValue($alphas2[$al3] . $rowCount, $at_st);
						
                	$st_dt3 = date ("Y-m-d", strtotime("+1 day", strtotime($st_dt3)));
                	$al3+=1;
					if($alphas2[$al3-1] . ($rowCount)==$alphas2[$date_diff+2] . ($rowCount))
					{
						$al3 = 3;
						$al4 = 0;
						$al_st2 = 2;
					}
					
                }    
          $rowCount++;
		}
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect(site_url().$fileName); 
		}

		public function monthly_travel()
		{
			$travel = array(
				'member'=>$_POST['mem'],
				'st_dt'=>$_POST['st_dt'],
				'end_dt'=>$_POST['end_dt']
			);
			$emp_codee=$this->session->userdata('emp_code');
			$data['monthly_travel'] = $this->user_model->monthly_travel($travel,$emp_codee);
			$output = "";
			if($data['monthly_travel'])
			{
			$len = COUNT($data['monthly_travel']);
			for($i=0;$i<$len;$i++)
			{
			$output .='<tr>
			<td>'.$data['monthly_travel'][$i]['first_name'].'</td>
			<td>'.number_format($data['monthly_travel'][$i]['distance_kms'],4).'</td>
			<td>0</td>
			</tr>';
			}
			}
			else
			{
			$output .='<tr>
			<td colspan="3">Data not available</td>
			</tr>';
			}
			echo $output;
			}

		public function monthly_travel_report()
		{
		$travel = array(
				'member'=>$this->uri->segment(3),
				'st_dt'=>$this->uri->segment(4),
				'end_dt'=>$this->uri->segment(5)
			);
			$emp_codee=$this->session->userdata('emp_code');
			$monthly_travel = $this->user_model->monthly_travel($travel,$emp_codee);
		// create file name
		$fileName = 'monthly_travel-'.time().'.xlsx';  
		// load excel library
		$this->load->library('excel');
		// $mobiledata = $this->export->mobileList();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		// set Header

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'User');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Total Distance(kms)');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Total Visits');
		// set Row
		$rowCount = 2;
		foreach ($monthly_travel as $mon) 
		{
		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $mon['first_name']);
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, number_format($mon['distance_kms'],4));
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '0');
		$rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect(site_url().$fileName);              
		}

		public function forms_elements()
		{
			$id = $this->input->post('id');
			$data['form_elements'] = $this->user_model->form_elements($id);
			if($data['form_elements'])
			{
				$count = COUNT($data['form_elements']);
				$output = "";
				$output.='<thead>
				<tr>
				<th><b>Submitted By</b></th>
				<th><b>Submitted On</b></th>';
				for($i=0;$i<$count;$i++)
				{
					$output.='<th><b>'.$data['form_elements'][$i]['label'].'</b></th>';
				}
				$output.='</tr>
				</thead>';
				$count_elem = $this->user_model->form_elem_count($id);
				$colspan = $count_elem+2;
					$output .='<tbody  id="form_el_data"><tr><td colspan="'.$colspan.'">No data available</td></tr></tbody>';
				echo $output;
			}
			else
			{
				echo "No elements found";
			}
		}

		public function form_elem_data()
		{
			$data = array(
			'st_dt'=>$this->input->post('st_dt'),
			'end_dt'=>$this->input->post('end_dt'),
			'form_id'=>$this->input->post('form_id'),
			'mem'=>$this->input->post('mem')
			);
			$emp_codee=$this->session->userdata('emp_code');
			$data['form_data'] = $this->user_model->form_elements_data($data,$emp_codee);
			$id = $this->input->post('form_id');
			$count_elem = $this->user_model->form_elem_count($id);
			$output = "";
			if($data['form_data'])
				{
				$count_dt = COUNT($data['form_data']);
				$r_count = $count_dt/$count_elem;
				$k=0;
				for($i=0;$i<$count_dt;)
				{
					$output .='<tr><td>'.$data['form_data'][$i]['first_name'].'</td>
					<td>'.$data['form_data'][$i]['submitted_on'].'</td>';
					$j=0;
					while($j<$count_elem)
					{
						$output .='<td>'.$data['form_data'][$k]['field_value'].'</td>';
						$k++;
						$j++;
					}
					$output .='</tr>';
					$i = $i+$count_elem;
				}
				}
				else
				{
					$colspan = $count_elem+2;
					$output .='<tr><td colspan="'.$colspan.'">No data available</td></tr>';
				}
				echo $output;
		}

		public function form_elem_data2()
		{
			$data = array(
			'st_dt'=>$this->input->post('st_dt'),
			'end_dt'=>$this->input->post('end_dt'),
			'form_id'=>$this->input->post('form_id'),
			'mem'=>$this->input->post('mem')
			);
			$data['form_data'] = $this->user_model->form_elements_data2($data);
			$id = $this->input->post('form_id');
			$count_elem = $this->user_model->form_elem_count($id);
			$output = "";
			if($data['form_data'])
				{
				$count_dt = COUNT($data['form_data']);
				$r_count = $count_dt/$count_elem;
				$k=0;
				for($i=0;$i<$count_dt;)
				{
					$output .='<tr><td>'.$data['form_data'][$i]['first_name'].'</td>
					<td>'.$data['form_data'][$i]['submitted_on'].'</td>';
					$j=0;
					while($j<$count_elem)
					{
						$output .='<td>'.$data['form_data'][$k]['field_value'].'</td>';
						$k++;
						$j++;
					}
					$output .='</tr>';
					$i = $i+$count_elem;
				}
				}
				else
				{
					$colspan = $count_elem+2;
					$output .='<tr><td colspan="'.$colspan.'">No data available</td></tr>';
				}
				echo $output;
		}
		public function form_data_report()
		{
			$data = array(
			'st_dt'=>$this->uri->segment(3),
			'end_dt'=>$this->uri->segment(4),
			'form_id'=>$this->uri->segment(5),
			'mem'=>$this->uri->segment(6)
			);
			$id = $this->uri->segment(5);
			$emp_codee=$this->session->userdata('emp_code');
			$data['form_elements'] = $this->user_model->form_elements($id);
			$count = COUNT($data['form_elements']);
			$data['form_data'] = $this->user_model->form_elements_data($data,$emp_codee);
			$count_elem = $this->user_model->form_elem_count($id);
			$alphas = range('A', 'Z');
			$fileName = 'form_data-'.time().'.xlsx';  
		// load excel library
		$this->load->library('excel');
		// $mobiledata = $this->export->mobileList();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		// set Header
		$alp = 2;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Submitted By');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Submitted On');
		for($i=0;$i<$count;$i++)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue($alphas[$alp].'1', $data['form_elements'][$i]['label']);
			$alp++;
		}
		// set Row
		$rowCount = 2;
		$count_dt = COUNT($data['form_data']);
		$r_count = $count_dt/$count_elem;
		$k=0;
		for($i=0;$i<$count_dt;)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $data['form_data'][$i]['first_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $data['form_data'][$i]['submitted_on']);
			$j=0;
			$alp2 = 2;
			while($j<$count_elem)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue($alphas[$alp2] . $rowCount, $data['form_data'][$k]['field_value']);
			$k++;
			$j++;
			$alp2++;
			}
			$rowCount++;
			$i = $i+$count_elem;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect(site_url().$fileName);
		}

		public function form_data_report2()
		{
			$data = array(
			'st_dt'=>$this->uri->segment(3),
			'end_dt'=>$this->uri->segment(4),
			'form_id'=>$this->uri->segment(5),
			'mem'=>$this->uri->segment(6)
			);
			$id = $this->uri->segment(5);
			$data['form_elements'] = $this->user_model->form_elements($id);
			$count = COUNT($data['form_elements']);
			$data['form_data'] = $this->user_model->form_elements_data2($data);
			$count_elem = $this->user_model->form_elem_count($id);
			$alphas = range('A', 'Z');
			$fileName = 'form_data-'.time().'.xlsx';  
		// load excel library
		$this->load->library('excel');
		// $mobiledata = $this->export->mobileList();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		// set Header
		$alp = 2;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Submitted By');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Submitted On');
		for($i=0;$i<$count;$i++)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue($alphas[$alp].'1', $data['form_elements'][$i]['label']);
			$alp++;
		}
		// set Row
		$rowCount = 2;
		$count_dt = COUNT($data['form_data']);
		$r_count = $count_dt/$count_elem;
		$k=0;
		for($i=0;$i<$count_dt;)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $data['form_data'][$i]['first_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $data['form_data'][$i]['submitted_on']);
			$j=0;
			$alp2 = 2;
			while($j<$count_elem)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue($alphas[$alp2] . $rowCount, $data['form_data'][$k]['field_value']);
			$k++;
			$j++;
			$alp2++;
			}
			$rowCount++;
			$i = $i+$count_elem;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect(site_url().$fileName);
		}

		public function report_travel_userr()
		{
		$output="";
		$select_travel = $this->input->post('select_travel');
		$travel_date = $this->input->post('travel_date');
		$data=$this->user_model->report_travel_modell($select_travel,$travel_date);
		$output.=
		$i=0;
		foreach ($data as $users_dataaam) 
		{
		$i++;
		$output .='<tr>
		<td>'. $i.'</td>
		<td>'.$users_dataaam['time'].'</td>
		<td>'.$users_dataaam['location'].'</td>
		<td>'.$users_dataaam['lat'].'</td>
		<td>'.$users_dataaam['lon'].'</td>
		<td>'.$users_dataaam['distance_kms'].'</td>
		<td>'.$users_dataaam['battery_per'].'</td>
		<td>'.$users_dataaam['gps'].'</td>
		<td>'.$users_dataaam['connectivity'].'</td>
		<td>'.$users_dataaam['app_version'].'</td>
		<td>'.$users_dataaam['mobile_os_version'].'</td>
		<td>'.$users_dataaam['device_name'].'</td>
		<td>'.$users_dataaam['mock_location'].'</td>
		</tr>';
		}
		echo $output;
		}

		public function attend_user()
		{
		$output="";
		$attend_from = $this->input->post('attend_from');
		$attend_to = $this->input->post('attend_to');
		$data=$this->user_model->attend_user_model($attend_from,$attend_to);
		$output.=
		$i=0;
		if($data)
		{
		foreach ($data as $users_dataaam) 
		{
			$i++;
			$output .='<tr>
			<td>'. $i.'</td>
			<td>'.$users_dataaam['emp_code'].'</td>
			<td>'.$users_dataaam['emp_code'].'</td>
			<td>'.$users_dataaam['punch_in_date'].'</td>
			<td>'.$users_dataaam['punch_in_time'].'</td>
			<td>'.$users_dataaam['punch_in_loc'].'</td>
			<td>'.$users_dataaam['punch_out_date'].'</td>
			<td>'.$users_dataaam['punch_out_time'].'</td>
			<td>'.$users_dataaam['punch_out_loc'].'</td>
			<td>'.$users_dataaam['time_out'].'</td>
			<td>'.$users_dataaam['worked_for'].'</td>
			</tr>';
			}
		}
		else
		{
			$output .='<tr><td colspan="11">No data available</td></tr>';
		}
		echo $output;
		}

		public function fetch_messages()
		{
			$sender = $this->session->userdata('emp_code');
			$receiver = $this->input->post('emp_code');
			$sta = $this->input->post('sta');
			// echo "sender : ".$sender." receiver : ".$receiver;
			$msgs = $this->user_model->fetch_messages($sender,$receiver);
			$output = "";
			if($msgs)
			{
				foreach ($msgs as $msg) {
				if($msg['sender'] ==$sender)
				{
					$sta2 = "avatar-online";
				}
				else
				{
					$sta2 = $sta;
				}
				$output .='<div class="chat-group-divider"></div>
				<div class="media">
				<div class="avatar avatar-sm '.$sta2.'"><img src="'.base_url().'img/'.$msg['sender_img'].'" class="rounded-circle" alt=""></div>
				<div class="media-body">
				<h6>'.$msg['sender_name'].'&nbsp;<small>'.$msg['msg_date'].'</small></h6>
				<p>'.$msg['msgs'].'</p>
				</div>
				</div>';
				}
			}
			echo $output;
		}

		public function send_messages()
		{
			$data = array(
					'sender' => $this->session->userdata('emp_code'),
					'receiver' => $this->input->post('receiver'),
					'msg' => $this->input->post('msg')
			);
			$data['st'] = $this->user_model->send_messages($data);
			print_r($data['st']);
		}
	// user panel end
	// neeraj 3rd code end
}

// SELECT DATEDIFF(CURDATE(), punch_in_date) AS days FROM attendance
// SELECT emp_code, MAX(punch_in_date), DATEDIFF(CURDATE(),punch_in_date) FROM attendance GROUP BY emp_code DESC
// SELECT emp_code, last_punch_in, DATEDIFF(CURDATE(),last_punch_in) FROM login_master WHERE DATEDIFF(CURDATE(),last_punch_in)>3 || DATEDIFF(CURDATE(),last_punch_in) IS NULL

// select msg.*, u1.first_name as sender_name,u2.first_name as receiver_name from messages as msg join login_master u1 on u1.emp_code = msg.sender join login_master u2 on u2.emp_code = msg.receiver where (msg.sender='pd003' and msg.receiver='jp001') || (msg.sender='jp001' and msg.receiver='pd003')

// select lgn.*,MAX(att.punch_in_date) from login_master as lgn left join attendance as att ON lgn.emp_code=att.emp_code where lgn.emp_code NOT IN ('pd003') group by lgn.emp_code DESC