<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mobile extends CI_Controller {


	public function index()
	{
		//$this->load->view('head_mobile');
		$this->load->view('mobile/home');
		//$this->load->view('footer');
	}
	public function menu()
	{
		//$this->load->view('head_mobile');
		$this->load->view('mobile/mobile_menu');
		//$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */