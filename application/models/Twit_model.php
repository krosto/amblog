<?php
	class Twit_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		public function get_twits(){
			$query = $this->db->query("SELECT * FROM twits");
			return $query->result_array();
		}
		
		public function get_twit_by_id($twit_id){
			$query = $this->db->query("SELECT * FROM twits where twit_id = " . $twit_id);
			return $query->row_array();
		}
		
		public function hide_twit($twit_id = 0){
			$twit = $this->Twit_model->get_twit_by_id($twit_id);
			if(empty($twit)){
				$data = array(
					'assigned_id' => $twit_id,
					'status' => 2
				);
				return $this->db->insert('twits', $data);
			}
			else{
				$data = array(
					'status' => 2
				);

				$this->db->where('assigned_id', $twit_id);
				return $this->db->update('twits', $data);
			}
		}
		
		public function unhide_twit($twit_id = 0){
			$twit = $this->Twit_model->get_twit_by_id($twit_id);
			if(!empty($twit)){
				$this->db->where('assigned_id', $twit_id);
				$this->db->delete('twits');
			}
		}
	}
