<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ITStaffDashboard extends CI_Controller {


public function __construct()
{
parent::__construct();

$this->load->model('General_model');

if($this->session->userdata('role')!='' && $this->session->userdata('role')==3*1)
{
$this->load->model('Login_model' , 'LM');
$this->load->library('session');
ini_set('post_max_size', '110M');
ini_set('upload_max_filesize', '100M');
date_default_timezone_set("Asia/Karachi");
}
else
{
$this->session->set_flashdata('error',"<span class='text-danger'>Invalid access!</span>");
return redirect('AuthController/index');
}
}



public function index()
{
$data['page']='AdminDashboard/dashboard';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}

//////////////////////////Start Profile /////////////////////////
	public function profile()
	{
		$data['page']='AdminDashboard/profile';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}


	///////////////////////// search///////////////////////
	public function search()
	{
        $tblname = "department";
		$data['getdepartments'] = $this->General_model->get_alldata($tblname);
		
		$tblname = "court";
		$data['getcourts'] = $this->General_model->get_alldata($tblname);
		
		$tblname = "branch";
		$data['getbranches'] = $this->General_model->get_alldata($tblname);
		
		$tblname = "case_categories";
		$data['getCategories'] = $this->General_model->get_alldata($tblname);

		$role_id=4;
        $data['getusers'] = $this->General_model->get_users($role_id);
        
	 	$data['page']='AdminDashboard/search';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}

    ////////////////////////// Case ////////////////////////
	
	public function add_case()
	{
		
		
		$tblname = "department";
		$data['getdepartments'] = $this->General_model->get_alldata($tblname);
		
		$tblname = "court";
		$data['getcourts'] = $this->General_model->get_alldata($tblname);
		
		$tblname = "branch";
		$data['getbranches'] = $this->General_model->get_alldata($tblname);
		
		$tblname = "case_categories";
		$data['getCategories'] = $this->General_model->get_alldata($tblname);
		
		$data['getCases'] = $this->General_model->get_allCases();
		
		$data['page']='AdminDashboard/add_case';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	
	public function add_cases()
	{
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
		$formArray['government_petitioner']  = $this->input->post("government_petitioner");
		$formArray['status']  = $this->input->post("status");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$formArray['added_by']  = $this->session->userdata('id');
		$formArray['role_type']  = $this->session->userdata('role');
		
		$tblname = "manage_cases";
		$last_id = $this->General_model->add_data($tblname,$formArray);
		
		foreach ($_POST['department_id'] as $getDepartments)
		{
			
		$getDepartmentsqry = $this->db->select('*')->from('department')
		->where('id',$getDepartments)->where('status',1)->get();
		$getDeptName = $getDepartmentsqry->row('title');
		
		$formArrays['case_id'] = $last_id;
		$formArrays['department_id'] = $getDepartments;
		$formArrays['department_name'] = $getDeptName;
		
		$this->General_model->add_data("case_department",$formArrays);
		
		}
		
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('ITStaffDashboard/list_case'));
		exit;
		
		
		
	}
	
	
	
	
	
	
	
	
	

	public function list_case()
	{
		
		$data['getCases'] = $this->General_model->get_allCases();
		
		$data['page']='AdminDashboard/list_case';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function add_hearing()
	{
		
		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3); 
		
		
		$data['case_info'] = $this->General_model->getSelectedData($tblname,$caseid);
		
		
		
		$docstype = "hearing_documents";
		$data['gethearing_docs'] = $this->General_model->get_caseDocs($caseid,$docstype);
		
		
		
		
		$tblnames = "users";
		$data['Lawofficers'] = $this->General_model->getLawofficers($tblnames);
		
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid,$docstype);
		
		$data['page']='AdminDashboard/add_hearing';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	
	public function submit_add_hearing()
	{
	
		$caseid = $this->input->post("case_id");
		
		$data['case_info'] = $this->General_model->getSelectedData("manage_cases",$caseid);
		
		
		
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
		$config['file_name'] = date('ymdghsi').$_FILES["docs_file"]['name'];
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;
		
		$lastid = $this->General_model->add_hearing_data($tblname,$formArray);

		
		$formArrays['case_id'] = $this->input->post("case_id");
		$formArrays['hearing_id'] = $lastid;
		
		$formArrays['add_date'] = date("Y-m-d");
		
		
		foreach ($_POST['lawOfficers'] as $getOfficers)
		{
			
		$getLawofficerqry = $this->db->select('*')->from('users')
		->where('role_id',4)->where('id',$getOfficers)->where('status',1)->get();
		$getOfficerName = $getLawofficerqry->row('name');
		
		$formArrays['law_officer_id'] = $getOfficers;
		$formArrays['officer_name'] = $getOfficerName;
		
		$this->General_model->add_data("hearing_lawofficers",$formArrays);
		
		}
		
		
		
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(site_url() . 'ITStaffDashboard/add_hearing/' . $caseid);
		
		//$data['page']='AdminDashboard/add_documents';
        //$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');
	
	
	
	}
	
	

	public function list_hearing()
	{
		$data['page']='AdminDashboard/list_hearing';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function link_case()
	{
		//$data['getLinkCases'] = $this->General_model->getLinkCases();
		$tblname = "manage_linked_cases";
		$data['getCases'] = $this->General_model->get_allCases();
		$data['getLinkCases'] = $this->General_model->get_alldata($tblname);
		
		$data['page']='AdminDashboard/link_case';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	public function submit_link_cases()
	{
		
		$formArray = array();
		$formArray['coc_case_id'] = $this->input->post("coc_case_id");	
		$formArray['previous_case_id']  = $this->input->post("previous_case_id");
		
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$formArray['added_by']  = $this->session->userdata('id');
		$formArray['role_type']  = $this->session->userdata('role');
		
		$tblname = "manage_linked_cases";
		$this->General_model->add_data($tblname,$formArray);
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('ITStaffDashboard/link_case'));
		exit;
	}
	
	
		
	public function case_view()
	{
		
		
		$caseid = $this->uri->segment(3);
		 
		$tblname = "manage_cases";
		$data['case_info'] = $this->General_model->getSelectedData($tblname,$caseid);
		
		
		$docstype = "hearing_documents";
		$data['gethearing_docs'] = $this->General_model->get_caseDocs($caseid,$docstype);
		
		$docstype = "case_documents";
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid,$docstype);
		
		$docstype = "case_departments";
		$data['getcase_dept'] = $this->General_model->get_caseDept($caseid,$tblname);
		
		$docstype = "decision_documents";
		$data['decision_info'] = $this->General_model->getCaseDecision($caseid,$docstype);
		
		
		
		$data['page']='AdminDashboard/case_view';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function add_case_decision()
	{
		
		$caseid = $this->uri->segment(3); 
		
		$tblname = "manage_cases";
		$data['case_info'] = $this->General_model->getSelectedData($tblname,$caseid);
		
		$tblnames = "decision_types";
		$data['getDecions'] = $this->General_model->get_alldata($tblnames);
		
		
		
		$data['page']='AdminDashboard/add_decision';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	public function add_decision_types()
	{
		$formArray = array();
		$formArray['title'] = $this->input->post("title");	
		$formArray['description'] = $this->input->post("description");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$tblname = "decision_types";
		$this->General_model->add_data($tblname,$formArray);
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('ITStaffDashboard/list_decision_type'));
		exit;
	}
	
	
	

	public function add_case_documents()
	{
		
		$tblname = "manage_cases";
		$caseid = $this->uri->segment(3); 
		
		$docstype = "case_documents";
		$data['case_info'] = $this->General_model->getSelectedData($tblname,$caseid);
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid,$docstype);
		
				
		$data['page']='AdminDashboard/add_documents';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	public function submit_case_documents()
	{
		
		
		$caseid =$this->input->post("case_id");
		
		$data['case_info'] = $this->General_model->getSelectedData("manage_cases",$caseid);
		
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
		$config['file_name'] = date('ymdghsi').$_FILES["docs_file"]['name'];
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;
		
		$this->General_model->add_data($tblname,$formArray);
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(site_url() . 'ITStaffDashboard/add_case_documents/' . $caseid);
		
		//$data['page']='AdminDashboard/add_documents';
        //$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	
	
	
	
	public function submit_decision()
	{
		
		
		$caseid =$this->input->post("case_id");
		
		$data['case_info'] = $this->General_model->getSelectedData("manage_cases",$caseid);
		
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
		$config['file_name'] = date('ymdghsi').$_FILES["docs_file"]['name'];
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);
		$this->upload->do_upload('docs_file');
		$fileData = $this->upload->data();
		$formArray['docs_filename'] = $fileData['file_name'];
		$formArray['docsext'] = $file_extension;
		
		$this->General_model->add_data($tblname,$formArray);
		
		
		$tblnames = "manage_cases";
		$formArrayUpdate = array();
		$formArrayUpdate['decision_status'] = 1;		
		$this->General_model->update_data($tblnames,$formArrayUpdate,$caseid);
		
		
		
		$this->session->set_flashdata('success','Decision Added Successfully..!');
		redirect(site_url() . 'ITStaffDashboard/list_case/');
		
		//$data['page']='AdminDashboard/add_documents';
        //$this->load->view('AdminDashboard/includes/header');
		//$this->load->view('AdminDashboard/includes/template_view',$data);
		//$this->load->view('AdminDashboard/includes/footer');
	}
	    
	public function list_case_documents()
	{
		$data['page']='AdminDashboard/list_documents';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}





}
?>