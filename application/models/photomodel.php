<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photomodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();		
	}
	
	public function add_photo($data)
	{
		$this->db->insert('tbl_photo',$data);
		$insert_id = $this->db->insert_id();
		if($insert_id>0)
		{
			return $insert_id;
		}
		else
		{
			return false;
		}
	}
	
	public function edit_photo($photo_id,$data)
	{
		$this->db->where('photo_id', $photo_id);
		if($this->db->update('tbl_photo', $data)){
				return true;
		}else{
			return false;
		}
	}
	
	
	public function get_all_photos($conditions=NULL, $limit=NULL, $offset=0)
	{
		$this->db->select('*');
		$this->db->from('tbl_photo as p');
		//$this->db->join('tbl_photo_comment'.' as c', 'p.photo_id = c.photo_id_fk',"left");
		if($conditions){			
			$this->db->where($conditions);
		}
		if($limit){
			$this->db->limit($limit,$offset);
		}
		$this->db->where('is_delete',0);
		$this->db->order_by("photo_id", "desc");
		$query = $this->db->get();
		$result = $query->result_array();
		//echo $this->db->last_query();die;
		return $result;		
	}

	
	public function get_photo_by_id($photo_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_photo');		
		$this->db->where('photo_id', $photo_id);
		$query = $this->db->get();		
		$row = $query->row();		
		return $row;
		
	}
	
	public function get_photo_comments($photo_id,$limit=NULL, $offset=0)
	{
		$this->db->select('*');
		$this->db->from('tbl_photo_comment as c');
		$this->db->join('tbl_system_user as u', 'c.user_id_fk = u.user_id',"left");	
		$this->db->where('c.photo_id_fk', $photo_id);
		if($limit){
			$this->db->limit($limit,$offset);
		}
		$this->db->order_by("comment_id", "desc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	
	}
	
	public function add_photo_comment($data)
	{
		if($this->db->insert('tbl_photo_comment',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete_photo($photo_id)
	{
		/* $this->db->where('photo_id', $photo_id);	
		if($this->db->delete('tbl_photo'))
		{
			return true;
		}
		else
		{
			return false;
		} */
		$data = array('is_delete'=>1);
		$this->db->where('photo_id', $photo_id);
		if($this->db->update('tbl_photo', $data)){
			return true;
		}else{
			return false;
		}
	}
	
}
