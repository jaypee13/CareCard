<?Php 
	class Constituents extends CI_Controller{
		public function index(){
			

			$data['title'] = 'List of Constituents';
			$data['QryOutput'] = $this->constituents_model->get_constituents();
			$data['tmpName'] = "";
	        $data['tmpIDNo'] = "";
	        $data['tmpCoverage'] = "0";
	        
	        $_SESSION['tmpSessName'] = "";
	        $_SESSION['tmpSessIDNo'] = "";
	        $_SESSION['tmpSessCoverage'] = "";

			$this->load->view('templates/header'); //header page
			$this->load->view('constituents/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
		}

		public function view($strID = NULL){
			if (is_numeric($strID) == FALSE){
				//if someone tried to open the constituent info details
				//without the correct ID
			    redirect(base_url());   
			}        

			
			$data['QueryOutput'] = $this->constituents_model->get_information($strID, 'Main');
			$data['QueryOutput'] = $data['QueryOutput']->row_array();
			if (empty($data['QueryOutput'])){
				$data['title'] = "Constituent Information";
				$data['LGUNo'] = $strID;
				$this->load->view('templates/header'); //header page
				$this->load->view('constituents/invalid', $data); //content page
				$this->load->view('templates/footerSub');  //other required footer
				$this->load->view('templates/footer'); //load javascript sources
			}
			else {
				$data['QueryPersonal'] = $this->constituents_model->get_information($strID, 'Personal');
				if (empty($data['QueryPersonal'])){
					//show_404();
				}

				
				$data['QueryDocu'] = $this->constituents_model->get_information($strID, 'Documents');
				if (empty($data['QueryDocu'])){
					//show_404();
				}

				
				$data['QueryCorporeal'] = $this->constituents_model->get_information($strID, 'Corporeal');
				$data['QueryCorporeal'] = $data['QueryCorporeal']->row_array();
				if (empty($data['QueryCorporeal'])){
					//show_404();
				}
				if (empty($data['QueryOutput']) == FALSE){
					header("Content-Type: image/jpeg");
					$data['title'] = "Constituent Information";
					$this->load->view('templates/header'); //header page
					$this->load->view('constituents/view', $data); //content page
					$this->load->view('templates/footerSub');  //other required footer
					$this->load->view('templates/footer'); //load javascript sources
				}
			}
		}
		
		public function Find()  
	    {  
	    	$data['title'] = 'List of Constituents';
	        $strFullName = $this->input->post('txtFullName');  
	        $strIDNumber = $this->input->post('txtIDNumber');  
	        $strCoverage = $this->input->post('cmbCoverage');  
	        $data['tmpName'] = $strFullName;
	        $data['tmpIDNo'] = $strIDNumber;
	        $data['tmpCoverage'] = $strCoverage;

	        $_SESSION['tmpSessName'] = $strFullName;
	        $_SESSION['tmpSessIDNo'] = $strIDNumber;
	        $_SESSION['tmpSessCoverage'] = $strCoverage;

			$data['QryOutput'] = $this->constituents_model->get_constituents($strFullName, $strIDNumber, $strCoverage);

			$this->load->view('templates/header'); //header page
			$this->load->view('constituents/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
	    }  

	    public function reload()  
	    {  
	    	$data['title'] = 'List of Constituents';

	    	if(isset($_SESSION['tmpSessName'])){
	    		$data['tmpName'] = $_SESSION['tmpSessName'];
	    		$strFullName = $_SESSION['tmpSessName'];
	    	}
	    	if(isset($_SESSION['tmpSessIDNo'])){
	    		$data['tmpIDNo'] = $_SESSION['tmpSessIDNo'];
	    		$strIDNumber = $_SESSION['tmpSessIDNo'];
	    	}
	    	if(isset($_SESSION['tmpSessCoverage'])){
	    		$data['tmpCoverage'] = $_SESSION['tmpSessCoverage'];
	    		$strCoverage = $_SESSION['tmpSessCoverage'];
	    	}

			$data['QryOutput'] = $this->constituents_model->get_constituents($strFullName, $strIDNumber, $strCoverage);

			$this->load->view('templates/header'); //header page
			$this->load->view('constituents/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
	    }  
	}
