<?php 


class Logout extends MY_Controller
{
	public function index()
	{
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}