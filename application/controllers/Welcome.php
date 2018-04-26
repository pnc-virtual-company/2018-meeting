<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
	}

	public function index()
	{
		// $data['activeLink'] = 'home';
		// $this->load->view('templates/header', $data);
		// $this->load->view('menu/index', $data);
		// $this->load->view('welcome', $data);
		// $this->load->view('templates/footer', $data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('template_admin/footer');
	}
	// list room by samreth.SAROEURT
	public function list_room(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('list_room');
		$this->load->view('template_admin/footer');
	}
	// Create room by samreth.SAROEURT
	public function create_room(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('create_room');
		$this->load->view('template_admin/footer');
	}
	// Book meeting room by samreth.SAROEURT
	public function book_meeting(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('book_meeting');
		$this->load->view('template_admin/footer');
	}
	// Book request room by samreth.SAROEURT
	public function book_request(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('booking_request');
		$this->load->view('template_admin/footer');
	}
	public function location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('list_location',$data);
		$this->load->view('template_admin/footer');
		$data['title'] = 'List of Location'; 
	}
	public function create_location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('create_location');
		$this->load->view('template_admin/footer');
		
	}
	public function edit_location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('edit_location');
		$this->load->view('template_admin/footer');
		
	}


}
