<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->output->set_header('Content-Type: text/html; charset=UTF-8');
		$this->config->load('adson_config', TRUE);
		$this->load->library('session');
		$this->load->database();

		//include twitteroauth
		require_once('php_includes/twitteroauth/twitteroauth.php');
		require_once('php_includes/config.php');
	}

	public function index()
	{
		session_start();

		if($this->common_model->login_check()){
			$this->common_model->logout();
		}

		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

		$_SESSION['oauth_token'] = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

		switch ($connection->http_code) {
		  case 200:
		    /* Build authorize URL and redirect user to Twitter. */
		    $data['url'] = $connection->getAuthorizeURL($request_token['oauth_token']);
		    break;
		  default:
		    /* Show notification if something went wrong. */
		    echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}

		$this->load->view('log/login', $data);
	}

	public function register(){
		if($this->common_model->login_check()){
			$this->common_model->logout();
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'メールアドレス', 'required');
		$this->form_validation->set_rules('password', 'パスワード', 'required');
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('log/register');
		}
		else
		{
			$this->log_model->register_new_user();

			redirect(site_url($_SESSION['redirect']));
		}
	}

	//for validation class
	public function is_natural_number($input){
		if($input > 0){
			return true;
		}else{
			return false;
		}
	}

	public function logout(){
		$this->common_model->logout();

		redirect(site_url());
	}
}