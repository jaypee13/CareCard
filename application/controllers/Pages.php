<?Php
class Pages extends CI_Controller{

	public function view($page = 'home'){

		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			if (is_numeric($page)){
				//it could be a record
				redirect(site_url("pos/" . $page));}
			else{
				show_404();
			}
		}

		$data['title'] = ucfirst($page);
		
		$this->load->view('templates/header'); //header page
		$this->load->view('pages/'.$page, $data); //content page
		$this->load->view('templates/footerSub');  //other required footer
		$this->load->view('templates/footer'); //load javascript sources
	}
}
