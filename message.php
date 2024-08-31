<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Messages | Kataria Texports - Exporter of agro products</title>

    <meta name="description" content="">
    <meta name="keywords" content="HTML5,CSS3,Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/images/logo.jpg">

    <!-- Bootstrap v3.2.0 & Custome stylesheet
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link href="../public/stylesheet/css/bootstrap.min.css" rel="stylesheet" type='text/css' media="screen" />
    <link href="../public/stylesheet/css/design.css" rel="stylesheet" type='text/css' />

    <!-- PlugIn stylesheet 
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/stylesheet/css/animate.min.css" type='text/css' />
    <link rel="stylesheet" href="../public/stylesheet/css/SlidePushMenus.css" type="text/css" />

    <script type="text/javascript" src="public/js/modernizr.SlidePushMenus.js"></script>

    <!-- Google fonts
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

</head>

<body class="cbp-spmenu-push">

    <div id="preloader">
        <div id="status"></div>
    </div>

    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right hidden-xs" id="cbp-spmenu-s2">
        <div class="spmenu-logo text-center">
            <img src="public/images/logo.jpg" class="img-circle">
            <h2>Kataria Texports</h2>
        </div>
        <h3>Menu</h3>
        <a href="index.html"><i class="fa fa-globe"></i>Home</a>
        <a href="product.html"><i class="fa fa-star"></i>Products</a>
        <a href="about.html"><i class="fa fa-qrcode"></i>About Us</a>
        <a href="company.html"><i class="fa fa-industry"></i>Company Profile</a>
        <a href="contact.html"><i class="fa fa-envelope"></i>Contact Us</a>
    </nav>

    <section class="right-show hidden-xs">
        <button id="showRight" class="btn btn-default"><i class="fa fa-bars"></i></button>
    </section>


    <div class="page-wrap">

        <header class="header-1 visible-xs">
            <nav class="navbar navbar-default navbar-static-top row ">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header navbar-left">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand brand pull-left" href="#"><img src="public/images/logo-white.png" class="brand-img-w" alt="logo"/><img src="public/images/logo-white.png" class="brand-img-b" alt="logo"/></a>
                    </div>

                    <!-- Navbar list
                    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right text-center">
                            <li class=""><a href="ìndex.html">Home</a></li>
                            <li class=""><a href="product.html">Products</a></li>
                            <li class=""><a href="about.html">About Us</a></li>
                            <li class=""><a href="company.html">Company Profile</a></li>
                            <li class=""><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </header>

        <div class="top-1"><div class="top-1-wrap">
            <div class="page-logo"><div class="container">
                <img src="public/images/kataria.png" class="" alt="page logo">
            </div></div>
            <div class="container">
                <h2>Messages</h2>
            </div>
        </div></div>


        <div class="message"><div class="container">
            <div class="tap-1 p40">
                <ul class="list-unstyled">

                    <?php $con=mysqli_connect("localhost","root","","responses");
                    if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

                    $result=mysqli_query($con,"SELECT * FROM tb_cform ORDER BY ID DESC LIMIT 15");

                    if (mysqli_num_rows($result) > 0)
                    {                      
                        while($row = mysqli_fetch_assoc($result)) {

                            echo '<li><div class="panel panel-default">';

                                echo '<div class="panel-heading">';
                                    echo "From: " . $row["u_name"]." | Email: " . $row["u_email"]. " | Contact No.: ". $row["cont"];
                                echo '</div>';

                                echo '<div class="panel-body">';
                                    echo "Message: " . $row["message"];
                                echo '</div>';

                            echo '</div></li>';
                        }
                    }

                    mysqli_close($con);
                    ?>


                </ul>
            </div>
        </div></div>

        <footer class="footer">
            <div class="container p10">
            <div class="pull-left">
                <div>Copyright 2013 &copy; - <a href="#">PixelCoders</a> All rights reserved.</div>
            </div>

            <div class="pull-right">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Terms&amp;Conditions &nbsp;&nbsp; | </a></li>
                    <li>Developed by <a href="https://www.facebook.com/pixelcoders/">Pixel Coders</a></li>
                </ul>
            </div>
            </div>
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and bootstrap js
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    <script type='text/javascript' src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type='text/javascript' src="public/js/bootstrap.min.js" ></script>

    <!-- plugin's java Script 
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script type='text/javascript' src="public/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="public/js/classie.js"></script>


    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {

        var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
            showRight = document.getElementById( 'showRight' ),
            body = document.body;

        showRight.onclick = function() {
            classie.toggle( this, 'active' );
            classie.toggle( menuRight, 'cbp-spmenu-open' );
            disableOther( 'showRight' );
        };

        function disableOther( button ) {

            if( button !== 'showRight' ) {
                classie.toggle( showRight, 'disabled' );
            }
        }

    });
    </script>

</body>
</html>        