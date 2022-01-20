<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {


public function __construct()
{
parent::__construct();

$this->load->model('General_model');

if($this->session->userdata('role')!='' && $this->session->userdata('role')==1*1)
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

public function add_user()
{
	

$tblname1 = "role";
$data['list_role'] = $this->General_model->get_alldata($tblname1);

$tblname2 = "branch";
$data['list_branch'] = $this->General_model->get_alldata($tblname2);
	
	
$data['page']='AdminDashboard/add_user';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}



public function add_users()
{	
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
$this->General_model->add_data($tblname,$formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');
redirect(base_url('AdminDashboard/list_user'));
exit;
}






public function list_user()
{
	
$tblname = "users";
$data['list_users'] = $this->General_model->get_alldata($tblname);	
	
$data['page']='AdminDashboard/list_user';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}




public function deleteusers()
{
$recordid = $this->uri->segment(3);
$tblname = "users";
$this->General_model->delete_data($tblname,$recordid);
$this->session->set_flashdata('success','Record Deleted Successfully..!');
redirect(base_url('AdminDashboard/list_user'));
}





////////////////////////////////// --- Add Departments -----////////////////////////



public function add_department()
{
$data['page']='AdminDashboard/add_department';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}


public function add_departments()
{	
$formArray = array();
$formArray['title'] = $this->input->post("title");	
$formArray['description']  = $this->input->post("description");
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

$tblname = "department";
$this->General_model->add_data($tblname,$formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');
redirect(base_url('AdminDashboard/list_department'));
exit;
}


public function list_department()
{
$tblname = "department";
$data['list_department'] = $this->General_model->get_alldata($tblname);	
$data['page']='AdminDashboard/list_department';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}


public function deletedepartments()
{
$recordid = $this->uri->segment(3);
$tblname = "department";
$this->General_model->delete_data($tblname,$recordid);
$this->session->set_flashdata('success','Record Deleted Successfully..!');
redirect(base_url('AdminDashboard/list_department'));
}





////////////////////////////////// --- Add branches -----////////////////////////



public function add_branch()
{
$data['page']='AdminDashboard/add_branch';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}



public function add_branches()
{	
$formArray = array();
$formArray['title'] = $this->input->post("title");	
$formArray['description']  = $this->input->post("description");
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

$tblname = "branch";
$this->General_model->add_data($tblname,$formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');
redirect(base_url('AdminDashboard/list_branch'));
exit;
}







public function list_branch()
{
$tblname = "branch";
$data['list_branch'] = $this->General_model->get_alldata($tblname);	
$data['page']='AdminDashboard/list_branch';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}


public function deletebranches()
{
$recordid = $this->uri->segment(3);
$tblname = "branch";
$this->General_model->delete_data($tblname,$recordid);
$this->session->set_flashdata('success','Record Deleted Successfully..!');
redirect(base_url('AdminDashboard/list_branch'));
}





////////////////////////////////// --- Add Courts -----////////////////////////



public function add_court()
{
$data['page']='AdminDashboard/add_court';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}

public function add_courts()
{	
$formArray = array();
$formArray['title'] = $this->input->post("title");	
$formArray['description']  = $this->input->post("description");
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

$tblname = "court";
$this->General_model->add_data($tblname,$formArray);
$this->session->set_flashdata('success','Record Added Successfully..!');
redirect(base_url('AdminDashboard/list_court'));
exit;
}



public function list_court()
{
$tblname = "court";
$data['list_court'] = $this->General_model->get_alldata($tblname);		
$data['page']='AdminDashboard/list_court';
$this->load->view('AdminDashboard/includes/header');
$this->load->view('AdminDashboard/includes/template_view',$data);
$this->load->view('AdminDashboard/includes/footer');
}



public function deletecourts()
{
$recordid = $this->uri->segment(3);
$tblname = "court";
$this->General_model->delete_data($tblname,$recordid);
$this->session->set_flashdata('success','Record Deleted Successfully..!');
redirect(base_url('AdminDashboard/list_court'));
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
		$data['page']='AdminDashboard/add_case';
		$this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	
	public function add_cases()
	{
		$formArray = array();
		$formArray['title'] = $this->input->post("title");	
		$formArray['states'] = $this->input->post("states");	
		$formArray['case_no'] = $this->input->post("case_no");
		$formArray['petitioner_advocate'] = $this->input->post("petitioner_advocate");
		$formArray['department_id'] = $this->input->post("department_id");
		$formArray['court_id'] = $this->input->post("court_id");
		$formArray['focalperson'] = $this->input->post("focalperson");
		$formArray['respondent']  = $this->input->post("respondent");
		$formArray['branch_id']  = $this->input->post("branch_id");
		$formArray['Filling_date']  = $this->input->post("Filling_date");
		$formArray['year']  = $this->input->post("year");
		$formArray['status']  = $this->input->post("status");
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		$formArray['added_by']  = $this->session->userdata('id');
		$formArray['role_type']  = $this->session->userdata('role');
		
		$tblname = "manage_cases";
		$this->General_model->add_data($tblname,$formArray);
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('AdminDashboard/list_case'));
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
		
		$docstype = "case_documents";
		$data['case_info'] = $this->General_model->getSelectedData($tblname,$caseid);
		
		$tblnames = "users";
		$data['Lawofficers'] = $this->General_model->getLawofficers($tblnames);
		
		$data['getcase_docs'] = $this->General_model->get_caseDocs($caseid,$docstype);
		
		$data['page']='AdminDashboard/add_hearing';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	
	
	
	public function sunmit_add_hearing()
	{
	
		$caseid = $this->input->post("case_id");
		
		$data['case_info'] = $this->General_model->getSelectedData("manage_cases",$caseid);
		
		$tblname = "manage_cases_docs";
		
		$formArray['case_id'] = $this->input->post("case_id");
		$formArray['docsname'] = "Order Sheet";
		$formArray['docs_date'] = $this->input->post("docs_date");
		
		
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
		
		$this->General_model->add_data($tblname,$formArray);
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(site_url() . 'AdminDashboard/add_hearing/' . $caseid);
		
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
		redirect(base_url('AdminDashboard/link_case'));
		exit;
	}
	
	
		
	public function case_view()
	{
		$data['page']='AdminDashboard/case_view';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}

	public function add_case_decision()
	{
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
		redirect(base_url('AdminDashboard/list_decision_type'));
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
		redirect(site_url() . 'AdminDashboard/add_case_documents/' . $caseid);
		
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

	/////////////////////////// Decision Type
    public function add_decision_type()
	{
		$data['page']='AdminDashboard/add_decision_type';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
    
	public function list_decision_type()
	{
		
		$tblname = "decision_types";
		$data['getDecisions'] = $this->General_model->get_alldata($tblname);
		$data['page']='AdminDashboard/list_decision';
        $this->load->view('AdminDashboard/includes/header');
		$this->load->view('AdminDashboard/includes/template_view',$data);
		$this->load->view('AdminDashboard/includes/footer');
	}
	
	public function deletedecisions()
	{
	$recordid = $this->uri->segment(3);
	$tblname = "decision_types";
	$this->General_model->delete_data($tblname,$recordid);
	$this->session->set_flashdata('success','Record Deleted Successfully..!');
	redirect(base_url('AdminDashboard/list_decision_type'));
	exit;
	}
	
	


}