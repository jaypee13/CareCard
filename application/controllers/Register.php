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

		$inputtedData = $this->input->post();

		$tmpQuery = "Select cast(FLOOR(RAND(CHECKSUM(NEWID()))*(999999-100000)+100000) as nvarchar)";
        $query = $this->db->query($tmpQuery);
        $ctrlno = 'CTRLNO' . $query->CTRLNO;

		// $lgu = $this->db->select('strLGUNo')->order_by('id',"desc")->limit(1)->get('tblConstituent')->row();
		// $lguId = str_pad($lgu->strLGUNo + 1, 7, '0', STR_PAD_LEFT);

		$input = array(
			'strFirstName'         => strtoupper($inputtedData['first_name']),
			'strMidName'           => strtoupper($inputtedData['middle_name']),
			'strLastName'          => strtoupper($inputtedData['last_name']),
			'strSuffix'	           => strtoupper($inputtedData['suffix']),
			'strFullName'          => strtoupper($inputtedData['first_name'] . ' ' . $inputtedData['last_name']),
			'strCivilStat'         => strtoupper($inputtedData['civil_status']),
			'dteBirth'	           => '',
			'strBirthPlace'        => strtoupper($inputtedData['place_of_birth']),
			'strCountry'           => 'PH',
			'strNationality'       => strtoupper($inputtedData['citizenship']),
			'strCitizenship'       => strtoupper($inputtedData['citizenship']),
			'strGender'		       => strtoupper($inputtedData['gender']),
			'intHeight'		       => (int) $inputtedData['height'],
			'dblWeight'		       => (float) $inputtedData['weight'],
			'strBloodType'         => strtoupper($inputtedData['blood_type']),
			'strHairColor'	       => strtoupper($inputtedData['hairColor']),
			'strEyesColor'	       => strtoupper($inputtedData['eyesColor']),
			'strOtherFeat'         => strtoupper($inputtedData['otherFeature']),
			'blSenior'		       => isset($inputtedData['senior']) ? (bool) $inputtedData['senior'] : '',
			'strSeniorNum'         => strtoupper($inputtedData['seniorCitizenNumber']),
			'strUnitBldg'	       => strtoupper($inputtedData['unitNo']),
			'strStreet'		       => strtoupper($inputtedData['numberStreet']),
			'strSubdv'		       => strtoupper($inputtedData['subdivision']),
			'strBarangay' 	       => strtoupper($inputtedData['barangay']),
			'strPostal'		       => strtoupper($inputtedData['postal_code']),
			'strEmpStat'           => strtoupper($inputtedData['employementStatus']),
			'strCompany'	       => strtoupper($inputtedData['companyName']),
			'strWorkPosition'      => strtoupper($inputtedData['position']),
			'strWorkFlrUnitBldgNo' => strtoupper($inputtedData['companyUnit']),
			'strWorkStreet'		   => strtoupper($inputtedData['streetName']),
			'strWorkBarangay'	   => strtoupper($inputtedData['companyBarangay']),
			'strWorkCityMuni'	   => strtoupper($inputtedData['city']),
			'strWorkProvince'	   => strtoupper($inputtedData['province']),
			'strWorkRegion'		   => strtoupper($inputtedData['region']),
			'strWorkCountry'	   => strtoupper($inputtedData['country']),
			'strWorkPostal'		   => strtoupper($inputtedData['companyPostalCode']),
			'strWorkContactNo'     => strtoupper($inputtedData['companyContact']),
			'strHomePhone'		   => strtoupper($inputtedData['homePhoneNumber']),
			'strCellPhone'		   => strtoupper($inputtedData['cellPhoneNumber']),
			'strEmailAdd'	       => strtoupper($inputtedData['emailAddress']),
			'strEmergContName'	   => strtoupper($inputtedData['contactPerson']),
			'strEmergAddress'      => strtoupper($inputtedData['contactPersonAddress']),
			'strEmergTelNo'		   => strtoupper($inputtedData['telephoneNumber']),
			'strSpouseName'        => strtoupper($inputtedData['spouseMaidenName']),
			'strSpouseBday'	  	   => strtoupper($inputtedData['spouseBday']),
			'strChild1'			   => strtoupper($inputtedData['child1']),
			'strChild2'			   => strtoupper($inputtedData['child2']),
			'strChild3'			   => strtoupper($inputtedData['child3']),
			'strChild4'			   => strtoupper($inputtedData['child4']),
			'strChild5'			   => strtoupper($inputtedData['child5']),
			'strChild6'			   => strtoupper($inputtedData['child6']),
			'strChild7'			   => strtoupper($inputtedData['child7']),
			'strChild8'			   => strtoupper($inputtedData['child8']),
			'strChild9'			   => strtoupper($inputtedData['child9']),
			'strChild10'		   => strtoupper($inputtedData['child10']),
			'strFatherName'		   => strtoupper($inputtedData['fatherName']),
			'strMotherMaiden'	   => strtoupper($inputtedData['motherName']),
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
			$documents['strCTC'] = strtoupper($inputtedData['ctcNo']);
			$documents['dteCTCIssue'] = $inputtedData['ctcDateIssue'];
			$documents['dteCTCExpiry'] = $inputtedData['expCtcDate'];
			$documents['strCTCPlaceIssue'] = strtoupper($inputtedData['placeIssue']);
		}

		if (isset($inputtedData['sss'])) {
			$documents['isSS'] = (int) $inputtedData['sss'];
			$documents['strSSType'] = strtoupper($inputtedData['ssType']);
			$documents['strSS'] = strtoupper($inputtedData['ssNumber']);
			$documents['dteSSIssue'] = $inputtedData['ssDateIssue'];
			$documents['dteSSExpiry'] = $inputtedData['ssExpDate'];
		}

		if (isset($inputtedData['tin'])) {
			$documents['isTIN'] = (int) $inputtedData['tin'];
			$documents['strTIN'] = strtoupper($inputtedData['tinId']);
			$documents['dteTINIssue'] = $inputtedData['tinDateIssue'];
			$documents['dteTINExpiry'] = $inputtedData['tinExpDate'];
			$documents['strTINPlaceIssue'] = strtoupper($inputtedData['tinPleaceIssue']);
		}
		
		if (isset($inputtedData['cedula'])) {
			$documents['isBrgy'] = (int) $inputtedData['cedula'];
			$documents['strBrgy'] = strtoupper($inputtedData['cedulaNumber']);
			$documents['dteBrgyIssue'] = $inputtedData['cedulaDateIssue'];
			$documents['dteBrgyExpiry'] = $inputtedData['cedulaExpDate'];
			$documents['strBrgyPlaceIssue'] = strtoupper($inputtedData['cedulaPlaceIssue']);
		}

		if (isset($inputtedData['philhealth'])) {
			$documents['isPH'] = (int) $inputtedData['philhealth'];
			$documents['strPH'] = strtoupper($inputtedData['philNumber']);
			$documents['dtePHIssue'] = $inputtedData['philDateIssue'];
			$documents['dtePHExpiry'] = $inputtedData['philExpDate'];
			$documents['strPHPlaceIssue'] = strtoupper($inputtedData['philPlaceIssue']);
		}
		
		if (isset($inputtedData['nso'])) {
			$documents['isNSO'] = (int) $inputtedData['nso'];
			$documents['dteNSOIssue'] = $inputtedData['nsoDateIssue'];
			$documents['dteNSOExpiry'] = $inputtedData['nsoExpDate'];
			$documents['strNSOPlaceIssue'] = strtoupper($inputtedData['nsoPlaceIssue']);
			$documents['strNSO'] = strtoupper($inputtedData['nsoNumber']);
		}

		if (isset($inputtedData['voters'])) {
			$documents['isVoters'] = $inputtedData['voters'];
			$documents['strVotersID'] = strtoupper($inputtedData['voterNumber']);
			$documents['dteVoterIssue'] = $inputtedData['voterDateIssue'];
		}

		if (isset($inputtedData['passport'])) {
			$documents['isPassport'] = $inputtedData['passport'];
			$documents['strPassNo'] = strtoupper($inputtedData['passportNumber']);
			$documents['dtePassIssue'] = $inputtedData['passportDateIssue'];
			$documents['dtePassExpiry'] = $inputtedData['passportExpDate'];
			$documents['strPassPlaceIssue'] = strtoupper($inputtedData['passportPlaceIssue']);
		}

		if (isset($inputtedData['nbi'])) {
			$documents['isNBI'] = $inputtedData['nbi'];
			$documents['strNBI'] = strtoupper($inputtedData['nbiNumber']);
			$documents['dteNBIIssue'] = $inputtedData['nbiDateIssue'];
			$documents['dteNBIExpiry'] = $inputtedData['nbiExpDate'];
			$documents['strNBIPlaceIssue'] = strtoupper($inputtedData['nbiPlaceIssue']);
		}

		if (isset($inputtedData['brgyCert'])) {
			$documents['isBrgyCertRes'] = $inputtedData['brgyCert'];
		}

		$documents['strProofBill1'] = strtoupper($inputtedData['proof1']);
		$documents['strProofBill2'] = strtoupper($inputtedData['proof2']);

		$documents['isAccidDeatDism'] = isset($inputtedData['accidendatalDeath']) ? 1 : 1;
		$documents['isAddtlCov'] = isset($inputtedData['additonalCoverage']) ? 1 : 0;
		$constituenId = $this->db->insert_id();
		$documents['intConstID'] = $constituenId;

		$this->db->insert('tblConstituentDocu', $documents);

		redirect('/register/success?lgu='. $lguId . '&pwd=', 'refresh');
	}

	public function success()
	{
		$this->load->view('templates/header'); //header page
		$this->load->view('pages/registerSuccess');
		$this->load->view('templates/footerSub');  //other required footer
		$this->load->view('templates/footer'); //load javascript sources
		$this->session->unset_userdata('user');  //clear user session
	}
}