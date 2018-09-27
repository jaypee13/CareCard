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

<br/>
<h5>Contact Information</h5>

<main role="main" class="container-fluid">
<div class="row">
  <div class="column" style="width: 320px; height: 400px;">
    <div class="panel-transparent left">
		<div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Taytay Care Card Center</div>
			<div class="card-body">
			<h4 class="card-title">Reginald Navales</h4>
			<p class="card-text">Contact Me: (+63)9503271132<br/>
			Email Address: reginald.navales@gmail.com</p>
			</div>
		</div>
		<div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Taytay Care Card Center</div>
			<div class="card-body">
			<h4 class="card-title">Joseph Araracap</h4>
			<p class="card-text">Contact Me: (+63)9256634578<br/>
			Email Address: joseph.araracap@gmail.com</p>
			</div>
		</div>
	</div>
  </div>
  <div class="column" style="width: 320px; height: 400px;">
    <div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Taytay Care Card Center</div>
			<div class="card-body">
			<h4 class="card-title">Alvin Andres</h4>
			<p class="card-text">Contact Me: (+63)912345698<br/>
			Email Address: alvin.andres@gmail.com</p>
			</div>
		</div>
		<div class="card border-secondary mb-2" style="width: 300px">
			<div class="card-header text2">Care Card General Manager</div>
			<div class="card-body">
			<h4 class="card-title">Juvelle Enero</h4>
			<p class="card-text">Contact Me: (+63)9298730116<br/>
			Email Address: juvelle.enero@gmail.com</p>
			</div>
		</div>
  </div>

  <div class="column" style="width: 620px; height: 400px;">
  	<div class="card border-secondary mb-2" style="width:100%; height: 100%">
    	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5154.936297605483!2d121.12986614342783!3d14.551209548295486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x424bb684e94f1b19!2sMunicipal+Government+of+Taytay%2C+Rizal!5e0!3m2!1sen!2sus!4v1535370136137" frameborder="0" height="100%" style="border:0" allowfullscreen></iframe> -->
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.586643953331!2d120.96567391496235!3d14.218964990126539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7ebe33ce47af%3A0x594b4617e4415cf0!2sMunicipality+of+Silang!5e0!3m2!1sen!2sph!4v1537950381712" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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