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
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$data['book_request'] = $this->Users_model->select_room_request();
			$data['page'] = "booking_request";
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
			$user = $this->userlevel();
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$data['page'] = "update_booking";
			$this->load->view($user, $data);
		}

		// list room by samreth.SAROEURT
		public function select_room_request(){
			$user = $this->userlevel();
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$book_id = $this->input->get('book_id');
			$data['book_request'] = $this->Users_model->select_room_request();
			$data['page'] = "booking_request";
			$this->load->view($user, $data);
		}
		// booking request room by samreth.SAROEURT
		public function booking_room(){
			$date = $this->input->post("sdate");
			$start = $this->input->post("start");
			$end = $this->input->post("end");

			$note = $this->input->post("comment");
			$room_id = $this->session->userdata('room_id');
			$user_booking_id = $this->session->userdata('id');

			$this->load->model('Users_model');
			$data = $this->Users_model->booking_room($note,$date,$start,$end,$user_booking_id,$room_id);


			if ($data != 'true') {
				$this->session->set_flashdata('msg', 'Cannot book at this time');
				$this->book_meeting();
			}else {
				if($data == 'true'){
					$mail = $this->sendbookingmail($note,$date,$start,$end,$user_booking_id,$room_id);
					if ($mail =='true') {
						redirect('booking');
					}else{
						echo $mail;;
					}
				}else{
					$this->book_meeting();
				}
			}
		}

		// booking request room by samreth.SAROEURT
		public function booking_a_room(){
			$date = $this->input->post("sdate");
			$start = $this->input->post("start");
			$end = $this->input->post("end");

			$note = $this->input->post("comment");
			$room_id = $this->input->post("room_id");
			// $room_id = $this->session->userdata('room_id');
			$user_booking_id = $this->session->userdata('id');

			$this->load->model('Users_model');
			$data = $this->Users_model->booking_room($note,$date,$start,$end,$user_booking_id,$room_id);


			if ($data != 'true') {
				$this->session->set_flashdata('msg', 'Cannot book at this time');
				$this->book_meeting();
			}else {
				if($data == 'true'){
					redirect('booking');
				}else{
					$this->book_meeting();
				}
			}
		}
		public function book_a_room(){
			$user = $this->userlevel();
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$data['allroom'] = $this->Users_model->selectAllRoom();
			$this->load->model('Users_model');
			$data['page'] = "book_a_room";
			$this->load->view($user, $data);
		}

			// delete list room request by samreth.SAROEURT
		public function delete_book_request()
		{
			$book_id = $this->input->get('book_id');
			$this->load->model('Users_model');
			$data = $this->Users_model->delete_book_request($book_id);
			if ($data == 'true') {
				redirect('booking');
			}else{
				echo "not delete";
			}
		}

			// Book meeting room by samreth.SAROEURT
		public function update_booking_room(){
			$user = $this->userlevel();
			$this->load->model('Users_model');

			$data['list_location'] = $this->Users_model->selectLocation();
			$book_id = $this->input->get('book_id');
			$data['book_request'] = $this->Users_model->select_room_request();
			$data['request_update'] = $this->Users_model->select_booking($book_id);
			$data['page'] = "update_booking";
			$this->load->view($user, $data);
		}
			//edite meeting room by samreth.SAROEURT
		public function update_request(){
			$user = $this->userlevel();
			$date = $this->input->post("sdate");
			$start = $this->input->post("start");
			$end = $this->input->post("end");

			$note = $this->input->post("comment");

			$book_id = $this->input->post("book_id");
			$this->load->model('Users_model');
			$data = $this->Users_model->update_request($date,$start,$end,$note,$book_id);
			if ($data == 'true') {
				redirect('booking');
			}else{
				echo "Data not insert";
			}
		}
		// acceptRequest function by Chhunhak.CHHOEUNG
		public function acceptRequest($reqId){
			$user = $this->userlevel();
			if ($user != 'normal') {
				$this->load->model('users_model');
				$accept = $this->users_model->acceptRequest($reqId);
				if ($accept == 'true') {
					$accept = $this->acceptsendmail($reqId);
					if ($accept == 'true') {
						redirect('booking/request_validate');
					}else{
						return $accept;
					}
				}else{
					echo 'error';	
				}
			}else{
				redirect('errors/error');
			}
		}
		// rejectRequest function by Chhunhak.CHHOEUNG
		public function rejectRequest($reqId){
			$user = $this->userlevel();
			if ($user != 'normal') {
				$this->load->model('users_model');
				$rejectdata = $this->users_model->rejectRequest($reqId);
				if ($rejectdata == 'true') {
					$reject = $this-> rejectsendmail($reqId);
					if ($reject == 'true') {
						redirect('booking/request_validate');
					}else{
						return $accept;
					}
					redirect('booking/request_validate');
				}else{
					echo 'error';	
				}
			}else{
				redirect('errors/error');
			}
		}

		//Export file into excel by Danet THORNG
		public function getExportFile(){
				// redirect('welcome/getExportFile');
			$this->load->model('users_model');
			$users = $this->users_model->getExportFile();
			$this->load->view('export', $users);
		}
		// sendbookingmail by chhunhak.CHHOUENG
		public function sendbookingmail($note,$date,$start,$end,$user_booking_id,$room_id){
			$this->load->library('email');
			$room_name = $this->input->get('room_name');
			$firstnamebooking = $this->session->firstname;
			$this->load->model('users_model');
			$roomuser = $this->users_model->selectRoomuser($room_id);
			$firstname = "";
			$lastname  = "";
			$email = "";
			foreach ($roomuser as $user) {
				$firstname = $user->firstname;
				$lastname = $user->lastname;
				$email = $user->email;
			}
			$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Booking Management');
			$this->email->to($email, $firstname);
			$this->email->subject('Request booking Room at '.$room_name);
			$this->email->message('Dear '.$firstname.',  <br /> <br />your room '.$room_name.' Has been booked by '.$firstnamebooking.' from date '.$date.' start at '.$start.' end at '.$end.' <br /> <br /> Best Regard,');
			if ($this->email->send()) {
				return 'true';
			}else{
				return $this->email->print_debugger();;
			}
			
		}
		// acceptsendmail by chhunhak.CHHOUENG
		public function acceptsendmail($reqId){
			$this->load->library('email');
			$this->load->model('users_model');
			$accept = $this->users_model->selectReq($reqId);
			$booking_user ="";
			$email = "";
			$room_name = "";
			foreach ($accept as  $row) {
				$booking_user = $row->firstname;
				$email =  $row->email;
				$room_name =  $row->room_name;
			}
			$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Booking Management');
			$this->email->to($email, $booking_user);
			$this->email->subject('Accept Request Booking Room at '.$room_name);
			$this->email->message('Dear '.$firstname.',  <br /> <br /> You has been accepted booking the room in '.$room_name.'<br /> <br /> Best Regard,');
			if ($this->email->send()) {
				return 'true';
			}else{
				return $this->email->print_debugger();;
			}
			
		}
		// rejectsendmail by chhunhak.CHHOUENG
		public function rejectsendmail($reqId){
			$this->load->library('email');
			$this->load->model('users_model');
			$accept = $this->users_model->selectReq($reqId);
			$booking_user ="";
			$email = "";
			$room_name = "";
			foreach ($accept as  $row) {
				$booking_user = $row->firstname;
				$email =  $row->email;
				$room_name =  $row->room_name;
			}
			$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Booking Management');
			$this->email->to($email, $booking_user);
			$this->email->subject('Rekect Request Booking Room at '.$room_name);
			$this->email->message('Dear '.$booking_user.',  <br /> <br /> You has been Rejected booking the room in '.$room_name.'<br /> <br /> Best Regard,');
			if ($this->email->send()) {
				return 'true';
			}else{
				return $this->email->print_debugger();;
			}
		}
	}
