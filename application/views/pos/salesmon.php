<style>
* {box-sizing: border-box;}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
    height: 300px; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
}

.leftButton{
position:inherit;
vertical-align: top;
z-index:1;
}

.rightButton{
position:inherit;
vertical-align: top;
}

@keyframes blinker {  
50% { opacity: 0; }
}
.blink-one {
 animation: blinker-one 22s linear infinite;
}
@keyframes blinker-one {  
 0% { opacity: 0; }
}

</style>

<!-- automatically reload the page per few seconds -->

<script type="text/javascript">
	document.getElementById('mnuConst').classList.remove('ahref-enabled2');
	document.getElementById('mnuConst').classList.add('ahref-disabled3');
</script>

<script type="text/javascript">
window.onload = startInterval;


function startInterval()
{
	CountDown();
    setInterval("startTime();",1000);
    // setInterval("reloadPage();",10000);
}

function startTime()
{
	var d = new Date();
	var e = formatDate(d);
    document.getElementById('time').innerHTML = e;  
}

function reloadPage() {
   
   window.location = location.href;
}

function formatDate(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = pad(hours,2) + ':' + pad(minutes,2) + ':' + pad(seconds,2) + ' ' + ampm;
  return pad(date.getMonth()+1,2) + "/" + pad(date.getDate(),2) + "/" + pad(date.getFullYear(),2) + "  " + strTime;
}

function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

function CountDown()
{
	var timeleft = 20;
	var downloadTimer = setInterval(function()
		{
			document.getElementById("lblRefresh").innerHTML = "Auto-Refresh in " + timeleft + " Seconds...";
			timeleft -= 1;
			if(timeleft < 0){
				document.getElementById("lblRefresh").innerHTML = "Refreshing List"
				clearInterval(downloadTimer);
				reloadPage();
			}
		}, 1000);
}

</script>


<?php
	$UserLogged = $_SESSION['user'];
	$UserLevel = $_SESSION['strLevel'];
	$UserLGUNo = $_SESSION['LGUNumber'];
	if ($UserLogged == ""){
		$this->session->set_userdata('expiredsess', 'expiredsess');
	    redirect(base_url() . "login");
	}

	if ($cmbCoverage  == ""){
		if (isset($_SESSION['cmbCoverage'])){
			$cmbCoverage = $_SESSION['cmbCoverage'];
		} else {
			$cmbCoverage = "ALL BRANCHES";
		}
	}

	if ($blBasic  == ""){
		if (isset($_SESSION['blBasic'])){
			$blBasic = $_SESSION['blBasic'];
		} else {
			$blBasic = 1;
		}
	}
  	//echo 'Coverage: '. $cmbCoverage .' From: '. $dteTrxnFrom .' To: '. $dteTrxnTo .' Basic: '. $blBasic;
?>


	


<div class="container-fluid" style="margin: 0px 0 0 0; padding: 0px 0 0 0">
		<div class="row container-fluid" style="width: 100%; margin: 0px 0; padding: 0px 0">
		  	<div class="text2 " style="width:70%"><h4><?php echo $title; ?>&nbsp;&nbsp;<a href="#" style="font-size: 20px;" ="text3" onclick="document.getElementById('idSMS').style.display ='block';">(Deactivate Live Monitoring) </a><label id="lblRefresh" class="blink-one" style="font-size: 18px">Loading...</label></h4></div>
			<div class="text2 " style="width:30%"><div class="" id="time" style="padding: 5px; margin:0.1; text-align: right; vertical-align: middle"></div></div>
		</div>
		
		<div class="row center-div border" style="min-height: 35px; max-width: 100%">
			<div class="column text2" style="background-color:#bbb; width: 450px; max-height: 40px; padding: 5px 10px">
				<select name="cmbCoverage" style="max-height: 30px; text-transform:uppercase; font-size: 16px; padding: 0px 10px; " disabled="disabled" class="custom-select text5" value="<?php echo strtoupper($cmbCoverage); ?>">
				<?php 
					echo "<option value='ALL BRANCHES' selected>ALL BRANCHES</option>";
					$strDefCov = 'ALL BRANCHES';
					foreach ($QryBranch as $QryField){
				    	foreach($QryField as $key=>$val){
					    	if ($val != ""){
					    		if ($val == $cmbCoverage){
					    			echo "<option value='".strtoupper($val)."' selected>".strtoupper($val)."</option>";
					    			$strDefCov = strtoupper($val);
					    		}else{
					    			echo "<option value='".strtoupper($val)."'>".strtoupper($val)."</option>";	
					    		}
					    	}
					    }	
					}
				?>
			    </select>
			</div>

			<div class="column text2" style="background-color:#bbb; width: 180px; max-height: 40px; padding: 8px 0 0px 15px; vertical-align: middle;">
				<?php 
					if ($blBasic == 1){
						echo '<label style="font-size:16px"><input disabled="disabled" type="checkbox" name="blBasic" value="1" style="width:17px; height: 20px; vertical-align: middle; padding: 8 0 0 10px" checked> BASIC DETAILS</label>';
						$strDefBasic = 1;
					}else{
						echo '<label style="font-size:16px"><input disabled="disabled" type="checkbox" name="blBasic" value="1" style="width:17px; height: 20px; vertical-align: middle; padding: 8 0 0 10px"> BASIC DETAILS</label>';
						$strDefBasic = 0;
					}
				?>
			</div>

			<!-- <div class="column text2 border" style="background-color:#bbb;  width: 300px; max-height: 40px; padding: 5px 10px; ">
				<div class="border" style="text-align: right" id="time"></div>
			</div> -->
		</div>
	
	<!-- BRANCH SUMMARY STARTS HERE -->
	<div style='overflow-x:auto'>
		<table class="table table-hover" id="tableSummary" style="padding: 0; margin:0.1; border:0;  min-width: 300px; background-color: white">
		    <thead>
			    <tr class="table-active">
			    	<?php
				    	if ($blBasic == 1){
				    		echo '<th scope="col" class="table-header" style="height: 26px; padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">BRANCH NAME</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">ITEMS SOLD</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">GROSS SALE</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">DISCOUNT</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">NET INCOME</th>';
				    	}else{
				    		echo '<th scope="col" class="table-header" style="height: 26px; padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">BRANCH NAME</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">ITEMS SOLD</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">GROSS SALE</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">VAT SALE</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">VAT EXEMPT</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">VAT AMOUNT</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">DISCOUNT</th>';
					    	echo '<th scope="col" class="table-header" style="padding: 0; margin:0.1; text-align: center; border: 1px solid darkgray; vertical-align: middle">NET INCOME</th>';
				    	}
			    	?>
			    </tr>
		    </thead>
		    <tbody>
			    <?php 
					foreach ($QryBranch as $QryField){
					    	foreach($QryField as $key=>$val){

						    	if ($val != ""){
						    		echo '<tr>';
						    		// echo ($cmbCoverage. ' - ' . $val . ' <br/>');
						    		if ($cmbCoverage == "ALL BRANCHES" || $cmbCoverage == $val){
							    		if ($blBasic == 1){
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: left">'. strtoupper($val) .'</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    		}else{
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: left">'. strtoupper($val) .'</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    			echo '<td style="padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right">0.00</td>';
							    		}
							    	}
						    		echo '</tr>';
						    	}
						    }	
					}
					echo '<tr class="table-active" align="right">';
					if ($blBasic == 1){
					    	echo '<td style="height:26px; padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; font-weight: bold; vertical-align: middle">TOTAL: </td>';
					    	echo '<td id="dblItemSold" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblGrossSale" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblDiscount" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblNetIncome" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					}else{
							echo '<td style="height:26px; padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; font-weight: bold; vertical-align: middle">TOTAL: </td>';
					    	echo '<td id="dblItemSold" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblGrossSale" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblVATSale" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblVATExempt" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblVATAmt" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblDiscount" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					    	echo '<td id="dblNetIncome" style="padding: 0; margin:0.1; border: 1px solid darkgray; text-align: right; vertical-align: middle">0.00</td>';
					}
						echo '</tr>';
				?>
			</tbody>
		</table>

		<table class="table table-hover" style="padding: 0; margin:0.1; border:0;  min-width: 300px; background-color: white">
		    <tr align="right">
		    	<?php 
		    		if (count($QryOutput) == 0){
		    			echo '<div class="border text2" style="text-align: center">';
		    			echo '<label id="intTotal" style="padding: 0px 0px 0 0; margin: 0px;">No Records Found</label></div>';
		    		}else{
		    			echo '<div class="border text2" style="text-align: right;">';
		    			echo '<label id="intTotal" style="padding: 5px 2px 0 0; margin: 0px;">Total Records Found: '. number_format(count($QryOutput), 0, ".",",") .'</label></div>';
		    		}
		    	?>
		    </tr>
		  <thead>
		    <tr class="table-active" style="height:26px;">
		    	<?php 
		    		//HEADER OF TABLE
					$string = "";
					$intCount = 0;
				    foreach ($QryOutput as $QryField){
				    	if ($intCount == 1){
					    	foreach($QryField as $key=>$val){
						    		echo "<th scope='col' class='table-header' style='padding: 0; margin:0.1; text-align: center; border: 1px solid lightgray; vertical-align: middle'>".strtoupper($key)."</th>";	
						    }	
				    	}
				    	$intCount = $intCount + 1;
					}
					//echo $string;
				?>
		    </tr>
		  </thead>
			<tbody> 
				<?php 
					//CONTENTS OF TABLE
					$intCount = 0;
					$intOverallCount = 0;

					unset ($BRCode);
					$BRCode = array();
					$dblItemSold = array();
	  				$dblGrossSale = array();
	  				$dblVATSale = array();
	  				$dblVATExempt = array();
	  				$dblVATAmt = array();
	  				$dblDiscount = array();
	  				$dblNetIncome = array();

				    foreach ($QryOutput as $QryField){
				    	echo "<tr>";
				    	$intOverallCount = $intOverallCount + 1;
				    	foreach($QryField as $key=>$val){
				    		if ($key == "strTrxnNo"){
				    			//echo "<td><a href='".site_url("pos/".$val)."'>VIEW</a></td>";
				    			echo "<th scope='row' style='padding: 0; margin:0.1; border: 1px solid lightgray'><a href='".site_url("pos/".$val)."'>VIEW</a></th>";
				    		}
				    		else{
				    			if ($intCount == 0){
							    	//echo "<th scope='row'>".$val."</th>";}
							    	echo "<td style='padding: 0; margin:0.1; border: 1px solid lightgray'>".strtoupper($val)."</td>";}
							    else {
							    	if ($intCount == 3 || $intCount == 10 || $intCount == 11){
							    		echo "<td style='padding: 0; margin:0.1; border: 1px solid lightgray; text-align: center'>".strtoupper($val)."</td>";}
							    	else{
								    	if ($intCount > 2){
								    		echo "<td style='padding: 0; margin:0.1; border: 1px solid lightgray; text-align: right'>".number_format($val, 2, ".",",")."</td>";}
								    	else {
								    		echo "<td style='padding: 0; margin:0.1; border: 1px solid lightgray'>".strtoupper($val)."</td>";}
							    		}
							    	}
						    	}
						    	$intCount = $intCount + 1;


						    	//echo "<script>alert (". $key ."); </script>";

						    	if ($key == "BRANCH"){
						    			//check if this branch is already stored on the array
						    			$BRCodeCount = count($BRCode);
						    			// print_r($key . ' - ' . $BRCodeCount . ' - ' . $val . '<br/>');
						    			$intFoundMatch = -1;
										for($x = 0; $x < $BRCodeCount; $x++) {
										    if ($BRCode[$x] == $val){
										    	$intFoundMatch = $x;
										    	break;
										    }
										}
										if ($intFoundMatch == -1){
											//print_r ($val . " without match: " . $BRCodeCount .' - ' . $intOverallCount . '<br/>');
											$intFoundMatch = $BRCodeCount;
											array_push($BRCode, $val);
											array_push($dblItemSold, 0);
											array_push($dblGrossSale, 0);
											array_push($dblVATSale, 0);
											array_push($dblVATExempt, 0);
											array_push($dblVATAmt, 0);
											array_push($dblDiscount, 0);
											array_push($dblNetIncome, 0);
										}else {
										}
						    	} elseif ($key == "QTY" || $key == "TOTAL COST" || $key == "VAT SALES" || 
						    		     $key == "VAT EXEMPT" || $key == "VAT AMOUNT" || $key == "DISCOUNT" || $key == "NET INCOME"){
							    		// $intFoundMatch = False;
										// for($x = 0; $x < $BRCodeCount; $x++) {
										//     if ($BRCode[$x] == $val){
												if ($key == "QTY"){
										    		$dblItemSold[$intFoundMatch] = $dblItemSold[$intFoundMatch] + (float) $val;
										    	} elseif ($key == "TOTAL COST"){
										    		$dblGrossSale[$intFoundMatch] = $dblGrossSale[$intFoundMatch] + (float) $val;
										    	} elseif($key == "VAT SALES"){
										    		$dblVATSale[$intFoundMatch] = $dblVATSale[$intFoundMatch] + (float) $val;
										    	} elseif($key == "VAT EXEMPT"){
										    		$dblVATExempt[$intFoundMatch] = $dblVATExempt[$intFoundMatch] + (float) $val;
										    	} elseif($key == "VAT AMOUNT"){
										    		$dblVATAmt[$intFoundMatch] = $dblVATAmt[$intFoundMatch] + (float) $val;
										    	} elseif($key == "DISCOUNT"){
										    		$dblDiscount[$intFoundMatch] = $dblDiscount[$intFoundMatch] + (float) $val;
										    	} elseif($key == "NET INCOME"){
										    		$dblNetIncome[$intFoundMatch] = $dblNetIncome[$intFoundMatch] + (float) $val;}
										    	// blFoundMatch = True;
										    	// break;
										//     }
										// }
										// if (blFoundMatch == False){
										// 	array_push($BRCode, val)
										// }
						    	}
					    	}	
					    $intCount = 0; 
					    echo "</tr>";
					}
					echo $string;
				?>
			</tbody>
		</table> 
	</div>
</div>

<div id="idSMS" class="modal">
    <form method="post" class="modal-content animate" action="<?php echo site_url('pos'); ?>" style="max-width:500px">
    	<div class="imgcontainer">
        	<span onclick="document.getElementById('idSMS').style.display='none'" class="close" title="Close Modal">&times;</span>
      	</div>
      <br/>
      <div class="container">
      	<table border="0" style="width: 100%">
      		<tr>
      			<td style="width: 100%" align="CENTER">
      				<input type='hidden' id='hiddenCoverage' name='hiddenCoverage' value="<?php echo $strDefCov; ?>">
				      <input type='hidden' id='hiddenBasic' name='hiddenBasic' value="<?php echo $strDefBasic; ?>">
	      			<button name="cmdActivate" type="submit" style="width: 250px">DEACTIVATE SALES MONITORING</button>
      			</td>
      		</tr>
        </table>
      </div>
    </form>
</div>


<script>
function sum(input){
         
if (toString.call(input) !== "[object Array]")
	return false;
	var total =  0;
	for(var i=0;i<input.length;i++)
	{                  
	if(isNaN(input[i])){
	continue;
	 }
	  total += Number(input[i]);
	}
	return total;
}

//Update summary by branch code
var objSummary = document.getElementById('tableSummary');
//alert (objSummary.rows.length);	
for (var r = 1, n = objSummary.rows.length; r < n; r++) {
	var BranchNameWithCode = objSummary.rows[r].cells[0].innerHTML;
	//alert (BranchNameWithCode);
    var intPos = BranchNameWithCode.lastIndexOf("(");
    var sBRCode = BranchNameWithCode.substring(intPos+1);
    BRCodeFromTB = sBRCode.replace(")","");

    var BRCode = <?php echo json_encode($BRCode); ?>;
    var dblItemSold = <?php echo json_encode($dblItemSold); ?>;
    var dblGrossSale = <?php echo json_encode($dblGrossSale); ?>;
    var dblVATSale = <?php echo json_encode($dblVATSale); ?>;
    var dblVATExempt = <?php echo json_encode($dblVATExempt); ?>;
    var dblVATAmt = <?php echo json_encode($dblVATAmt); ?>;
    var dblDiscount = <?php echo json_encode($dblDiscount); ?>;
    var dblNetIncome = <?php echo json_encode($dblNetIncome); ?>;
    if (r === 1){
    	//alert (BRCode);	
    }

    <?php if ($blBasic == 1){ ?>
    	nextLoop1:
	    for (var c = 0, m = BRCode.length; c < m; c++) {
		    	if (BRCode[c] === BRCodeFromTB){
		    		//alert (BRCode[c] + ' - ' + BRCodeFromTB + ' - ' + c);
			    	objSummary.rows[r].cells[1].innerHTML = formatNumber(dblItemSold[c].toFixed(2));
			    	objSummary.rows[r].cells[2].innerHTML = formatNumber(dblGrossSale[c].toFixed(2));
			    	objSummary.rows[r].cells[3].innerHTML = formatNumber(dblDiscount[c].toFixed(2));
			    	objSummary.rows[r].cells[4].innerHTML = formatNumber(dblNetIncome[c].toFixed(2));
		    		break nextLoop1;
		    	} else if (BRCodeFromTB === "TOTAL: ") {
		    		//alert (BRCodeFromTB);
		    		objSummary.rows[r].cells[1].innerHTML = formatNumber(dblItemSold.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[2].innerHTML = formatNumber(dblGrossSale.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[3].innerHTML = formatNumber(dblDiscount.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[4].innerHTML = formatNumber(dblNetIncome.reduce(myFunc).toFixed(2));
		    	}
	    }
    <?php } else { ?>
    	nextLoop2:
		for (var c = 0, m = BRCode.length; c < m; c++) {
				if (BRCode[c] === BRCodeFromTB){
		    		//alert (BRCode[c] + ' - ' + BRCodeFromTB + ' - ' + c);
			    	objSummary.rows[r].cells[1].innerHTML = formatNumber(dblItemSold[c].toFixed(2));
			    	objSummary.rows[r].cells[2].innerHTML = formatNumber(dblGrossSale[c].toFixed(2));
			    	objSummary.rows[r].cells[3].innerHTML = formatNumber(dblVATSale[c].toFixed(2));
			    	objSummary.rows[r].cells[4].innerHTML = formatNumber(dblVATExempt[c].toFixed(2));
			    	objSummary.rows[r].cells[5].innerHTML = formatNumber(dblVATAmt[c].toFixed(2));
			    	objSummary.rows[r].cells[6].innerHTML = formatNumber(dblDiscount[c].toFixed(2));
			    	objSummary.rows[r].cells[7].innerHTML = formatNumber(dblNetIncome[c].toFixed(2));
		    		break nextLoop2;
		    	} else if (BRCodeFromTB === "TOTAL: ") {
		    		//alert (BRCodeFromTB);
		    		objSummary.rows[r].cells[1].innerHTML = formatNumber(dblItemSold.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[2].innerHTML = formatNumber(dblGrossSale.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[3].innerHTML = formatNumber(dblVATSale.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[4].innerHTML = formatNumber(dblVATExempt.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[5].innerHTML = formatNumber(dblVATAmt.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[6].innerHTML = formatNumber(dblDiscount.reduce(myFunc).toFixed(2));
			    	objSummary.rows[r].cells[7].innerHTML = formatNumber(dblNetIncome.reduce(myFunc).toFixed(2));
		    	}
	    }

    <?php } ?>

    
    

    function myFunc(total, num) {
	  return total + num;
	}
	function formatNumber(num) {
	  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
	}

}

</script>


