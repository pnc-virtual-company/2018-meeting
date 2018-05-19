<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class room extends CI_Controller {

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
		// var_dump($user);die();
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

		//add by Chhunhak.CHHOEUNG and Maryna.PHORN
		public function occupancyRate()
		{
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $data);
			$this->load->view('chart');
			$this->load->view('template/footer');
		}
		// list room by samreth.SAROEURT
		public function list_room(){
			$user = $this->userlevel();
			$this->load->model('Users_model');	
			$data['list_location'] = $this->Users_model->selectLocation();	
			$loc_id = $this->input->get('loc_id');
			$data['list_room'] = $this->Users_model->selectRoom($loc_id);
			$data['page'] = "list_room";
			$this->load->view($user, $data);
		}
		// list room by Chhunhak.CHHOEUNG
		public function listAllUsers(){
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $location);
			$loc_id = $this->input->get('loc_id');
			$this->load->model('Users_model');
			$data['listAllUsers'] = $this->Users_model->listAllUsers();
			$this->load->view('list_all_users', $data);
			$this->load->view('template/footer');
		}

		// Create room by samreth.SAROEURT
		public function create_room(){
			$user = $this->userlevel();
			if ($user == 'admin') {
				$this->load->model('Users_model');
				$data['list_location'] = $this->Users_model->selectLocation();
				$data['manager'] = $this->Users_model->selectManager();
				$data['page'] = "create_room";
				$this->load->view($user, $data);
			}else{
				redirect('errors/error');
			}
		}

		// Update a room by Maryna.PHORN
		public function update_room(){
			$user = $this->userlevel();
			if ($user == 'admin') {
				$this->load->model('Users_model');
				$data['list_location'] = $this->Users_model->selectLocation();
				$room_id = $this->input->get('room_id');
				$data['manager'] = $this->Users_model->selectManager();
				$data['update_room'] = $this->Users_model->selectUpdateRoom($room_id);
				$data['page'] = "update_room";
				$this->load->view($user, $data);
			}else{
				redirect('errors/error');
			}
		}
		// Update a room by Maryna.PHORN
		public function update_rooms(){
			$user = $this->userlevel();
			if ($user == 'admin') {
				$room = $this->input->post("name");
				$floor = $this->input->post("floor");
				$manager = $this->input->post("manager");
				$room_id = $this->input->get('room_id');
				$loc_name = $this->input->get('loc_name');
				$loc_id = $this->input->get('loc_id');
				
				$description = $this->input->post("description");
				$config['upload_path']          = './assets/images/room/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 10024;
				$config['max_height']           = 7068;

				$this->load->library('upload', $config);		    

				if ( ! $this->upload->do_upload('photo'))
				{
					echo $this->upload->display_errors();
				}else{
				       // $this->load->model('Dishes_model');
				        // $data['dishes'] = $this->Dishes_model->insert_img();
					if($config){
						echo "upload success";
					}
				}
				$this->load->model('Users_model');
				$data= $this->Users_model->update_rooms($room,$floor,$description,$manager,$loc_id, $room_id);
				
				if ($data == 'true') {
					redirect('room/list_room?loc_id='.$loc_id.'&loc_name='.$loc_name);
				}else{
					echo "Data not insert";
				}
			}else{
				redirect('errors/error');
			}
		}

		// create by thintha
		public function room_availability(){
			$user = $this->userlevel();

			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$data['page'] = "room_availability";
			$room_id = $this->input->get('room_id');
			$data['view_room'] = $this->Users_model->view_room_detail($room_id);
			$this->load->view($user, $data);
		}
		
		// insert creat room by samreth.SAROEURT
		public function insert_create_room(){

			$room = $this->input->post("name");
			$floor = $this->input->post("floor");
			$manager = $this->input->post("manager");
			$loc_id = $this->input->get('loc_id');
			$description = $this->input->post("description");

			$config['upload_path']          = './assets/images/room/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 10024;
			$config['max_height']           = 7068;

			$this->load->library('upload', $config);		    

			if ( ! $this->upload->do_upload('photo'))
			{
				echo $this->upload->display_errors();
			}else{
			       // $this->load->model('Dishes_model');
			        // $data['dishes'] = $this->Dishes_model->insert_img();
				if($config){
					echo "upload success";
				}
			}
			$this->load->model('Users_model');
			$data= $this->Users_model->insert_create_room($room,$floor,$description,$manager,$loc_id);
			
			if ($data == 'true') {
				$this->list_room();
			}else{
				echo "Data not insert";
			}
		}

		// create by thintha
		public function delete_room()
		{
			$user = $this->userlevel();
			if ($user == 'admin') {
				$loc_id = $this->input->get('loc_id');
				$room_id = $this->input->get('room_id');
				$loc_name = $this->input->get('loc_name');
				$this->load->model('Users_model');
				$data = $this->Users_model->delete_room($room_id);
				if ($data == 'true') {
					redirect('room/list_room?loc_id='.$loc_id.'&loc_name='.$loc_name);
				} else {
					redirect('notfound');
				} 
			}else{
				redirect('errors/error');
			}

		}

	// booking request room by samreth.SAROEURT
		public function booking_room(){
			$date = $this->input->post("sdate");
			$startHour = $this->input->post("startHour");
			$startMin = $this->input->post("startMin");
			$endHour = $this->input->post("endHour");
			$endMin = $this->input->post("endMin");
			$note = $this->input->post("comment");
			$room_id = $this->session->userdata('room_id');
			$user_id = $this->session->userdata('id');

			$this->load->model('Users_model');
			// var_dump($note,$date,$startHour,$startMin,$endHour,$endMin,$user_id,$room_id);die();
			$data = $this->Users_model->booking_room($note,$date,$startHour,$startMin,$endHour,$endMin,$user_id,$room_id);
			if ($data == 'true') {

				$this->select_room_request();
			}else{
				echo "Data not insert";
			}
		}

		// list room by samreth.SAROEURT
		public function select_room_request(){
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $location);
			$this->load->model('Users_model');
			$data['book_request'] = $this->Users_model->select_room_request();
			$this->load->view('booking_request', $data);
			$this->load->view('template/footer');
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
			$data['list_location'] = $this->Users_model->selectLocation();
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
			$startHour = $this->input->post("startHour");
			$startMin = $this->input->post("startMin");
			$endHour = $this->input->post("endHour");
			$endMin = $this->input->post("endMin");
			$note = $this->input->post("comment");

			$book_id = $this->input->post("book_id");
			$this->load->model('Users_model');
			$data = $this->Users_model->update_request($date,$startHour,$startMin,$endHour,$endMin,$note,$book_id);
			if ($data == 'true') {
				$this->select_room_request();
			}else{
				echo "Data not insert";
			}
		}
		public function fullCalendar(){
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $data);
			$this->load->view('fullcalendar');
			$this->load->view('template/footer');
			
		}
		//Export file into excel by Danet THORNG
		public function getExportFile(){
			// redirect('welcome/getExportFile');
			$this->load->model('users_model');
			$users = $this->users_model->getExportFile();
			$this->load->view('export', $users);
		}
}
