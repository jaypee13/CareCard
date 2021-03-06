<?php
defined('BASEPATH') OR exit('No direct script access allowed');     

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/header'); //header page
		$this->load->view('pages/loginview');
		$this->load->view('templates/footerSub');  //other required footer
		$this->load->view('templates/footer'); //load javascript sources
		$this->session->unset_userdata('user');  //clear user session
    }

    // public function phpEncrypt($strVal){
    //     $strKey = "JMSolutions";
    //     $tmpEncrypt = "";
    //     $v = 1;
    //     for ($i = 0; $i <= strlen($strVal) - 1; $i++) {
    //         $ascPass = ord(substr($strVal, $i, 1));
    //         If ($i > strlen($strKey) * $v) {
    //             $j = $i - (strlen($strKey) * $v);
    //             $v = $v + 1;}
    //         Else {
    //             $j = $i - (strlen($strKey) * ($v - 1));
    //         }
    //         $ascKey = ord(substr($strKey, $j, 1));
    //         $tmpEnc = $ascPass + $ascKey;
    //         $tmpEncrypt = $tmpEncrypt . "char(" . $tmpEnc . ") + '' + ";
    //     }
    //     $tmpEncrypt = substr($tmpEncrypt, 0, strlen($tmpEncrypt) - 8); //remove last characters
    //     return $tmpEncrypt;
    // }

    public function phpEncrypt($strVal){
        $tmpEncrypt = "";
        for ($i = 0; $i <= strlen($strVal) - 1; $i++) {
            $ascPass = ord(substr($strVal, $i, 1));
            $ascPass = $ascPass + 28;
            $tmpEncrypt = $tmpEncrypt . "char(" . $ascPass . ") + '' + ";
        }
        $tmpEncrypt = substr($tmpEncrypt, 0, strlen($tmpEncrypt) - 8); //remove last characters
        return $tmpEncrypt;
    }


    public function process()
    {

        $user = $this->input->post('txtUsrName');
        $pass = $this->input->post('txtUsrPwd');
        // ECHO $pass;
        // EXIT();

        $tmpQuery = "Select id, strUserName, strName, strPass, strLevel
                     from tblUser where strUserName = '".$user."'";
        $query = $this->db->query($tmpQuery);
        foreach ($query->result() as $row)
        { $strPass = $row->strPass;
            //print_r($strPass);
        }

        $tmpPassword = $this->phpEncrypt($pass);
        $tmpQuery = "Select id, strUserName, strName, strPass, strLevel
                     from tblUser where strUserName = '".$user."' and strPass = (Select ". $tmpPassword .")";
         // ECHO $tmpPassword . ' $$$$ ' . $tmpQuery;
         // EXIT();
        $query = $this->db->query($tmpQuery);
        foreach ($query->result() as $row)
        {
           $strName = $row->strName;
           $strLevel = $row->strLevel;
           //echo $strName;
        }

        //print_r("Select id, strUserName, strName, strPass, strLevel from tblUser where strUserName = '".$user."'");
        if(count($query->result_array()) > 0){
            //declaring session
            $this->session->set_userdata(array('user'=>$user));
            $this->session->set_userdata(array('username'=>$strName));
            $this->session->set_userdata(array('tmpLogtime'=>time()));
            $this->session->set_userdata(array('strLevel'=>$strLevel));
            $this->session->set_userdata(array('LGUNumber'=>$strLevel));
            $this->session->set_userdata(array('expiredsess'=>''));
            $this->session->set_userdata(array('tmpSessName'=>''));
            $this->session->set_userdata(array('tmpSessIDNo'=>''));
            $this->session->set_userdata(array('tmpSessCoverage'=>''));

            redirect(site_url("pos"));}
        else {
                //ECHO $this->phpEncrypt($pass);
                //EXIT();
                $this->session->set_userdata(array('user'=>'invalid'));
                $this->session->set_userdata(array('username'=>''));
                $this->session->set_userdata(array('tmpLogtime'=>''));
                $this->session->set_userdata(array('strLevel'=>''));
                $this->session->set_userdata(array('LGUNumber'=>''));
                $this->session->set_userdata(array('expiredsess'=>''));
                $this->session->set_userdata(array('tmpSessName'=>''));
                $this->session->set_userdata(array('tmpSessIDNo'=>''));
                $this->session->set_userdata(array('tmpSessCoverage'=>''));
                redirect(base_url() . "login");
            }
    }
    public function logout()
    {

        //removing session
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('tmpLogtime');
        $this->session->unset_userdata('strLevel');
        $this->session->unset_userdata('LGUNumber');
        $this->session->unset_userdata('expiredsess');
        $this->session->unset_userdata('tmpSessName');
        $this->session->unset_userdata('tmpSessIDNo');
        $this->session->unset_userdata('tmpSessCoverage');
        redirect(base_url());
    }

    public function changepass()
    {
        $user = $_SESSION['user'];
        $oldpass = $this->input->post('txtOldUsrPwd');
        $newpass = $this->input->post('txtNewUsrPwd');
        $confirmpass = $this->input->post('txtConfirmUsrPwd');

        $tmpOldPassword = $this->phpEncrypt($oldpass);
        $tmpNewPassword = $this->phpEncrypt($newpass);
        $query = $this->db->query("Select " . $tmpOldPassword . " as strAscOldPassword, " . $tmpNewPassword . " as strAscNewPassword"); //get the ASCII value
        foreach ($query->result() as $row) {
            $oldpass = $row->strAscOldPassword;
            $newpass = $row->strAscNewPassword;}

        $query = $this->db->query("Select id, strUserName, strName, strPass, strLevel
                                   from tblUser where strUserName = '".$user."'");

        //$strPass = $query->result()->strPass;
        //$strName = $query->result()->strName;
        foreach ($query->result() as $row)
        {
           $strPass = $row->strPass; //correct
           //$strPass = $oldpass;
           $strName = $row->strName; //correct
           //echo $user . ' ' . $strPass . ' ' . $strName;
        }
        if(count($query->result_array()) > 0){
            if ($oldpass == $strPass) {
                //correct old password, allow changing of password
                //$tmpPass = $this->phpEncrypt($this->input->post('txtNewUsrPwd'));
                //ECHO $tmpPass;
                //EXIT();
                $data = array('strPass' => $newpass, 'strName' => $strName);
                $this->User_model->update_userpwd($user,$data); //save new password here
                $this->session->set_userdata('expiredsess', 'PasswordUpdated');
                redirect(base_url());
            }
            else {
                $this->session->set_userdata('expiredsess', 'InvalidOldPass');
                redirect(base_url() . "password");
            }

        }
    }

}
