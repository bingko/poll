<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_survey extends CI_Controller {


	public function index()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/index');
		$this->load->view('footer');
	}
	public function category()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/category/list_categories');
		$this->load->view('footer');
	}
	public function add_category()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/category/add_category');
		$this->load->view('footer');
	}
	public function edit_survey_form()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/edit_survey_form');
		$this->load->view('footer');
	}
}


