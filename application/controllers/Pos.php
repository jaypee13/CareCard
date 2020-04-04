<?Php 
	class pos extends CI_Controller{
		public function index(){
			

			$data['title'] = 'Sales Performance Monitoring';
			$data['QryOutput'] = $this->pos_model->get_pos();
			$data['QryBranch'] = $this->pos_model->get_branches();

			$cmbCoverage = "ALL BRANCHES";
	        $dteTrxnFrom = date('Y-m-d');
	        $dteTrxnTo = date('Y-m-d');
	        $blBasic = 1;

	        $this->session->unset_userdata('firstcmbCoverage');
	        $this->session->unset_userdata('firstblBasic');

	        $data['cmbCoverage'] = "ALL BRANCHES";
	        $data['dteTrxnFrom'] = date('Y-m-d');
	        $data['dteTrxnTo'] = date('Y-m-d');
	        $data['blBasic'] = 1;

	        $_SESSION['cmbCoverage'] = "ALL BRANCHES";
	        $_SESSION['dteTrxnFrom'] = date('Y-m-d');
	        $_SESSION['dteTrxnTo'] = date('Y-m-d');
	        $_SESSION['blBasic'] = 1;

			$this->load->view('templates/header'); //header page
			$this->load->view('pos/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
		}

		

		public function Find()  
	    {  
	    	$data['title'] = 'Sales Performance Monitoring';
	        $cmbCoverage = $this->input->post('cmbCoverage');  
	        $dteTrxnFrom = $this->input->post('dteTrxnFrom');  
	        $dteTrxnTo = $this->input->post('dteTrxnTo');  
	        $blBasic = $this->input->post('blBasic');  
	        
	        // echo $blBasic;
	        // exit();
	        $this->session->unset_userdata('firstcmbCoverage');
	        $this->session->unset_userdata('firstblBasic');

	        $data['cmbCoverage'] = $cmbCoverage;
	        $data['dteTrxnFrom'] = $dteTrxnFrom;
	        $data['dteTrxnTo'] = $dteTrxnTo;
	        $data['blBasic'] = $blBasic;

	        $_SESSION['cmbCoverage'] = $cmbCoverage;
	        $_SESSION['dteTrxnFrom'] = $dteTrxnFrom;
	        $_SESSION['dteTrxnTo'] = $dteTrxnTo;
	        $_SESSION['blBasic'] = $blBasic;

			$data['QryOutput'] = $this->pos_model->get_pos($cmbCoverage, $dteTrxnFrom, $dteTrxnTo, $blBasic);
			$data['QryBranch'] = $this->pos_model->get_branches();

			$this->load->view('templates/header'); //header page
			$this->load->view('pos/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
	        			
	    }  

	    public function salesmon(){
			$data['title'] = 'Live Sales Activated';
			$data['QryBranch'] = $this->pos_model->get_branches();

			if (isset($_SESSION['firstcmbCoverage'])){
				$cmbCoverage = $_SESSION['firstcmbCoverage']; 
			} else {
				$cmbCoverage = $this->input->post('hiddenCoverage'); 
			}

			if (isset($_SESSION['firstblBasic'])){
				$blBasic = $_SESSION['firstblBasic']; 
			} else {
				$blBasic = $this->input->post('hiddenBasic');  
			}

			$data['QryOutput'] = $this->pos_model->get_livepos($cmbCoverage, $blBasic);
			
	        $data['cmbCoverage'] = $cmbCoverage;
	        $data['blBasic'] = $blBasic; 

	        $_SESSION['cmbCoverage'] = $cmbCoverage;
	        $_SESSION['blBasic'] = $blBasic;

	        $_SESSION['firstcmbCoverage'] = $cmbCoverage;
	        $_SESSION['firstblBasic'] = $blBasic;

			$this->load->view('templates/header'); //header page
			$this->load->view('pos/salesmon', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
		}

		public function view($strID = NULL){
			if (is_numeric($strID) == FALSE){
				//if someone tried to open the info details
				//without the correct ID
			    redirect(base_url());   
			}        

			
			$data['QueryOutput'] = $this->pos_model->get_information($strID, 'Main');
			$data['QueryOutput'] = $data['QueryOutput']->row_array();
			if (empty($data['QueryOutput'])){
				$data['title'] = "Information";
				$data['LGUNo'] = $strID;
				$this->load->view('templates/header'); //header page
				$this->load->view('pos/invalid', $data); //content page
				$this->load->view('templates/footerSub');  //other required footer
				$this->load->view('templates/footer'); //load javascript sources
			}
			else {
				$data['QueryOutputPayment'] = $this->pos_model->get_information($strID, 'Payment');
				if (empty($data['QueryOutputPayment'])){
					//show_404();
				}

				$data['QueryPersonal'] = $this->pos_model->get_information($strID, 'Personal');
				if (empty($data['QueryPersonal'])){
					//show_404();
				}

				
				$data['QueryDocu'] = $this->pos_model->get_information($strID, 'Documents');
				if (empty($data['QueryDocu'])){
					//show_404();
				}

				
				$data['QueryCorporeal'] = $this->pos_model->get_information($strID, 'Corporeal');
				$data['QueryCorporeal'] = $data['QueryCorporeal']->row_array();
				if (empty($data['QueryCorporeal'])){
					//show_404();
				}
				if (empty($data['QueryOutput']) == FALSE){
					header("Content-Type: image/jpeg");
					$data['title'] = "Information";
					$this->load->view('templates/header'); //header page
					$this->load->view('pos/view', $data); //content page
					$this->load->view('templates/footerSub');  //other required footer
					$this->load->view('templates/footer'); //load javascript sources
				}
			}
		}
		
		

	    public function reload()  
	    {  
	    	$data['title'] = 'List of pos';

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
	    		$cmbCoverage = $_SESSION['tmpSessCoverage'];
	    	}

			$data['QryOutput'] = $this->pos_model->get_pos($strFullName, $strIDNumber, $cmbCoverage);

			$this->load->view('templates/header'); //header page
			$this->load->view('pos/index', $data); //content page
			$this->load->view('templates/footerSub');  //other required footer
			$this->load->view('templates/footer'); //load javascript sources
	    }  
	}
