<?php
	class Posts extends CI_Controller{
		public function index($page = 0){			
			$data['posts'] = $this->Post_model->get_posts_index($per_user = 3);
			$config['total_rows'] = count($data['posts']);
			$config['per_page'] = 2;
			$config['page'] = $page;
			$config['pagination_base_url'] = "posts/index";
			
			if(empty($data['posts'])){
				redirect('register');
			}
			
			if($config['total_rows'] > $config['per_page']){
				$offset = $config['per_page'] * $page;
				$data['posts'] = array_slice($data['posts'], $offset, $config['per_page']);
				$do_paginate = TRUE;
			}
			
			$data['title'] = 'Latest Posts';			
				
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			if($do_paginate){
				$this->load->view('templates/pagination', $config);
			}
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['is_my_profile'] = FALSE;
			$data['post'] = $this->Post_model->get_posts($slug);
			if(empty($data['post'])){
				redirect('posts');
			}
			$user_id = $data['post']['user_id'];
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			if(isset($_SESSION['username'])  && ($_SESSION['username'] == $data['user']['username'])){
				$data['is_my_profile'] = TRUE;
			}
		
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function edit($slug = NULL){
			$data['post'] = $this->Post_model->get_posts($slug);
			
			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}
		
		public function create(){
			if(isset($_SESSION['username'])){
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');

				if($this->form_validation->run() === FALSE){
					$this->load->view('templates/header');
					$this->load->view('posts/create');
					$this->load->view('templates/footer');
				} 
				else{
					$this->Post_model->create_post();
					redirect('users/' . $_SESSION['username']);
				}
			}
			else{
				redirect('posts');
			}
		}
		
		public function update(){
			$this->Post_model->update_post();
			$post_id = $this->input->post('post_id');
			redirect('users/' . $_SESSION['username']);
		}

		public function get_post_username($post_id){
			$user = $this->User_model->get_user_by_post_id($post_id);
			return $user;
		}
	}
