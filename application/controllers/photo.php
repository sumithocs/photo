<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
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

	public function new_photo()
	{
		if ($this->session->userdata('logged_in')) {	
			$this->load->view('view_photo_add');
		}else{
			
			$this->session->set_flashdata('msg', 'Please Login first!!');			
			$this->load->view('login');
		}
	}
	
	public function save_new_photo()
	{
		
		
		if($this->session->userdata('logged_in')) {
			
			$txtPhotoname = $this->input->post('txtPhotoname');
			$txtDescription = $this->input->post('txtDescription');	
			$imagename = "";	
			
			$file_config['upload_path'] = './uploads/images/';
			$file_config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			$file_config['encrypt_name'] = true;
			$this->load->library('upload', $file_config);
			if($this->upload->do_upload('fPhoto'))
			{
				$upload_detail = $this->upload->data();
				$imagename = $upload_detail['file_name'];
			}
			else
			{
				$upload_detail = $this->upload->display_errors();
				$imagename = NULL;
			}
			
			$data = array(
					'photo_name'=> $txtPhotoname,
					'photo_description'=> $txtDescription,
					'photo_file'=> $imagename,
					'user_id'=> $this->session->userdata('logged_user_id'),
					'added_date'=> time()
			);
			
			$add = $this->photomodel->add_photo($data);
			if($add)
			{
				$this->session->set_flashdata('msg', 'Added Successfully!!');
				redirect('auth/my_booth/');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Adiing failed!!');
				redirect('/new_photo/');
			}
		}else{
			
			$this->session->set_flashdata('msg', 'Please Login first!!');			
			$this->load->view('login');
		}
		
	}
	
	public function edit_photo()
	{
		$this->load->view('view_photo_edit',$this->data);
	}
	
	public function add_photo_comment()
	{
		$response = array('status'=>'error','msg'=>'','html'=>'');
		if ($this->session->userdata('logged_in')) {				
				$photo_id = $this->input->post('photo_id');
				$comment = $this->input->post('comment_text');
				$photo_data = array('photo_id_fk'=>$photo_id, 'user_id_fk'=>$this->session->userdata('logged_user_id'), 'comment'=>$comment, 'added' => time());
				$photo_id = $this->photomodel->add_photo_comment($photo_data );
				if ($photo_id) {						
					$response ['status'] = 'success';
					$response ['msg'] = "Your comment has been added successfully!";						
					echo json_encode($response);
					exit;
				} else {
					$response ['msg'] = 'Error!! Please try again.';
					echo json_encode($response);
					exit ();
				}
			
		} else {
			$response ['status'] = 'Login session expired';
			echo json_encode($response);
			exit ();
		}
	}
	
	public function get_photo_comments_ajax()
	{
		$response = array('status'=>'error','msg'=>'','html'=>'');
		if ($this->session->userdata('logged_in')) {
			$photo_id = $this->input->post('photo_id');
			$comments = $this->photomodel->get_photo_comments($photo_id,5);
			if ($comments) {		
				$response ['status'] = 'success';
				$response ['html'] = $this->load->view('comments', array('comments'=>$comments),true);
				echo json_encode($response);					
				exit;
			} else {
				$response ['msg'] = 'Error!! Please try again.';
				echo json_encode($response);
				exit ();
			}
				
		} else {
			$response ['status'] = 'Login session expired';
			echo json_encode($response);
			exit ();
		}
		
	}
	
	
	public function get_photo_detail_ajax()
	{
		$response = array('status'=>'error','msg'=>'','html'=>'');
		if ($this->session->userdata('logged_in')) {
			$photo_id = $this->input->post('photo_id');
			$photo_detail = $this->photomodel->get_photo_by_id($photo_id);
			$photo_comments = $this->photomodel->get_photo_comments($photo_id);
			
			if ($photo_detail) {		
				$response ['status'] = 'success';
				$response ['html'] = $this->load->view('view_photo_detail', array('photo_detail'=>$photo_detail,'photo_comments'=>$photo_comments),true);
				echo json_encode($response);					
				exit;
			} else {
				$response ['msg'] = 'Error!! Please try again.';
				echo json_encode($response);
				exit ();
			}
				
		} else {
			$response ['status'] = 'Login session expired';
			echo json_encode($response);
			exit ();
		}
		
	}
	
}