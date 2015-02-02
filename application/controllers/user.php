<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->output->set_header('Content-Type: text/html; charset=UTF-8');

		$this->load->model('user_model');
	}

	public function register()
	{
		if($this->common_model->signed_in()){
			$this->common_model->logout();
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', '名前', 'required');
		$this->form_validation->set_rules('email', 'メールアドレス', 'required');
		$this->form_validation->set_rules('password', 'パスワード', 'required');
		$this->form_validation->set_rules('school', '学校', 'required');
		$this->form_validation->set_rules('graduation_year', '卒業年度', 'required');
				
		if ($this->form_validation->run() == FALSE)
		{
			$data["schools"] = $this->common_model->get_rows("schools");
			$data["graduation_years"] = $this->common_model->list_graduation_years();
			$this->load->view('user/register', $data);
		}
		else
		{
			$this->user_model->register();

			if($this->session->userdata('redirect'))
			{
				redirect($this->session->userdata('redirect'));
				$this->session->unset_userdata('redirect');
			}else
			{
				redirect(site_url());
			}
		}
	}

	public function login()
	{
		if($this->common_model->signed_in()){
			$this->common_model->logout();
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'メールアドレス', 'required');
		$this->form_validation->set_rules('password', 'パスワード', 'required');
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/login');
		}
		else
		{
			//ログインできたかどうかをbooleanで返す
			if($this->user_model->login())
			{
				if($this->session->userdata('redirect'))
				{
					redirect($this->session->userdata('redirect'));
					$this->session->unset_userdata('redirect');
				}else
				{
					redirect(site_url());
				}
			}else
			{
				$this->load->view('user/login', $data);
			}
		}
	}

	public function logout()
	{
		$this->common_model->logout();

		redirect(site_url());
	}
}