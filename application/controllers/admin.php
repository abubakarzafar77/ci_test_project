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
	public function edit_article($article_id)
	{
		$this->load->helper('form');
		$this->load->model('articlemodel','article');
		$data['article_row'] = $this->article->find_article($article_id);	
		$this->load->view('admin/edit_article',$data);
	}


	public function update_article()
	{
		$post = $this->input->post();
		$this->load->model('articlemodel','article');
		unset($post['submit']);
		$update_check = $this->article->update_article($post['id'],$post);
		if($update_check)
		{
			echo "record updated!";
		}else
		{
			echo "failed ";
		}
	}


	public function store_article()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules') == FALSE)
		{
			return redirect('admin/add_article');
		}else
		{
			$post = $this->input->post();
			
			$this->load->model('articlemodel','article');

			if($this->article->add_article($post))
			{
				//record inserted 
				$feedback = '<strong>your article has been inserted!</strong>';
				$this->session->set_flashdata('feedback',$feedback);
				$this->session->set_flashdata('feedback_class','alert-success');
			}else
			{
				//insertion failed
				$feedback = '<strong>your insertion failed!</strong>';
				$this->session->set_flashdata('feedback',$feedback);
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('admin/dashboard');
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