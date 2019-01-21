
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
<style type="text/css">
    p{
        color: red;
    }
</style>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
<?php
if($this->session->flashdata('succ')): 
    // echo '<p class="alert alert-danger">'.$this->session->flashdata('session_error').'</p>'; 
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Congrats </span>'.$this->session->flashdata('succ').'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
  endif; 

  if($this->session->flashdata('reg_error')): 
    // echo '<p class="alert alert-danger">'.$this->session->flashdata('login_error').'</p>'; 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-danger">Sorry!  </span>'.$this->session->flashdata('reg_error').'
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
                    <h3 class="ml-4">Register</h3>
                    <form class="login-form" action="<?= base_url() ?>user/register_user" method="post">
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            
                            <input type="password" class="form-control" name="password" placeholder="Password" id="myinput">
                            <div class="input-group-text"><span onclick="myFunction()"><i class="fa fa-eye"></i></span></div>
                            <!-- <span onclick="myFunction()"><i class="fa fa-eye"></i></span> -->
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>

                        </div>
                        <button type="submit" name="login" class="btn btn-secondary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="social-login-content">
                            <!-- <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div> -->
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Already a User.<a href="<?= base_url() ?>user/index"> Login</a></p>
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

function myFunction() {
  var x = document.getElementById("myinput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    

</body>
</html>
