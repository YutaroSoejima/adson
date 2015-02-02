<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Treat_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function register()
	{
		$data = array(
		   'user_id' => $this->session->userdata('user_id'),
		   'treat_id' => set_value('treat_id'),
		   'comment' => set_value('comment')
		);
		$this->db->insert('treat_applications', $data);

		$treat_proposal = $this->common_model->get_rows('treat_proposals', 1, set_value('treat_id'));
		$client = $this->common_model->get_rows('clients', 1, $treat_proposal->client_id);
		$user = $this->common_model->get_rows('users', 1, $this->session->userdata('user_id'));
		$user_school = $this->common_model->get_column('name', $user->school_id, 'schools');
		$food = $this->common_model->get_column('name', $treat_proposal->food_id, 'foods');
		$comment = set_value('comment');
	

		//メールの送信
		$this->common_model->sendmail(
			$client->e_mail,
			"【応募有】{$user->name}さん（{$user_school}）から「奢りのお願い」が届きました！",
"御社の投稿されております、
{$treat_proposal->title}(http://adson.co/t/{$treat_proposal->id})
に、{$user->name}さんよりご応募がありました。

【{$food}】を奢ってお話をしてみたい場合、
下記の情報をもとにご連絡いただけますよう、よろしくお願いいたします。

■{$user->name}さん
学校：{$user_school}
卒業年度：{$user->graduation_year}年
メールアドレス：{$user->e_mail}

ご対応のほど、よろしくお願い申し上げます。"
			);

		$this->session->set_flashdata('alert', '奢りのお願いが完了しました！');
	}
}