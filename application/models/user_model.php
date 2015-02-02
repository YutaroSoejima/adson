<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function register()
	{
		$data = array(
			'name' => set_value('name'),
			'e_mail' => set_value('email'),
			'password' => set_value('password'),
			'school_id' => set_value('school'),
			'graduation_year' => set_value('graduation_year'),
		);
		$this->db->insert('users', $data);

		//user_idをセッションに登録
		$this->session->set_userdata('user_id', $this->db->insert_id());

		//アラートの設定
		$this->session->set_flashdata('alert', $this->config->item('site_name'). "への登録が完了しました！");
	}

	function login()
	{
		$user = $this->common_model->get_rows('users', 1, set_value('name'), 'e_mail');

		if(count($user) != 0 && $user->password == set_value('password'))
		{
			//user_idをセッションに登録
			$this->session->set_userdata('user_id', $user->id);

			//アラートの設定
			$this->session->set_flashdata('alert', "ログインが完了しました！");

			return true;
		}else{
			return false;
		}
	}
}