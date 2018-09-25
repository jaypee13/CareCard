<?php 
	if( isset($_SESSION['user']) == false){
		//disable Login menu. Login Page is already loaded
		echo "<script>";
			echo "document.getElementById('mnuPartnerLogin').classList.remove('active');";
	        echo "document.getElementById('mnuPartnerLogin').classList.add('ahref-disabled');";
	    echo "</script>";
	}
    else {
    	//if somebody has already login on the system, redirect to the Home Page
    	redirect(base_url()); 
    }
?>

<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4; divCenter">
        <div class="account-wall">
            <img src="<?php echo base_url(); ?>public\images\avatar4.png" alt="Avatar" class="imgLogin">
            <form method="post" class="form-signin" action="<?php echo site_url('Login/process'); ?>">
	            <input type="text" name="txtUsrName" class="form-control" placeholder="Enter User Name" required autofocus>
	            <input type="password" name="txtUsrPwd" class="form-control" placeholder="Enter Password" required>
	            <button class="btn btn-lg btn-primary btn-block" type="submit">
	                Sign in</button>
	            <span class="clearfix"></span>
            </form>
        </div>
    </div>
</div>