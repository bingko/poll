<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_user extends CI_Controller {


	public function user()
	{
		$this->load->view('head');
		$this->load->view('manage_user/user');
		$this->load->view('footer');
	}
	public function keep()
	{
		$this->load->view('head');
		$this->load->view('manage_user/keep');
		$this->load->view('footer');
	}
	public function user_copy()  // Test page by Run
	{
		$this->load->view('head');
		$this->load->view('manage_user/user_copy');
		$this->load->view('footer');
	}
	public function search_user()
	{
		$this->load->view('head');
		$this->load->view('search_user');
		$this->load->view('footer');
	}
}

