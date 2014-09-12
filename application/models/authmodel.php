<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();		
	}
	
	public function login($username,$password)
	{	
		$this->db->select('*');	
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tbl_system_user');		
		$result = $query->row();		
		
		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}
	
}