<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function store()
	{
		$tmpQuery = "Select getDate() as DateOfServer";
        $query = $this->db->query($tmpQuery);
        foreach ($query->result() as $row)
        {
           $dteServer = $row->DateOfServer;
        }

		$inputtedData = $this->setUpperCase($this->input->post());
		$ctrlno = rand(1, 100000);

		// $lgu = $this->db->select('strLGUNo')->order_by('id',"desc")->limit(1)->get('tblConstituent')->row();
		// $lguId = str_pad($lgu->strLGUNo + 1, 7, '0', STR_PAD_LEFT);

		$input = array(
			'strFirstName'         => $inputtedData['first_name'],
			'strMidName'           => $inputtedData['middle_name'],
			'strLastName'          => $inputtedData['last_name'],
			'strSuffix'	           => $inputtedData['suffix'],
			'strFullName'          => $inputtedData['first_name'] . ' ' . $inputtedData['last_name'],
			'strCivilStat'         => $inputtedData['civil_status'],
			'dteBirth'	           => '',
			'strBirthPlace'        => $inputtedData['place_of_birth'],
			'strCountry'           => 'PH',
			'strNationality'       => 'FIL',
			'strCitizenship'       => $inputtedData['citizenship'],
			'strGender'		       => $inputtedData['gender'],
			'intHeight'		       => (int) $inputtedData['height'],
			'dblWeight'		       => (float) $inputtedData['weight'],
			'strBloodType'         => $inputtedData['blood_type'],
			'strHairColor'	       => $inputtedData['hairColor'],
			'strEyesColor'	       => $inputtedData['eyesColor'],
			'strOtherFeat'         => $inputtedData['otherFeature'],
			'blSenior'		       => isset($inputtedData['senior']) ? (bool) $inputtedData['senior'] : '',
			'strSeniorNum'         => $inputtedData['seniorCitizenNumber'],
			'strUnitBldg'	       => $inputtedData['unitNo'],
			'strStreet'		       => $inputtedData['numberStreet'],
			'strSubdv'		       => $inputtedData['subdivision'],
			'strBarangay' 	       => $inputtedData['barangay'],
			'strPostal'		       => $inputtedData['postal_code'],
			'strEmpStat'           => $inputtedData['employementStatus'],
			'strCompany'	       => $inputtedData['companyName'],
			'strWorkPosition'      => $inputtedData['position'],
			'strWorkFlrUnitBldgNo' => $inputtedData['companyUnit'],
			'strWorkStreet'		   => $inputtedData['streetName'],
			'strWorkBarangay'	   => $inputtedData['companyBarangay'],
			'strWorkCityMuni'	   => $inputtedData['city'],
			'strWorkProvince'	   => $inputtedData['province'],
			'strWorkRegion'		   => $inputtedData['region'],
			'strWorkCountry'	   => $inputtedData['country'],
			'strWorkPostal'		   => $inputtedData['companyPostalCode'],
			'strWorkContactNo'     => $inputtedData['companyContact'],
			'strHomePhone'		   => $inputtedData['homePhoneNumber'],
			'strCellPhone'		   => $inputtedData['cellPhoneNumber'],
			'strEmailAdd'	       => $inputtedData['emailAddress'],
			'strEmergContName'	   => $inputtedData['contactPerson'],
			'strEmergAddress'      => $inputtedData['contactPersonAddress'],
			'strEmergTelNo'		   => $inputtedData['telephoneNumber'],
			'strSpouseName'        => $inputtedData['spouseMaidenName'],
			'strSpouseBday'	  	   => $inputtedData['spouseBday'],
			'strChild1'			   => $inputtedData['child1'],
			'strChild2'			   => $inputtedData['child2'],
			'strChild3'			   => $inputtedData['child3'],
			'strChild4'			   => $inputtedData['child4'],
			'strChild5'			   => $inputtedData['child5'],
			'strChild6'			   => $inputtedData['child6'],
			'strChild7'			   => $inputtedData['child7'],
			'strChild8'			   => $inputtedData['child8'],
			'strChild9'			   => $inputtedData['child9'],
			'strChild10'		   => $inputtedData['child10'],
			'strFatherName'		   => $inputtedData['fatherName'],
			'strMotherMaiden'	   => $inputtedData['motherName'],
			'strUserOnProcess'	   => '',
			'strStat'			   => 'PEN',
			'dteAdded'			   => $dteServer,
			'strUser'			   => 'ONLINE',
			'strLGUNo'			   => '',
			'strCtrlNo'			   => $ctrlno
		);

		$this->db->insert('tblConstituent', $input);

		$documents = array();

		if (isset($inputtedData['ctc'])) {
			$documents['isCTC'] = (int) $inputtedData['ctc'];
			$documents['strCTC'] = $inputtedData['ctcNo'];
			$documents['dteCTCIssue'] = $inputtedData['ctcDateIssue'];
			$documents['dteCTCExpiry'] = $inputtedData['expCtcDate'];
			$documents['strCTCPlaceIssue'] = $inputtedData['placeIssue'];
		}

		if (isset($inputtedData['sss'])) {
			$documents['isSS'] = (int) $inputtedData['sss'];
			$documents['strSSType'] = $inputtedData['ssType'];
			$documents['strSS'] = $inputtedData['ssNumber'];
			$documents['dteSSIssue'] = $inputtedData['ssDateIssue'];
			$documents['dteSSExpiry'] = $inputtedData['ssExpDate'];
		}

		if (isset($inputtedData['tin'])) {
			$documents['isTIN'] = (int) $inputtedData['tin'];
			$documents['strTIN'] = $inputtedData['tinId'];
			$documents['dteTINIssue'] = $inputtedData['tinDateIssue'];
			$documents['dteTINExpiry'] = $inputtedData['tinExpDate'];
			$documents['strTINPlaceIssue'] = $inputtedData['tinPleaceIssue'];
		}
		
		if (isset($inputtedData['cedula'])) {
			$documents['isBrgy'] = (int) $inputtedData['cedula'];
			$documents['strBrgy'] = $inputtedData['cedulaNumber'];
			$documents['dteBrgyIssue'] = $inputtedData['cedulaDateIssue'];
			$documents['dteBrgyExpiry'] = $inputtedData['cedulaExpDate'];
			$documents['strBrgyPlaceIssue'] = $inputtedData['cedulaPlaceIssue'];
		}

		if (isset($inputtedData['philhealth'])) {
			$documents['isPH'] = (int) $inputtedData['philhealth'];
			$documents['strPH'] = $inputtedData['philNumber'];
			$documents['dtePHIssue'] = $inputtedData['philDateIssue'];
			$documents['dtePHExpiry'] = $inputtedData['philExpDate'];
			$documents['strPHPlaceIssue'] = $inputtedData['philPlaceIssue'];
		}
		
		if (isset($inputtedData['nso'])) {
			$documents['isNSO'] = (int) $inputtedData['nso'];
			$documents['dteNSOIssue'] = $inputtedData['nsoDateIssue'];
			$documents['dteNSOExpiry'] = $inputtedData['nsoExpDate'];
			$documents['strNSOPlaceIssue'] = $inputtedData['nsoPlaceIssue'];
			$documents['strNSO'] = $inputtedData['nsoNumber'];
		}

		if (isset($inputtedData['voters'])) {
			$documents['isVoters'] = $inputtedData['voters'];
			$documents['strVotersID'] = $inputtedData['voterNumber'];
			$documents['dteVoterIssue'] = $inputtedData['voterDateIssue'];
		}

		if (isset($inputtedData['passport'])) {
			$documents['isPassport'] = $inputtedData['passport'];
			$documents['strPassNo'] = $inputtedData['passportNumber'];
			$documents['dtePassIssue'] = $inputtedData['passportDateIssue'];
			$documents['dtePassExpiry'] = $inputtedData['passportExpDate'];
			$documents['strPassPlaceIssue'] = $inputtedData['passportPlaceIssue'];
		}

		if (isset($inputtedData['nbi'])) {
			$documents['isNBI'] = $inputtedData['nbi'];
			$documents['strNBI'] = $inputtedData['nbiNumber'];
			$documents['dteNBIIssue'] = $inputtedData['nbiDateIssue'];
			$documents['dteNBIExpiry'] = $inputtedData['nbiExpDate'];
			$documents['strNBIPlaceIssue'] = $inputtedData['nbiPlaceIssue'];
		}

		if (isset($inputtedData['brgyCert'])) {
			$documents['isBrgyCertRes'] = $inputtedData['brgyCert'];
		}

		$documents['strProofBill1'] = $inputtedData['proof1'];
		$documents['strProofBill2'] = $inputtedData['proof2'];

		$documents['isAccidDeatDism'] = isset($inputtedData['accidendatalDeath']) ? 1 : 1;
		$documents['isAddtlCov'] = isset($inputtedData['additonalCoverage']) ? 1 : 0;
		$constituenId = $this->db->insert_id();
		$documents['intConstID'] = $constituenId;

		$this->db->insert('tblConstituentDocu', $documents);

		redirect('/register/success?lgu='. $ctrlno);
	}

	public function success()
	{
		$this->load->view('templates/header'); //header page
		$this->load->view('pages/registerSuccess');
		$this->load->view('templates/footerSub');  //other required footer
		$this->load->view('templates/footer'); //load javascript sources
		$this->session->unset_userdata('user');  //clear user session
	}

	/**
	 * Check if last name, first name and birthday is already stored in the database
	 *
	 * @return void
	 */
	public function checkUserIfExist()
	{
		$inputtedData = $this->setUpperCase($this->input->post());
		$birthDay = date('Y-m-d', strtotime($inputtedData['birth_day'])) . ' 00:00:00';
		$isExist = $this->db->from('tblConstituent')->where('strFirstName', $inputtedData['first_name'])
					->where('strLastName', $inputtedData['last_name'])
					->where('dteBirth', $birthDay)
					->get()->row();
		if (!empty($isExist)) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}

	/**
	 * Format to uppercase all the inputted data
	 *
	 * @param array $data
	 * @return void
	 */
	private function setUpperCase($data)
	{
		if (empty($data)) {
			return $data;
		}

		foreach ($data as $key => $input) {
			$data[$key] = strtoupper($input);
		}

		return $data;
	}
}
