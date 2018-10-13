<!doctype html>

<html lang="en">

  <head>
    
    <link rel="icon" href="<?php echo base_url(); ?>favicon.png">
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8" encoding="utf8"> -->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public\bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public\OtherPublic\starter-template.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public\OtherPublic\login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public\OtherPublic\styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Care Card</title>   

    <style type="text/css">
      { margin: 0; padding: 0; }
      
    html, body {
      height: 100%;
    }
    body {
      background-image: url("<?php echo base_url(); ?>public/images/bg1.jpg");
      background-position: center bottom;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

     
    /***********************************************************************
    *  OPAQUE NAVBAR SECTION
    ***********************************************************************/
    .opaque-navbar {
        background-color: rgba(0,0,0,0.7);
      /* Transparent = rgba(0,0,0,0) / Translucent = (0,0,0,0.5)  */
        height: 100%;
        border-bottom: 0px;
        padding: 0px 10px 2px;
        transition: background-color .5s ease 0s;
    }

    .opaque-navbar.opaque {
        background-color: rgba(0,0,0,0.7);
        height: 100%;
        transition: background-color .5s ease 0s;
    }

    ul.dropdown-menu {
        background-color: rgba(0,0,0,0.7);
    }

    @media (max-width: 100%) {
        body
        {
          background-color: rgba(0,0,0,0.7);
        }
        .opaque-navbar {
          background-color: rgba(0,0,0,0.7);
          height: 100%;
          transition: background-color .5s ease 0s;
        }
    }

    .HeaderMenu {
        color: white;
        /*font-weight: bold;*/
    }

    .nav-menu a {
        color: #fff !important;
    }
    .nav-menu a:hover {
        color: #fff !important;
    }
    </style>


  </head>

  <body>
    <?php include("functions.php"); 
    login_session();  ?>
    <div class="fixed-top" style="">
        <nav class="navbar navbar-inverse navbar-fixed-top opaque-navbar navbar-expand-lg" style="border-bottom: 6px;">
          <a class="navbar-brand" href="" class="">
              <img src="<?php echo base_url(); ?>public\images\silangseal.png" style="margin: 0px; padding: 0px;" >
          </a>
          <a class="navbar-toggler navbar-toggler-right collapsed nav-menu" data-toggle="collapse" data-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation" style="width: 60px; text-align: center; height: 50px">
              <img class="center-div2" src="<?php echo base_url(); ?>public\images\dropdown.png" style="text-align: center;">
              <!-- <span class="navbar-toggler-icon " ></span> -->
          </a>

          <!-- <button class="navbar-toggler navbar-toggler-right collapsed nav-menu " type="button" data-toggle="collapse" data-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation" style="max-width: 60px;">
            <span class="navbar-toggler-icon " ></span>
          </button> -->

          <div class="collapse navbar-collapse"  id="navmenu">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link HeaderMenu" href="<?php echo base_url(); ?>home">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle HeaderMenu" id="dropdown02" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Membership</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                  <a class="dropdown-item" href="<?php echo base_url(); ?>Benefits">Benefits</a>
                  <a id="mnuConst" class="dropdown-item ahref-disabled" href="<?php echo base_url(); ?>constituents">Constituents</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>FAQs">FAQs</a>
                </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link HeaderMenu" href="<?php echo base_url(); ?>ContactUs">Contact Us</a>
              </li>
              <li class="nav-item active">
                <a href="<?php echo base_url() ?>register" class="nav-link HeaderMenu">Register</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown active">
                    <?php $UserName = $this->session->userdata('username'); 
                          $UserLevel = $this->session->userdata('intLevel'); 
                    ?>
                    <a class="nav-link dropdown-toggle" id="dropdown03" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php if ($UserName == "" || $UserName == "invalid") { ?>
                        <img src="<?php echo base_url(); ?>public\images\logout.png" style="height:40%; width:40%">
                      <?php }else { ?>
                        <img src="<?php echo base_url(); ?>public\images\login.png" style="height:40%; width:40%">
                      <?php } ?>
                    </a>

                    <?php echo isset($error) ? $error : ''; ?>  
                    <div class="dropdown-menu dropdown-menu-right text-left" id="MenuDropDown" aria-labelledby="dropdown03">
                        <?php if ($UserName == "" || $UserName == "invalid") { ?>
                            <a id="mnuPartnerLogin" class="dropdown-item" href="#" onclick="document.getElementById('id01').style.display ='block'; $('.collapse').collapse('hide');">Account Login</a>
                            <?php $this->session->unset_userdata('user');  
                            $this->session->unset_userdata('username'); 
                            $this->session->unset_userdata('tmpLogtime'); 
                            $this->session->unset_userdata('intLevel');  ?> 
                        <?php }else { ?>
                              <a id="mnuPartnerLogin" class="dropdown-item" href="<?php echo site_url('Login/logout'); ?>" onclick="return confirm('Do you want to logout?')">Logout <?php echo ucwords(strtolower($UserName)); ?></a>
                        <?php } ?>

                        <!--
                        <a id="mnuUserPrf" class="dropdown-item ahref-disabled" href="<?php echo base_url(); ?>profile">User Profile</a>
                        -->
                        
                    <a id="mnuPassword" class="dropdown-item ahref-disabled" href="<?php echo base_url(); ?>password">Change Password</a>

                    <?php if ($UserLevel == ""){ ?>
                        <script>
                          document.getElementById('mnuConst').classList.remove('ahref-enabled');
                          document.getElementById('mnuConst').classList.add('ahref-disabled');
                          document.getElementById('mnuPassword').classList.remove('ahref-enabled');
                          document.getElementById('mnuPassword').classList.add('ahref-disabled');
                          document.getElementById('mnuUserPrf').classList.remove('ahref-enabled');
                          document.getElementById('mnuUserPrf').classList.add('ahref-disabled');
                        </script>
                    <?php } else { ?>
                        <script>
                          document.getElementById('mnuConst').classList.remove('ahref-disabled');
                          document.getElementById('mnuConst').classList.add('ahref-enabled');
                          document.getElementById('mnuPassword').classList.remove('ahref-disabled');
                          document.getElementById('mnuPassword').classList.add('ahref-enabled');
                          document.getElementById('mnuUserPrf').classList.remove('ahref-disabled');
                          document.getElementById('mnuUserPrf').classList.add('ahref-enabled');
                        </script>
                    <?php } ?>
                    
                    </div>
                </li>
              </ul>
            </form>
          </div>
        </nav>

      </div>
    <nav class="navbar navbar-default"></nav> 
    <div class="container-fluid">
        