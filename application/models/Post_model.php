<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		public function get_posts($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->query("SELECT * FROM posts order by created_at DESC");
				return $query->result_array();
			}
			$query = $this->db->query("SELECT * FROM posts where slug = '" . $slug . "'");
		
			return $query->row_array();
		}

		public function get_posts_index($per_user = 3){
			$user_query = $this->db->query("SELECT user_id, username FROM users where status = 1");
			$users = $user_query->result_array();
			$posts = array();
			if(!empty($users)){
				foreach($user_query->result_array() as $checker_row){
					$checker[$checker_row['user_id']]['count'] = 0;
					$checker[$checker_row['user_id']]['username'] = $checker_row['username'];
				}
				$query = $this->db->query("SELECT * FROM posts where status = 1 order by created_at DESC");		
				foreach ($query->result_array() as $row){			
					if($checker[$row['user_id']]['count'] < $per_user){
						$posts[] = ['user_id' => $row['user_id'], 'username' => $checker[$row['user_id']]['username'], 'post' => $row];
					}
					$checker[$row['user_id']]['count']++;
				}
			}
			return $posts;
		}
		
		public function get_posts_by_username($username = FALSE){
			$posts = array();
			if($username){
				$user = $this->User_model->get_user_by_username($username);
				$query = $this->db->query("SELECT * FROM posts where user_id = '" . $user['user_id'] . "' and status = 1 order by created_at DESC");		
				$posts = $query->result_array();
			}
			return $posts;
		}

		public function update_post(){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'content' => $this->input->post('content')
			);

			$this->db->where('post_id', $this->input->post('post_id'));
			return $this->db->update('posts', $data);
		}
		
		public function create_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'user_id' => $_SESSION['user_id'],
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'content' => $this->input->post('content'),
				'status' => 1
			);
			return $this->db->insert('posts', $data);
		}
	}
