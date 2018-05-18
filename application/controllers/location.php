<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location extends CI_Controller {

	//Default constructor
	function __construct()
	{
		parent::__construct();
		log_message('debug', 'URI=' . $this->uri->uri_string());
		$this->session->set_userdata('last_page', $this->uri->uri_string());
		if($this->session->loggedIn === TRUE) {
           // Allowed methods
			if ($this->session->isAdmin || $this->session->isSuperAdmin) {
             //User management is reserved to admins and super admins
			} else {
				$user = $this->session->role;
				if ($user == 2) {
					$page = "manager";
					return $page;
					$data['page'] = "list_location";
					$this->load->view($user, $data);
				}else if ($user == 3) {
					$page = "normal";
					return $page;
					$data['page'] = "list_location";
					$this->load->view($user, $data);
				}else{
					redirect('connection/login');
				}
			}
		} else {
			redirect('connection/login');
		}
		$this->load->model('users_model');
	}
	public function index()
	{
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$data['page'] = "list_location";
		$user = $this->userlevel();
		$this->load->view($user, $data);
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
		// Edited location by Maryna.PHORN
	public function update_locations(){
			$user = $this->userlevel();
			if ($user == 'admin') {
				$name = $this->input->post("name");
				$des = $this->input->post("description");
				$add = $this->input->post("address");
				$loc_id = $this->input->post("loc_id");
				$this->load->model('Users_model');
				$data = $this->Users_model->update_location($name,$des,$add,$loc_id);
				if ($data == 'true') {
					$this->index();
				}else{
					echo "Data not insert";
				}
			}else{
				redirect('errors/error');
			}
	}
	public function create_location(){
			$user = $this->userlevel();
			if ($user == "admin") {
				$this->load->model('Users_model');
				$data['list_location'] = $this->Users_model->selectLocation();
				$data['page'] = "create_location";
				$this->load->view($user, $data);
			}else{
				redirect('errors/error');
			}
	}
		// insert locatin into db by Chhunhak.CHHOEUNG
	public function insert_location(){
		$user = $this->userlevel();
		if ($user == 'admin') {
			$name =$this->input->post('loc_name');
			$des =$this->input->post('des');
			$add =$this->input->post('address');
		    $lat =$this->input->post('lat');
		    $long =$this->input->post('long');
			if ($name != '' && $des != '' && $add != '' && $lat !='' && $long !='') {
				$this->load->model('Users_model');
				$add = $this->Users_model->add_location($name, $des, $add,$lat,$long);
				if ($add == 'true') {
					$this->index();
				}else{
					$this->create_location();
				}
			}else{
				$this->create_location();
			}
		}else{
			redirect('errors/error');
		}
	}
		//create by Chhunhak.CHHOEUNG

		// create by thintha
	public function edit_location(){
		$user = $this->userlevel();
		if ($user == 'admin') {
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$loc_id = $this->input->get('loc_id');
			$data['page'] = "edit_location";
			$data['listUpdatelocation'] = $this->Users_model->selectUpdateLocation($loc_id);
			$this->load->view($user, $data);
		}else{
			redirect('errors/error');
		}
	}

		// delete location by Danet THORNG
	public function delete_location()
	{

		$locationID = $this->input->get('loc_id');
		$this->load->model('Users_model');
		$data = $this->Users_model->delete_location($locationID);
		if ($data == 'true') {
			redirect('location');
		}else{
			echo "not delete";
		}
	}
}
