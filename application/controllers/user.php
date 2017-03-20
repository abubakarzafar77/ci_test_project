<?php 

class User extends MY_Controller
{
	public function index()
	{
		

		$this->load->model('articlemodel','articles');
		$this->load->library('pagination');
		$config = [
		'base_url' 			=> 	base_url('user/index'),
		'per_page' 			=> 	5, 

		'total_rows'		=>	$this->articles->all_num_rows(),

		'full_tag_open' 	=> '<ul class="pagination">',
		'full_tag_close' 	=> '</ul>',
		'cur_tag_open'		=> '<li class="active"><a>',
		'cur_tag_close'		=> '</a></li>',
		'next_tag_open'		=> '<li>',
		'next_tag_close'	=> '</li>',
		'prev_tag_open'		=> '<li>',
		'prev_tag_close'	=> '</li>',
		'num_tag_open'		=> '<li>',
		'num_tag_close'		=> '</li>',
		'first_tag_open'		=> '<li>',
		'first_tag_close'		=> '</li>',
		'last_tag_open'		=> '<li>',
		'last_tag_close'		=> '</li>',
		];
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$this->pagination->initialize($config);

		
		$articles = $this->articles->all_article_list($config['per_page'],$this->uri->segment(3));
		$this->load->helper('form');
		$this->load->view('public/articles_list',compact('articles'));
	}




	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query' , 'Query' , 'required');

		if(! $this->form_validation->run())
		{
			return $this->index();
		}else
		{
			$query = $this->input->post('query');
			return redirect("user/search_result/$query");
			// $this->load->model('articlemodel','articles');
			// $articles = $this->articles->search($query);

			// $this->load->view('public/search_result',compact('articles'));
		}
	}

	public function search_result($query)
	{
		$this->load->model('articlemodel','articles');
		$this->load->library('pagination');
		$config = [
		'base_url' 			=> 	base_url("user/search_result/$query"),
		'per_page' 			=> 	5, 

		'total_rows'		=>	$this->articles->count_search_result($query),
		'uri_segment'		=> 	4,
		'full_tag_open' 	=> '<ul class="pagination">',
		'full_tag_close' 	=> '</ul>',
		'cur_tag_open'		=> '<li class="active"><a>',
		'cur_tag_close'		=> '</a></li>',
		'next_tag_open'		=> '<li>',
		'next_tag_close'	=> '</li>',
		'prev_tag_open'		=> '<li>',
		'prev_tag_close'	=> '</li>',
		'num_tag_open'		=> '<li>',
		'num_tag_close'		=> '</li>',
		'first_tag_open'		=> '<li>',
		'first_tag_close'		=> '</li>',
		'last_tag_open'		=> '<li>',
		'last_tag_close'		=> '</li>',
		];
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$this->pagination->initialize($config);

		
		$articles = $this->articles->search($query,$config['per_page'], $this->uri->segment(4));
		$this->load->helper('form');
		$this->load->view('public/search_result',compact('articles'));

	}
	public function article($id)
	{
		$this->load->helper('form');
		$this->load->model('articlemodel');
		$art = $this->articlemodel->find_detail( $id );
		if($art)
		{
			$this->load->view('public/article_detail' , compact('art'));
		}else
		{
			echo 'this article have no detail.';
		}
		
	}
}