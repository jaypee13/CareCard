	<div id="id01" class="modal">
	    <form method="post" class="modal-content animate" action="<?php echo site_url('Login/process'); ?>" style="max-width:500px">
	      <div class="imgcontainer">
	        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	        <img src="<?php echo base_url(); ?>public\images\avatar4.png" style="height:80px; width:80px" alt="Avatar" class="avatar">
	      </div>
	      <div class="container">
	      	<table border="0" style="width: 100%">
	      		<tr>
	      			<td style="width: 20%"><label for="uname"><b>Username</b></label></td>
	      			<td style="width: 80%"><input type="text" placeholder="Enter User Name" name="txtUsrName" required autofocus></td>
	      		</tr>
	      		<tr>
	      			<td style="width: 20%"><label for="psw"><b>Password</b></label></td>
	      			<td style="width: 80%"><input type="password" placeholder="Enter Password" name="txtUsrPwd" required></td>
	      		</tr>
	      		<tr>
	      			<td style="width: 20%"></td>
	      			<td style="width: 80%"></td>
	      		</tr>
	      		<tr>
	      			<td style="width: 20%"></td>
	      			<td style="width: 80%" align="Right"><button type="submit" style="width: 150px">Login</button></td>
	      		</tr>
	        </table>
	      </div>
	  	</form>
	</div>
	
	<script src="<?php echo base_url(); ?>public\otherpublic\login.js"></script>