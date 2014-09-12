<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('photomodel');
	}

	public function index()
	{
		$this->data['photos'] = $this->photomodel->get_all_photos();
		$this->load->view('welcome_message',$this->data);
	}
}
