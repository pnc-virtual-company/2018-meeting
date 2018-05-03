<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('list_location', $data);
		$this->load->view('template_admin/footer');
	}
	//add by Chhunhak.CHHOEUNG and Maryna.PHORN
	public function occupancyRate()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('chart');
		$this->load->view('template_admin/footer');
	}
	// list room by samreth.SAROEURT
	public function list_room(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$loc_id = $this->input->get('loc_id');
		$this->load->model('Users_model');
		$data['list_room'] = $this->Users_model->selectRoom($loc_id);
		$this->load->view('list_room', $data);
		$this->load->view('template_admin/footer');
	}
	public function all_room(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->model('Users_model');
		$data['list_room'] = $this->Users_model->selectAllRoom();
		$this->load->view('list_room', $data);
		$this->load->view('template_admin/footer');
	}
	// Create room by samreth.SAROEURT
	public function create_room(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->model('Users_model');
		$data['manager'] = $this->Users_model->selectManager();
		$this->load->view('create_room',$data);
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
	// Resquest validate room by samreth.SAROEURT
	public function request_validate(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('request_validate');
		$this->load->view('template_admin/footer');
	}
	// Update a room by samreth.SAROEURT
	public function update_room(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->model('Users_model');
		$data['manager'] = $this->Users_model->selectManager();
		$this->load->view('update_room',$data);
		$this->load->view('template_admin/footer');
	}
	public function update_booking(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('update_booking');
		$this->load->view('template_admin/footer');
	}
	// create by thintha
	public function room_availability(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('room_availability');
		$this->load->view('template_admin/footer');
	}
	// create by thintha
	// Edited by Chhunhak.CHHOEUNG
	public function location(){
		$this->index();
	}
	// create by thintha
	public function create_location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('create_location');
		$this->load->view('template_admin/footer');
	}
	// insert locatin into db by Chhunhak.CHHOEUNG
	public function insert_location(){
		$name =$this->input->post('loc_name');
		$des =$this->input->post('des');
		$add =$this->input->post('address');
		if ($name != '' && $des != '' && $add != '') {
			$this->load->model('Users_model');
			$add = $this->Users_model->add_location($name, $des, $add);
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
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('fullcalendar');
		$this->load->view('template_admin/footer');
		
	}
	// create by thintha
	public function edit_location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('edit_location');
		$this->load->view('template_admin/footer');
	}
	// insert creat room by samreth.SAROEURT
	public function insert_create_room(){

		$room = $this->input->post("name");
		$floor = $this->input->post("floor");
		$description = $this->input->post("description");
		$location = $this->session->userdata('loc_id');
		$this->load->model('Users_model');
		$data= $this->Users_model->insert_create_room($room,$floor,$description);
		
		if ($data) {
			redirect('Welcome/create_room');
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
		// $location = $this->session->userdata('loc_id');
		$this->load->model('Users_model');
		$data= $this->Users_model->booking_room($sdate,$edate,$note);
		
		if ($data) {
			redirect('Welcome/book_meeting');
		}else{
			echo "Data not insert";
		}
	}
	
}
