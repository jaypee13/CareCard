<?Php
class Pages extends CI_Controller{

	public function view($page = 'home'){

		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			if (is_numeric($page)){
				//it could be a constituent record
				redirect(site_url("constituents/" . $page));}
			else{
				show_404();
			}
		}

		$data['title'] = ucfirst($page);
		$lgu = $this->db->select('strLGUNo')->order_by('id',"desc")->limit(1)->get('tblConstituent')->row();
		$data['lguId'] = str_pad($lgu->strLGUNo + 1, 7, '0', STR_PAD_LEFT);
		$data['civilStatus'] = $this->db->from('prmList')->where('parname', 'CIVILSTAT')->get();
		$data['citizenship'] = $this->db->from('prmList')->where('parname', 'CITIZENSHIP')->get();
		$data['gender'] = $this->db->from('prmList')->where('parname', 'GENDER')->get();
		$data['blood_type'] = $this->db->from('prmList')->where('parname', 'BLOOD')->get();
		$data['hair_color'] = $this->db->from('prmList')->where('parname', 'HAIRCOLOR')->get();
		$data['eyes_color'] = $this->db->from('prmList')->where('parname', 'EYESCOLOR')->get();
		$data['barangay'] = $this->db->from('prmList')->where('parname', 'TAYTAYBRGY')->get();
		$data['employement_status'] = $this->db->from('prmList')->where('parname', 'EMPSTAT')->get();
		$data['country'] = $this->db->from('prmList')->where('parname', 'COUNTRY')->get();
		$data['region'] = $this->db->from('tblRegion')->get();
		$data['ss_type'] = $this->db->from('prmList')->where('parname', 'SSTYPE')->get();
		$data['proof_bill'] = $this->db->from('prmList')->where('parname', 'PROOFBILL')->get();

		$this->load->view('templates/header'); //header page
		$this->load->view('pages/'.$page, $data); //content page
		$this->load->view('templates/footerSub');  //other required footer
		$this->load->view('templates/footer'); //load javascript sources
	}
}
