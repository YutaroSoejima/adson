<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->output->set_header('Content-Type: text/html; charset=UTF-8');

		$this->load->model('treat_model');
	}

	//全件表示
	public function index()
	{
		$data["treat_proposals"] = $this->common_model->get_rows("treat_proposals");

		$this->load->view('treat/list', $data);
	}

	//単体表示
	public function single($treat_proposal_id)
	{
		$data["treat_proposal"] = $this->common_model->get_rows("treat_proposals", 1, $treat_proposal_id);
		$data["client_member"] = $this->common_model->get_rows("client_members", 1, $data["treat_proposal"]->client_member_id);
		$data["client"] = $this->common_model->get_rows("clients", 1, $data["treat_proposal"]->client_id);

		$this->load->view('treat/single', $data);
	}

	//エントリー
	public function entry($treat_id)
	{
		if($this->common_model->signed_in())
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('treat_id', 'Treat id', 'required');
			$this->form_validation->set_rules('comment', 'コメント');

			if ($this->form_validation->run() == FALSE)
			{
				$data["treat_proposal"] = $this->common_model->get_rows('treat_proposals', 1, $treat_id);
				$this->load->view('treat/entry', $data);
			}
			else
			{
				$this->treat_model->register();

				redirect(site_url("t/". set_value('treat_id')));
			}
		}else
		{
			$this->session->set_userdata('redirect', site_url("treat/entry/$treat_id"));
			$this->session->set_flashdata('alert', '奢りをお願いするためには「'. $this->config->item('site_name'). '」に登録する必要があります。');

			redirect(site_url("user/register"));
		}
	}
}