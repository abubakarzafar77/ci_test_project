<?php 

class Articlemodel extends CI_Model
{
	public function article_list()
	{
		$user_id = $this->session->userdata('user_id');

		$sql = $this->db
					->select('body,title,id')
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

	public function find_article($article_id)
	{
		$q = $this->db->where('id',$article_id)
				->get('articles');
		return $q->row();
	}
}