<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

    function login_session(){
        $loggedUser = "";
        if( isset($_SESSION['user']) ){ 
            //there is login session
            $loggedUser = $_SESSION['user'];
            $loginTime = $_SESSION['tmpLogtime'];
            $UserLevel = $_SESSION['intLevel'];

            //echo time().' - '.$loginTime.' - '.$loggedUser. ' - ' . $UserLevel;

            if ($loggedUser != "") {
                if(time() - $loginTime > 10000) {
                    //600 is 10 minutes
                    unset($_SESSION['user']);
                    unset($_SESSION['username']);
                    unset($_SESSION['tmpLogtime']);
                    unset($_SESSION['intLevel']);
                    unset($_SESSION['tmpSessName']);
                    unset($_SESSION['tmpSessIDNo']);
                    unset($_SESSION['tmpSessCoverage']);
                    $_SESSION['expiredsess'] = "expiredsess";
                }
            }

            if ($loggedUser != "invalid") {
                //refresh session active time to start counting again for expiration
                $_SESSION['tmpLogtime'] = time();}
        }
        if( isset($_SESSION['expiredsess']) ){ 
            $tmpMessage = "<br/>";
            if ($loggedUser == "invalid") {
                $tmpMessage = "<br/>Invalid Login Attempt. ";
            }
            
            $ExpiredSession = $_SESSION['expiredsess'];
            if ($ExpiredSession == "expiredsess") {
                if ($loggedUser != "invalid") {
                    $tmpMessage = $tmpMessage . "Please Login To Access This Menu.";
                }
                echo "<br/><div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'>" . $tmpMessage . "</label></div>";
                unset($_SESSION['expiredsess']);
            }
            else if ($ExpiredSession == "NotAdmin") {
                $tmpMessage = $tmpMessage . "Unauthorized User. Only Admin User Can Access This Menu.";
                echo "<br/><div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'>" . $tmpMessage . "</label></div>";
                unset($_SESSION['expiredsess']);
            }
            else if ($ExpiredSession == "NotOwnAcct") {
                $tmpMessage = $tmpMessage . "Unauthorized User. You can only view your own account information.";
                echo "<br/><div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'>" . $tmpMessage . "</label></div>";
                unset($_SESSION['expiredsess']);
            }
            else if ($ExpiredSession == "InvalidOldPass") {
                $tmpMessage = $tmpMessage . "The Old Password is Invalid.";
                echo "<br/><div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'>" . $tmpMessage . "</label></div>";
                unset($_SESSION['expiredsess']);
            }
            else if ($ExpiredSession == "PasswordUpdated") {
                $tmpMessage = $tmpMessage . "Password Successfully Updated.";
                echo "<br/><div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'>" . $tmpMessage . "</label></div>";
                unset($_SESSION['expiredsess']);
            }
            else if ($ExpiredSession == "invalidLGUNo") {
                $tmpMessage = $tmpMessage . "Invalid LGU Number.";
                echo "<br/><div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'>" . $tmpMessage . "</label></div>";
                unset($_SESSION['expiredsess']);
            }
            else {
                // echo "<div class='container-fluid'><label id='welcome_label' style='color:red; font-style: italic;'></label></div>";
            }
        }

    }


    function phpDecrypt($strVal){
        $strKey = "JMSolutions";
        $tmpDecrypt = "";
        $v = 1;
        for ($i = 1; $i <= strlen($strVal); $i++) {
            $ascPass = ord(substr($strVal, $i, 1));
            If ($i > strlen($strKey) * $v) {
                $j = $i - (strlen($strKey) * $v);
                $v = $v + 1;}
            Else {
                $j = $i - (strlen($strKey) * ($v - 1));
            }
            $ascKey = ord(substr($strKey, $j, 1));
            $tmpDecrypt = $tmpDecrypt & Chr($ascPass - $ascKey);
        }
        return $tmpDecrypt;
    }

    