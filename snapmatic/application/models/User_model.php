<?php
class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}
	public function get_follow($id)
	{
		
		$this->db->select('*')
				  ->from('newsfeed')
				  ->where('user_id IN (SELECT user_following FROM following WHERE user_id='.$id.')')
				  ->join('users','users.id = newsfeed.user_id');

		$query = $this->db->get();

		return $query->result();
	}

}?>

