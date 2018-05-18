<?php
class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
		}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function kursus()
	{
		$this->load->view('header');
		$this->load->view('kursus');
	}

	public function workshop()
	{
		$this->load->view('header');
		$this->load->view('workshop');
	}
}
