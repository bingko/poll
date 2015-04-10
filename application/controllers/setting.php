<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends CI_Controller {


	public function index()
	{
		$this->load->view('head');
		$this->load->view('home/index');
		$this->load->view('footer');
	}
}

