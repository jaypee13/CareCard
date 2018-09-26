<script language='javascript'>
  function imageClick(url) {
    window.location = url;}
</script>

<br/>
<main role="main" class="container-fluid">
<div class="row align-items-top justify-content-center">
    <div class="panel-transparent left" style="height: 100%; width: 600px; min-width: 300px; max-width: 100%; padding: 4px; margin:0.2; padding-right: 6px;">
        <img class="center2" style="width: 100%" src="<?php echo base_url(); ?>public/images/homepage.png" alt="Home image">
    </div>
    <div class="panel-transparent border left" style="min-width: 300px; width: 600px; max-width: 100%; padding: 4px; margin:0.2;">
      <span class="text2" style="margin: 0px 0px 4px;"><b>SILANGUENO CARD - </b> Proyektong ibinahagi sa mga mamamayan ng Silang Cavite mula sa SANGUNIANG BAYAN at Mayor Omil Poblete.</span>
      
      <div>
        <span class="text3" style="margin: 0px 0px 10px; padding: 6px;">INTERESADO KABA MAKAKUHA NG SILANGUENO CARD? <a style="font-size:14px;" href="<?php base_url(); ?>FAQs">(PARAAN NG PAGKUHA NG CARD)</a></span>
      </div>
      
        <span class="text2" style="margin: 4px 0px 10px;">KUNG IKAW AY MYEMBRO, MAARI MO NA MAKITA ANG IYONG RECORD.</span>
        

        <img onclick="imageClick('<?php base_url(); ?>login')" style="height: 30px; width: 200px; margin-left: auto; margin-right: auto; display: block; cursor: pointer;" src="<?php echo base_url(); ?>public/images/clickheretologin.png" alt="Member image">

    
      <span class="text2" style="margin: 8px 0px 0px;">ANO ANG PANGUNAHING BENEPISYO NG CARD NA ITO?</span>
      <label class="text3" style="padding: 6px;">Bukod sa magkakaron ka ng isang valid Government ID, mabibigyan din ang mga residente na karagdagang benepisyo sa gamot, hospitalisasyon, insurance, at iba pa. Upang makita ang buong benepisyo, buksan ang link na ito <a href="<?php base_url(); ?>Benefits">Membership and Benefits</a></label>
      
      <span class="text2" style="margin: 0px 0px 0px 0px; text-align: center">ANG AMING PARTNERS:</span>
      <div class="row">
          <div class="col frame" >
              <img class="imgCenter2" src="<?php echo base_url(); ?>public/images/generika.png" alt="Generika" style="width:75%;">
          </div>
          <div class="col frame" >
              <img class="imgCenter2" src="<?php echo base_url(); ?>public/images/BenLife.png" alt="BenLife Insurance" style="width:60%">
          </div>
          <div class="col frame" >
              <img class="imgCenter2" src="<?php echo base_url(); ?>public/images/MedCentral.png" alt="Med Central" style="width:70%">
          </div>
          <div class="col frame" >
              <img class="imgCenter2" src="<?php echo base_url(); ?>public/images/BPI.png" alt="BPI" style="width:60%">
          </div>
          <div class="col frame" >
              <img class="imgCenter2" src="<?php echo base_url(); ?>public/images/TaytayEmerg.png" alt="Taytay Emergency" style="width:50%">
          </div>
      </div>
    </div>
</div>

</main>


