<style>
* {
    box-sizing: border-box;
}

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
</style>

<!-- <br/> -->
<!-- <h5>Contact Information</h5> -->

<main role="main" class="container-fluid">
<div class="row">
  <div class="column" style="width: 320px; height: 520px;">
    <div class="panel-transparent left">
		<div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Head Office Center</div>
			<div class="card-body">
			<p><h5 class="card-title">Elmer Dagsang</h5>
			<p class="card-text"><b>Contact Details:</b> (+63)9568033006<br/>
			elmerdagsang2015@gmail.com</p>
			<b>Address:</b> Lacuna St. Brgy Bangkal Makati City
			</div>
		</div>
		<div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Branch: Washington Street Makati</div>
			<div class="card-body">
			<p><h4 class="card-title">Juan Dela Cruz</h4>
			<p class="card-text"><b>Contact Details:</b> (+63)9123456789<br/>
			DGMWashington@gmail.com</p>
			<p class="card-text"><b>Address:</b> Washington St. Brgy Pio Del Pilar Makati City</p>
			</div>
		</div>
	</div>
  </div>
  <div class="column" style="width: 320px; height: 520px;">
    <div class="card border-secondary mb-2" style="width: 300px">
		<div class="card-header text2">Branch: Dela Rosa Street Makati</div>
			<div class="card-body">
			<p><h5 class="card-title">Rubie Fabellon-Dagsang</h5>
			<p class="card-text"><b>Contact Details:</b> (+63)9123456789<br/>
			DGMDelaRosa@gmail.com</p>
			<b>Address:</b> Dela Rosa St. Brgy Pio Del Pilar Makati City
			</div>
		</div>
		<div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Branch: Evangelista Street Makati</div>
			<div class="card-body">
			<p><h4 class="card-title">Juan Dela Cruz</h4>
			<p class="card-text"><b>Contact Details:</b> (+63)9123456789<br/>
			DGMEvangelista@gmail.com</p>
			<p class="card-text"><b>Address:</b> Evangelista St. Brgy Bangkal Makati City</p>
			</div>
		</div>
  </div>

  <div class="column" style="width: 650px; height: 515px;">
  	<div class="card border-secondary mb-2" style="width:100%; height: 100%">
    	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5154.936297605483!2d121.12986614342783!3d14.551209548295486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x424bb684e94f1b19!2sMunicipal+Government+of+Taytay%2C+Rizal!5e0!3m2!1sen!2sus!4v1535370136137" frameborder="0" height="100%" style="border:0" allowfullscreen></iframe> -->
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1365.4165840921398!2d121.01068751315047!3d14.543061906102553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c93fed861cbb%3A0x71bc99f8d1e47734!2sDagsang+General+Merchandise!5e0!3m2!1sen!2sph!4v1564904078486!5m2!1sen!2sph" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>

  
</div>
</main>

<main role="main" class="container-fluid">
<div class="row">
	
	<div class="panel-transparent center">  	
		
	</div>
</div>
</main>