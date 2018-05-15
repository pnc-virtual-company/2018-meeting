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
		$this->session;
		$role = $this->session->role;
		if ($role == 1) {
			$this->load->model('Users_model');
			$data['list_location'] = $this->Users_model->selectLocation();
			$this->load->view('template/header');
			$this->load->view('template/left_sidebar', $data);
			$this->load->view('list_location', $data);
			$this->load->view('template/footer');
		}else{
			redirect('normal');
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
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$loc_id = $this->input->get('loc_id');
		$this->load->model('Users_model');
		$data['list_room'] = $this->Users_model->selectRoom($loc_id);
		$this->load->view('list_room', $data);
		$this->load->view('template/footer');
	}
	// list room by Chhunhak.CHHOEUNG
	public function listAllUsers(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$loc_id = $this->input->get('loc_id');
		$this->load->model('Users_model');
		$data['listAllUsers'] = $this->Users_model->listAllUsers();
		$this->load->view('list_all_users', $data);
		$this->load->view('template/footer');
	}
	public function all_room(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$this->load->model('Users_model');
		$data['list_room'] = $this->Users_model->selectAllRoom();
		$this->load->view('list_room', $data);
		$this->load->view('template/footer');
	}
	// Create room by samreth.SAROEURT
	public function create_room(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$this->load->model('Users_model');
		$data['manager'] = $this->Users_model->selectManager();
		$this->load->view('create_room',$data);
		$this->load->view('template/footer');
	}

	// Book meeting room by samreth.SAROEURT
	public function book_meeting(){
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $data);
		$this->load->view('book_meeting');
		$this->load->view('template/footer');
	}
	// Resquest validate room by thintha and Maryna. PHORN
	public function request_validate(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$this->load->model('Users_model');
		$data['request'] = $this->Users_model->select_request_validate();
		$this->load->view('request_validate', $data);
		$this->load->view('template/footer');

	}
	// Update a room by Maryna.PHORN
	public function update_room(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$room_id = $this->input->get('room_id');
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$this->load->model('Users_model');
		$data['update_room'] = $this->Users_model->selectUpdateRoom($room_id);
		$data['manager'] = $this->Users_model->selectManager();
		$this->load->view('update_room',$data);
		$this->load->view('template/footer');
	}
	public function update_rooms(){

		$room = $this->input->post("name");
		$floor = $this->input->post("floor");
		$manager = $this->input->post("manager");
		$room_id = $this->input->get('room_id');
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
			$this->list_room();
		}else{
			echo "Data not insert";
		}
	}

	// Edited location by Maryna.PHORN
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
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $data);
		$this->load->view('update_booking');
		$this->load->view('template/footer');
	}
	// create by thintha
	public function room_availability(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$room_id = $this->input->get('room_id');
		$this->load->model('Users_model');
		$data['view_room'] = $this->Users_model->view_room_detail($room_id);
		$this->load->view('room_availability', $data);
		$this->load->view('template/footer');
	}
	// create by thintha
	// Edited by Chhunhak.CHHOEUNG
	public function location(){
		$this->index();
	}
	// create by thintha
	public function create_location(){
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $data);
		$this->load->view('create_location');
		$this->load->view('template/footer');
	}
	//create user by chhunhak.CHHOEUNG
	public function create_user(){
		$this->load->model('Users_model');
		$data['list_location'] = $this->Users_model->selectLocation();
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $data);
		$this->load->view('comming');
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
	//Edit user by Chhunhak.CHHOEUNG
	public function edit_user(){
		$this->load->model('Users_model');
		$location['list_location'] = $this->Users_model->selectLocation();
		$id = $this->input->get('id');
		$this->load->view('template/header');
		$this->load->view('template/left_sidebar', $location);
		$this->load->model('Users_model');
		$data['updateUser'] = $this->Users_model->update_user($id);
		$this->load->view('update_user', $data);
		$this->load->view('template/footer');
	}
	public function get_update_user(){
		$id =$this->input->post('id');
		$firstname =$this->input->post('firstname');
		$lastname =$this->input->post('lastname');
		$login =$this->input->post('login');
		$email =$this->input->post('email');
		$role =$this->input->post('role');
		if ($firstname != '' && $lastname !='' &&$login != '' && $email != ''&& $role != '') {
			$this->load->model('Users_model');
			$add = $this->Users_model->update_user_data($id,$firstname,$lastname, $login, $email,$role);
			if ($add == 'true') {
				$this->listAllUsers();
			}else{
				$this->update_user();
			}
		}else{
			$this->update_user();

		}
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
	//Delete user by Chhunhak.CHHOEUNG
	public function delete_user()
	{
		$id = $this->input->get('id');
		$this->load->model('Users_model');
		$data = $this->Users_model->delete_user($id);
		if ($data == 'true') {
			redirect('Welcome/listAllUsers');
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
		$location['list_location'] = $this->Users_model->selectLocation();
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
	//Export file into excel by Danet THORNG
	public function getExportFile(){
		// redirect('welcome/getExportFile');
		$this->load->model('users_model');
		$users = $this->users_model->getExportFile();
		$this->load->view('export', $users);
	}


	//Export file into excel by Danet THORNG
	
}
///testing