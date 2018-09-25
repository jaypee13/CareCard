<?php
	include('functions.php');
	$UserId=$_POST['txtUsrName'];
	$UserPwd=$_POST['txtUsrPwd'];
	$QryResult = phpLoginCheck($UserId, $UserPwd);

	if (empty($QryResult)){
			alert('Invalid User Login');
		}

	//change the label header to show who login
		alert('Welcome '. $QryResult);

?>