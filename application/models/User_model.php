<?php 
	class User_model extends CI_Model{

		public function update_userpwd($user,$data){
			$this->db->where('strUserName', $user);
			$this->db->update('tblUser', $data);
			
		}

		public function Update_ConstPwd($user,$data){
			$this->db->where('strLGUNo', $user);
			$this->db->update('tblConstituent', $data);
			
		}
	}
