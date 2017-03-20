<?php 

class Articlemodel extends CI_Model
{
	public function article_list($limit , $offset)
	{
		$user_id = $this->session->userdata('user_id');

		$sql = $this->db
					->select('body,title,id')
					->from('articles')
					->where('user_id',$user_id)
					->limit($limit , $offset)
					->order_by('created_at','DESC')
					->get();
		return $sql->result();

	}

	public function all_article_list($limit , $offset)
	{
		$sql = $this->db
						->from('articles')
						->limit($limit , $offset)
						->order_by('created_at','DESC')
						->get();
		return $sql->result();
	}
	public function all_num_rows()
	{

		$sql = $this->db
					->select('body,title,id')
					->from('articles')

					->get();
		return $sql->num_rows();

	}


	public function num_rows()
	{
		$user_id = $this->session->userdata('user_id');

		$sql = $this->db
					->select('body,title,id')
					->from('articles')
					->where('user_id',$user_id)
					->get();
		return $sql->num_rows();

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
	public function update_article($article_id , $post)
	{
		return $this->db->update('articles',$post, ['id'=>$article_id]);
	}

	public function delete_article($article_id)
	{
		return $this->db->delete('articles',['id'=>$article_id]);
	}




	public function search($query,$limit,$offset)
	{
		$sql = $this->db->from('articles')
						->like('title',$query)
						->limit($limit , $offset)
						->get();

		return $sql->result();

	}
	public function count_search_result($query)
	{
		$sql = $this->db->from('articles')
						->like('title',$query)
						->get();
		return $sql->num_rows();

	}










	public function find_detail( $id )
	{
		$sql = $this->db->from('articles')
					->where( ['id'=> $id] )
					->get();
		// if( $sql->num_row() )
		// {
			return $sql->row();
		// }else
		// {
		// 	return false;
		// }
	}
}