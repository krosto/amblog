<?php
	class Twits extends CI_Controller{
		public function response($twit_id = 0){	
			$twit = $this->Twit_model->get_twit_by_id($twit_id);
			$data['json'] = json_encode($twit);

			$this->load->view('twits/response', $data);
		}

		public function list(){	
			$twit = $this->Twit_model->get_twits();
			$data['json'] = json_encode($twit);

			$this->load->view('twits/response', $data);
		}

		public function hide($twit_id = 0){	
			$this->Twit_model->hide_twit($twit_id);
			$this->load->view('twits/hide');
		}
		
		public function unhide($twit_id = 0){	
			$this->Twit_model->unhide_twit($twit_id);
			$this->load->view('twits/hide');
		}
		
		
		
	}
