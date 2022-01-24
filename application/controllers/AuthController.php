<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');

		$this->load->model('Login_model', 'LM');
		$this->load->library('session');
		ini_set('post_max_size', '110M');
		ini_set('upload_max_filesize', '100M');
		date_default_timezone_set("Asia/Karachi");
	}
	////////////////////////////////Login////////////////////////////////////////////////////////////////

	public function index()
	{
		$data['button'] = "Log In";
		$data['action'] = "AuthController/user_login";
		$this->load->view('login', $data);
	}

	public function user_login()
	{

		$user_email 	= $this->input->post('email');
		$user_password = $this->input->post('password');
		$result = $this->LM->login($user_email, $user_password);
		if ($result) {

			$this->session->set_userdata('id', $result->id);
			$this->session->set_userdata('name', $result->name);
			$this->session->set_userdata('email', $result->email);
			$this->session->set_userdata('role', $result->role_id);
			$this->session->set_userdata('branch_id', $result->branch_id);

			if ($result->role_id == '1') {
				redirect('AdminDashboard/index');
			}
			if ($result->role_id == '2') {
				redirect('AGDashboard/index');
			}
			if ($result->role_id == '3') {
				redirect('AdminDashboard/index');
			}
			if ($result->role_id == '4') {
				redirect('AdminDashboard/index');
			}
		} else {
			$data['button'] = "Log In";
			$data['action'] = "user_login";
			$this->load->view('login', $data);
		}
	}






	public function logout()
	{
		if ($this->session->userdata('id') && $this->session->unset_userdata("role")) {
			$this->session->unset_userdata("role");
			$this->session->unset_userdata("id");

			$this->session->unset_userdata("email");
			$this->session->set_flashdata("success", "<span style=color:green;><b>You have logout successfully!</b></span>");
		}
		return redirect('AuthController');
	}
}
