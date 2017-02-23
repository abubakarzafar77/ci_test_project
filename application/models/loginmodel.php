<?php 

class Loginmodel extends CI_Model
{
	// public function __construct()
	// {
	// 	$this->load->database();
	// }

	public function login_valid($username, $password)
	{
		
		$sql = $this->db->get_where('users' , array('username'=> $username , 'password' => $password));
		
		
		if($sql->num_rows()){ 
			
			$login_data['user_id'] =  $sql->row()->id;
			$login_data['user_name'] =  $sql->row()->username;

			return $login_data;
		}else
		{
			
			return false;
		}



		// $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
		//SELECT * users whare username = $password AND password = $password;
		// return TRUE;
	}
}
?>