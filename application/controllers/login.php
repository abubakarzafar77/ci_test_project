<?php 

class Login extends MY_Controller
{
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}

	public function admin_login()
	{
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','User Name ', 'required|trim|max_length[15]|alpha');
		$this->form_validation->set_rules('password','Password ', 'required');

		if($this->form_validation->run()== FALSE)
		{
			$this->load->view('public/admin_login');
		}else
		{
			echo 'No errors';
		}
	}
}