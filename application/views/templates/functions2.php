<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
    public function session_handling(){
        $UserID = $this->session->userdata('user');
        $loginTime = $this->session->userdata('tmpLogtime');
        echo time().' - '.$loginTime;

        if ($UserID != "") {
            if(time() - $loginTime > 10) {
                $this->session->unset_userdata('user');  
                $this->session->unset_userdata('username');  
                $this->session->unset_userdata('tmpLogtime');  
            }
        }
        if ($UserID == "invalid") {
        echo "<div class='container-fluid'><label name='welcome_label'>Invalid Login Attempt.</label></div>";}
    }
?>