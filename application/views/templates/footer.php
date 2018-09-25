

	</div>	

      <script src="<?php echo base_url(); ?>public\jquery-3.3.1.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
      <script src="<?php echo base_url(); ?>public\popper.min.js"></script>
      <script src="<?php echo base_url(); ?>public\bootstrap.min.js"></script>
      <?php
        if ($this->uri->segment(1) === 'register') {
          ?>
          <script src="<?php echo base_url(); ?>public\register.js"></script>
          <?php
        }
      ?>
  </body>
</html>
