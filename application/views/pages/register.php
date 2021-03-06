<style>
	

	label {
		margin-bottom: 0px;
		font-size: 18px;
		font-family: Calibri;
	}

	.form-control,
	input[type="text"],
	input[type="password"] { 
		padding: 0px;
		font-size: 18px;
		font-family: Calibri;
		text-transform: uppercase;
	}

	input.error {
		border-color: red;
	}

	select.error {
		border-color: red;
	}

	label.error {
		color: red;
	}

	select.form-control:not([size]):not([multiple]) {
		height: inherit;
		/*width: 100%;
		padding: 0px; 
		margin: 0px; */
	}

	legend {
		font-size: 18px;
		font-family: Calibri;
		font-weight: bold;
		background: #e4e3e3;
		margin: 10px 0px;
	}

	.registrationtab {
		display: none;
		margin:0; 
		padding:0;
	}
	
	div#button {
		display: flex;
	}

	button {
		width:25%;
		margin: 5px 5px;
	}

	button.register {
		display: none;
	}

	button.register, 
	button.next {
		margin-left: auto;
	}

	.container {
		font-family: Calibri;
		font-size: 18px;
	}

	.form-group {
		margin-bottom: 0px;
	}

	label.error {
		display: none;
	}
</style>
<!-- <br/> -->
<div class="container center-div2">
	<LABEL class="textHome3">ONLINE REGISTRATION<font color='red'>&nbsp;(Kumpletuhin ang Impormasyon)</font></LABEL>
    <div class="card border-primary" >

        <div class="card-body" style="margin:0.5px; padding:5px">
            <form action="<?php echo site_url('Register/store') ?>" method="POST" role="form" id="register">
				<div class="alert alert-danger" id="alert" style="display: none;">
					<strong>Information:</strong> Please fill up all the required information.
				</div>
				<div class="alert alert-danger" id="alert-exist" style="display: none;">
					<strong>Information:</strong> Your name and birthday is already existing on our records. To verify if you already have a record or there is something wrong, please visit the Municipality Care Card Center personally.
				</div>

				<div class="registrationtab" id="personaltab" data-next="addresstab" data-prev=" " data-active="true">
					<LABEL class="textHome1">&nbsp;&nbsp;PERSONAL DETAILS&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
			        
					
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">First Name *</label>
								<input type="text" class="form-control" id="first_name" name="first_name" value="" required="required"  data-msg="" autofocus>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Middle Name *</label>
								<input type="text" class="form-control" id="middle_name" name="middle_name" value="" required="required">
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Last Name *</label>
								<input type="text" class="form-control" id="last_name" name="last_name" value="" required="required"  data-msg="">
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Suffix</label>
								<input type="text" class="form-control" id="suffix" name="suffix">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Civil Status *</label>
								<select name="civil_status" id="inputCivil_status" class="form-control" required="required">
									<option value=""></option>
									<?php foreach ($civilStatus->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Date of Birth *</label>
								<input type="date" name="birth_day" id="inputBirth_day" value="" class="form-control" required="required"  data-msg="">

							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Place of Birth *</label>
								<input type="text" name="place_of_birth" id="inputPlace_of_birth" value="" class="form-control" value="" required="required">
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Citizenship *</label>
								<select name="citizenship" id="inputCitizenship" class="form-control" required="required">
									<?php foreach ($citizenship->result() as $key => $value) {  ?>
										<?php If ($value->descrip=="FILIPINO") {  ?>
											<option value="<?=$value->cde?>" SELECTED><?=$value->descrip?></option>
										<?php } ELSE { ?>
											<option value="<?=$value->cde?>"><?=$value->descrip?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Gender *</label>
								<select name="gender" id="inputGender" class="form-control" required="required">
									<option value=""></option>
									<?php foreach ($gender->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Blood Type</label>
								<select name="blood_type" id="inputBloodType" class="form-control">
									<option value=""></option>
									<?php foreach ($blood_type->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Height (cm) *</label>
								<input type="number" name="height" id="inputHeight" class="form-control" value="" required="required"  data-msg="">
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Weight (kg) *</label>
								<input type="number" name="weight" id="inputWeight" class="form-control" value="" required="required"  data-msg="">
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Country *</label>
								<select name="homeCountry" id="inputPersonalCountry" class="form-control" required="required">
									<?php foreach ($country->result() as $key => $value) {  ?>
										<?php if ($value->descrip=="PHILIPPINES"){ ?>
											<option value="<?=$value->cde?>" SELECTED><?=$value->descrip?></option>
										<?php } else{ ?>
											<option value="<?=$value->cde?>"><?=$value->descrip?></option>
										<?php } ?>
										
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Color of Hair</label>
								<select name="hairColor" id="inputHairColor" class="form-control">
									<option value="" SELECTED></option>
									<?php foreach ($hair_color->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Color of Eyes</label>
								<select name="eyesColor" id="inputEyesColor" class="form-control">
									<option value="" SELECTED></option>
									<?php foreach ($eyes_color->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Other Feature</label>
								<input type="text" name="otherFeature" id="inputOtherFeature" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Senior Citizen</label>
								<div class="checkbox">
									<label>
										<input type="radio" value="1" name="senior">
										Yes
									</label>
									<label>
										<input type="radio" value="0" name="senior" checked>
										No
									</label>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="seniorId">
							<div class="form-group textRegisterHome">
								<label id="lblSenior" for="">Senior Citizen Number</label>
								<input type="number" name="seniorCitizenNumber" id="inputCitizenNumber" class="form-control" value="" disabled="disabled">
							</div>
						</div>
					</div>
				</div>
				
				<div class="registrationtab" id="addresstab" data-prev="personaltab" data-next="worktab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;ADDRESS&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Unit No. / Building</label>
								<input type="text" name="unitNo" id="inputUnitNo" value="" class="form-control" rows="3">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Number / Street *</label>
								<input name="numberStreet" id="inputNumberStreet" value="" class="form-control" rows="3" required="required"  data-msg="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Subdivision</label>
								<input type="text" name="subdivision" id="inputSubdivision" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Barangay *</label>
								<select name="barangay" id="inputBarangay" class="form-control" required="required"  data-msg="">
									<option value="" SELECTED></option>
									<?php foreach ($barangay->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Postal Code *</label>
								<input type="text" name="postal_code" id="inputPostal_code" value="" class="form-control" value="" required="required"  data-msg="">
							</div>
						</div>
					</div>
				</div>
				
				<div class="registrationtab" id="worktab" data-prev="addresstab" data-next="contactinformationtab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;WORK / BUSINESS DETAILS&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Employment Status *</label>
								<select name="employementStatus" id="inputEmployement_status" class="form-control" required="required">
									<option value="" SELECTED></option>
									<?php foreach ($employement_status->result() as $key => $value) {  ?>
										<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Company Name</label>
								<input type="text" name="companyName" id="inputCompanyName" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Position</label>
								<input type="text" name="position" id="inputPosition" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Country</label>
								<select name="country" id="inputCountry" class="form-control">
									<option value="" SELECTED></option>
									<?php foreach ($country->result() as $key => $value) {  ?>
											<option value="<?=$value->cde?>"><?=$value->descrip?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Region</label>
								<select name="region" id="inputRegion" class="form-control">
									<option value="" selected></option>
									<?php foreach ($region->result() as $key => $value) {

										if ($value->strRegCode=="13"){
											echo "<option value=". $value->strRegCode ." SELECTED>" . $value->strDescription . "</option>";
										}
										else {
											echo "<option value=". $value->strRegCode .">" . $value->strDescription . "</option>";
										}
									} ?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Province</label>
								<select name="province" id="inputProvince" class="form-control">
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">City / Municipality</label>
								<select name="city" id="inputCity" class="form-control">
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Barangay</label>
								<select name="companyBarangay" id="inputCompanyBarangay" class="form-control">
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Floor / Unit No. / Bldg No.</label>
								<input type="text" name="companyUnit" id="inputCompanyUnit" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Street Name</label>
								<input type="text" name="streetName" id="inputStreetName" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Postal Code</label>
								<input type="text" name="companyPostalCode" id="inputCompanyPostalCode" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Contact Number</label>
								<input type="text" name="companyContact" id="inputCompanyContact" class="form-control" value="">
							</div>
						</div>
					</div>
				</div>
				
				<div class="registrationtab" id="contactinformationtab" data-prev="worktab" data-next="familytab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;CONTACT INFORMATION&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Home Phone Number</label>
								<input type="text" name="homePhoneNumber" id="inputHomePhoneNumber" class="form-control" value="" >
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Cellphone Number *</label>
								<input type="text" name="cellPhoneNumber" id="inputcellPhoneNumber" class="form-control" required="required" value="" >
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Email Address</label>
								<input type="text" name="emailAddress" id="inputemailAddress" class="form-control" value="" >
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Contact Person *</label>
								<input type="text" name="contactPerson" id="inputcontactPerson" class="form-control" value="" required="required" >
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Address of Contact Person *</label>
								<input type="text" name="contactPersonAddress" id="inputcontactPersonAddress" class="form-control" value="" required="required" >
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Contact Number *</label>
								<input type="text" name="telephoneNumber" id="inputtelephoneNumber" class="form-control" value="" required="required">
							</div>
						</div>
					</div>
				</div>
				
				<div class="registrationtab" id="familytab" data-prev="contactinformationtab" data-next="ctctab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;FAMILY PROFILE&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Spouse Maiden Name</label>
								<input type="text" name="spouseMaidenName" id="inputSpouseMaidenName" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Spouse Date of Birth</label>
								<input type="date" name="spouseBday" id="inputSpouseBday" class="form-control" value="" data-msg="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Father's Name</label>
								<input type="text" name="fatherName" id="inputfatherName" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Mother's Maiden Name</label>
								<input type="text" name="motherName" id="inputmotherName" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 1</label>
								<input type="text" name="child1" id="inputchildren1" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 2</label>
								<input type="text" name="child2" id="inputchild2" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 3</label>
								<input type="text" name="child3" id="inputchild3" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 4</label>
								<input type="text" name="child4" id="inputchild4" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 5</label>
								<input type="text" name="child5" id="inputchild5" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 6</label>
								<input type="text" name="child6" id="inputchild6" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 7</label>
								<input type="text" name="child7" id="inputchild7" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 8</label>
								<input type="text" name="child8" id="inputchild8" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 9</label>
								<input type="text" name="child9" id="inputchild9" class="form-control" value="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group textRegisterHome">
								<label for="">Children 10</label>
								<input type="text" name="child10" id="inputchild10" class="form-control" value="">
							</div>
						</div>
					</div>
				</div>
				
				<div class="registrationtab" id="ctctab" data-prev="familytab" data-next="brgytab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;LEGAL AND GOVERNMENT DOCUMENTS&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>

					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" id="chkCTC" name="ctc">With Community Tax Certificate?</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ctcShow">
							<label for="">Date of Issue</label>
							<input type="date" name="ctcDateIssue" id="inputCtcDateIssue" class="form-control ctcinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ctcShow">
							<label for="">CTC No.</label>
							<input type="text" name="ctcNo" id="inputCtcNo" class="form-control ctcinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ctcShow">
							<label for="">Place of Issue</label>
							<input type="text" name="placeIssue" id="inputCtcPlaceIssue" class="form-control ctcinput" value="" disabled>
						</div>
					</div>
			
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" name="sss">With Social Security?</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sssShow">
							<label for="">Type</label>
							<select name="ssType" id="inputssType" class="form-control sssinput" disabled>
								<option value="" selected></option>
								<?php foreach ($ss_type->result() as $key => $value) {  ?>
									<option value="<?=$value->cde?>"><?=$value->descrip?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sssShow">
							<label for="">Social Security Number</label>
							<input type="text" name="ssNumber" id="inputSsNumber" class="form-control sssinput" value="" disabled>
						</div>
					</div>
				
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" name="tin">With TIN?</LABEL>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 tinShow">
							<label for="">TIN</label>
							<input type="text" name="tinId" id="inputTinId" class="form-control tininput" value="" disabled>
						</div>
					</div>
				</div>
				
				<div class="registrationtab" id="brgytab" data-prev="ctctab" data-next="voterstab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;LEGAL AND GOVERNMENT DOCUMENTS&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" id="chkBrgy" name="cedula">With Barangay Clearance?</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 cedulaShow">
							<label for="">Date of Issue</label>
							<input type="date" name="cedulaDateIssue" id="inputCedulaDateIssue" class="form-control brgyinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 cedulaShow">
							<label for="">Barangay Number</label>
							<input type="text" name="cedulaNumber" id="inputCedulaNumber" class="form-control brgyinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 cedulaShow">
							<label for="">Place of Issue</label>
							<input type="text" name="cedulaPlaceIssue" id="inputCedulaPlaceIssue" class="form-control brgyinput" value="" disabled>
						</div>
					</div>
				
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" name="philhealth">With Philhealth?</LABEL>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 philhealthShow">
							<label for="">PhilHealth Number</label>
							<input type="text" name="philNumber" id="inputPhilNumber" class="form-control phinput" value="" disabled>
						</div>
					</div>
				
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" name="nso">With NSO Birth Certificate?</LABEL>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nsoShow">
							<label for="">Registry Number</label>
							<input type="text" name="nsoNumber" id="inputnsoNumber" class="form-control nsoinput" value="" disabled>
						</div>
					</div>
				</div>

				<div class="registrationtab" id="voterstab" data-prev="brgytab" data-next="insurancetab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;LEGAL AND GOVERNMENT DOCUMENTS&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" id="chkVoters" name="voters">With Voters ID?</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 votersShow">
							<label for="">ID Number</label>
							<input type="text" name="voterNumber" id="inputvoterNumber" class="form-control votersinput" value="" disabled>
						</div>
					</div>
				
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" name="passport">With Passport?</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 passportShow">
							<label for="">Date of Issue</label>
							<input type="date" name="passportDateIssue" id="inputpassportDateIssue" class="form-control passportinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 passportShow">
							<label for="">Passport Number</label>
							<input type="text" name="passportNumber" id="inputpassportNumber" class="form-control passportinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 passportShow">
							<label for="">Place Issue</label>
							<input type="text" name="passportPlaceIssue" id="inputpassportPlaceIssue" class="form-control passportinput" value="" disabled>
						</div>
					</div>
				
					<LABEL class="textHome1">&nbsp;&nbsp;<input type="checkbox" value="1" name="nbi">With NBI Clearance?</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nbiShow">
							<label for="">Date of Issue</label>
							<input type="date" name="nbiDateIssue" id="inputnbiDateIssue" class="form-control nbiinput" value="" disabled>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nbiShow">
							<label for="">NBI Number</label>
							<input type="text" name="nbiNumber" id="inputnbiNumber" class="form-control nbiinput" value="" disabled>
						</div>
					</div>
				</div>
										
				<div class="registrationtab" id="insurancetab" data-prev="voterstab" data-next="previewtab" data-active="false">
					<LABEL class="textHome1">&nbsp;&nbsp;INSURANCE COVERAGE TO AVAIL&nbsp;<font color='darkgray'>&nbsp;(For Non-Members Only)</font></LABEL>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="checkbox">
								<label for="">
									<input type="checkbox" name="accidendatalDeath" id="accidendatalDeath" checked disabled>
									Accidental Death Dismemberment (Default)
								</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="checkbox">
								<label for="">
									<input type="checkbox" name="additonalCoverage" id="additonalCoverage">
									Additional Insurance Coverage (See List @ the Care Card Center)
								</label>
							</div>
						</div>
					</div>
					<LABEL class="textHome1">&nbsp;&nbsp;SCHEDULE APPOINTMENT DATE TO CARE CARD CENTER</LABEL>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 visitShow">
							<label for="">Date Of Visit</label>
							<input type="date" name="visitDate" id="inputVisitDate" value="" class="form-control" required="required"  data-msg="">
						</div>
					</div>
				</div>

				<div class="registrationtab" id="previewtab" data-prev="insurancetab" data-next="" data-active="false">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Preview</h3>
							<legend>Personal Details</legend>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>LGU ID</strong></label>
								<p class="text-uppercase">PENDING</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>First Name</strong></label>
								<p class="text-uppercase" id="first_name_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Middle Name</strong></label>
								<p class="text-uppercase" id="middle_name_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Last Name</strong></label>
								<p class="text-uppercase" id="last_name_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Suffix</strong></label>
								<p class="text-uppercase" id="suffix_name_preview"></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Civil Status</strong></label>
								<p class="text-uppercase" id="civil_status_preview"></p>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Date of Birth</strong></label>
								<p class="text-uppercase" id="birth_day_preview"></p>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Place of Birth</strong></label>
								<p class="text-uppercase" id="place_of_birth_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Citizenship</strong></label>
								<p class="text-uppercase" id="citizenship_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Gender</strong></label>
								<p class="text-uppercase" id="gender_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Blood Type</strong></label>
								<p class="text-uppercase" id="blood_type_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Height (cm) </strong></label>
								<p class="text-uppercase" id="height_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Weight (kg)</strong></label>
								<p class="text-uppercase" id="weight_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Country</strong></label>
								<p class="text-uppercase" id="homeCountry_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Color of Hair</strong></label>
								<p class="text-uppercase" id="hairColor_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Color of Eyes</strong></label>
								<p class="text-uppercase" id="eyesColor_preview"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Other Feature</strong></label>
								<p class="text-uppercase" id="otherFeature_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Senior Citizen</strong></label>
								<p class="text-uppercase" id="senior_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="seniorId_preview">
							<div class="form-group">
								<label for=""><strong>Senior Citizen Number</strong></label>
								<p class="text-uppercase" id="seniorCitizenNumber_preview"></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Address Details</legend>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Unit No. / Building</strong></label>
								<p class="text-uppercase" id="unitNo_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Number / Street</strong></label>
								<p class="text-uppercase" id="numberStreet_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Subdivision</strong></label>
								<p class="text-uppercase" id="subdivision_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Barangay</strong></label>
								<p class="text-uppercase" id="barangay_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Postal Code</strong></label>
								<p class="text-uppercase" id="postal_code_preview"></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Work Business Details</legend>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Employment Status</strong></label>
								<p class="text-uppercase" id="employementStatus_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Company Name</strong></label>
								<p class="text-uppercase" id="companyName_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Position</strong></label>
								<p class="text-uppercase" id="position_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Country</strong></label>
								<p class="text-uppercase" id="country_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Region</strong></label>
								<p class="text-uppercase" id="region_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Province</strong></label>
								<p class="text-uppercase" id="province_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>City / Municipality</strong></label>
								<p class="text-uppercase" id="city_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Barangay</strong></label>
								<p class="text-uppercase" id="companyBarangay_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Floor / Unit No. / Bldg No.</strong></label>
								<p class="text-uppercase" id="companyUnit_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Street Name</strong></label>
								<p class="text-uppercase" id="streetName_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Postal Code</strong></label>
								<p class="text-uppercase" id="companyPostalCode_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Contact Number</strong></label>
								<p class="text-uppercase" id="companyContact_preview"></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Contact Information Details</legend>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Home Phone Number</strong></label>
								<p class="text-uppercase" id="homePhoneNumber_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Cellphone Number</strong></label>
								<p class="text-uppercase" id="cellPhoneNumber_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Email Address</strong></label>
								<p class="text-uppercase" id="emailAddress_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Contact Person</strong></label>
								<p class="text-uppercase" id="contactPerson_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Address of Contact Person</strong></label>
								<p class="text-uppercase" id="contactPersonAddress_preview"></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Telephone Number</strong></label>
								<p class="text-uppercase" id="telephoneNumber_preview"></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Family Profile Details</legend>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Spouse Maiden Name</strong></label>
								<p class="text-uppercase" id="spouseMaidenName_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Spouse Date of Birth</strong></label>
								<p class="text-uppercase" id="spouseBday_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Father's Name</strong></label>
								<p class="text-uppercase" id="fatherName_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Mother's Maiden Name</strong></label>
								<p class="text-uppercase" id="motherName_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 1</strong></label>
								<p class="text-uppercase" id="child1_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 2</strong></label>
								<p class="text-uppercase" id="child2_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 3</strong></label>
								<p class="text-uppercase" id="child3_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 4</strong></label>
								<p class="text-uppercase" id="child4_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 5</strong></label>
								<p class="text-uppercase" id="child5_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 6</strong></label>
								<p class="text-uppercase" id="child6_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 7</strong></label>
								<p class="text-uppercase" id="child7_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 8</strong></label>
								<p class="text-uppercase" id="child8_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 9</strong></label>
								<p class="text-uppercase" id="child9_preview"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for=""><strong>Children 10</strong></label>
								<p class="text-uppercase" id="child10_preview"></p>
							</div>
						</div>
					</div>

					<div class="row" id="tax_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Community Tax Certification Details</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ctcShow">
							<label for=""><strong>Date of Issue</strong></label>
							<p class="text-uppercase" id="ctcDateIssue_preview"></p>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ctcShow">
							<label for=""><strong>CTC No.</strong></label>
							<p class="text-uppercase" id="ctcNo_preview"></p>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ctcShow">
							<label for=""><strong>Place of Issue</strong></label>
							<p class="text-uppercase" id="ctcPlaceIssue_preview"></p>
						</div>
					</div>

					<div class="row" id="sss_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Social Security</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ssShow">
							<label>
								<strong>Social Security Number</strong>
								<p class="text-uppercase" id="sssNo_preview"></p>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ssShow">
							<label>
								<strong>Social Security Type</strong>
								<p class="text-uppercase" id="sssType_preview"></p>
							</label>
						</div>
					</div>

					<div class="row" id="tin_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>TIN</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 tinhow">
							<label>
								<strong>TIN</strong>
								<p class="text-uppercase" id="tinId_preview"></p>
							</label>
						</div>
					</div>

					<div class="row"  id="brgy_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Brgy Clearance</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 brgyShow">
							<label>
								<strong>Date of Issue</strong>
								<p class="text-uppercase" id="brgyDateIssue_preview"></p>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 brgyShow">
							<label>
								<strong>Barangay Number</strong>
								<p class="text-uppercase" id="brgyNo_preview"></p>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 brgyShow">
							<label>
								<strong>Place of Issue</strong>
								<p class="text-uppercase" id="brgyPlaceIssue_preview"></p>
							</label>
						</div>
					</div>

					<div class="row"  id="phDIv_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Philhealth</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 phShow">
							<label>
								<strong>Philhealth Number</strong>
								<p class="text-uppercase" id="ph_preview"></p>
							</label>
						</div>
					</div>

					<div class="row" id="nso_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>NSO</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nsoShow">
							<label>
								<strong>Registry Number</strong>
								<p class="text-uppercase" id="nsoRegistryNo_preview"></p>
							</label>
						</div>
					</div>

					<div class="row" id="voters_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Voters</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 votersShow">
							<label>
								<strong>ID Number</strong>
								<p class="text-uppercase" id="votersRegistryNo_preview"></p>
							</label>
						</div>
					</div>

					<div class="row" id="passport_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Passport</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 passportShow">
							<label>
								<strong>Date of Issue</strong>
								<p class="text-uppercase" id="passportDateIssue_preview"></p>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 passportShow">
							<label>
								<strong>Passport Number</strong>
								<p class="text-uppercase" id="passportNo_preview"></p>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 passportShow">
							<label>
								<strong>Place of Issue</strong>
								<p class="text-uppercase" id="passportPlaceIssue_preview"></p>
							</label>
						</div>
					</div>

					<div class="row" id="nbi_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>NBI Clearance</legend>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nbiShow">
							<label>
								<strong>Date of Issue</strong>
								<p class="text-uppercase" id="nbiDateIssue_preview"></p>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nbiShow">
							<label>
								<strong>NBI Number</strong>
								<p class="text-uppercase" id="nbiNo_preview"></p>
							</label>
						</div>
					</div>

					<div class="row" id="insurance_preview">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Insurance Coverage</legend>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label>
								<strong>
								<p class="text-uppercase" id="insurance1_preview">Accidental Death and Dismemberment</p>
								</strong>
							</label>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label>
								<strong>
								<p class="text-uppercase" id="insurance2_preview">With Additional Coverage</p>
								</strong>
							</label>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<legend>Scheduled Appointment Date</legend>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label>
								<strong>
								<p class="text-uppercase" id="scheduleDate_preview"></p>
								</strong>
							</label>
						</div>
					</div>
				</div>
				</div>
				
			
				<div id="button">
					<button type="button" class="btn btn-default prev" style="display: none">Previous</button>
					<button type="button" class="btn btn-default next" >Next</button>
                	<button type="button" class="btn btn-default register">Submit</button>
				</div>
				
            </form>
        </div>
    </div>
</div>
