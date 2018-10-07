<?php
	class Constituents_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_constituents($strFullName = FALSE, $strIDNumber = FALSE, $strCoverage = FALSE){

			//IF ERROR OCCURED, MAKE SURE THAT STRLGUNO HAS NO BLANK VALUE. 
			//ONLY NULL AND NUMERIC VALUE IS ALLOWED

			$tmpQuery= ("select top 500 strLGUNo, strLGUNo as [LGU Number], ISNULL(strFullName,'') AS [Full Name], 
				   (Select top 1 case when isAddtlCov = 1 then 'Add-On' else 'Standard' end from tblConstituentDocu where intConstID = tblConstituent.id) as [Coverage],
				   ISNULL((Select descrip from PRMList 
				   		   where parname = 'GENDER' and cde = strGender),'') AS [Gender], 
			       ISNULL((Select descrip from PRMList 
			       		   where parname = 'CIVILSTAT' and cde = strCivilStat),'') AS [Civil], 
				   CONVERT(VARCHAR(10), dteBirth, 101) AS [Birth], replace(replace(replace(isNull(strUnitBldg, '') + ' ' + isNull(strStreet, '') + ' ' + isNull(strSubdv, '') + ' ' + isNull(strBarangay, '') + ' ' + isNull(strPostal, ''),' ','<>'),'><',''),'<>',' ') as [Complete Address], 
				   case when ISNULL(blSenior,0) = 0 then 'NO' ELSE 'YES' end AS [Senior?]
				from tblConstituent");

			$tmpCondition = "";
			if (trim($strFullName) === ""){}
			ELSE {
				$tmpCondition = $tmpCondition . "strFullName like '%". $strFullName . "%' and ";
			}

			if (trim($strIDNumber) === "" || is_numeric($strIDNumber) === FALSE){}
			ELSE {
				$tmpCondition = $tmpCondition . "CAST(strLGUNo as Numeric) = " . $strIDNumber . " and ";
			}

			if (trim($strCoverage) === "2"){
				$tmpCondition = $tmpCondition . "id in (Select intConstID from tblConstituentDocu where isAddtlCov = 1) and ";
			}

			if (trim($tmpCondition) ===  ""){}
			ELSE {
				$tmpCondition = "where " . substr($tmpCondition, 0, strLen($tmpCondition) - 5);	
			}
			
			
			$tmpQuery = $tmpQuery . ' ' . $tmpCondition . ' order by id desc';
			//echo 'NAME: ' . $strFullName . ' ID: ' . $strIDNumber . ' COVERAGE: ' . $strCoverage . ' *** ' . $tmpQuery;
			//EXIT();
			$query = $this->db->query($tmpQuery);
			return $query->result_array();
		}

		public function get_information($tmpID = FALSE, $tmpType = FALSE){
			if ($tmpType === "Main"){
				$tmpQuery= ("select strFullName, CONVERT(VARCHAR(10), dteBirth, 101) as dteBirth, strGender, isNull((select descrip from PRMList where parname = 'BLOOD' and cde = strBloodType), '') as strBloodType, intHeight, dblWeight, strHomePhone, strCellphone, strEmailAdd, isAccidDeatDism, isAddtlCov, strEmergContName, strEmergAddress, strEmergTelNo, 
					replace(replace(replace(isNull(strUnitBldg, '') + ' ' + isNull(strStreet, '') + ' ' + isNull(strSubdv, '') + ' ' + isNull(strBarangay, '') + ' ' + isNull(strPostal, ''),' ','<>'),'><',''),'<>',' ') as [strAddress], (Select top 1 blbPhoto from tblPhoto where intConstID = C.id) as blbPhoto,
					isNull(strBirthPlace, '') as [Place of Birth], isNull(CONVERT(VARCHAR(10), C.dteAdded, 101), '') as dteAdded, strLGUNo
				from tblConstituent C left join tblConstituentDocu CD  on C.ID = CD.intConstID where cast(C.strLGUNo as numeric) = " . $tmpID . "");
				$query = $this->db->query($tmpQuery);
				return $query;
				//return $query->row_array();
			}
			else if ($tmpType === "Personal"){
				$tmpQuery= ("select  
					isNull((select descrip from PRMList where parname = 'HAIRCOLOR' and cde = strHairColor), '') as [Hair Color], 
					isNull((select descrip from PRMList where parname = 'EYESCOLOR' and cde = strEyesColor), '') as [Eyes Color], 
					isNull(strOtherFeat, '') as [Other Features], 
					isNull(CASE WHEN blSenior = 0 THEN 'NO' ELSE 'YES' END, '') as [Senior Citizen?], 
					isNull(strSeniorNum, '') as [Senior Number],

					isNull(strSpouseName, '') as [Spouse Maiden Name], 
					isNull(CONVERT(VARCHAR(10), strSpouseBday, 101), '') as [Spouse Birth Date], 
					isNull(strChild1, '') as [Child Name 1], 
					isNull(strChild2, '') as [Child Name 2], 
					isNull(strChild3, '') as [Child Name 3], 
					isNull(strFatherName, '') as [Father], 
					isNull(strMotherMaiden, '') as [Mother Maiden],

					isNull(strEmpStat, '') as [Employment Status], 
					isNull(strCompany, '') as [Company Name], 
					isNull(strWorkPosition, '') as [Position], 
					replace(replace(replace(isNull(strWorkFlrUnitBldgNo, '') + ' ' + isNull(strWorkStreet, '') + ' ' + isNull(strWorkBarangay, '') + ' ' + isNull(strWorkCityMuni, '') + ' ' + isNull(strWorkProvince, '') + ' ' + isNull(strWorkRegion, '') + ' ' + isNull(strWorkPostal, ''),' ','<>'),'><',''),'<>',' ') as [Work Address],
					isNull(strWorkContactNo, '') as [Contact Number]
				from tblConstituent where cast(strLGUNo as numeric) = " . $tmpID . "");
				$query = $this->db->query($tmpQuery);
				return $query;
				//return $query->result_array();
			}
			else if ($tmpType === "Documents"){
				$tmpQuery= ("Select 
							isNull(strCTC, '') as [A. CTC Number], 
							isNull(CONVERT(VARCHAR(10), dteCTCIssue, 101), '') as [A. Issue Date], 
							isNull(strCTCPlaceIssue, '') as [A. Issuer], 
							'^*' as [bar1],
							isNull(strSS, '') as [B. Social Security], 
							isNull(CONVERT(VARCHAR(10), dteSSIssue, 101), '') as [B. Issue Date], 
							isNull(strSSPlaceIssue, '') as [B. Issuer], 
							'^*' as [bar2],
							isNull(strTIN, '') as [C. TIN Number], 
							isNull(CONVERT(VARCHAR(10), dteTINIssue, 101), '') as [C. Issue Date], 
							'^*' as [bar3],
							isNull(strBrgy, '') as [D. Barangay Number], 
							isNull(CONVERT(VARCHAR(10), dteBrgyIssue, 101), '') as [D. Issue Date], 
							isNull(strBrgyPlaceIssue, '') as [D. Issuer], 
							'^*' as [bar4],
							isNull(strPH, '') as [E. PHIC Number], 
							isNull(CONVERT(VARCHAR(10), dtePHIssue, 101), '') as [E. Issue Date], 
							'^*' as [bar5],
							isNull(strNSO, '') as [F. Birth Certificate], 
							isNull(CONVERT(VARCHAR(10), dteNSOIssue, 101), '') as [F. Issue Date], 
							'^*' as [bar6],
							isNull(strVotersID, '') as [G. Voters ID], 
							isNull(strVoterPlaceIssue, '') as [G. Issuer], 
							'^*' as [bar7],
							isNull(strPassNo, '') as [H. Passport], 
							isNull(CONVERT(VARCHAR(10), dtePassIssue, 101), '') as [H. Issue Date], 
							isNull(CONVERT(VARCHAR(10), dtePassExpiry, 101), '') as [H. Expiration Date], 
							isNull(strPassPlaceIssue, '') as [H. Issuer], 
							'^*' as [bar8],
							isNull(strNBI, '') as [I. NBI Clearance], 
							isNull(CONVERT(VARCHAR(10), dteNBIIssue, 101), '') as [I. Issue Date], 
							'^*' as [bar9],
							(select descrip from PRMList where parname = 'PROOFBILL' and cde = strProofBill1) as [J. Billing 1],
							(select descrip from PRMList where parname = 'PROOFBILL' and cde = strProofBill2) as [J. Billing 2]
							from tblConstituentDocu where intConstID in (Select ID from tblConstituent where cast(strLGUNo as numeric) = " . $tmpID . ")");
				$query = $this->db->query($tmpQuery);
				return $query;
				//return $query->result_array();
			}
			else if ($tmpType === "Corporeal"){
				$tmpQuery= ("Select blbSignature1Image, (Select id from tblFingerPrint where intConstID = " . $tmpID . ") as WithFinger from tblSignature where intConstID in (Select ID from tblConstituent where cast(strLGUNo as numeric) = " . $tmpID . ")");
				$query = $this->db->query($tmpQuery);
				return $query;
				//return $query->row_array();
			}
			
			//$tmpQuery = $tmpQuery;
			//echo 'NAME: ' . $strFullName . ' ID: ' . $strIDNumber . ' *** ' . $tmpQuery;
			

		}
	}