<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('authmodel');
		$this->load->model('photomodel');		
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('my_booth');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function login()
	{
		if(!$this->session->userdata('logged_in')){
			$username = $this->input->post('txtUsername');
			$password = $this->input->post('txtPassword');
			//echo $username."-".$password;die;
			$logged_in = $this->authmodel->login($username,md5($password));
			if($logged_in)
			{
				$this->session->set_userdata('logged_in', true);
				$this->session->set_userdata('logged_user', $logged_in->username);
				$this->session->set_userdata('logged_user_id', $logged_in->user_id);
				redirect('auth/my_booth');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Login failed!!');			
				$this->load->view('login');
				
			}
		}else{
			redirect('auth/my_booth');
		}		
	}
	
	public function my_booth()
	{
		if($this->session->userdata('logged_in')){
			$logged_user_id = $this->session->userdata('logged_user_id');
			$condition = array('user_id'=>$logged_user_id);
			$this->data['photos'] = $this->photomodel->get_all_photos($condition);
			$this->load->view('my_photo_booth',$this->data);
		}
		else
		{
			$this->session->set_flashdata('msg', 'Please Login!!');
			redirect();
		}
	}
	
	public function logout()
	{
		$this->session->set_userdata('logged_in', false);
		redirect();
		
	}
	
}