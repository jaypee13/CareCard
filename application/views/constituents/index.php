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

</style>

<?php
	$UserLogged = $_SESSION['user'];
	$UserLevel = $_SESSION['intLevel'];
	$UserLGUNo = $_SESSION['LGUNumber'];
	if ($UserLogged == ""){
		$this->session->set_userdata('expiredsess', 'expiredsess');
	    redirect(base_url()); }
	else {
		//echo "<script language='javascript'>";
		//echo "alert('. $UserLevel .')";
		//echo '</script>';
		if ($UserLevel == 99){
	    	if ($UserLGUNo !== ""){
	    		redirect(site_url("constituents/". $UserLGUNo));}
	    	else {
				$this->session->set_userdata('expiredsess', 'NotAdmin');
	    		redirect(base_url()); }
	    	}			
		}

	//Search filter defaults. If page was NOT loaded from Constituent/find, get default search filter
  	if ($tmpName == ""){
  		if( isset($_SESSION['tmpSessName'])){
  			$tmpName = $_SESSION['tmpSessName'];
  		}
  	}

  	if ($tmpIDNo == ""){
  		if( isset($_SESSION['tmpSessIDNo'])){
  			$tmpIDNo = $_SESSION['tmpSessIDNo'];
  		}
  	}

  	if ($tmpCoverage == ""){
  		if( isset($_SESSION['tmpSessCoverage'])){
  			$tmpCoverage = $_SESSION['tmpSessCoverage'];
  		}
  	}

?>

<h4><?php echo $title; ?>&nbsp;&nbsp;&nbsp;<a href="#" style="font-size: 20px;" ="text3" onclick="document.getElementById('idSMS').style.display ='block';">(Text Blast)</a></h4>
<div class="container-fluid">
	<form method="post" action="<?php echo site_url('constituents/find'); ?>" style="max-width: 100%; " class="center-div">
		<div class="row center-div">
			<div class="column text2" style="background-color:#bbb; width: 360px; height: 75px;">
				LGU
				<input type="text" style="max-height: 28px; text-transform:uppercase" value="<?php echo strtoupper($tmpIDNo); ?>" placeholder="Input Number" name="txtIDNumber">
			</div>
			<div class="column text2" style="background-color:#bbb; width: 360px; height: 75px;">
				NAME
				<input type="text" style="max-height: 28px; text-transform:uppercase" value="<?php echo strtoupper($tmpName); ?>" placeholder="Input Name" name="txtFullName">
			</div>
			<div class="column text2" style="background-color:#bbb; width: 360px; height: 75px;">
				INSURANCE COVERAGE
				<select name="cmbCoverage" style="max-height: 32px; text-transform:uppercase" class="custom-select text5">
				<?php 

					if ($tmpCoverage=="0" || $tmpCoverage == "") { 
						echo "<option selected value='0'>All Coverages</option>";
				      	echo "<option value='1'>Accidental Death and Dismemberment</option>";
				      	echo "<option value='2'>With Additional Coverage</option>";}
					else if ($tmpCoverage=="1") {
						echo "<option value='0'>All Coverages</option>";
				      	echo "<option selected value='1'>Accidental Death and Dismemberment</option>";
				      	echo "<option value='2'>With Additional Coverage</option>";}
				    else if ($tmpCoverage=="2") {
						echo "<option value='0'>All Coverages</option>";
				      	echo "<option value='1'>Accidental Death and Dismemberment</option>";
				      	echo "<option selected value='2'>With Additional Coverage</option>";}
				?>
			    </select>
			</div>
			
			<div class="column text2" style="background-color:#bbb;  width: 200px; height: 75px;">
				<button style="height: 28px; text-align: center; line-height: 10px; vertical-align: middle;" class="btn btn-secondary my-2 my-sm-0 imgCenter" type="submit" style="width: 100%">Search</button>
			</div>

			
		</div>
	</form>
	
	

	<!--
	show search button
	<a class="nav-link active" href="#" onclick="document.getElementById('idSearch').style.display ='block';">Search</a>
	-->

	<div style="overflow-x:auto;">
	<table class="table table-hover" style="padding: 0; margin:0.1; border:1;  min-width: 300px; background-color: white">
	  <thead>
	    <tr class="table-active">
	    	<?php 
	    		//HEADER OF TABLE
				$string = "";
				$intCount = 0;
			    foreach ($QryOutput as $QryField){
			    	if ($intCount == 1){
				    	foreach($QryField as $key=>$val){
					    	//$string.="$key:$val,"; this is field name and value
					    	//$string.="$key, "; //field name only
					    	if ($key != "strLGUNo"){
					    		echo "<th scope='col' class='table-header' style='padding: 0; margin:0.1; text-align: center; border: 1px solid lightgray'>".strtoupper($key)."</th>";	
					    	}
					    	else {
					    		echo "<th scope='col' class='table-header' style='padding: 0; margin:0.1; text-align: center; border: 1px solid lightgray'>ACCESS</th>";		
					    	}
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
			    foreach ($QryOutput as $QryField){
			    	echo "<tr>";
			    	foreach($QryField as $key=>$val){
			    		if ($key == "strLGUNo"){
			    			//echo "<td><a href='".site_url("constituents/".$val)."'>VIEW</a></td>";
			    			echo "<th scope='row' style='padding: 0; margin:0.1; border: 1px solid lightgray'><a href='".site_url("constituents/".$val)."'>VIEW</a></th>";
			    		}
			    		else{
			    			if ($intCount == 0){
						    	//echo "<th scope='row'>".$val."</th>";}
						    	echo "<td style='padding: 0; margin:0.1; border: 1px solid lightgray'>".strtoupper($val)."</td>";}
						    else {
						    	echo "<td style='padding: 0; margin:0.1; border: 1px solid lightgray'>".strtoupper($val)."</td>";}
					    }
					    $intCount = $intCount + 1;
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
    <form method="post" class="modal-content animate" action="" style="max-width:500px">
      <div class="imgcontainer">
        <span onclick="document.getElementById('idSMS').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="<?php echo base_url(); ?>public\images\SMS.png" style="height:80px; width:80px" alt="Avatar" class="avatar">
      </div>
      <div class="container">
      	<center><small><b>* Send Txt Announcement to All/Selected Registered Constituents</b></small>
      	</center><br/>

      	<table border="0" style="width: 100%">
      		<tr style="text-align: middle">
      			<td style="width: 100%">
      				<textarea style="width: 100%" class="text3" rows="5" cols="64" name="comment" placeholder="Enter Announcement Here..."></textarea>
      			</td>
      		</tr>
      		<tr>
      			<td style="width: 100%"></td>
      		</tr>
      		<tr>
      			<td style="width: 100%" align="Right"><button type="submit" style="width: 150px">Send SMS</button></td>
      		</tr>
        </table>
      </div>
</div>
