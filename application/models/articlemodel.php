<?php 

class Articlemodel extends CI_Model
{
	public function article_list()
	{
		$user_id = $this->session->userdata('user_id');

		$sql = $this->db
					->select('body,title')
					->from('articles')
					->where('user_id',$user_id)
					->get();
		return $sql->result();

	}
	public function add_article($array)
	{
		unset($array['submit']);
		return $this->db->insert('articles',$array);
	}
}