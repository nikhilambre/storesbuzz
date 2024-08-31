<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

    if(isset($_SESSION['mem_id'])) {
        $userId = $_SESSION['mem_id'];
        $username = $_SESSION['username'];
        $imguser = $_SESSION['userimg'];
    } else {
      header('Location: ../index.php');
      die();
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard - Pixel Coders | Web Designers &amp; Web Developers | Category Product based website Designs |India</title>

    <meta name="description" content="">
    <meta name="keywords" content="HTML5,CSS3,Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../ public/images/favicon1.png">

    <!-- Bootstrap v3.2.0 & Custome stylesheet
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type='text/css' />-->
    <link href="../public/stylesheet/css/bootstrap.min.css" rel="stylesheet" type='text/css' media="screen" />
    <link href="../public/stylesheet/css/dashboard.css" rel="stylesheet" type='text/css' />


    <!-- PlugIn stylesheet 
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/stylesheet/css/animate.min.css" type='text/css' />

    <!-- Google fonts
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="../public/stylesheet/css/datatables.min.css" type='text/css' />
    
</head>

<body class="">

    <div id="preloader">
        <div id="status"></div>
    </div>

    <nav class="navbar-default navbar-static-side">
        <div class="sidebar-collapse">
            <ul class="nav lev1-ul">

                <li class="header">
                    <div class="prof-li">
                        <span><img src="../public/images/<?php echo $imguser; ?>" class="img-circle"></span>
                        <a href="#">
                            <span class=""><strong>Hello, <?php echo $username;?></strong></span>
                            <span>Admin</span>
                        </a>
                    </div>
                </li>

                <li class="sd-home">
                    <a class="" href="../settings/dashboard.php">
                        <i class="fa fa-braille"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="sd-cat">
                    <a class="nav-label" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                        <i class="fa fa-cogs"></i>
                        <span>Category</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <div class="collapse col-exp" id="collapseExample1">
                        <ul class="lev2-ul list-unstyled">
                            <li><a href="../category/create-cat.php">Create New</a></li>
                            <li><a href="../category/list-cat.php">List of Categories</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sd-pcat">
                    <a class="" href="../pcategory/parent-cat.php">
                        <i class="fa fa-cog"></i>
                        <span>Parent Category</span>
                    </a>
                </li>

                <li class="sd-prod">
                    <a class="" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                        <i class="fa fa-tasks"></i>
                        <span>Products</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <div class="collapse col-exp" id="collapseExample2">
                        <ul class="lev2-ul list-unstyled">
                            <li><a href="../product/create-prod.php">Create New</a></li>
                            <li><a href="../product/list-prod.php">List of Products</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sd-tag">
                    <a class="" href="../tag/tags.php">
                        <i class="fa fa-tags"></i>
                        <span>Tags</span>
                    </a>
                </li>

                <li class="sd-msg">
                    <a class="" href="../message/message.php">
                        <i class="fa fa-comments"></i>
                        <span>Messages</span>
                    </a>
                </li>

                <li class="sd-enq">
                    <a class="" href="../enquiries/enquiries.php">
                        <i class="fa fa-coffee"></i>
                        <span>Enqueries</span>
                    </a>
                </li>

                <li class="sd-cont">
                    <a class="" href="../address/address.php">
                        <i class="fa fa-address-book"></i>
                        <span>Contact Us Details</span>
                    </a>
                </li>

                <li class="sd-edit">
                    <a class="nav-label" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                        <i class="fa fa-th-large"></i>
                        <span>Update Content</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <div class="collapse col-exp" id="collapseExample3">
                        <ul class="lev2-ul list-unstyled">
                            <li><a href="create-cat.php">Update Home</a></li>
                            <li><a href="list-cat.php">Update About</a></li>
                            <li><a href="list-cat.php">Update Company</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sd-set">
                    <a class="" href="../settings/settings.php">
                        <i class="fa fa-wrench"></i>
                        <span>Settings</span>
                    </a>
                </li>
                
                <li class="sd-help">
                    <a class="" href="../settings/help.php">
                        <i class="fa fa-question"></i>
                        <span>Help</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="page-wrap">

        <nav class="navbar navbar-static-top" role="navigation">
            <div class="nav-header navbar-left">
                <span class="nav-minmize btn btn-primary"><i class="fa fa-area-chart"></i ></span>
                <h1 class="nav-brand">Kataria Trade Links</h1>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <a href="../logout.php" class="btn btn-default"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log Out</a>
            </ul>
        </nav>