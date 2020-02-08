<?php
	class Users extends CI_Controller{
		public function index(){	
			$data['users'] = $this->User_model->get_users();

			if(empty($data['users'])){
				show_404();
			}
	
			$data['title'] = 'Users';

			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($username){
			$data['is_my_profile'] = FALSE;

			$data['user'] = $this->User_model->get_user_by_username($username);
			$data['posts'] = $this->Post_model->get_posts_by_username($username);

			$data['user']['twitter'] = str_replace("@", "", $data['user']['twitter']); 
			if(empty($data['user'])){
				show_404();
			}

			$data['title'] = $data['user']['username'] . "'s Profile";
			
			if(isset($_SESSION['username'])  && ($_SESSION['username'] == $username)){
				$data['is_my_profile'] = TRUE;
			}

			$this->load->view('templates/header');
			$this->load->view('users/view', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/footer');
		}

		public function login(){		
			$data['title'] = 'Login';
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === TRUE){
			
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$is_valid = $this->User_model->check_credentials($username, $password);
				if($is_valid){
					$user = $this->User_model->get_user_by_username($username);
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('user_id', $user['user_id']);
					redirect('users/' . $username);
				}
			} 
			else{
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}
		}
		

		public function logout(){	
			unset($_SESSION['username'], $_SESSION['user_id']);
			redirect('posts');
		}

		public function register(){		
			$data['title'] = 'Register';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('twitter', 'twitter', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} 
			else{
				// Encrypt password
				$encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

				if($insert_data = $this->User_model->register($encrypted_password)){
					$username = $this->input->post('username');
					$user = $this->User_model->get_user_by_username($username);
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('user_id', $user['user_id']);
					redirect('users/' . $this->input->post('username'));
				}
				else{
					redirect('register');
				}
			}
		}
		
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->User_model->check_username_exists($username)){
				return TRUE;
			} 
			else {
				return FALSE;
			}
		}
	}
