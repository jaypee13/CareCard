<script language='javascript'>
  function imageClick(url) {
    window.location = url;}
</script>
<!--<br/> -->
<main role="main" class="container-fluid">
<div class="row align-items-top justify-content-center">
    <div class="panel-transparent border left" style="height: 100%; width: 600px; min-width: 300px; max-width: 100%; padding: 4px; margin:0.2; padding-right: 6px;">
        <img class="center2" style="width: 100%" src="<?php echo base_url(); ?>public/images/homepage.png" alt="Home image">
    </div>
    <div class="panel-transparent border left" style="min-width: 300px; width: 600px; max-width: 100%; padding: 4px; margin:0.2;">
      <span class="text2" style="margin: 0px 0px 4px; text-align: center;font-size: 18px"><b>- DAGSANG GENERAL MERCHANDISE -</b> </span>
      
      <div>
          <span class="text3" style="margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;">
              <ul>
                <li>Store Locations &nbsp;&nbsp;: &nbsp;&nbsp;<a href="<?php base_url(); ?>ContactUs">(Find Us Here)</a></li>
                <li>Contact Number  : &nbsp;&nbsp;<a href="tel:+63-2-958-4046">(02) 958-4046</a></li>
                <li>Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<a href="MAILTO:elmerdagsang2015@gmail.com">(DGM Email)</a></li>
              </ul>
          </span>
      </div>
      
      <?php $UserName = $this->session->userdata('username'); 
            $UserLevel = $this->session->userdata('strLevel'); 
      ?>
      <?php if ($UserName == "" || $UserName == "invalid") { ?>
          <span class="text2" style="margin: 4px 0px 10px;text-align: center;">- For Authorized Employees -</span>
          <img onclick="imageClick('<?php base_url(); ?>login')" style="height: 30px; width: 200px; margin-left: auto; margin-right: auto; display: block; cursor: pointer;" src="<?php echo base_url(); ?>public/images/clickheretologin.png" alt="Member image">
      <?php }else { ?>
          <span class="text2" style="margin: 4px 0px 10px;text-align: center;">Welcome <?php echo ucwords(strtolower($UserName)); ?></span>
          
      <?php } ?>
    
      <span class="text2" style="margin: 8px 0px 0px;">WHO WE ARE AND WHAT WE DO?</span>
      <label class="text3" style="padding: 6px;">We offer retail and wholesale general merchandises to the public (Example: Rice, LPG, retail goods, etc).</label>
      
    </div>
</div>

</main>


