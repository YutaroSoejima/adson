<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}

	////データの取得
	function get_rows($table, $limit = NULL, $value = NULL, $where = "id")
	{
		//もしvalueが空の場合、無条件取得する
		if(!empty($value)){
			$this->db->where($where, $value);
		}

		if(!empty($limit))
		{
			$query = $this->db->get($table, $limit);

			if($limit==1){
				return $query->row();
			}else
			{
				return $query->result();
			}
		}else
		{
			$query = $this->db->get($table);
			return $query->result();
		}
	}

	//条件の一致する行数を取得
	function get_num_rows($table, $id, $where = "id")
	{
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		return $query->num_rows();
	}

	//ある行のカラム情報を取得する
	function get_column($column, $id, $table, $where = "id")
	{
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		if($query->num_rows == 0){
			return false;
		}

		$row = $query->row_array();
		return $row[$column];
	}

	////ログイン関連
	//セッションがあるかチェック
	function signed_in()
	{
		if($this->session->userdata('user_id'))
		{
			if( $this->check_existance( $this->session->userdata('user_id') ) )
			{
				return true;
			}else
			{
				return false;
			}
		}else
		{
			return false;
		}
	}

	//登録済みかどうかをチェック
	function check_existance($user_id)
	{
		//条件を取得
		$this->db->where('id', $user_id);
		$query = $this->db->get('users', 1);

		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function logout()
	{
		$this->session->unset_userdata('user_id');

		//アラートの設定
		$this->session->set_flashdata('alert', 'ログアウトしました。');
	}

	////その他
	//卒業年度のリスト作成
	function list_graduation_years()
	{
		$this_year = date('Y');
		return [$this_year, $this_year+1, $this_year+2, $this_year+3];
	}

	//メールの送信
	function sendmail($to, $subject, $content)
	{
		$this->load->library('email');
		$config['protocol'] = 'mail';
		$config['charset'] = 'ISO-2022-JP';
		$config['wordwrap'] = FALSE;
		$this->email->initialize($config);

		$this->email->from('info@adson.co', mb_encode_mimeheader('「'. $this->config->item('site_name'). '」運営事務局', 'ISO-2022-JP', 'UTF-8'));
		$this->email->to($to);

		$this->email->subject(mb_convert_encoding($subject, 'ISO-2022-JP', 'UTF-8'));

		$header =
"お世話になっております。
ADSON運営事務局です。

";
		$footer =
"

---
ADSON運営事務局
メールアドレス：info@adson.co";
		$this->email->message(mb_convert_encoding($header.$content.$footer, 'ISO-2022-JP', 'UTF-8'));

		$this->email->send();
	}
}