	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class booking extends CI_Controller {

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
			$user = $this->userlevel();
			if ($user == 'admin' || $user == 'manager' ) {
				$this->load->model('Users_model');
				$data['list_location'] = $this->Users_model->selectLocation();
				$data['book_request'] = $this->Users_model->select_room_request();
				$data['page'] = "booking_request";
				$user = $this->userlevel();
				// var_dump($user);die();
				$this->load->view($user, $data);
			}else{
				redirect('errors/error');
			}
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

		public function occupancyRate()
		{
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $data);
			$this->load->view('chart');
			$this->load->view('template/footer');
		}

		// Book meeting room by samreth.SAROEURT
		public function book_meeting(){
			$user = $this->userlevel();
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$data['page'] = "book_meeting";
			$this->load->view($user, $data);
		}
			// Resquest validate room by thintha and Maryna. PHORN
		public function request_validate(){
			$user = $this->userlevel();
			if ($user == 'admin' || $user == 'manager') {
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$data['request'] = $this->Users_model->select_request_validate();
			$data['page'] = 'request_validate';
			$this->load->view($user, $data);
			}else{
				redirect('errors/error');
			}

		}

		public function update_booking(){
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $data);
			$this->load->view('update_booking');
			$this->load->view('template/footer');
		}

		public function fullCalendar(){
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $data);
			$this->load->view('fullcalendar');
			$this->load->view('template/footer');

		}
			// create by thintha
		public function edit_location(){
			$this->load->model('Users_model');
			$location['list_location'] = $this->Users_model->selectLocation();
			$loc_id = $this->input->get('loc_id');
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $location);
			$this->load->model('Users_model');
			$data['listUpdatelocation'] = $this->Users_model->selectUpdateLocation($loc_id);
			$this->load->view('edit_location', $data);
			$this->load->view('template/footer');
		}


		// list room by samreth.SAROEURT
		public function select_room_request(){
			$this->load->model('Users_model');
			$location['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $location);
			$this->load->model('Users_model');
			$data['book_request'] = $this->Users_model->select_room_request();
			$this->load->view('booking_request', $data);
			$this->load->view('template/footer');
		}
		// booking request room by samreth.SAROEURT
		public function booking_room(){
			$date = $this->input->post("sdate");
			$start = $this->input->post("start");
			$end = $this->input->post("end");

			$note = $this->input->post("comment");
			$room_id = $this->session->userdata('room_id');
			$user_id = $this->session->userdata('id');

			$this->load->model('Users_model');
			$data = $this->Users_model->booking_room($note,$date,$start,$end,$user_id,$room_id);

			if ($data != 'true') {
				$this->session->set_flashdata('msg', 'Cannot book at this time');
				$this->book_meeting();
			}else {
				if($data == 'true'){
					$this->select_room_request();
				}else{
					$this->book_meeting();
				}
			}
		}


			// delete list room request by samreth.SAROEURT
		public function delete_book_request()
		{

			$book_id = $this->input->get('book_id');
			$this->load->model('Users_model');
			$data = $this->Users_model->delete_book_request($book_id);
			if ($data == 'true') {
				$this->select_room_request();
			}else{
				echo "not delete";
			}
		}

			// Book meeting room by samreth.SAROEURT
		public function update_booking_room(){
			$this->load->model('Users_model');
			$location['list_location'] = $this->Users_model->selectLocation();
			$book_id = $this->input->get('book_id');
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $location);
			$this->load->model('Users_model');
			$data['request_update'] = $this->Users_model->select_booking($book_id);
			$this->load->view('update_booking', $data);
			$this->load->view('template/footer');
		}

			//edite meeting room by samreth.SAROEURT
		public function update_request(){
			$date = $this->input->post("sdate");
			$start = $this->input->post("start");
			$end = $this->input->post("end");

			$note = $this->input->post("comment");

			$book_id = $this->input->post("book_id");
			$this->load->model('Users_model');
			$data = $this->Users_model->update_request($date,$start,$end,$note,$book_id);
			if ($data == 'true') {
				$this->select_room_request();
			}else{
				echo "Data not insert";
			}
		}
			//Export file into excel by Danet THORNG
		public function getExportFile(){
				// redirect('welcome/getExportFile');
			$this->load->model('users_model');
			$users = $this->users_model->getExportFile();
			$this->load->view('export', $users);
		}
	}
