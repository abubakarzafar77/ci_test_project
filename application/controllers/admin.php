<?php 


class Admin extends MY_Controller
{
	


	public function dashboard($offset = 0)
	{
		$this->load->helper('form');
		$this->load->model('articlemodel','article_m');


		$this->load->library('pagination');

		$config = [
		'base_url' 			=> 	base_url('admin/dashboard'),
		'per_page' 			=> 	5, 
		'total_rows'		=>	$this->article_m->num_rows(),
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


		$data['article_list'] = $this->article_m->article_list($config['per_page'],$this->uri->segment(3));

		
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


	public function update_article($article_id)
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules') == FALSE)
		{
			return redirect('admin/edit_article');
		}else
		{
			$post = $this->input->post();			
			$this->load->model('articlemodel','article');
			unset($post['submit']);
			if($this->article->update_article($article_id,$post))
			{
				//record inserted 
				$feedback = '<strong>your article has been updated!</strong>';
				$this->session->set_flashdata('feedback',$feedback);
				$this->session->set_flashdata('feedback_class','alert-success');
			}else
			{
				//insertion failed
				$feedback = '<strong>your updation failed!</strong>';
				$this->session->set_flashdata('feedback',$feedback);
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('admin/dashboard');
		}
		// $post = $this->input->post();
		// $this->load->model('articlemodel','article');
		// unset($post['submit']);
		// $update_check = $this->article->update_article($post['id'],$post);
		// if($update_check)
		// {
		// 	echo "record updated!";
		// }else
		// {
		// 	echo "failed ";
		// }
	}


	public function store_article()
	{
		$this->load->library('form_validation');
		$config =[
			'upload_path'  => 	'./uploads',
			'allowed_types'=> 	'jpg|png|gif'
		];

		$this->load->library('upload',$config);

		// if(!$this->upload->do_upload('file'))
		// {
		// 	$upload_error = $this->upload->display_errors();
		// 	echo $upload_error;
		// 	exit();
		// }else
		// {
		// 	$data =	$this->upload->data();
		// 	print_r($data);
		// 	exit();
		// }


		if(!$this->form_validation->run('add_article_rules') || !$this->upload->do_upload('file'))
		{
			$upload_error = $this->upload->display_errors();
			return $this->load->view('admin/add_article',compact('upload_error'));
		}else
		{
			$data =	$this->upload->data();
			$image_path = base_url('uploads/'.$data['orig_name']);

			$post = $this->input->post();
			$post['image_path'] = $image_path;
			

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
		$article_id = $this->input->post('article_id');
		$this->load->model('articlemodel','article');
		if($this->article->delete_article($article_id))
		{
				//record inserted 
			$feedback = '<strong>your article has been deleted!</strong>';
			$this->session->set_flashdata('feedback',$feedback);
			$this->session->set_flashdata('feedback_class','alert-success');
		}else
		{
				//insertion failed
			$feedback = '<strong>your deletion failed!</strong>';
			$this->session->set_flashdata('feedback',$feedback);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		return redirect('admin/dashboard');
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user_id'))
			return redirect('login');
	}
}