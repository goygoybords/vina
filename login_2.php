<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VinaOutsource Database - Login</title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->

        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/bootstrap.css?1422792965" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/materialadmin.css?1425466319" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/font-awesome.min.css?1422529194" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
        <!-- libs -->
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666" />

        <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->
    </head>
    <body class="menubar-hoverable header-fixed login_page">

        <!-- BEGIN LOGIN SECTION -->
        <section class="section-account">
            <div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>
            <div class="spacer"></div>
            <div class="card contain-sm style-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <br/>
                            <h2 class="text-bold text-primary">VinaOutsource Database</h2>
                            <br/><br/>
                                    <?php
                                    session_start();
                                    if(isset($_SESSION['username'])){ header("Location: /customer/customer"); }/* Redirect browser */
                                    ini_set('memory_limit', '-1');

                                    require("include/db/dbconnect.php");
                                    include("include/ifjson/isjson.php");
                                    include("include/sqlscripts/sqlscripts.php");

                                    // echo "test";

                                    function userexist($db, $username){
                                        $found = mysqli_query($db, "SELECT * FROM user WHERE IBO_UserName = '$username'");

                                        if(mysqli_num_rows($found) > 0) return true;
                                        return false;
                                    }
                                    function checkpassword($db, $username, $password){
                                        $found = mysqli_query($db, "SELECT * FROM user WHERE IBO_UserName = '$username' && Pass_Phrase = '$password'");
                                        if($found){
                                            if(mysqli_num_rows($found) > 0) return true;
                                            return false;
                                        }
                                    }

                                    opendb();

                                    if(isset($_POST['username']) && isset($_POST['password'])){
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        if($username == '' ){
                                            echo '<div class="alert alert-danger">Missing required fields</div>';
                                        }else if($password == ''){
                                            echo '<div class="alert alert-danger">Missing required fields</div>';
                                        }else if(! userexist($db, $username)){
                                            echo '<div class="alert alert-danger">Username not found</div>';
                                        }else if(checkpassword($db, $username, $password)){
                                            // header("Location: /customer/customer"); /* Redirect browser */
                                            $_SESSION["username"] = $username;
                                            header("Location: /customer/customer"); /* Redirect browser */
                                            exit();
                                        }else{
                                            echo '<div class="alert alert-danger">Incorrect Password</div>';
                                        }
                                    }

                                    closedb();
                                    ?>
                            <form class="form floating-label" action="" accept-charset="utf-8" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username">
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="password">Password</label>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-6 text-left">
                                        <div class="checkbox checkbox-inline checkbox-styled">
                                            <label>
                                                <!-- <input type="checkbox"> <span>Remember me</span> -->
                                            </label>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-xs-6 text-right">
                                        <button class="btn btn-primary btn-raised" type="submit">Login</button>
                                    </div><!--end .col -->
                                </div><!--end .row -->
                            </form>
                        </div><!--end .col -->
                    </div><!--end .card -->
                </section>
                <!-- END LOGIN SECTION -->

                <!-- BEGIN JAVASCRIPT -->
                <!-- jquery -->
                <script src="assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
                <script src="assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
                <script src="assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
                <script src="assets/js/libs/bootstrap/bootstrap.min.js"></script>
                <!-- libs -->
                <script src="assets/js/libs/spin.js/spin.min.js"></script>
                <script src="assets/js/libs/select2/select2.min.js"></script>
                <script src="assets/js/libs/moment/moment.min.js"></script>
                <script src="assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
                <!-- core source -->
                <script src="assets/js/core/source/App.js"></script>
                <script src="assets/js/core/source/AppNavigation.js"></script>
                <script src="assets/js/core/source/AppOffcanvas.js"></script>
                <script src="assets/js/core/source/AppCard.js"></script>
                <script src="assets/js/core/source/AppForm.js"></script>
                <script src="assets/js/core/source/AppNavSearch.js"></script>
                <script src="assets/js/core/source/AppVendor.js"></script>

                <!--custom script -->
                <script src="assets/js/script.js"></script>
                <!-- END JAVASCRIPT -->

            </body>
        </html>
