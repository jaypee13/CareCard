<?php 
	class User_model extends CI_Model{

		public function add_salesperf($user,$data){
			$this->db->where('strUserName', $user);
			$this->db->add('tblUser', $data);
			
		}

		public function delete_salesperf($user,$data){
			$this->db->where('strUserName', $user);
			$this->db->update('tblUser', $data);
			
		}

		public function get_branches(){
			$tmpQuery= ("Select strStoreName + ' (' + strBranchCode + ')' from tblBranch where blActive = 1 and strBranchCode <> 'ALL' order by strStoreName");

			$query = $this->db->query($tmpQuery);
			return $query->result_array();
		}

	}
