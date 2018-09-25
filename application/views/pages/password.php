<?php 
	if( isset($_SESSION['user']) == false){
	    //nobody is logged on the system, redirect to the Home Page
    	redirect(base_url()); 
	}
    else {
    	//disable Change Password menu.
		echo "<script>";
			echo "document.getElementById('mnuPassword').classList.remove('ahref-enabled');";
	        echo "document.getElementById('mnuPassword').classList.add('ahref-disabled');";
	    echo "</script>";
    }
?>

<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4; divCenterChangePass">
        <div class="account-wall">
            <img src="<?php echo base_url(); ?>public\images\avatar3.png" alt="Avatar" class="imgLogin">
            <form method="post" class="form-signin" onsubmit="return jsValidateNewPass()" action="<?php echo site_url('Login/changepass'); ?>">
	            <input type="password" id="txtOldUsrPwd" name="txtOldUsrPwd" class="form-control" placeholder="Enter Old Password" required autofocus>
	            <br/>
	            <input type="password" id="txtNewUsrPwd" name="txtNewUsrPwd" class="form-control" placeholder="Enter New Password" required>
	            <input type="password" id="txtConfirmUsrPwd" name="txtConfirmUsrPwd" class="form-control" placeholder="Confirm New Password" required>
	            <button class="btn btn-lg btn-primary btn-block" type="submit">
	                Sign in</button>
	            <a href="#" class="need-help"></a><span class="clearfix"></span>
            </form>
        </div>
    </div>
</div>

<script>
	function jsValidateNewPass() {
	    var OldPass = document.getElementById("txtOldUsrPwd");
	    var NewPass = document.getElementById("txtNewUsrPwd");
	    var ConfirmPass = document.getElementById("txtConfirmUsrPwd");
	    if (NewPass.value !== ConfirmPass.value) {
	    	alert ("The New Password did not Match. ");
	        return false;
	    }
	}
</script>