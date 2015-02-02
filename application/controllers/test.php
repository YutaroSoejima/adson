<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->output->set_header('Content-Type: text/html; charset=UTF-8');
	}

	function sendmail(){
		$this->load->library('email');
		$config['protocol'] = 'mail';
		$config['charset'] = 'ISO-2022-JP';
		$config['wordwrap'] = FALSE;
		$this->email->initialize($config);

		$this->email->from('info@adson.co', $this->config->item('site_name'). '運営事務局');
		$this->email->to('yutarosoejima54@gmail.com');

		$this->email->subject('てすと');
		$this->email->message('ないよう');

		if($this->email->send()){echo "error";}
	}
}