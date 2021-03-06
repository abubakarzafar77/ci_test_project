<?php 

class Login extends MY_Controller
{
	public function index()
	{
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}

	public function admin_login()
	{
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');

		
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','User Name ', 'required|trim|max_length[25]|alpha');
		$this->form_validation->set_rules('password','Password ', 'required');

		if($this->form_validation->run()== FALSE)
		{
			$this->load->view('public/admin_login');
		}else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// echo "Username is $username and Password is $password !";
			$this->load->model('loginmodel');

			$login_data = $this->loginmodel->login_valid($username, $password);
			// this is array $login_data 
			if($login_data)
			{
				//crediention valid , login user

				// $this->load->library('session');

				// $newdata = array('user_id' => $login_data['user_id']);
				$this->session->set_userdata($login_data);
				
				// $this->load->view('admin/dashboard');
				
				redirect('admin/dashboard');
				// echo $_SESSION['user_id'];
			}else
			{
				$invlid_value = 'invalid <strong>Username</strong> and <strong>Password</strong>';
				$this->session->set_flashdata('invalid_login',$invlid_value);
				return redirect('login');
				echo "Password dont matched";
				// authentication failed !
			}
		}
	}

}