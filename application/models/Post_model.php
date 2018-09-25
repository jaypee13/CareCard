<?php
	class Post_model extends CI_Model{
		

		public function get_posts($slug = FALSE){
			if ($slug === FALSE){
				//all values on the table will be passed on the array.
				//$this->db->order_by('id','DESC');
				//$this->db->get('tblNews');
				$query = $this->db->query('Select top 30 * from tblNews order by id DESC');
				return $query->result_array();
			}

			$query = $this->db->get_where('tblNews', array('strSlug' => $slug));
			return $query->row_array();
		}
	}