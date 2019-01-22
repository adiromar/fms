<?php
$user_id=$this->session->userdata('user_id');
// echo $user_id;
if($user_id){

  redirect('pages/view');
}
?>
<!doctype html>

<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>File Management System</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">

            <?php 

if($this->session->flashdata('session_error')): 
    // echo '<p class="alert alert-danger">'.$this->session->flashdata('session_error').'</p>'; 
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Warning </span>'.$this->session->flashdata('session_error').'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
  endif; 

  if($this->session->flashdata('login_error')): 
    // echo '<p class="alert alert-danger">'.$this->session->flashdata('login_error').'</p>'; 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-danger">Login Error  </span>'.$this->session->flashdata('login_error').'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
  endif; 

  if($this->session->flashdata('error_message')): 
    // echo '<p class="alert alert-success">'.$this->session->flashdata('error_message').'</p>'; 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-danger">Error </span>'.$this->session->flashdata('error_message').'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

  endif; ?>


            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <!-- <img class="align-content" src="images/logo.pngs" alt=""> -->

                    </a>
                </div>
                <div class="login-form">
                    <h3 class="ml-4">File Management System Login</h3>
                    <form class="login-form" action="" method="post">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="social-login-content">
                            <!-- <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div> -->
                        </div>
                        <div class="m-t-15 text-center">
                            <p>Don't have account ? <a class="btn btn-primary col-md-3" href="<?= base_url() ?>user/register"> Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url(); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>

<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(".alert").remove(); 
    });
}, 3500);
</script>
    

</body>
</html>
