
	<?php
		if( isset($_SESSION['user']) ){ 
			$UserLogged = $_SESSION['user'];
			$UserLevel = $_SESSION['intLevel'];
			$UserLGUNo = $_SESSION['LGUNumber'];
			// echo $UserLogged . ' + ' . $UserLevel . ' + ' . $UserLGUNo;
			// exit();
			if ($UserLogged == ""){
				$this->session->set_userdata('expiredsess', 'expiredsess');
				$this->session->set_userdata('LoadedLGUNumber', $QueryOutput['strLGUNo']);
			    redirect(site_url("login"));}   
			else {
				if ($UserLevel == 99){
					if ($UserLGUNo !== $QueryOutput['strLGUNo']){
						$this->session->set_userdata('expiredsess', 'NotOwnAcct');
			    		redirect(base_url()); }	
					}
				}
		}
		else {
			$this->session->set_userdata('expiredsess', 'expiredsess');
			$this->session->set_userdata('LoadedLGUNumber', $QueryOutput['strLGUNo']);
		    redirect(site_url("login"));
		}
	   

	   // echo "<br/>";
	   if ($UserLevel !== 99){
	   		echo "<a href='". base_url() . "constituents/reload' class='captionBG'>Return To List</a>"; }
	?>

<div class="row center-div2">
	<div class="col-xs-6 col-sm-3 gradiant-bg border border-white" style="padding: 5px; margin:0.2; border:1px;  min-width: 300px; max-width: 390px; word-wrap: break-word;">
		<h5 class="card-body" style="height:30px; margin:0px; padding:0px; text-align: center;">Constituent Profile</h5>

		<div class="card border-light mb-3" >
		  	<div class="card-header"><b><?php echo $QueryOutput['strFullName'] . ' (' . $QueryOutput['strLGUNo'] . ')'; ?></b></div>
		  	<div class="card-body" style="padding-bottom: 1px; padding-top: 4px">
			    <p class="card-text"><?php echo ucwords(strtolower($QueryOutput['strAddress'])); ?></p>
		  	</div>
		  	<div class="card-body" style="padding:6px;">
        		<img id="myImgBG" alt="<?php echo $QueryOutput['strFullName']; ?><br/>*** Signature ***" style = "height: 100%; width: 100%; display: block;" border=1 src="data:image/jpeg;base64,<?php echo base64_encode($QueryOutput["blbPhoto"]); ?>" alt="Card image">
    		</div>
		</div>

        <div class="card border-light mb-3" >
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="background-color:#F5F5F5"><b>BIRTH:&nbsp;</b> 
                <?php 
                  echo date_format(date_create($QueryOutput['dteBirth']), "F d,   Y") . 
                    ' (' . date_diff(date_create($QueryOutput['dteBirth']), 
                      date_create('now'))->y . ' yo)'; 
                  echo "<br/><b>GENDER:&nbsp;</b> " . ($QueryOutput['strGender'] == "FL" ? "Female" : "Male") . "&nbsp;&nbsp;<br/><b>BLOOD:&nbsp;</b> " . ($QueryOutput['strBloodType'] == "" ? "None" : $QueryOutput['strBloodType']);
                ?>
              </li>
              <li class="list-group-item"><b>HEIGHT:</b> <?php echo $QueryOutput['intHeight'] . ' cms &nbsp;&nbsp;<b>WEIGHT:</b> ' . number_format($QueryOutput['dblWeight']) . ' lbs'; ?></li>
              <li class="list-group-item" style="background-color:#F5F5F5"><b>HOME PHONE:</b> 
                <?php echo ($QueryOutput['strHomePhone'] == "" ? "None" : $QueryOutput['strHomePhone']); ?><br/>
                <b>CELLPHONE:</b> <?php echo ($QueryOutput['strCellphone'] == "" ? "None" : $QueryOutput['strCellphone']); ?><br/>
                <b>EMAIL:</b> <?php echo ($QueryOutput['strEmailAdd'] == "" ? "None" : $QueryOutput['strEmailAdd']); ?>
              </li>
              <li class="list-group-item"><b>INSURANCE COVERAGE: </b><br/> 
                <?php 
                  if ($QueryOutput['isAccidDeatDism'] == 1){
                    echo "Accidental Death & Dismemberment<br/>";}
                  if ($QueryOutput['isAddtlCov'] == 1){
                    echo "With Additional Coverage";}
                ?>
              </li>
              <li class="list-group-item" style="background-color:#F5F5F5"><b>EMERGENCY CONTACT: </b> <br/>
                <b>NAME:</b> <?php echo $QueryOutput['strEmergContName']; ?><br/>
                <b>ADDRESS:</b> <?php echo $QueryOutput['strEmergAddress']; ?><br/>
                <b>NUMBER:</b> <?php echo $QueryOutput['strEmergTelNo']; ?>
              </li>

              <small class="post-date" style="padding-left: 20px; color: Gray;">Registed:&nbsp;<?php echo $QueryOutput['dteAdded']; ?></small>
            </ul>
        </div>
	</div>
	<div class="col-xs-6 col-sm-3 gradiant-bg border border-white" style="padding: 5px; margin:0.2; border:1px;  min-width: 300px; max-width: 390px; word-wrap: break-word;">
		<h5 class="card-body" style="height:30px; margin:0px; padding:0px; text-align: center;">Other Personal Details</h5>
		<div class="card border-light mb-3" >
            <ul class="list-group list-group-flush">
	        <?php 
	        	$intCount = 1;
	        	$QueryPersonalOutput = $QueryPersonal->result_array();
	        	foreach ($QueryPersonal->list_fields() as $field){
	        		$tmpVal = $QueryPersonal->row($field);
	        		if (strtotime($tmpVal) && trim($tmpVal) !== ""){
	        			$tmpVal = date_create($tmpVal);
	        			$tmpVal = strtoupper(date_format($tmpVal, "M d, Y"));
	        		}
		        	
	        		echo "<li class='list-group-item' style='min-height:32px; margin:0.1; padding:2px;background-color:white;'><b>" . strtoupper($field) . ":</b> " . $tmpVal ."</li>";

	        		$intCount = 1;
	        		$intCount = $intCount + 1;
				}
			?>
			</ul>
		</div>
	</div>
	<!-- Add clearfix for only the required viewport -->
	<div class="clearfix visible-xs"></div>
	<div class="col-xs-6 col-sm-3 gradiant-bg border border-white" style="padding: 5px; margin:0.2;  min-width: 300px; max-width: 390px; word-wrap: break-word;">
		<h5 class="card-body" style="height:30px; margin:0px; padding:0px; text-align: center;">CIF Documents</h5>
		<div class="card border-light mb-3" >
            <ul class="list-group list-group-flush">
	        <?php 
	        	$intColor = 1;
	        	$tmpColor = "background-color:#AFEEEE;";
	        	$QueryDocuOutput = $QueryDocu->result_array();
	        	foreach ($QueryDocu->list_fields() as $field){
	        		$tmpVal = $QueryDocu->row($field);
	        		if (strtotime($tmpVal) && trim($tmpVal) !== ""){
	        			$tmpVal = date_create($tmpVal);
	        			$tmpVal = strtoupper(date_format($tmpVal, "M d, Y"));
	        		}
	        		if ($tmpVal == "01/01/1900"){
        				$tmpVal = "";
        			}
	        		
	        		if ($tmpVal == "^*"){
	        			//echo "<li class='list-group-item' style='min-height:2px; margin:0.1; padding:1px'></li>";
	        			$intColor = $intColor + 1;

	        			if ($intColor == 1){
	        				$tmpColor = "background-color:#AFEEEE;";}
	        			else if ($intColor == 2){
	        				$tmpColor = "background-color:beige;";}
	        			else if ($intColor == 3){
	        				$tmpColor = "background-color:#AFEEEE;";}
	        			else if ($intColor >= 4){
	        				$tmpColor = "background-color:beige;";
	        				$intColor = 0;}
		            }	
	        		else {
	        			echo "<li class='list-group-item' style='min-height:32px; margin:0.1; padding:2px; ". $tmpColor ."'><b>" . strtoupper($field) . ":</b> " . $tmpVal ."</li>";
	        		}
				}
			?>
			</ul>
		</div>
	</div>
	<div class="col-xs-6 col-sm-3 gradiant-bg border border-white" style="padding: 5px; margin:0.2;  min-width: 300px; max-width: 390px; word-wrap: break-word;">
		<h5 class="card-body" style="height:30px; margin:0px; padding:0px; text-align: center;">Corporeal / Payments</h5>
		<div class="card border-light mb-3" >
            <ul class="list-group list-group-flush">
				<li class="list-group-item" style="min-height:32px; margin:0.1; padding:2px;background-color:#F0E68C;text-align: center; vertical-align: middle;">
				*** Signature ***</li>
				<li class="list-group-item" style="margin:0.1; padding:1px;background-color:white;text-align: center; vertical-align: middle; display: flex; justify-content: center;">
					<div width="100%" style="display: flex; justify-content: center;">
						<img id="myImgBG2" alt="<?php echo $QueryOutput['strFullName']; ?><br/>*** Signature ***" style = "height: 100%; width: 100%; display: block;" border=1 src="data:image/jpeg;base64,<?php echo base64_encode($QueryCorporeal['blbSignature1Image']); ?>" alt="Signature image">
					</div>
				</li>
				<li class="list-group-item" style="min-height:32px; margin:0.1; padding:2px;background-color:#F0E68C;text-align: center; vertical-align: middle;">
				Finger Print Captured?</li>
				<li class="list-group-item" style="margin:0.1; padding:1px;background-color:white;text-align: center; vertical-align: middle; display: flex; justify-content: center;">
					<?php 
						if ($QueryCorporeal['WithFinger'] !== ""){
							echo "<img id='myImgBG3' style='display: block;' border=1 src='" .  base_url() . "public\images\check.gif' alt='Fingerprint'>";}
						else {
							echo "None";
						}
					?>
					
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container-fluid">
    <table class="normal-font" cellspacing="0" cellpadding="0" style="border: 1px solid #ddd;" style="width:100%">
      <tr>
         <td style="width:20%">
        </td>
        <td style="max-width:80%; vertical-align: top; border: 1px solid #ddd;">
            
        </td>
      </tr>
    </table>
</div>

<!-- The Modal -->
<div id="myModalBG" class="modalBG">
    <span class="closeBG" >&times;</span>
    <img class="modalBG-content" id="img01BG">
    <div id="captionBG"></div>
</div>

<script>
  // Get the modal
  var modalBackGr = document.getElementById('myModalBG');
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImgBG');
  var img2 = document.getElementById('myImgBG2');
  var modalImg = document.getElementById("img01BG");
  var captionText = document.getElementById("captionBG");

  img.onclick = function(){
      modalBackGr.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
  }

  img2.onclick = function(){
      modalBackGr.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("modalBG")[0];
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() { 
      modalBackGr.style.display = "none";
  }
</script>
