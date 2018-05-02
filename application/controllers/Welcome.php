<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
	}
	// add chart page by maryna 
	public function index()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('list_location');
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
		$this->load->view('list_room');
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
		$this->load->view('update_room');
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
	public function location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('list_location');
		$this->load->view('template_admin/footer');
	}
	// create by thintha
	public function create_location(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/left_sidebar');
		$this->load->view('create_location');
		$this->load->view('template_admin/footer');
		
	}
	//create by Chhunhak
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
		// upload image
		// $config['upload_path'] = 'assets/imgages/room/';
		// $config['allowed_types'] = 'gif|jpg|png|jpeg';
		// $config['overwrite'] = TRUE;
		// $config['max_size'] = "2048000"; 
		// $config['max_height'] = "768";
		// $config['max_width'] = "1024";


		//     if ($this->upload->do_upload('profilePic')){
		//         $data = $this->upload->data();
		//             $picture = array(
		//                 'photoPath' => $this->upload->data('full_path').$data['file_name']
		//             );
		//     }
		//     else{
		//             echo $this->upload->display_errors();
		//     } 

		$room = $this->input->post("name");
		$floor = $this->input->post("floor");
		$description = $this->input->post("description");
		
		$this->load->model('Users_model');
		$data= $this->Users_model->insert_create_room($room,$floor,$description);
		
		if ($data) {
			redirect('Welcome/create_room');
		}else{
			echo "Data not insert";
		}
	}
	
}
