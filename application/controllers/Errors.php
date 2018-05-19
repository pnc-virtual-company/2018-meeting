<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
	}

	public function privileges()
	{
		$data['activeLink'] = 'home';
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('errors/html/privileges', $data);
		$this->load->view('templates/footer', $data);
	}
	public function userlevel()
	{
		$user = $this->session->role;
		if ($user == 1) {
			$page = "admin";
			return $page;
		}elseif ($user == 2) {
			$page = "manager";
			return $page;
		}else if ($user == 3) {
			$page = "normal";
			return $page;
		}else{
			redirect('connection/login');
		}
	}
	public function error()
	{
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$user = $this->userlevel();
		if ($user == 'admin') {
			$data['page'] = "errors/html/privileges";
			$data['user'] = $user;
		}else{
			$data['page'] = "../errors/html/privileges";
			$data['user'] = $user;
		}
		$this->load->view($user, $data);
	}
	public function notfound()
	{
		$data['activeLink'] = 'home';
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('errors/html/notfound', $data);
		$this->load->view('templates/footer', $data);
	}
}
