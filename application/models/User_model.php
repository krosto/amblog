<?php
	class User_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		public function get_users(){
			$query = $this->db->query("SELECT * FROM users where status = 1");
			return $query->result_array();
		}
		
		public function get_user_by_username($username){
			$query = $this->db->query("SELECT * FROM users where username = '" . $username . "' and status = 1");
			return $query->row_array();
		}

		public function get_user_by_id($user_id = 0){
			$query = $this->db->query("SELECT * FROM users where user_id = " . $user_id . " and status = 1");
			return $query->row_array();
		}

		public function get_user_by_post_id($post_id){
			
			echo "SELECT * FROM posts where post_id = " . $post_id . " and status = 1";
			$query = $this->db->query("SELECT * FROM posts where post_id = " . $post_id . " and status = 1");
			
			$post = $query->row_array();
			//$user = $this->User_model->get_user_by_id($post['user_id']);
			return $user;			
		}

		public function register($encrypted_password){
			$data = array(
				'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
                'password' => $encrypted_password,
                'twitter' => $this->input->post('twitter'),
                'status' => 1
            );
			return $this->db->insert('users', $data);
		}	
	
		public function check_username_exists($username){
			$query = $this->db->query("SELECT * FROM users where username = '" . $username . "' and status = 1");
			if(empty($query->row_array())){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function check_credentials($username, $password){
			$query = $this->db->query("SELECT * FROM users where username = '" . $username . "' and status = 1");
			$user = $query->row_array();
			$is_valid = password_verify($password, $user['password']);
			if($is_valid){
				return TRUE;
			} 
			else{
				return FALSE;
			}
		}
		
	}
