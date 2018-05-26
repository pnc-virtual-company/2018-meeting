<?php
/**
 * This model contains the business logic and manages the persistence of users and roles
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This model contains the business logic and manages the persistence of users and roles
 * It is also used by the session controller for the authentication.
 */
class Users_model extends CI_Model {

    /**
     * Default constructor
     */
    public function __construct() {

    }

    /**
     * Get the list of users or one user
     * @param int $id optional id of one user
     * @return array record of users
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUsers($id = 0) {
        $this->db->select('users.*');
        if ($id === 0) {
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('users.id' => $id));
        return $query->row_array();
    }

    /**
     * Get the list of users and their roles
     * @return array record of users
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUsersAndRoles() {
       $this->db->select("id,firstname,lastname,login, email, tbl_roles.role_name");
       $this->db->from('users');
       $this->db->join('tbl_roles', 'users.role=tbl_roles.role_id');
       $users = $this->db->get();
       return $users->result_array();
   }

  /**
   * Get the list of roles or one role
   * 00000001 1  Admin
   * 00000010 2	User
   * 00000100 8	HR Officier / Local HR Manager
   * 00001000 16	HR Manager
   * 00010000 32	General Manager
   * 00100000 34	Global Manager
   * @param int $id optional id of one role
   * @return array record of roles
   * @author Benjamin BALET <benjamin.balet@gmail.com>
   */
  public function getRoles($id = 0) {
      if ($id === 0) {
          $query = $this->db->get('tbl_roles');
          return $query->result_array();
      }
      $query = $this->db->get_where('tbl_roles', array('role_id' => $id));
      return $query->row_array();
  }

    /**
     * Get the name of a given user
     * @param int $id Identifier of employee
     * @return string firstname and lastname of the employee
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getName($id) {
        $record = $this->getUsers($id);
        if (count($record) > 0) {
            return $record['firstname'] . ' ' . $record['lastname'];
        }
    }

    /**
     * Check if a login can be used before creating the user
     * @param string $login login identifier
     * @return bool TRUE if available, FALSE otherwise
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function isLoginAvailable($login) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Delete a user from the database
     * @param int $id identifier of the user
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function deleteUser($id) {
        $this->db->delete('users', array('id' => $id));
    }

    /**
     * Insert a new user into the database. Inserted data are coming from an HTML form
     * @return string deciphered password (so as to send it by e-mail in clear)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setUsers() {
        //Hash the clear password using bcrypt (8 iterations)
        $password = $this->input->post('password');
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);

        //Role field is a binary mask
        $role = $this->input->post("role");

        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'password' => $hash,
            'role' => $role,
            'active' => '1'
        );
        $this->db->insert('users', $data);
        return $password;
    }

    /**
     * Update a given user in the database. Update data are coming from an HTML form
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function updateUsers() {
        //Role field is a binary mask
        $role = 0;
        foreach($this->input->post("role") as $role_bit){
            $role = $role | $role_bit;
        }
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'role' => $role
        );
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update('users', $data);
        return $result;
    }

    /**
     * Update a given user in the database. Update data are coming from an HTML form
     * @param int $id Identifier of the user
     * @param string $password password in clear
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function resetPassword($id, $password) {
        //Hash the clear password using bcrypt (8 iterations)
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);
        $data = array(
            'password' => $hash
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    /**
     * Generate a random password
     * @param int $length length of the generated password
     * @return string generated password
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function randomPassword($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    /**
     * Load the profile of a user from the database to the session variables
     * @param array $row database record of a user
     */
    private function loadProfile($row) {
      /*
        00000001 1  Admin
        00000100 8  HR Officier / Local HR Manager
        00001000 16 HR Manager
        = 00001101 25 Can access to HR functions
       */
        $isAdmin = FALSE;
        if (((int) $row->role & 1)) {
            $isAdmin = TRUE;
        }
        $isSuperAdmin = FALSE;
        if (((int) $row->role & 25)) {
            $isSuperAdmin = TRUE;
        }

        $newdata = array(
            'login' => $row->login,
            'id' => $row->id,
            'firstname' => $row->firstname,
            'lastname' => $row->lastname,
            'fullname' => $row->firstname . ' ' . $row->lastname,
            'isAdmin' => $isAdmin,
            'role' => $row->role,
            'isSuperAdmin' => $isSuperAdmin,
            'loggedIn' => TRUE
        );
        $this->session->set_userdata($newdata);
    }

    /**
     * Check the provided credentials and load user's profile if they are correct
     * @param string $login user login
     * @param string $password password
     * @return bool TRUE if the user is succesfully authenticated, FALSE otherwise
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function checkCredentials($login, $password) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $this->db->where('active = TRUE');
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            //No match found
            return FALSE;
        } else {
            $row = $query->row();
            $hash = crypt($password, $row->password);
            if ($hash == $row->password) {
                // Password does match stored password.
                $this->loadProfile($row);
                return TRUE;
            } else {
                // Password does not match stored password.
                return FALSE;
            }
        }
    }
    //create by chhunhak.CHHOEUNG
    public function checkusersession($login, $role)
    {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        $return = "";
        foreach ($query->result() as $value) {
            if ($value->login == $login && $value->role == $role) {
                return true;
            }else{
                $return = "false";
            }
        }
        return $return;
    }
    /**
     * Set a user as active (TRUE) or inactive (FALSE)
     * @param int $id User identifier
     * @param bool $active active (TRUE) or inactive (FALSE)
     * @return int number of affected rows
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function setActive($id, $active) {
        $this->db->set('active', $active);
        $this->db->where('id', $id);
        return $this->db->update('users');
    }

    /**
     * Check if a user is active (TRUE) or inactive (FALSE)
     * @param string $login login of a user
     * @return bool active (TRUE) or inactive (FALSE)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function isActive($login) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->active;
        } else {
            return FALSE;
        }
    }

    /**
     * Try to return the user information from the login field
     * @param string $login Login
     * @return User data row or null if no user was found
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getUserByLogin($login) {
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            //No match found
            return null;
        } else {
            return $query->row();
        }
    }

    /**
     * Generate some random bytes by using openssl, dev/urandom or random
     * @param int $count length of the random string
     * @return string a string of pseudo-random bytes (must be encoded)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    protected function getRandomBytes($length) {
        if(function_exists('openssl_random_pseudo_bytes')) {
          $rnd = openssl_random_pseudo_bytes($length, $strong);
          if ($strong === TRUE)
            return $rnd;
    }
    $sha =''; $rnd ='';
    if (file_exists('/dev/urandom')) {
      $fp = fopen('/dev/urandom', 'rb');
      if ($fp) {
          if (function_exists('stream_set_read_buffer')) {
              stream_set_read_buffer($fp, 0);
          }
          $sha = fread($fp, $length);
          fclose($fp);
      }
  }
  for ($i=0; $i<$length; $i++) {
      $sha  = hash('sha256',$sha.mt_rand());
      $char = mt_rand(0,62);
      $rnd .= chr(hexdec($sha[$char].$sha[$char+1]));
  }
  return $rnd;
}


        // Select manager from databas By Samreth.SAROEURT
public function selectManager(){

    $this->db->select('*');
    $query = $this->db->get(' users');
    return  $query->result();
}

public function selectUpdateRoom($room_id){

    $this->db->select('*');
    $this->db->where('room_id', $room_id);
    $query = $this->db->get('tbl_rooms');

    return  $query->result();
}
         // Select manager from databas By Samreth.SAROEURT
public function selectRoom($loc_id){

    $this->db->select('*');
    $this->db->from('users');
    $this->db->join(' tbl_rooms', ' tbl_rooms.user_id = users.id');
    $this->db->where('loc_id', $loc_id);
    $query = $this->db->get();
    return  $query->result();
}
public function selectAllRoom(){

    $this->db->select('*');
    $this->db->from('users');
    $this->db->join(' tbl_rooms', ' tbl_rooms.user_id = users.id');
    $query = $this->db->get();
    return  $query->result();
}
// Select all room display in chard from databas By Samreth.SAROEURT
public function chartAllRoom(){
    $this->db->select('*');
    $this->db->from(' tbl_rooms');
    $query = $this->db->get();
    return  $query->result();
}  
// Select all room display in chard from databas By Samreth.SAROEURT
public function allchartbooking(){
    // $this->db->select("room_id, COUNT(book_id)");
    // $query =  $this->db->get_where('tbl_room_request',array('tbl_room_request.book_id'=>'room_id'));
    // return $query->result();
    $this->db->select('room_id, COUNT(book_id) as count');
    $this->db->from(' tbl_room_request');
    $this->db->group_by('room_id');
    $query = $this->db->get();
    return  $query->result();
    

}        // Select Location from Db By Chhunhak.CHHOEUNG
public function selectLocation(){

    $this->db->select('*');
    $this->db->from('tbl_locations');

    $query = $this->db->get();
    return  $query->result();
}
public function selectUpdateLocation($loc_id){

    $this->db->select('*');
    $this->db->from('tbl_locations');
    $this->db->where('loc_id', $loc_id);

    $query = $this->db->get();
    return  $query->result();
}
        // Select manager from databas By Samreth.SAROEURT
public function insert_create_room($room,$floor,$description,$manager,$loc_id){            

    $data = array('upload_data' => $this->upload->data());
                $photo = $this->upload->data()['file_name']; // Get image name

                $data = array(
                    'room_name' =>$room, 
                    'floor' =>$floor,   
                    'description' =>$description,
                    'user_id' => $manager,
                    'loc_id' => $loc_id,
                    'sta_id' => 1,   
                    'room_image' => $photo    
                );

                $result = $this->db->insert('tbl_rooms',$data);
                return $result;
            }
            //Update Room by maryna.PHOAN
            public function update_rooms($room,$floor,$description,$manager,$loc_id,$room_id){            
                $data = array('upload_data' => $this->upload->data());
                $photo = $this->upload->data()['file_name']; // Get image name
                // var_dump($room,$floor,$description,$manager,$loc_id,$room_id);die();
                $data = array(
                    'room_name' =>$room, 
                    'floor' =>$floor,   
                    'description' =>$description,
                    'user_id' => $manager,

                    'loc_id' => $loc_id,

                    'sta_id' => 1,   
                    'room_image' => $photo    
                );
                $this->db->where('room_id', $room_id);
                $result = $this->db->update('tbl_rooms',$data);
                return $result;
            }
            //edit user by Chhunhak.chhoeung
            public function update_user($id){

                $this->db->select("id,firstname,lastname,login, email,role");
                $this->db->from('users');
                $this->db->where('id', $id);
                $query = $this->db->get();
                return  $query->result();
            }
            

        //Update by Chhunhak.CHHOEUNG
            public function add_location($name, $des, $add,$lat,$long){

                $data = array(
                    'loc_name' =>$name, 
                    'description' =>$des,  
                    'address' =>$add,
                    'lat'=>$lat,
                    'long'=>$long


                );
                $result = $this->db->insert('tbl_locations',$data);
                return $result;

            }

        // by thintha
            public function delete_room($room_id) {
             $delete = $this->db->delete('tbl_rooms', array('tbl_rooms.room_id' => $room_id));
             return $delete;
         }
        // delete location by Danet THORNG
         public function delete_location($locationID) {
            $result = $this->db->delete('tbl_locations',array('tbl_locations.loc_id' =>$locationID ));
            return $result;
        }

         // Select manager from databas By Samreth.SAROEURT
        public function select_room_request(){
            $user_id = $this->session->id;
            $this->db->select('*');
            $this->db->from('tbl_room_request');
            $this->db->join('tbl_status', ' tbl_room_request.sta_id = tbl_status.sta_id');
            $this->db->join('tbl_rooms', ' tbl_rooms.room_id = tbl_room_request.room_id');
            $this->db->join('tbl_locations', ' tbl_rooms.loc_id = tbl_locations.loc_id');
            $this->db->where('tbl_room_request.user_booking_id', $user_id);
            $this->db->order_by('tbl_room_request.book_id', 'DESC');
            $query = $this->db->get();
            // var_dump($query->result());die();
            return  $query->result();
        }
            //delect user by Chhunhak CHHOEUNG
        public function delete_user($id) {
            $result = $this->db->delete('users',array('users.id' =>$id ));
            return $result;
        }
            //Booking room request By Samreth.SAROEURT

        public function  booking_room($note,$date,$start,$end,$user_booking_id,$room_id){
            if ($start == $end) {
               return false;
           }else{
               $this->db->select('*');
               $this->db->from('tbl_rooms');
               $this->db->where('tbl_rooms.room_id',$room_id);
               $query = $this->db->get();
               foreach ($query->result() as $value) {
                   $user_id = $value->user_id;
               }
               $data = array(
                   'book_description' =>$note,     
                   'Date' =>$date, 
                   'Start' =>$start,   
                   'End' =>$end,   
                   'user_id' => $user_id,
                   'user_booking_id' => $user_booking_id,
                   'room_id' => $room_id,
                   'sta_id' => 3
               );

               $result = $this->db->insert('tbl_room_request',$data);
               return $result;
           }

       }


            // delete list booking request by Samreth.SAROEURT
       public function select_booking($book_id){
        $this->db->select('*');
        $this->db->from('tbl_room_request');
        $this->db->join('tbl_rooms', ' tbl_rooms.room_id = tbl_room_request.room_id');
        $this->db->join('tbl_locations', ' tbl_rooms.loc_id = tbl_locations.loc_id');
        $this->db->where('book_id', $book_id);
        $query = $this->db->get();
        return  $query->result();
    }

    public function update_location($name,$des,$add,$lat,$long,$loc_id){
        $edit = array(
            'loc_name' =>$name, 
            'description' =>$des,   
            'address' =>$add,
            'lat' =>$lat,
            'long'=>$long  
        );
        $this->db->where('loc_id', $loc_id);
        $result = $this->db->update('tbl_locations', $edit);
        return $result;
    }
                //update_user_data by Chhunhak.CHHOEUNG
    public function update_user_data($id,$firstname,$lastname, $login, $email,$role){
        $edit = array(
            'firstname' =>$firstname, 
            'lastname' =>$lastname, 
            'login' =>$login,   
            'email' =>$email,
            'role' => $role   
        );
        $this->db->where('id', $id);
        $result = $this->db->update('users', $edit);
        return $result;
    }

     // delete list booking request by Samreth.SAROEURT 
    public function delete_book_request($book_id) {
        $result = $this->db->delete('tbl_room_request',array('tbl_room_request.book_id' =>$book_id ));
        return $result;
    }


     // update booking request by Samreth.SAROEURT 
    function update_request($date,$start,$end,$note,$book_id){

        $edit = array(
            'sta_id' => 3,
            'Date' =>$date, 
            'Start' =>$start,   
            'End' =>$end,   
            'book_description' =>$note     

        );
        $this->db->where('book_id', $book_id);
        $result = $this->db->update('tbl_room_request', $edit);
        return $result;
    }
            //by thintha
    public function view_room_detail($room_id){
        $this->db->select ( '*' ) ;
        $this->db->from('tbl_rooms' );
        $this->db->join ('tbl_room_request', 'tbl_rooms.room_id = tbl_room_request.room_id');
        $this->db->where('tbl_rooms.room_id', $room_id );
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
            // create by Thintha and Maryna PHORN
    public function select_request_validate(){
        $user_id = $this->session->id;
        $this->db->select('*');
        $this->db->from('tbl_room_request');
        $this->db->join('tbl_status', ' tbl_room_request.sta_id = tbl_status.sta_id');
        $this->db->join('tbl_rooms', ' tbl_rooms.room_id = tbl_room_request.room_id');
        $this->db->join('tbl_locations', ' tbl_rooms.loc_id = tbl_locations.loc_id');
        $this->db->join('users', ' tbl_room_request.user_booking_id = users.id');
        $this->db->where('tbl_room_request.user_id', $user_id);
        $this->db->order_by('tbl_room_request.book_id', 'DESC');
        $query = $this->db->get();
        return  $query->result();
        error_reporting(0);
        $query = $this->db->get();
        return  $query->result();
    }
    public function acceptRequest($reqId){
        $user_id = $this->session->id;
        $this->db->set('sta_id', 1);
        $this->db->where('book_id', $reqId);
        return $this->db->update('tbl_room_request');
    }
    public function rejectRequest($reqId){
        $user_id = $this->session->id;
        $this->db->set('sta_id', 2);
        $this->db->where('book_id', $reqId);
        return $this->db->update('tbl_room_request');
    }
    public function update(){
        $this->db->select('*');
        $query = $this->db->get(' users');
        return  $query->result();
    }
// Danet THORNG export file list 
    public function getExportFile($id = 0) {
        $this->db->select('tbl_rooms.room_name,tbl_rooms.floor,tbl_rooms.description,tbl_roles.role_name');
        $this->db->from('tbl_rooms');
        $this->db->join('users', 'tbl_rooms.user_id = users.id');
        $this->db->join('tbl_roles', 'tbl_roles.role_id = users.role');
        if ($id === 0) {
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('tbl_rooms', array('tbl_rooms.room_id' => $id));
        return $query->row_array();
    }
    public function selectRoomuser($room_id){
        $this->db->select('users.firstname, users.lastname, users.email');
        $this->db->from('tbl_rooms');
        $this->db->join('users', 'users.id = tbl_rooms.user_id');
        $this->db->where('tbl_rooms.room_id',$room_id);
        $query = $this->db->get();
        return $query->result();
    }

// Select user  by Maryna PHORN
    public function select_users(){
        $id = $this->session->id;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return  $query->result();
    }
// Update profile by maryna.PHORN
    public function update_profiles($id,$firstname,$lastname, $login, $email){
        $edit = array(
            'firstname' =>$firstname, 
            'lastname' =>$lastname, 
            'login' =>$login,   
            'email' =>$email,
            'id'=>$id
        );
        $this->db->where('id', $id);
        $result = $this->db->update('users', $edit);
        return $result;
    }

    public function selectReq($reqId){
        $this->db->select('*');
        $this->db->from('tbl_room_request');
        $this->db->join('users', 'users.id = tbl_room_request.user_booking_id');
        $this->db->join('tbl_rooms', 'tbl_room_request.room_id = tbl_rooms.room_id');
        $this->db->where('tbl_room_request.book_id',$reqId);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectbookingroom($room_id, $date){
        $this->db->select('Date, Start, End');
        $this->db->from('tbl_room_request');
        $this->db->where('tbl_room_request.room_id', $room_id);
        $this->db->where('tbl_room_request.Date', $date);
        $data = $this->db->get();
        return $data;
    }

    // Get current password by Maryna PHORN
    public function get_password($id = 0) {
        $this->db->select('users.*');
        if ($id === 0) {
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('users.id' => $id));
        return $query->row_array();
    }

     public function change_pass($id, $password) {
        //Hash the clear password using bcrypt (8 iterations)
        $salt = '$2a$08$' . substr(strtr(base64_encode($this->getRandomBytes(16)), '+', '.'), 0, 22) . '$';
        $hash = crypt($password, $salt);
        $data = array(
            'password' => $hash
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    Public function getEvents($room_id)
    {
     $this->db->select("*");
     $this->db->from(' tbl_room_request');
     $this->db->join('tbl_status', ' tbl_room_request.sta_id = tbl_status.sta_id');
     $this->db->join('tbl_rooms', 'tbl_room_request.room_id = tbl_rooms.room_id');
     $this->db->where('tbl_room_request.room_id', $room_id);
     $this->db->order_by('tbl_room_request.book_id', 'DESC');
     $query = $this->db->get();
     // var_dump($query);die();
     return  $query->result();
    }

}
