<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->model('General_model');

		if ($this->session->userdata('role') != '') {
			$this->load->model('Login_model', 'LM');
			$this->load->library('session');
			ini_set('post_max_size', '110M');
			ini_set('upload_max_filesize', '100M');
			date_default_timezone_set("Asia/Karachi");
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AuthController');
		}
	}



	public function index()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		// $data['role_name'] ="IT Staff";
		$data['page'] = 'AdminDashboard/dashboard';
		$this->load->view('AdminDashboard/includes/header');



		$role_type = $this->session->userdata('role');
		$branch_id = $this->session->userdata('branch_id');
		$user_id = $this->session->userdata('id');

		if (($role_type == 1) && ($branch_id == 0)) {
			$data['getTotalCases'] = $this->General_model->getAllcases();
			$data['getPendingCases'] = $this->General_model->getPendingCases();
			$data['getdecidedCases'] = $this->General_model->getdecidedCases();
		} else {
			$data['getTotalCases'] = $this->General_model->getAllcases_user($branch_id);
			$data['getPendingCases'] = $this->General_model->getPendingCases_user($branch_id);
			$data['getdecidedCases'] = $this->General_model->getdecidedCases_user($branch_id);
		}

		$this->load->view('AdminDashboard/includes/template_view', $data);
		//$this->load->view('AdminDashboard/includes/footer');
	}



	public function add_user()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$tblname1 = "role";
			$data['list_role'] = $this->General_model->get_alldata($tblname1);

			$tblname2 = "branch";
			$data['list_branch'] = $this->General_model->get_alldata($tblname2);


			$data['page'] = 'AdminDashboard/add_user';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function add_users()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$formArray = array();
			$formArray['name'] = $this->input->post("name");
			$formArray['email']  = $this->input->post("email");
			$formArray['password']  = md5($this->input->post("password"));
			$formArray['role_id']  = $this->input->post("role_id");
			$formArray['status']  = $this->input->post("status");
			$formArray['branch_id']  = $this->input->post("branch_id");
			$formArray['add_date'] = date("Y-m-d");
			$formArray['status'] = 1;
			$tblname = "users";
			$this->General_model->add_data($tblname, $formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully..!');
			redirect(base_url('AdminDashboard/list_user'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}






	public function list_user()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "users";
			$data['list_users'] = $this->General_model->get_alldata($tblname);

			$data['page'] = 'AdminDashboard/list_user';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	public function deleteusers()
	{

		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$recordid = $this->uri->segment(3);
			$tblname = "users";
			$this->General_model->delete_data($tblname, $recordid);
			$this->session->set_flashdata('success', 'Record Deleted Successfully..!');
			redirect(base_url('AdminDashboard/list_user'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}





	////////////////////////////////// --- Add Departments -----////////////////////////



	public function add_department()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$data['page'] = 'AdminDashboard/add_department';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}


	public function add_departments()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$formArray = array();
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$formArray['add_date'] = date("Y-m-d");
			$formArray['status'] = 1;

			$tblname = "department";
			$this->General_model->add_data($tblname, $formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully..!');
			redirect(base_url('AdminDashboard/list_department'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}


	public function list_department()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "department";
			$data['list_department'] = $this->General_model->get_alldata($tblname);
			$data['page'] = 'AdminDashboard/list_department';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}


	public function deletedepartments()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$recordid = $this->uri->segment(3);
			$tblname = "department";
			$this->General_model->delete_data($tblname, $recordid);
			$this->session->set_flashdata('success', 'Record Deleted Successfully..!');
			redirect(base_url('AdminDashboard/list_department'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}





	////////////////////////////////// --- Add branches -----////////////////////////



	public function add_branch()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$data['page'] = 'AdminDashboard/add_branch';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function add_branches()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$formArray = array();
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$formArray['add_date'] = date("Y-m-d");
			$formArray['status'] = 1;
			$tblname = "branch";
			$this->General_model->add_data($tblname, $formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully..!');
			redirect(base_url('AdminDashboard/list_branch'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function list_branch()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "branch";
			$data['list_branch'] = $this->General_model->get_alldata($tblname);

			$data['page'] = 'AdminDashboard/list_branch';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function deletebranches()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$recordid = $this->uri->segment(3);
			$tblname = "branch";
			$this->General_model->delete_data($tblname, $recordid);
			$this->session->set_flashdata('success', 'Record Deleted Successfully..!');
			redirect(base_url('AdminDashboard/list_branch'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}





	////////////////////////////////// --- Add Courts -----////////////////////////



	public function add_court()
	{
		$data['role_name'] = $this->General_model->GetRoleName();


		if ($this->session->userdata('role') == 1 * 1) {
			$data['page'] = 'AdminDashboard/add_court';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function add_courts()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$formArray = array();
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$formArray['add_date'] = date("Y-m-d");
			$formArray['status'] = 1;
			$tblname = "court";
			$this->General_model->add_data($tblname, $formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully..!');
			redirect(base_url('AdminDashboard/list_court'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function list_court()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "court";
			$data['list_court'] = $this->General_model->get_alldata($tblname);
			$data['page'] = 'AdminDashboard/list_court';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function deletecourts()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$recordid = $this->uri->segment(3);
			$tblname = "court";
			$this->General_model->delete_data($tblname, $recordid);
			$this->session->set_flashdata('success', 'Record Deleted Successfully..!');
			redirect(base_url('AdminDashboard/list_court'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	//////////////////////////Start Profile /////////////////////////
	public function profile()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$data['page'] = 'AdminDashboard/profile';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}


	///////////////////////// search///////////////////////
	public function search()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$tblname = "department";
		$data['getdepartments'] = $this->General_model->get_alldata($tblname);

		$tblname = "court";
		$data['getcourts'] = $this->General_model->get_alldata($tblname);

		$tblname = "branch";
		$data['getbranches'] = $this->General_model->get_alldata($tblname);

		$tblname = "case_categories";
		$data['getCategories'] = $this->General_model->get_alldata($tblname);

		$role_id = 4;
		$data['getusers'] = $this->General_model->get_users($role_id);

		$data['getCases'] = $this->General_model->get_allCases();
		$data['getSearchCases'] = array();

		$data['page'] = 'AdminDashboard/search';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}


	public function search_case()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;

		$case_no = $this->input->post('case_no');
		$title = $this->input->post('title');
		$case_category_id = $this->input->post('case_category_id');
		$branch_id = $this->input->post('branch_id');
		$department_id = $this->input->post('department_id');
		$law_officer_id = $this->input->post('law_officer_id');
		$court_id = $this->input->post('court_id');
		$year = $this->input->post('year');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		$data_search = array(
			'case_no' => $case_no,
			'title' => $title,
			'case_category_id' => $case_category_id,
			'branch_id' => $branch_id,
			'department_id' => $department_id,
			'law_officer_id' => $law_officer_id,
			'court_id' => $court_id,
			'year' => $year,
			'start_date' => $start_date,
			'end_date' => $end_date
		);
		$data['role_name'] = $this->General_model->GetRoleName();
		$tblname = "department";
		$data['getdepartments'] = $this->General_model->get_alldata($tblname);

		$tblname = "court";
		$data['getcourts'] = $this->General_model->get_alldata($tblname);

		$tblname = "branch";
		$data['getbranches'] = $this->General_model->get_alldata($tblname);

		$tblname = "case_categories";
		$data['getCategories'] = $this->General_model->get_alldata($tblname);

		$role_id = 4;
		$data['getusers'] = $this->General_model->get_users($role_id);

		$data['getCases'] = $this->General_model->get_allCases();

		$data['getSearchCases'] = $this->General_model->search_cases($data_search);

		$data['page'] = 'AdminDashboard/search';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	////////////////////////// Case ////////////////////////

	public function add_case()
	{
		$data['role_name'] = $this->General_model->GetRoleName();

		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$tblname = "department";
		$data['getdepartments'] = $this->General_model->get_alldata($tblname);

		$tblname = "court";
		$data['getcourts'] = $this->General_model->get_alldata($tblname);

		$tblname = "branch";
		$data['getbranches'] = $this->General_model->get_alldata($tblname);

		$tblname = "case_categories";
		$data['getCategories'] = $this->General_model->get_alldata($tblname);

		$data['getCases'] = $this->General_model->get_allCases();

		$data['page'] = 'AdminDashboard/add_case';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}




	public function add_cases()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$formArray = array();

		$formArray['branch_id']  = $this->input->post("branch_id");
		$formArray['case_cateid']  = $this->input->post("case_cateid");
		$formArray['case_no'] = $this->input->post("case_no");
		$formArray['title'] = $this->input->post("title");
		$formArray['stateorgovt'] = $this->input->post("stateorgovt");
		$formArray['petitioner_advocate'] = $this->input->post("petitioner_advocate");
		$formArray['respondent']  = $this->input->post("respondent");
		$formArray['advocate_respondent']  = $this->input->post("advocate_respondent");

		$formArray['focalperson'] = $this->input->post("focalperson");
		$formArray['court_id'] = $this->input->post("court_id");
		$formArray['Filling_date']  = $this->input->post("Filling_date");
		$formArray['year']  = $this->input->post("year");

		$government_petitioner = $this->input->post("government_petitioner");


		if (empty($government_petitioner)) {
			$formArray['government_petitioner']  = "No";
		} else if (!empty($government_petitioner)) {
			$formArray['government_petitioner']  = "Yes";
		}


		$formArray['status']  = $this->input->post("status");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$formArray['added_by']  = $this->session->userdata('id');
		$formArray['role_type']  = $this->session->userdata('role');


		$mainWp_case_no = $this->input->post("mainWp_case_no");
		$mainYear = $this->input->post("mainYear");

		if (!empty($mainWp_case_no) && !empty($mainYear)) {
			$this->db->select("*");
			$this->db->from("manage_cases");
			$this->db->where("case_no", $this->input->post("mainWp_case_no"));
			$this->db->where("year", $this->input->post("mainYear"));
			$query = $this->db->get();
			$user = $query->row();
			$linked_case_id = $user->id;


			if ($query->num_rows() > 0) {
				$formArray['linked_case_id'] = $linked_case_id;
			} else {
				$this->session->set_flashdata('error', 'Main Case Record Not Found.');
				redirect(base_url('AdminDashboard/add_case'));
				exit;
			}
		}


		$tblname = "manage_cases";
		$last_id = $this->General_model->add_data($tblname, $formArray);

		foreach ($_POST['department_id'] as $getDepartments) {

			$getDepartmentsqry = $this->db->select('*')->from('department')
				->where('id', $getDepartments)->where('status', 1)->get();
			$getDeptName = $getDepartmentsqry->row('title');

			$formArrays['case_id'] = $last_id;
			$formArrays['department_id'] = $getDepartments;
			$formArrays['department_name'] = $getDeptName;

			$this->General_model->add_data("case_department", $formArrays);
		}


		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(base_url('AdminDashboard/list_case'));
		exit;
	}


	public function list_case()
	{
		$data['role_name'] = $this->General_model->GetRoleName();


		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$data['getCases'] = $this->General_model->get_allCases();

		$data['page'] = 'AdminDashboard/list_case';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function add_hearing()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3);


		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);



		$docstype = "hearing_documents";
		$data['gethearing_docs'] = $this->General_model->get_caseDocs($caseid, $docstype);




		$tblnames = "users";
		$data['Lawofficers'] = $this->General_model->getLawofficers($tblnames);

		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid, $docstype);

		$data['page'] = 'AdminDashboard/add_hearing';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}




	public function submit_add_hearing()
	{

		$data['role_name'] = $this->General_model->GetRoleName();
		$caseid = $this->input->post("case_id");

		$data['case_info'] = $this->General_model->getSelectedData("manage_cases", $caseid);



		$tblname = "manage_cases_docs";

		$formArray['case_id'] = $this->input->post("case_id");
		$formArray['docsname'] = "Order Sheet";
		$formArray['docs_date'] = $this->input->post("hearing_date");


		$formArray['hearing_date'] = $this->input->post("hearing_date");
		$formArray['next_hearing_date'] = $this->input->post("next_hearing_date");
		$formArray['remarks'] = $this->input->post("remarks");

		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;

		$formArray['docstype'] = "hearing_documents";

		$path = $_FILES['docs_file']['name'];
		$file_extension = pathinfo($path, PATHINFO_EXTENSION);

		$config['upload_path'] = 'assets/casedocs/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
		$config['file_name'] = date('ymdghsi') . $_FILES["docs_file"]['name'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;

		$lastid = $this->General_model->add_hearing_data($tblname, $formArray);


		$formArrays['case_id'] = $this->input->post("case_id");
		$formArrays['hearing_id'] = $lastid;

		$formArrays['add_date'] = date("Y-m-d");


		foreach ($_POST['lawOfficers'] as $getOfficers) {

			$getLawofficerqry = $this->db->select('*')->from('users')
				->where('role_id', 4)->where('id', $getOfficers)->where('status', 1)->get();
			$getOfficerName = $getLawofficerqry->row('name');

			$formArrays['law_officer_id'] = $getOfficers;
			$formArrays['officer_name'] = $getOfficerName;

			$this->General_model->add_data("hearing_lawofficers", $formArrays);
		}




		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(site_url() . 'AdminDashboard/case_view/' . $caseid);

		//$data['page']='AdminDashboard/add_documents';
		//$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');



	}



	public function list_hearing()
	{
		$data['role_name'] = $this->General_model->GetRoleName();


		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;





		$data['page'] = 'AdminDashboard/list_hearing';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function link_case()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		//$data['getLinkCases'] = $this->General_model->getLinkCases();
		$tblname = "manage_linked_cases";
		$data['getCases'] = $this->General_model->get_allCases();
		$data['getLinkCases'] = $this->General_model->get_alldata($tblname);

		$data['page'] = 'AdminDashboard/link_case';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}



	public function submit_link_cases()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$formArray = array();
		$formArray['coc_case_id'] = $this->input->post("coc_case_id");
		$formArray['previous_case_id']  = $this->input->post("previous_case_id");

		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$formArray['added_by']  = $this->session->userdata('id');
		$formArray['role_type']  = $this->session->userdata('role');

		$tblname = "manage_linked_cases";
		$this->General_model->add_data($tblname, $formArray);
		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(base_url('AdminDashboard/link_case'));
		exit;
	}



	public function case_view()
	{

		$data['role_name'] = $this->General_model->GetRoleName();
		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$tblnames = "decision_types";
		$data['getDecions'] = $this->General_model->get_alldata($tblnames);

		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3);

		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);
		$tblnames = "users";
		$data['Lawofficers'] = $this->General_model->getLawofficers($tblnames);
		$caseid = $this->uri->segment(3);

		$tblname = "manage_cases";
		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);


		$docstype = "hearing_documents";
		$data['gethearing_docs'] = $this->General_model->get_caseDocs($caseid, $docstype);

		$docstype = "case_documents";
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid, $docstype);

		$docstype = "case_departments";
		$data['getcase_dept'] = $this->General_model->get_caseDept($caseid, $tblname);

		$docstype = "decision_documents";
		$data['decision_info'] = $this->General_model->getCaseDecision($caseid, $docstype);



		$data['page'] = 'AdminDashboard/case_view';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}


	///////////////////////// Case Decision //////////////////////

	public function add_case_decision()
	{
		$data['role_name'] = $this->General_model->GetRoleName();


		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$caseid = $this->uri->segment(3);
		$tblname = "manage_cases";
		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);
		$tblnames = "decision_types";
		$data['getDecions'] = $this->General_model->get_alldata($tblnames);
		$data['page'] = 'AdminDashboard/add_decision';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}


	public function submit_decision()
	{
		$data['condition'] = 'decision';

		$data['role_name'] = $this->General_model->GetRoleName();
		$caseid = $this->input->post("case_id");

		$data['case_info'] = $this->General_model->getSelectedData("manage_cases", $caseid);

		$tblname = "manage_cases_docs";
		$formArray['case_id'] = $this->input->post("case_id");
		$formArray['case_decision'] = $this->input->post("case_decision");
		$formArray['remarks'] = $this->input->post("remarks");
		$formArray['decision_date'] = $this->input->post("decision_date");
		$formArray['docsname'] = "Judgment";
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;

		$formArray['docstype'] = "decision_documents";

		$path = $_FILES['docs_file']['name'];
		$file_extension = pathinfo($path, PATHINFO_EXTENSION);

		$config['upload_path'] = 'assets/casedocs/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
		$config['file_name'] = date('ymdghsi') . $_FILES["docs_file"]['name'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;

		$this->General_model->add_data($tblname, $formArray);


		$tblnames = "manage_cases";
		$formArrayUpdate = array();
		$formArrayUpdate['decision_status'] = 1;
		$this->General_model->update_data($tblnames, $formArrayUpdate, $caseid);

		$case_id = $this->input->post("case_id");

		$this->session->set_flashdata('success', 'Decision Added Successfully..!');
		redirect(site_url() . 'AdminDashboard/case_view/' . $case_id);

		//$data['page']='AdminDashboard/add_documents';
		//$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');
	}

	public function edit_case_decision()
	{
		$data['role_name'] = $this->General_model->GetRoleName();


		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$caseid = $this->uri->segment(3);
		$tblname = "manage_cases";
		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);

		$data['case_decision_info'] = $this->General_model->getSelectedDecisionData($caseid);

		$tblnames = "decision_types";
		$data['getDecions'] = $this->General_model->get_alldata($tblnames);
		$data['page'] = 'AdminDashboard/edit_decision';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function submit_edit_decision()
	{

		$data['role_name'] = $this->General_model->GetRoleName();
		$caseid = $this->input->post("case_id");
		$decision_id = $this->uri->segment(3);
		$data['case_info'] = $this->General_model->getSelectedData("manage_cases", $caseid);

		$tblname = "manage_cases_docs";
		$formArray['case_decision'] = $this->input->post("case_decision");
		$formArray['remarks'] = $this->input->post("remarks");
		$formArray['decision_date'] = $this->input->post("decision_date");
		$formArray['docsname'] = "Judgment";
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;

		$formArray['docstype'] = "decision_documents";

		$path = $_FILES['docs_file']['name'];
		$file_extension = pathinfo($path, PATHINFO_EXTENSION);

		$config['upload_path'] = 'assets/casedocs/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
		$config['file_name'] = date('ymdghsi') . $_FILES["docs_file"]['name'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;

		$this->General_model->update_data($tblname, $formArray, $decision_id);

		$this->session->set_flashdata('success', 'Decision Edited Successfully..!');
		redirect(site_url() . 'AdminDashboard/list_case/');

		//$data['page']='AdminDashboard/add_documents';
		//$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');
	}





	public function add_decision_types()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$formArray = array();
			$formArray['title'] = $this->input->post("title");
			$formArray['description'] = $this->input->post("description");
			$formArray['add_date'] = date("Y-m-d");
			$formArray['status'] = 1;
			$tblname = "decision_types";
			$this->General_model->add_data($tblname, $formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully..!');
			redirect(base_url('AdminDashboard/list_decision_type'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	public function add_case_documents()
	{
		$data['role_name'] = $this->General_model->GetRoleName();

		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;

		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3);

		$docstype = "case_documents";
		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid, $docstype);


		$data['page'] = 'AdminDashboard/add_documents';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}



	public function submit_case_documents()
	{
		$data['condition'] = 'decision';
		$data['role_name'] = $this->General_model->GetRoleName();
		$caseid = $this->input->post("case_id");

		$data['case_info'] = $this->General_model->getSelectedData("manage_cases", $caseid);

		$tblname = "manage_cases_docs";
		$formArray['case_id'] = $this->input->post("case_id");
		$formArray['docsname'] = $this->input->post("docsname");
		$formArray['docs_date'] = $this->input->post("docs_date");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;

		$formArray['docstype'] = "case_documents";

		$path = $_FILES['docs_file']['name'];
		$file_extension = pathinfo($path, PATHINFO_EXTENSION);

		$config['upload_path'] = 'assets/casedocs/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
		$config['file_name'] = date('ymdghsi') . $_FILES["docs_file"]['name'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;

		$this->General_model->add_data($tblname, $formArray);

		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(site_url() . 'AdminDashboard/case_view/' . $caseid);

		//$data['page']='AdminDashboard/add_documents';
		//$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');
	}









	public function list_case_documents()
	{
		$data['role_name'] = $this->General_model->GetRoleName();

		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;




		$data['page'] = 'AdminDashboard/list_documents';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}



	/////////////////////////// Decision Type
	public function add_decision_type()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$data['page'] = 'AdminDashboard/add_decision_type';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function list_decision_type()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "decision_types";
			$data['getDecisions'] = $this->General_model->get_alldata($tblname);
			$data['page'] = 'AdminDashboard/list_decision';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function deletedecisions()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$recordid = $this->uri->segment(3);
			$tblname = "decision_types";
			$this->General_model->delete_data($tblname, $recordid);
			$this->session->set_flashdata('success', 'Record Deleted Successfully..!');
			redirect(base_url('AdminDashboard/list_decision_type'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	//////////////////////////////////////////////////////////////

	public function add_case_category()
	{

		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "branch";
			$data['branches'] = $this->General_model->get_alldata($tblname);

			$data['page'] = 'AdminDashboard/add_case_category';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function submit_case_category()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$formArray = array();
			$formArray['title'] = $this->input->post("title");
			$formArray['description'] = $this->input->post("description");
			$formArray['branch_id'] = $this->input->post("branch_id");

			$formArray['add_date'] = date("Y-m-d");
			$formArray['status'] = 1;
			$tblname = "case_categories";
			$this->General_model->add_data($tblname, $formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully..!');
			redirect(base_url('AdminDashboard/list_case_categories'));
			exit;
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function list_case_categories()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname = "case_categories";
			$data['list_case_categories'] = $this->General_model->get_case_categories();
			$data['page'] = 'AdminDashboard/list_case_categories';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}

	public function delete_case_categories()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role' == 1 * 1)) {
			$recordid = $this->uri->segment(3);
			$tblname = "case_categories";
			$this->General_model->delete_data($tblname, $recordid);
			$this->session->set_flashdata('success', 'Record Deleted Successfully..!');
			redirect(base_url('AdminDashboard/list_case_categories'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	/* ---------------------------- Update Working -------------*/


	public function edit_branch()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "branch";
			$recordid = $this->uri->segment(3);
			$data['getbranch'] = $this->General_model->getSelectedData($tblname, $recordid);
			$data['page'] = 'AdminDashboard/edit_branch';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function update_branches()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "branch";
			$formArray = array();
			$branchid = $this->input->post("branchid");
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$this->General_model->update_data($tblname, $formArray, $branchid);
			$this->session->set_flashdata('success', "Record Updated Successfully.");
			redirect(base_url('AdminDashboard/list_branch'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function edit_department()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "department";
			$recordid = $this->uri->segment(3);
			$data['getdept'] = $this->General_model->getSelectedData($tblname, $recordid);
			$data['page'] = 'AdminDashboard/edit_department';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function update_department()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "department";
			$formArray = array();
			$deptid = $this->input->post("deptid");
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$this->General_model->update_data($tblname, $formArray, $deptid);
			$this->session->set_flashdata('success', "Record Updated Successfully.");
			redirect(base_url('AdminDashboard/list_department'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	public function edit_court()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "court";
			$recordid = $this->uri->segment(3);
			$data['getcourt'] = $this->General_model->getSelectedData($tblname, $recordid);
			$data['page'] = 'AdminDashboard/edit_court';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	public function update_courts()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "court";
			$formArray = array();
			$courtid = $this->input->post("courtid");
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$this->General_model->update_data($tblname, $formArray, $courtid);
			$this->session->set_flashdata('success', "Record Updated Successfully.");
			redirect(base_url('AdminDashboard/list_court'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	public function edit_decision_type()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "decision_types";
			$recordid = $this->uri->segment(3);
			$data['getdecision'] = $this->General_model->getSelectedData($tblname, $recordid);
			$data['page'] = 'AdminDashboard/edit_decision_type';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}



	public function update_Decision_type()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "decision_types";
			$formArray = array();
			$decisionid = $this->input->post("decisionid");
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");
			$this->General_model->update_data($tblname, $formArray, $decisionid);
			$this->session->set_flashdata('success', "Record Updated Successfully.");
			redirect(base_url('AdminDashboard/list_decision_type'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}






	public function edit_case_category()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {

			$tblname = "branch";
			$data['branches'] = $this->General_model->get_alldata($tblname);
			$data['role_name'] = $this->General_model->GetRoleName();
			$tblnames = "case_categories";
			$recordid = $this->uri->segment(3);
			$data['getCasecategory'] = $this->General_model->getSelectedData($tblnames, $recordid);
			$data['page'] = 'AdminDashboard/edit_case_category';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}


	public function update_case_categories()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$data['role_name'] = $this->General_model->GetRoleName();
			$tblname = "case_categories";
			$formArray = array();

			$casecatid = $this->input->post("casecatid");
			$formArray['branch_id'] = $this->input->post("branch_id");
			$formArray['title'] = $this->input->post("title");
			$formArray['description']  = $this->input->post("description");

			$this->General_model->update_data($tblname, $formArray, $casecatid);
			$this->session->set_flashdata('success', "Record Updated Successfully.");
			redirect(base_url('AdminDashboard/list_case_categories'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}




	public function edit_user()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$tblname1 = "role";
			$data['list_role'] = $this->General_model->get_alldata($tblname1);

			$tblname2 = "branch";
			$data['list_branch'] = $this->General_model->get_alldata($tblname2);

			$tblname = "users";
			$data['role_name'] = $this->General_model->GetRoleName();
			$recordid = $this->uri->segment(3);
			$data['getUserdata'] = $this->General_model->getSelectedData($tblname, $recordid);
			$data['page'] = 'AdminDashboard/edit_user';
			$this->load->view('AdminDashboard/includes/header');
			$this->load->view('AdminDashboard/includes/template_view', $data);
			$this->load->view('AdminDashboard/includes/footer');
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}


	public function update_users()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		if ($this->session->userdata('role') == 1 * 1) {
			$data['role_name'] = $this->General_model->GetRoleName();

			$tblname = "users";
			$usersid = $this->input->post("usersid");
			$formArray = array();
			$formArray['name'] = $this->input->post("name");
			$formArray['email']  = $this->input->post("email");
			$formArray['password']  = md5($this->input->post("password"));
			$formArray['role_id']  = $this->input->post("role_id");
			$formArray['status']  = $this->input->post("status");
			$formArray['branch_id']  = $this->input->post("branch_id");

			$this->General_model->update_data($tblname, $formArray, $usersid);
			$this->session->set_flashdata('success', "Record Updated Successfully.");
			redirect(base_url('AdminDashboard/list_user'));
		} else {
			$this->session->set_flashdata('error', "<span class='text-danger'>Invalid access!</span>");
			return redirect('AdminDashboard/index');
		}
	}


	public function edit_case()
	{
		$recordid = $this->uri->segment(3);

		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;

		$data['role_name'] = $this->General_model->GetRoleName();

		$tblname = "department";
		$data['getdepartments'] = $this->General_model->get_alldata($tblname);


		$tblname = "court";
		$data['getcourts'] = $this->General_model->get_alldata($tblname);

		$tblname = "branch";
		$data['getbranches'] = $this->General_model->get_alldata($tblname);

		$tblname = "case_categories";
		$data['getCategories'] = $this->General_model->get_alldata($tblname);

		$tblnameCase = "case_department";
		$data['getCasedepartments'] = $this->General_model->get_caseDept($recordid, $tblname);
		$data['getCases'] = $this->General_model->get_allCases();

		$tblnames = "manage_cases";
		$data['getCasedata'] = $this->General_model->getSelectedData($tblnames, $recordid);
		$data['page'] = 'AdminDashboard/edit_case';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}



	public function update_cases()
	{
		$data['role_name'] = $this->General_model->GetRoleName();

		$tblname = "manage_cases";
		$caseid = $this->input->post("caseid");

		$formArray = array();

		$formArray['branch_id']  = $this->input->post("branch_id");
		$formArray['case_cateid']  = $this->input->post("case_cateid");
		$formArray['case_no'] = $this->input->post("case_no");
		$formArray['title'] = $this->input->post("title");
		$formArray['stateorgovt'] = $this->input->post("stateorgovt");
		$formArray['petitioner_advocate'] = $this->input->post("petitioner_advocate");
		$formArray['respondent']  = $this->input->post("respondent");
		$formArray['advocate_respondent']  = $this->input->post("advocate_respondent");

		$formArray['focalperson'] = $this->input->post("focalperson");
		$formArray['court_id'] = $this->input->post("court_id");
		$formArray['Filling_date']  = $this->input->post("Filling_date");
		$formArray['year']  = $this->input->post("year");
		$formArray['linked_case_id'] = $this->input->post("linked_case_id");


		if (empty($government_petitioner)) {
			$formArray['government_petitioner']  = "No";
		} else if (!empty($government_petitioner)) {
			$formArray['government_petitioner']  = "Yes";
		}

		$this->General_model->update_data($tblname, $formArray, $caseid);
		$this->General_model->delete_case_dept('case_department', $caseid);
		foreach ($_POST['department_id'] as $getDepartments) {

			$getDepartmentsqry = $this->db->select('*')->from('department')
				->where('id', $getDepartments)->where('status', 1)->get();
			$getDeptName = $getDepartmentsqry->row('title');

			$formArrays['case_id'] = $caseid;
			$formArrays['department_id'] = $getDepartments;
			$formArrays['department_name'] = $getDeptName;

			$this->General_model->add_data("case_department", $formArrays);
		}
		$this->session->set_flashdata('success', "Record Updated Successfully.");
		redirect(base_url('AdminDashboard/list_case'));
	}



	public function edit_case_documents()
	{

		$data['role_name'] = $this->General_model->GetRoleName();
		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;

		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3);
		$docsid = $this->uri->segment(4);

		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);

		$data['page'] = 'AdminDashboard/edit_documents';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}


	public function update_case_docs()
	{

		$tblname = "manage_cases_docs";
		$formArray = array();
		$case_id = $this->input->post("case_id");
		$docs_id = $this->input->post("docs_id");

		$formArray['docsname'] = $this->input->post("docsname");
		$formArray['docs_date'] = $this->input->post("docs_date");

		if (!empty($_FILES['docs_file']['name'])) {

			$path = $_FILES['docs_file']['name'];
			$file_extension = pathinfo($path, PATHINFO_EXTENSION);

			$config['upload_path'] = 'assets/casedocs/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
			$config['file_name'] = date('ymdghsi') . $_FILES["docs_file"]['name'];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('docs_file');
			$fileData = $this->upload->data();
			$formArray['docs_filename'] = $fileData['file_name'];
			$formArray['docsext'] = $file_extension;
		}

		$this->General_model->update_data($tblname, $formArray, $docs_id);

		redirect(site_url() . 'AdminDashboard/add_case_documents/' . $case_id);
	}

	////////////////////////////////////////////Edit Case Hearing ///////////////////////////////

	public function edit_hearing()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$branch_id = $this->session->userdata('branch_id');
		$branch = $this->General_model->getSelectedData('branch', $branch_id);
		$data['branch'] = $branch;



		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3);
		$hearing_id = $this->uri->segment(4);

		$data['case_info'] = $this->General_model->getSelectedData($tblname, $caseid);




		$data['gethearing_docs'] = $this->General_model->get_hearing($hearing_id);

		$data['hearing_lawofficer'] = $this->General_model->get_hearing_lawofficer($hearing_id);


		$tblnames = "users";
		$data['Lawofficers'] = $this->General_model->getLawofficers($tblnames);
		$docstype = 'hearing_documents';
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid, $docstype);

		$data['page'] = 'AdminDashboard/edit_hearing';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view', $data);
		$this->load->view('AdminDashboard/includes/footer');
	}




	public function submit_edit_hearing()
	{
		$data['role_name'] = $this->General_model->GetRoleName();
		$caseid = $this->input->post("case_id");

		$data['case_info'] = $this->General_model->getSelectedData("manage_cases", $caseid);
		$hearing_id = "1";

		$hearing_id = $this->uri->segment('3');

		$tblname = "manage_cases_docs";

		$formArray['case_id'] = $this->input->post("case_id");
		$formArray['docsname'] = "Order Sheet";
		$formArray['docs_date'] = $this->input->post("hearing_date");


		$formArray['hearing_date'] = $this->input->post("hearing_date");
		$formArray['next_hearing_date'] = $this->input->post("next_hearing_date");
		$formArray['remarks'] = $this->input->post("remarks");

		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;

		$formArray['docstype'] = "hearing_documents";

		$path = $_FILES['docs_file']['name'];
		$file_extension = pathinfo($path, PATHINFO_EXTENSION);

		$config['upload_path'] = 'assets/casedocs/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
		$config['file_name'] = date('ymdghsi') . $_FILES["docs_file"]['name'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;

		$lastid = $this->General_model->update_hearing_data($tblname, $formArray, $hearing_id);


		$formArrays['case_id'] = $this->input->post("case_id");
		$formArrays['hearing_id'] = $hearing_id;

		$formArrays['add_date'] = date("Y-m-d");

		$this->General_model->delete_records('hearing_lawofficers', 'hearing_id', $hearing_id);

		foreach ($_POST['lawOfficers'] as $getOfficers) {

			$getLawofficerqry = $this->db->select('*')->from('users')
				->where('role_id', 4)->where('id', $getOfficers)->where('status', 1)->get();
			$getOfficerName = $getLawofficerqry->row('name');

			$formArrays['law_officer_id'] = $getOfficers;
			$formArrays['officer_name'] = $getOfficerName;

			$this->General_model->add_data("hearing_lawofficers", $formArrays);
		}




		$this->session->set_flashdata('success', 'Record Added Successfully..!');
		redirect(site_url() . 'AdminDashboard/add_hearing/' . $caseid);

		//$data['page']='AdminDashboard/add_documents';
		//$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');



	}



	public function fetch_caseCategories()
	{
		$branch_id = $this->input->post("branch_id");

		$this->db->where('branch_id', $branch_id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('case_categories');
		//echo $this->db->last_query();
		$output = '<option value="">--Select--</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->title . '</option>';
		}
		echo $output;
	}
}
