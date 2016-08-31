<?php set_include_path('include'); 
    session_start();
if(!isset($_SESSION['userID']))
{
?>
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
                             <small class="text-warning"><?php if(isset($_GET['err']) && $_GET['err']==1){ echo "!Account doesn't exist."; } ?></small>
                            <h2 class="text-bold text-primary">VinaOutsource Database</h2>
                            <form action="pscripts/login" method="POST" class="form floating-label" accept-charset="utf-8" id="s">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" required="">
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" required="">
                                    <label for="password">Password</label>
                                </div>
                                <br/>
                                <div class="row">

                                    <div class="text-right">
                                        <button class="btn btn-success btn-raised" type="submit">Sign In</button>
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

<?php }else{ ?>
    <p class="text-warning">Unavailable Page</p>
<?php echo"<meta http-equiv='refresh' content='0; URL=/customer/customer'>"; } ?>