<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class export extends CI_Controller {


	public function index()
	{
		$this->load->view('head');
		$this->load->view('export/export_form_pdf');
		$this->load->view('footer');
	}
	public function export_pdf()
	{
		$this->load->view('head');
		$this->load->view('export/export_form_pdf');
		$this->load->view('footer');
	}
	public function export_excel()
	{
		$this->load->view('head');
		$this->load->view('export/export_form_excel');
		$this->load->view('footer');
	}
	public function join()
	{
		$this->report_model->export_report();
	}
}

