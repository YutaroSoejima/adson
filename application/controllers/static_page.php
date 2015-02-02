<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Static_page extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->output->set_header('Content-Type: text/html; charset=UTF-8');
	}

	//view of home page
	public function index()
	{
		$data["treat_proposals"] = $this->common_model->get_rows("treat_proposals", 3);

		$this->load->view('static_page/home_page', $data);
	}
}