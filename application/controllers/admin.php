<?php 


class Admin extends MY_Controller
{
	


	public function dashboard()
	{
		$this->load->model('articlemodel','article_m');

		$data['article_list'] = $this->article_m->article_list();

		
		$this->load->view('admin/dashboard',$data);

	}
	public function add_article()
	{
		$this->load->helper('form');
		$this->load->view('admin/add_article');
	}
	public function edit_article()
	{
		
	}
	public function store_article()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules') == FALSE)
		{
			echo 'roles are wrong';
			exit();
			return redirect('admin/add_article');
		}else
		{
			echo "helloo";
		}
	}
	public function delete_article()
	{
		
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user_id'))
			return redirect('login');
	}
}