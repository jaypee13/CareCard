<?Php 
	class Posts extends CI_Controller{
		public function index(){
			$data['title'] = 'Latest Posts';
			$data['QryOutput'] = $this->post_model->get_posts();

			$this->load->view('templates/header'); //header page
			$this->load->view('posts/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
		}

		public function view($slug = NULL){
			$data['QueryOutput'] = $this->post_model->get_posts($slug);
			if (empty($data['QueryOutput'])){
				show_404();
			}

			$data['title'] = $data['QueryOutput']['strTitle'];

			$this->load->view('templates/header'); //header page
			$this->load->view('posts/view', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
		}

	}
