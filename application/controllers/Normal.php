<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Normal extends CI_Controller {

	//Default constructor
	function __construct()
	{
		parent::__construct();
		log_message('debug', 'URI=' . $this->uri->uri_string());
	}
	// add chart page by maryna &
	//list location by Chhunhak.CHHOEUNG
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('normal/normal_list_location', $data);
		$this->load->view('template/footer');
	}
	//add by Chhunhak.CHHOEUNG and Maryna.PHORN
	public function occupancyRate()
	{
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->view('normal/normal_chart');
		$this->load->view('template/footer');
	}
	// list room by samreth.SAROEURT
	public function list_room(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$loc_id = $this->input->get('loc_id');
		$this->load->model('Users_model');
		$data['list_room'] = $this->Users_model->selectRoom($loc_id);
		$this->load->view('normal/normal_list_room', $data);
		$this->load->view('template/footer');
	}
	public function all_room(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->model('Users_model');
		$data['list_room'] = $this->Users_model->selectAllRoom();
		$this->load->view('normal/normal_list_room', $data);
		$this->load->view('template/footer');
	}
	// Create room by samreth.SAROEURT
	public function create_room(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->model('Users_model');
		$data['manager'] = $this->Users_model->selectManager();
		$this->load->view('normal/normal_create_room',$data);
		$this->load->view('template/footer');
	}

	// Book meeting room by samreth.SAROEURT
	public function book_meeting(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->view('normal/normal_book_meeting');
		$this->load->view('template/footer');
	}
	// Resquest validate room by samreth.SAROEURT
	public function request_validate(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->view('normal/normal_request_validate');
		$this->load->view('template/footer');
	}
	// Update a room by samreth.SAROEURT
	public function update_room(){
		$user_id = $this->input->get('user_id');
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->model('Users_model');
		// $update_room['update_room'] = $this->Users_model->selectUpdateRoom($user_id);
		$data['manager'] = $this->Users_model->selectManager();
		$this->load->view('normal/normal_update_room',$data);
		$this->load->view('template/footer');
	}
	//edited by Chhunhak.CHHOEUNG
	public function update_locations(){
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
		}
	public function update_booking(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->view('normal/normal_update_booking');
		$this->load->view('template/footer');
	}
	// create by thintha
	 public function room_availability(){
	  $this->load->view('template/header');
	  $this->load->view('template/normal_left_sidebar');
	  $room_id = $this->input->get('room_id');
	  $this->load->model('Users_model');
	  $data['view_room'] = $this->Users_model->view_room_detail($room_id);
	  $this->load->view('normal/normal_room_availability', $data);
	  $this->load->view('template/footer');
	 }
	// create by thintha
	// Edited by Chhunhak.CHHOEUNG
	public function location(){
		$this->index();
	}
	// create by thintha
	public function create_location(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->view('normal/normal_create_location');
		$this->load->view('template/footer');
	}
	// insert locatin into db by Chhunhak.CHHOEUNG
	public function insert_location(){
		$name =$this->input->post('loc_name');
		$des =$this->input->post('des');
		$add =$this->input->post('address');
		$embed_url_map =$this->input->post('embed_url_map');
		if ($name != '' && $des != '' && $add != ''&& $embed_url_map != '') {
			$this->load->model('Users_model');
			$add = $this->Users_model->add_location($name, $des, $add,$embed_url_map);
			if ($add == 'true') {
				$this->index();
			}else{
				$this->create_location();
			}
		}else{
			$this->create_location();

		}
	}
	//create by Chhunhak.CHHOEUNG
	public function fullCalendar(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->view('normal/normal_fullcalendar');
		$this->load->view('template/footer');
		
	}
	// create by thintha
	public function edit_location(){
			$loc_id = $this->input->get('loc_id');
			$this->load->view('template/header');
			$this->load->view('template/normal_left_sidebar');
			$this->load->model('Users_model');
			$data['listUpdatelocation'] = $this->Users_model->selectUpdateLocation($loc_id);
			$this->load->view('normal/normal_edit_location', $data);
			$this->load->view('template/footer');
		}
	// insert creat room by samreth.SAROEURT
	public function insert_create_room(){

		$room = $this->input->post("name");
		$floor = $this->input->post("floor");
		$user_id = $this->input->post("user_id");
		$description = $this->input->post("description");
		$this->load->model('Users_model');
		$data= $this->Users_model->insert_create_room($room,$floor,$description,$user_id);
		
		if ($data == 'true') {
			redirect('Welcome/all_room');
		}else{
			echo "Data not insert";
		}
	}

	// delete location by Danet THORNG
	public function delete_location()
	{
		
		$locationID = $this->input->get('loc_id');
		$this->load->model('Users_model');
		$data = $this->Users_model->delete_location($locationID);
		if ($data == 'true') {
			redirect('Welcome/location');
		}else{
			echo "not delete";
		}
	}

	// create by thintha
	public function delete_room()
	{
		$room_id = $this->input->get('room_id');
		$this->load->model('Users_model');
        $data = $this->Users_model->delete_room($room_id);
        if ($data == 'true') {
        	$this->all_room();
        } else {
            redirect('notfound');
            
        } 
    
	}

// booking request room by samreth.SAROEURT
	public function booking_room(){

		$sdate = $this->input->post("startDate");
		$edate = $this->input->post("endDate");
		$note = $this->input->post("comment");
		$room_id = $this->session->userdata('room_id');
		$user_id = $this->session->userdata('id');
		$this->load->model('Users_model');
		// var_dump($sdate, $edate, $note, $room_id, $user_id);die();
		$data = $this->Users_model->booking_room($note,$sdate,$edate,$user_id,$room_id);
		if ($data == 'true') {
			$this->select_room_request();
		}else{
			echo "Data not insert";
		}
	}

	// list room by samreth.SAROEURT
	public function select_room_request(){
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->model('Users_model');
		$data['book_request'] = $this->Users_model->select_room_request();
		$this->load->view('normal/normal_booking_request', $data);
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
		$book_id = $this->input->get('book_id');
		$this->load->view('template/header');
		$this->load->view('template/normal_left_sidebar');
		$this->load->model('Users_model');
		$data['request_update'] = $this->Users_model->select_booking($book_id);
		$this->load->view('normal/normal_update_booking', $data);
		$this->load->view('template/footer');
	}

	//edite meeting room by samreth.SAROEURT
	public function update_request(){
			
			$sdate = $this->input->post("startDate");
			$edate = $this->input->post("endDate");
			$note = $this->input->post("comment");
			$book_id = $this->input->post("book_id");
			$this->load->model('Users_model');
	 		$data = $this->Users_model->update_request($sdate,$edate,$note,$book_id);
			if ($data == 'true') {
				$this->select_room_request();
			}else{
				echo "Data not insert";
			}
		}
	
	
}
