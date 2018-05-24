<?php
/**
 * This controller serves the user management pages and tools.
 * @copyright  Copyright (c) 2014-2017 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
/**
 * This controller serves the user management pages and tools.
 * The difference with HR Controller is that operations are technical (CRUD, etc.).
 */
class Users extends CI_Controller {

    /**
     * Default constructor
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function __construct() {
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

    /**
     * Display the list of all users
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function index() {
      $user = $this->userlevel();
      if ($user == 'admin') {
        $this->load->helper('form');
        $data['users'] = $this->users_model->getUsersAndRoles();
        $this->load->model('Users_model');
        $data['list_location'] = $this->Users_model->selectLocation();
        $this->load->view('template/header', $data);
        $this->load->view('template/left_sidebar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('template/footer', $data);
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
    /**
     * Set a user as active (TRUE) or inactive (FALSE)
     * @param int $id User identifier
     * @param bool $active active (TRUE) or inactive (FALSE)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function active($id, $active) {
      $user = $this->userlevel();
      if ($user == 'admin') {
        $this->users_model->setActive($id, $active);
        $this->session->set_flashdata('msg', 'The user was successfully modified');
        redirect('users');
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Enable a user
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function enable($id) {
      $user = $this->userlevel();
      if ($user == 'admin') {
        $this->active($id, TRUE);
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Disable a user
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function disable($id) {
      $user = $this->userlevel();
      if ($user == 'admin') {
        $this->active($id, FALSE);
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Display a for that allows updating a given user
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function edit($id) {
      $user = $this->userlevel();
      if ($user == 'admin') {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required|strip_tags');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|strip_tags');
        $this->form_validation->set_rules('login', 'Login', 'required|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'required|strip_tags');
        $this->form_validation->set_rules('role[]', 'Role', 'required');

        $data['users_item'] = $this->users_model->getUsers($id);
        if (empty($data['users_item'])) {
          redirect('notfound');
        }

        if ($this->form_validation->run() === FALSE) {
          $data['roles'] = $this->users_model->getRoles();

          $user = $this->userlevel();
          $this->load->model('Users_model');
          $data['list_location'] = $this->Users_model->selectLocation();
          $data['page'] = "users/edit";
          $this->load->view($user, $data);
        } else {
          $this->users_model->updateUsers();
          $this->session->set_flashdata('msg', 'The user was successfully modified.');
          if (isset($_GET['source'])) {
            redirect($_GET['source']);
          } else {
            redirect('users');
          }
        }
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Delete a user. Log it as an error.
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function delete($id) {
        //Test if user exists
      $user = $this->userlevel();
      if ($user == 'admin') {
        $data['users_item'] = $this->users_model->getUsers($id);
        if (empty($data['users_item'])) {
          redirect('notfound');
        } else {
          $this->users_model->deleteUser($id);
        }
        log_message('error', 'User #' . $id . ' has been deleted by user #' . $this->session->userdata('id'));
        $this->session->set_flashdata('msg', 'The user was successfully deleted');
        redirect('users');
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Reset the password of a user
     * Can be accessed by the user itself or by admin
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function reset($id) {
      $user = $this->userlevel();
      if ($user == 'admin') {
            //Test if user exists
        $data['users_item'] = $this->users_model->getUsers($id);
        if (empty($data['users_item'])) {
          log_message('debug', '{controllers/users/reset} user not found');
          redirect('notfound');
        } else {
          log_message('debug', 'Reset the password of user #' . $id);
          $this->users_model->resetPassword($id, $this->input->post('password'));

              //Send an e-mail to the user so as to inform that its password has been changed
          $user = $this->users_model->getUsers($id);
          $this->load->library('email');
          $this->load->library('parser');
          $data = array(
            'Title' => 'Your password was changed',
            'Firstname' => $user['firstname'],
            'Lastname' => $user['lastname']
          );
          $message = $this->parser->parse('emails/password_reset', $data, TRUE);

          if ($this->config->item('from_mail') != FALSE && $this->config->item('from_name') != FALSE ) {
            $this->email->from($this->config->item('from_mail'), $this->config->item('from_name'));
          } else {
            $this->email->from('do.not@reply.me', 'LMS');
          }
          $this->email->to($user['email']);
          $subject = $this->config->item('subject_prefix');
          $this->email->subject($subject . 'Your password was reset');
          $this->email->message($message);
          log_message('debug', 'Sending the reset email');
          if ($this->config->item('log_threshold') > 1) {
            $this->email->send(FALSE);
            $debug = $this->email->print_debugger(array('headers'));
            log_message('debug', 'print_debugger = ' . $debug);
          } else {
            $this->email->send();
          }

              //Inform back the user by flash message
          $this->session->set_flashdata('msg', 'The password was successfully reset');
          if ($this->session->isAdmin || $this->session->isSuperAdmin) {
            log_message('debug', 'Redirect to list of users page');
            redirect('users');
          }
          else {
            log_message('debug', 'Redirect to homepage');
            redirect('home');
          }
        }
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Display the form / action Create a new user
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function create() {
      $user = $this->userlevel();
      if ($user == "admin") {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['roles'] = $this->users_model->getRoles();

        $this->form_validation->set_rules('firstname', 'Firstname', 'required|strip_tags');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|strip_tags');
        $this->form_validation->set_rules('login', 'Login', 'required|callback_checkLogin|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'required|strip_tags');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
          $this->load->model('Users_model');
          $data['list_location'] = $this->Users_model->selectLocation();
          $this->load->view('template/header');
          $this->load->view('template/left_sidebar', $data);
          $this->load->view('users/create', $data);
          $this->load->view('template/footer');
        } else {
          $password = $this->users_model->setUsers();
            //Send an e-mail to the user so as to inform that its account has been created
          $this->load->library('email');
          $this->load->library('parser');
          $data = array(
            'Title' => 'User account to the Booking Management application',
            'BaseURL' => base_url(),
            'Firstname' => $this->input->post('firstname'),
            'Lastname' => $this->input->post('lastname'),
            'Login' => $this->input->post('login'),
            'Password' => $password
          );
          $message = $this->parser->parse('emails/new_user', $data, TRUE);

          if ($this->config->item('from_mail') != FALSE && $this->config->item('from_name') != FALSE ) {
            $this->email->from($this->config->item('from_mail'), $this->config->item('from_name'));
          } else {
           $this->email->from('do.not@reply.me', 'Booking Management app');
         }
         $this->email->to($this->input->post('email'));
         if ($this->config->item('subject_prefix') != FALSE) {
          $subject = $this->config->item('subject_prefix');
        } else {
         $subject = 'Create Booking Management account';
       }
       $this->email->subject($subject);
       $this->email->message($message);
       log_message('debug', 'Sending the user creation email');
       if ($this->config->item('log_threshold') > 1) {
        $this->email->send(FALSE);
        $debug = $this->email->print_debugger(array('headers'));
        log_message('debug', 'print_debugger = ' . $debug);
      } else {
        $this->email->send();
      }

      $this->session->set_flashdata('msg', 'The user was successfully created');
      redirect('users');
    }
  }else{
    redirect('errors/error');
  }
}

    /**
     * Form validation callback : prevent from login duplication
     * @param string $login Login
     * @return boolean TRUE if the field is valid, FALSE otherwise
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function checkLogin($login) {
      $user = $this->userlevel();
      if ($user == "admin") {
        if (!$this->users_model->isLoginAvailable($login)) {
          $this->form_validation->set_message('checkLogin', lang('users_create_checkLogin'));
          return FALSE;
        } else {
          return TRUE;
        }
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Ajax endpoint : check login duplication
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function checkLoginByAjax() {
      $user = $this->userlevel();
      if ($user == "admin") {
        $this->output->set_content_type('text/plain');
        if ($this->users_model->isLoginAvailable($this->input->post('login'))) {
          $this->output->set_output('true');
        } else {
          $this->output->set_output('false');
        }
      }else{
        redirect('errors/error');
      }
    }

    /**
     * Action: export the list of all users into an Excel file
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function export() {
      $user = $this->userlevel();
      if ($user == "admin") {
        $this->load->view('users/export');
      }else{
        redirect('errors/error');
      }
    }

  // get user profile by Maryna PHORN
    public function get_users(){
     $user = $this->userlevel();
     if ($user == 'admin') {
      $this->load->model('Users_model');
      $data['list_user'] = $this->Users_model->selectLocation();
      $data['page'] = "user_profile";
      $data['listUsers'] = $this->Users_model->select_users();
      $this->load->view($user, $data);
    }else{
      redirect('errors/error');
    }
  }

  // Update user profile by Maryna.PHORN
  public function update_profile(){
      $user = $this->userlevel();
      if ($user == 'admin') {
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $login = $this->input->post("login");
        $email= $this->input->post("email");
        $id = $this->input->post("id");
        $this->load->model('Users_model');
        $data = $this->Users_model->update_profiles($id,$firstname,$lastname, $login, $email);
        if ($data == 'true') {
          $this->index();
        }else{
          echo "Data not insert";
        }
      }else{
        redirect('errors/error');
      }
  }
  // Udate profile by Maryna.PHORN
  public function change_password($id) {
      $user = $this->userlevel();
      if ($user == 'admin') {
            //Test if user exists
        $data['users'] = $this->users_model->get_password($id);
        if (empty($data['users'])) {
          log_message('debug', '{controllers/users/reset} user not found');
          redirect('notfound');
        } else {
          log_message('debug', 'Reset the password of user #' . $id);
          $this->users_model->change_pass($id, $this->input->post('password'));
              //Send an e-mail to the user so as to inform that its password has been changed
          $user = $this->users_model->getUsers($id);
          $this->load->library('email');
          $this->load->library('parser');
          $data = array(
            'Title' => 'Your password was changed',
            'Firstname' => $user['firstname'],
            'Lastname' => $user['lastname']
          );
          $message = $this->parser->parse('emails/password_reset', $data, TRUE);

          if ($this->config->item('from_mail') != FALSE && $this->config->item('from_name') != FALSE ) {
            $this->email->from($this->config->item('from_mail'), $this->config->item('from_name'));
          } else {
            $this->email->from('do.not@reply.me', 'LMS');
          }
          $this->email->to($user['email']);
          $subject = $this->config->item('subject_prefix');
          $this->email->subject($subject . 'Your password was reset');
          $this->email->message($message);
          log_message('debug', 'Sending the reset email');
          if ($this->config->item('log_threshold') > 1) {
            $this->email->send(FALSE);
            $debug = $this->email->print_debugger(array('headers'));
            log_message('debug', 'print_debugger = ' . $debug);
          } else {
            $this->email->send();
          }
              //Inform back the user by flash message
          $this->session->set_flashdata('msg', 'The password was successfully reset');
          if ($this->session->isAdmin || $this->session->isSuperAdmin) {
            log_message('debug', 'Redirect to list of users page');
            redirect('users');
          }
          else {
            log_message('debug', 'Redirect to homepage');
            redirect('home');
          }
        }
      }else{
        redirect('errors/error');
      }
    }
}

