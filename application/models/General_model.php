<?php
class General_model extends CI_Model
{


	public function add_data($tblname, $formArray)
	{
		$this->db->insert($tblname, $formArray);
		return $this->db->insert_id();
	}



	public function add_hearing_data($tblname, $formArray)
	{
		$this->db->insert($tblname, $formArray);
		return $this->db->insert_id();
	}



	public function get_alldata($tblname)
	{
		$this->db->select("*");
		$this->db->order_by('id', "DESC");
		$query = $this->db->get($tblname);
		return $query->result();
	}




	public function getAllcases()
	{
		$this->db->select("*");
		$this->db->from("manage_cases");
		//$this->db->where("installment",$this->input->post("installment"));
		return $getAllcases = $this->db->get()->num_rows();
	}

	public function getPendingCases()
	{
		$this->db->select("*");
		$this->db->from("manage_cases");
		$this->db->where("decision_status", 0);
		return $getPendingCases = $this->db->get()->num_rows();
	}
	public function getdecidedCases()
	{
		$this->db->select("*");
		$this->db->from("manage_cases");
		$this->db->where("decision_status", 1);
		return $getdecidedCases = $this->db->get()->num_rows();
	}




	public function getAllcases_user($branch_id)
	{
		$this->db->select("*");
		$this->db->from("manage_cases");
		$this->db->where("branch_id", $branch_id);
		return $getAllcases = $this->db->get()->num_rows();
	}

	public function getPendingCases_user($branch_id)
	{
		$this->db->select("*");
		$this->db->from("manage_cases");
		$this->db->where("decision_status", 0);
		$this->db->where("branch_id", $branch_id);
		return $getPendingCases = $this->db->get()->num_rows();
	}

	public function getdecidedCases_user($branch_id)
	{
		$this->db->select("*");
		$this->db->from("manage_cases");
		$this->db->where("decision_status", 1);
		$this->db->where("branch_id", $branch_id);
		return $getdecidedCases = $this->db->get()->num_rows();
	}





	public function get_users($role)
	{
		$this->db->select("*");
		$this->db->order_by('id', "DESC");
		$this->db->where("role_id", $role);
		$query = $this->db->get("users");
		return $query->result();
	}



	function update_data($tblname, $formArrayUpdate, $caseid)
	{
		$this->db->where('id', $caseid);
		$this->db->update($tblname, $formArrayUpdate);
	}

	function update_hearing_data($tblname, $formArrayUpdate, $hearing_id)
	{
		$this->db->where('id', $hearing_id);
		$this->db->update($tblname, $formArrayUpdate);
	}





	public function get_caseDocs($caseid, $docstype)
	{
		$this->db->select("*");
		$this->db->where("docstype", $docstype);
		$this->db->where("case_id", $caseid);
		$this->db->order_by('id', "DESC");
		// $this->db->limit(1);
		$query = $this->db->get("manage_cases_docs");
		return $query->result();
	}

	public function get_hearing($hearing_id)
	{
		$this->db->select("*");
		// $this->db->where("docstype",$docstype);
		$this->db->where("id", $hearing_id);
		$this->db->order_by('id', "DESC");
		$this->db->limit(1);
		$query = $this->db->get("manage_cases_docs");
		return $query->result();
	}


	public function get_hearing_lawofficer($hearing_id)
	{
		$this->db->select("*");
		// $this->db->where("docstype",$docstype);
		$this->db->where("hearing_id", $hearing_id);
		$this->db->order_by('id', "DESC");
		$this->db->limit(1);
		$query = $this->db->get("hearing_lawofficers");
		return $query->result();
	}


	public function getCaseDecision($caseid, $docstype)
	{
		$this->db->select("*");
		$this->db->where("docstype", $docstype);
		$this->db->where("case_id", $caseid);
		$this->db->order_by('id', "DESC");
		$query = $this->db->get("manage_cases_docs");
		return $query->result();
	}








	public function get_caseDept($caseid, $tblname)
	{
		$this->db->select("*");
		$this->db->where("case_id", $caseid);
		$this->db->order_by('id', "DESC");
		$query = $this->db->get("case_department");
		return $query->result();
	}








	public function get_allCases()
	{

		$role_type = $this->session->userdata('role');
		$branch_id = $this->session->userdata('branch_id');
		$user_id = $this->session->userdata('id');

		if (($role_type == 1) && ($branch_id == 0)) {
			$this->db->select('*,manage_cases.title AS case_title, court.title AS court_title,branch.title AS branch_title, manage_cases.id AS case_id,case_categories.title AS category_title');
			$this->db->join('case_categories', 'case_categories.id = manage_cases.case_cateid');
			$this->db->join('court', 'court.id = manage_cases.court_id');
			$this->db->join('branch', 'branch.id = manage_cases.branch_id');
			$this->db->order_by('manage_cases.id', "DESC");
			$query = $this->db->get('manage_cases');
			return $query->result();
		} else {
			$this->db->select('*,manage_cases.title AS case_title, court.title AS court_title,branch.title AS branch_title, manage_cases.id AS case_id,case_categories.title AS category_title');
			$this->db->join('case_categories', 'case_categories.id = manage_cases.case_cateid');
			$this->db->join('court', 'court.id = manage_cases.court_id');
			$this->db->join('branch', 'branch.id = manage_cases.branch_id');

			$this->db->where('manage_cases.branch_id', $branch_id);

			//$this->db->where('manage_cases.role_type', $role_type);
			//$this->db->where('manage_cases.added_by', $user_id);

			$this->db->order_by('manage_cases.id', "DESC");
			$query = $this->db->get('manage_cases');
			return $query->result();

			//echo $this->db->last_query();	

		}
	}


	public function getSelectedData($tblname, $fieldvalue)
	{
		$this->db->select("*");
		$this->db->where("id", $fieldvalue);
		$this->db->order_by('id', "DESC");
		$query = $this->db->get($tblname);
		return $query->result();
	}
	
	
	
	public function getDocsTypes($tblname, $fieldvalue)
	{
		$this->db->select("*");
		$this->db->where("branch_id", $fieldvalue);
		$this->db->order_by('id', "ASC");
		$query = $this->db->get($tblname);
		return $query->result();
	}
	
	
	public function getDocsTypesAll($tblname)
	{
		$this->db->select("*");
		//$this->db->where("branch_id", $fieldvalue);
		$this->db->order_by('id', "ASC");
		$this->db->group_by("title");
		$query = $this->db->get($tblname);
		return $query->result();
	}
	
	
	
	
	

	public function GetRoleName()
	{
		$role_id = $this->session->userdata('role');
		$this->db->select("name");
		$this->db->where("id", $role_id);
		$this->db->from('role');
		$query = $this->db->get();
		return $query->result();
	}

	public function getSelectedCaseData($tblname, $fieldvalue)
	{
		$this->db->select("*");
		$this->db->where("case_id", $fieldvalue);
		$query = $this->db->get($tblname);
		return $query->result();
		//echo $this->db->last_query();						
	}

	public function getSelectedDecisionData($caseid)
	{
		$this->db->select("*");
		$this->db->where("case_id", $caseid);
		$this->db->where("docstype", 'decision_documents');
		$query = $this->db->get('manage_cases_docs');

		return $query->row_array();
		//echo $this->db->last_query();						
	}

	public function getLawofficers($tblname)
	{
		$this->db->select("*");
		$this->db->where("role_id", 4);
		$this->db->order_by('id', "DESC");
		$query = $this->db->get($tblname);
		return $query->result();
	}








	public function getLinkCases()
	{
		$this->db->select('*');
		$this->db->join('manage_cases', 'manage_cases.id = manage_linked_cases.id');
		//$this->db->join('court', 'court.id = manage_cases.court_id');	
		//$this->db->join('branch', 'branch.id = manage_cases.branch_id');
		//$this->db->order_by('department.id',"DESC");
		$query = $this->db->get('manage_linked_cases');
		return $query->result();
	}


	public function delete_data($tblname, $recordid)
	{
		$this->db->where('id', $recordid);
		$this->db->delete($tblname);
	}

	public function delete_case_dept($tblname, $recordid)
	{
		$this->db->where('case_id', $recordid);
		$this->db->delete($tblname);
	}

	public function delete_records($tblname, $column_name, $recordid)
	{
		$this->db->where($column_name, $recordid);
		$this->db->delete($tblname);
	}


	public function get_case_categories()
	{
		$this->db->select("case_categories.*,branch.title as branch_title");
		$this->db->join('branch', 'branch.id = case_categories.branch_id');
		$this->db->order_by('id', "DESC");
		$query = $this->db->get("case_categories");
		return $query->result();
	}
	
	
	public function get_docs_types()
	{
		$this->db->select("documents_type.*,branch.title as branch_title");
		$this->db->join('branch', 'branch.id = documents_type.branch_id');
		$this->db->order_by('documents_type.id', "DESC");
		$query = $this->db->get("documents_type");
		return $query->result();
	}
	
	
	

	public function search_cases($data)
	{
		$case_id = $data['case_no'];
		$title = $data['title'];
		$department_id = $data['department_id'];
		$case_category_id = $data['case_category_id'];
		$branch_id = $data['branch_id'];
		$law_officer_id = $data['law_officer_id'];
		$court_id = $data['court_id'];
		$year = $data['year'];
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];

		$this->db->select('*,manage_cases.title AS case_title, court.title AS court_title,branch.title AS branch_title, manage_cases.id AS case_id,case_categories.title AS category_title');
		$this->db->join('case_categories', 'case_categories.id = manage_cases.case_cateid');
		$this->db->join('court', 'court.id = manage_cases.court_id');
		$this->db->join('branch', 'branch.id = manage_cases.branch_id');
		$this->db->join('case_department', 'case_department.case_id = manage_cases.id');
		if (!empty($case_id)) {
			$this->db->where('manage_cases.id', $case_id);
		}
		if (!empty($title)) {
			$this->db->or_where('manage_cases.id', $title);
		}
		if (!empty($department_id)) {
			$this->db->or_where('case_department.department_id', $department_id);
		}
		if (!empty($case_category_id)) {
			$this->db->or_where('manage_cases.case_cateid', $case_category_id);
		}
		if (!empty($branch_id)) {
			$this->db->or_where('manage_cases.branch_id', $branch_id);
		}
		if (!empty($court_id)) {
			$this->db->or_where('manage_cases.court_id', $court_id);
		}
		if (!empty($year)) {
			$this->db->or_where('manage_cases.year', $year);
		}

		if (!empty($start_date) && !empty($end_date)) {
			$this->db->or_where('manage_cases.Filling_date >=', $start_date);
			$this->db->or_where('manage_cases.Filling_date <=', $end_date);
		} else if (!empty($start_date)) {
			$this->db->or_where('manage_cases.Filling_date >=', $start_date);
		} else if (!empty($end_date)) {
			$this->db->or_where('manage_cases.Filling_date <=', $end_date);
		}
		$this->db->group_by('manage_cases.id');
		$query = $this->db->get('manage_cases');
		return $query->result();
	}
	
	
	
	
	
	public function fetch_subscribers($limit,$start) {
	
	
	/*return $this->db->select('*,beneficiaries_info.id as user_id')
	->from('beneficiaries_info')
	->join('district', 'district.id = beneficiaries_info.district_id')
	->where('district.id', $district_id)
	->where('beneficiaries_info.role_type', "pwd")
	->where('beneficiaries_info.certificate_issue_status',"0")
	->limit($limit, $start)
	->order_by('beneficiaries_info.id',"DESC")->get()->result();*/
	
		$role_type = $this->session->userdata('role');
		$branch_id = $this->session->userdata('branch_id');
		$user_id = $this->session->userdata('id');

		if (($role_type == 1) && ($branch_id == 0)) {
			$this->db->select('*,manage_cases.title AS case_title, court.title AS court_title,branch.title AS branch_title, manage_cases.id AS case_id,case_categories.title AS category_title');
			$this->db->join('case_categories', 'case_categories.id = manage_cases.case_cateid');
			$this->db->join('court', 'court.id = manage_cases.court_id');
			$this->db->join('branch', 'branch.id = manage_cases.branch_id');
			$this->db->order_by('manage_cases.id', "DESC");
			$this->db->limit($limit, $start);
			$query = $this->db->get('manage_cases');
			return $query->result();
		} else {
			$this->db->select('*,manage_cases.title AS case_title, court.title AS court_title,branch.title AS branch_title, manage_cases.id AS case_id,case_categories.title AS category_title');
			$this->db->join('case_categories', 'case_categories.id = manage_cases.case_cateid');
			$this->db->join('court', 'court.id = manage_cases.court_id');
			$this->db->join('branch', 'branch.id = manage_cases.branch_id');

			$this->db->where('manage_cases.branch_id', $branch_id);

			//$this->db->where('manage_cases.role_type', $role_type);
			//$this->db->where('manage_cases.added_by', $user_id);

			$this->db->order_by('manage_cases.id', "DESC");
			$this->db->limit($limit, $start);
			$query = $this->db->get('manage_cases');
			return $query->result();

			//echo $this->db->last_query();	

		}
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
}
