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
			$data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
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
			$loc_id = $this->input->post('loc_id');
			$loc_name = $this->input->post('loc_name');
			$room_name = $this->input->post('room_name');
			$this->load->model('users_model');
			$chekcDate = strtotime(date("Y-m-d")) - strtotime($date);
			if ($chekcDate > 0) {
				$this->session->set_flashdata('msg', 'Cannot book at before this time');
				$this->book_meeting();
			}else{
				$getRoom =  $this->users_model->selectbookingroom($room_id,$date);
				if ($getRoom->num_rows() == 0) {
						$data = $this->users_model->booking_room($note,$date,$start,$end,$user_booking_id,$room_id);
						if ($data != 'true') {
							$this->session->set_flashdata('msg', 'Cannot book at this time');
							redirect('booking/book_meeting');
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
				}else{
					$Starttime[] = "";
					$Endtime[] = "";
					foreach ($getRoom->result() as $row) {
						$Date = $row->Date;
						$Starttime[] .= $row->Start;
						$Endtime[] .= $row->End;
					}
					// var_dump($Starttime, $Endtime);die();
					$book = "false";
					for ($i=0; $i < count($Starttime); $i++) { 
						$stime = new DateTime($Starttime[$i]);
						$etime = new DateTime($Endtime[$i]);
						$sbook = new DateTime(substr($start,0,-2));
						$ebook = new DateTime(substr($end, 0, -2));
						if ($ebook <= $stime) {
							$book = "true";
						}else if ($sbook >= $etime) {
							$book = "true";
						}else{
							$book = "false";
						}
					}
					if ($book== 'true' ) {
						$this->load->model('Users_model');
						$data = $this->Users_model->booking_room($note,$date,$start,$end,$user_booking_id,$room_id);
						if ($data != 'true') {
							$this->session->set_flashdata('msg', 'Cannot book at this time');
							redirect('booking/book_meeting');
						}else {
							if($data == 'true'){
								$mail = $this->sendbookingmail($note,$date,$start,$end,$user_booking_id,$room_id);
								if ($mail =='true') {
									redirect('booking');
								}else{
									echo $mail;;
								}
							}else{
								$this->session->set_flashdata('msg', 'Cannot book at this time because have in another book');
								$this->book_meeting();
							}
						}
					}else{
						$this->session->set_flashdata('msg', 'Cannot book at this time');
						$this->book_meeting();
					}
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
			$loc_id = $this->input->post('loc_id');
			$loc_name = $this->input->post('loc_name');
			$room_name = $this->input->post('room_name');
			$this->load->model('users_model');
			$chekcDate = strtotime(date("Y-m-d")) - strtotime($date);
			if ($chekcDate > 0) {
				$this->book_meeting();
			}else{
				$getRoom =  $this->users_model->selectbookingroom($room_id,$date);
				if ($getRoom->num_rows() == 0) {
						$data = $this->users_model->booking_room($note,$date,$start,$end,$user_booking_id,$room_id);
						if ($data != 'true') {
							$this->session->set_flashdata('msg', 'Cannot book at this time');
							redirect('booking/book_meeting');
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
				}else{
					$Starttime[] = "";
					$Endtime[] = "";
					foreach ($getRoom->result() as $row) {
						$Date = $row->Date;
						$Starttime[] .= $row->Start;
						$Endtime[] .= $row->End;
					}
					// var_dump($Starttime, $Endtime);die();
					$book = "false";
					for ($i=0; $i < count($Starttime); $i++) { 
						$stime = new DateTime($Starttime[$i]);
						$etime = new DateTime($Endtime[$i]);
						$sbook = new DateTime($start);
						$ebook = new DateTime($end);
						if ($ebook <= $stime) {
							$book = "true";
						}else if ($sbook >= $etime) {
							$book = "true";
						}else{
							$book = "false";
						}
					}
					if ($book== 'true' ) {
						$this->load->model('Users_model');
						$data = $this->Users_model->booking_room($note,$date,$start,$end,$user_booking_id,$room_id);
						if ($data != 'true') {
							$this->session->set_flashdata('msg', 'Cannot book at this time');
							redirect('booking/book_meeting');
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
					}else{
						$this->book_meeting();
					}
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
			$data['flashPartialView'] = "";
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
			$room_id = $this->input->get('room_id');
			$this->load->model('users_model');
			$getRoom =  $this->users_model->selectbookingroom($room_id,$date);
			$Starttime[] = "";
			$Endtime[] = "";
			foreach ($getRoom->result() as $row) {
				$Date = $row->Date;
				$Starttime[] .= $row->Start;
				$Endtime[] .= $row->End;
			}
			// var_dump($Starttime, $Endtime);die();
			$book = "false";
			for ($i=0; $i < count($Starttime); $i++) { 
				$stime = new DateTime($Starttime[$i]);
				$etime = new DateTime($Endtime[$i]);
				$sbook = new DateTime($start);
				$ebook = new DateTime($end);
				if ($ebook <= $stime) {
					$book = "true";
				}else if ($sbook >= $etime) {
					$book = "true";
				}else{
					$book = "false";
				}
			}
			
			if ($book == 'true') {
				$this->load->model('Users_model');
				$data = $this->Users_model->update_request($date,$start,$end,$note,$book_id);
				if ($data == 'true') {
					redirect('booking');
				}else{
					echo "Data not insert";
				}
			}else{
				$this->session->set_flashdata('msg', 'Cannot change to this time');
				redirect('booking');
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
			$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Meeting Room Management');
			$this->email->to($email, $firstname);
			$this->email->subject('Requested Meeting Room ');
			$this->email->message('Dear '.$firstname.',  <br /> <br />Your room has been booked on date '.$date.' start from '.$start.' to '.$end.' <br /> <br /> Best Regard,');
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
				$date = $row->Date;
				$start = $row->Start;
				$end = $row->End;
			}
			$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Meeting Room Management');
			$this->email->to($email, $booking_user);
			$this->email->subject('Accepted Request Meeting');
			$this->email->message('Dear '.$booking_user.',  <br /> <br /> Your request for the room on date '.$date. 'from start ' .$start.' to '.$end.' has been accepted. <br /> <br /> Best Regard,');
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
				$date = $row->Date;
				$start = $row->Start;
				$end = $row->End;

			}
			$this->email->from('pnc.temporary.vc2018@passerellesnumeriques.org', 'Meeting Room Management');
			$this->email->to($email, $booking_user);
			$this->email->subject('Rejected Request Meeting');
			$this->email->message('Dear '.$booking_user.',  <br /> <br /> Your request for the room on date '.$date. 'from start ' .$start.' to '.$end.' has been rejected. <br /> <br /> Best Regard,');
			if ($this->email->send()) {
				return 'true';
			}else{
				return $this->email->print_debugger();;
			}
		}
	}
