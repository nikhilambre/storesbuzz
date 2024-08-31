<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

    if(isset($_SESSION['mem_id'])) {
      $userId = $_SESSION['mem_id'];
      $username = $_SESSION['username'];
      $editable = 1;
    } else {
      $editable = 0;
    }
    $page = 1;
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>About Us | Kataria Texports - Exporter of agro products</title>

    <meta name="description" content="">
    <meta name="keywords" content="HTML5,CSS3,Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/images/logo.jpg">

    <!-- Bootstrap v3.2.0 & Custome stylesheet
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link href="public/stylesheet/css/bootstrap.min.css" rel="stylesheet" type='text/css' media="screen" />
    <link href="public/stylesheet/css/design.css" rel="stylesheet" type='text/css' />

    <!-- PlugIn stylesheet 
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/stylesheet/css/animate.min.css" type='text/css' />
    <link rel="stylesheet" href="public/stylesheet/css/SlidePushMenus.css" type="text/css" />

    <script type="text/javascript" src="public/js/modernizr.SlidePushMenus.js"></script>

    <!-- Google fonts
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

</head>

<body class="cbp-spmenu-push">

<?php 
require_once('connection.php');
$conn = Connect();

$result=mysqli_query($conn,"SELECT art_content, art_id FROM article WHERE art_page = '$page' ");
mysqli_close($conn);

?>

<!--
$row = mysqli_fetch_assoc($result);
print_r($row["art_content"]);
print_r($row["art_id"]);
-->


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
                <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                    <h2 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>About Kataria Texports</h2>
                    <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
                </div>

                <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                    <h4 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</h4>
                    <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
                </div>
            </div>
        </div></div>

        <div class="comp-3 p60"><div class="container">
            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <h3 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>Warm greeting from Kataria Texports – India</h3>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <p data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>It is our pleasure to introduce our company named “Kataria Texports” leading Raw Cotton & Yarn Exporter/Trader/ Indenting / Sourcing Agent in Mumbai - India.</p>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <br><br>
            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <h3 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>Company Vision</h3>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <ul>
                <li class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                    <span data-article="article<?php print_r($row["art_id"]);?>">
                        <?php print_r($row["art_content"]); ?>To be premier and leading Marketer/Trader of commodities in a conducive environment in the region and beyond.
                    </span>
                    <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
                </li>

                <li class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                    <span data-article="article<?php print_r($row["art_id"]);?>">
                        <?php print_r($row["art_content"]); ?>
                    </span>
                    <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
                </li>
            </ul>
            <br>
            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <h3 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>Kataria Texports operates on a set of principles which are:-</h3>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <h4 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>Core Values</h4>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <ul data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>
                    <li>Integrity, honesty and excellence</li>
                    <li>Knowing customer is king and knowing their needs</li>
                    <li>A mandate of action</li>
                    <li>Valuing accountability and integrity</li>
                </ul>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <h4 data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>Company Objectives</h4>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

            <div class="ds-edit"><?php $row = mysqli_fetch_assoc($result); ?>
                <ul data-article="article<?php print_r($row["art_id"]);?>"><?php print_r($row["art_content"]); ?>
                    <li>Our main objective is to provide our clients with an all round working solution through integration of marketing solutions with support, service and expert distribution networks for commodities. </li>
                    <li>Confidential information about available interests to Buy or Sell various commodities.</li>
                    <li>Creating opportunity through marketing our products.</li>
                    <li>Market comments and opinions about the future developments on the market.</li>
                    <li>Technical assistance in concluding of contracts, negotiation of terms and conditions or eventual problems.</li>
                    <li>Assistance in trade execution.</li> 
                </ul>
                <?php if ($editable) {echo "<span class='art-btn btn btn-default' id='".$row['art_id']."' contenteditable='false'>Save</span>";}?>
            </div>

        </div></div>

        <div class="comp-4"><div class="comp-4-wrap p40"><div class="container">

            <h2 class="p20">Company Profile</h2>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Basic Information</a></li>
                <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Company USP</a></li>
                <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Shipment Details</a></li>
            </ul>

            <div class="tab-content row" form="form">
                <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                    <h3 class="p20">Basic Information</h3>
                    <dl class="dl-horizontal">
                        <dt>Nature of Business</dt>
                            <dd>: Manufacturer</dd>
                        <dt>Additional Business</dt>
                            <dd>: Supplier</dd>
                        <dt>Year of Establishment</dt>
                            <dd>: 2015</dd>
                        <dt>Legal Status of Firm</dt>
                            <dd>: Partnership Firm Registered under Indian Partnership Act 1932</dd>
                    </dl>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab2">
                    <h3 class="p20">Company USP</h3>
                    <dl class="dl-horizontal">
                        <dt>Primary Competitive Advantage</dt>
                            <dd>: Experienced R &amp; D Department</dd>
                            <dd>: Large Product Line</dd>
                            <dd>: Large Production Capacity</dd>
                            <dd>: Good Financial Position &amp; TQM</dd>
                        <dt>Quality Measures/Testing Facilities</dt>
                            <dd>: Yes</dd>
                    </dl>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab3">
                    <h3 class="p20">Packaging/Payment and Shipment Details</h3>
                    <dl class="dl-horizontal">
                        <dt>Shipment Mode</dt>
                            <dd>: By Road</dd>
                        <dt>Payment Mode</dt>
                            <dd>: Cash</dd>
                            <dd>: Cheque</dd>
                    </dl>
                </div>
            </div>
        </div></div></div>


        
        <div class="contact-2 bg-gray-2 p40" id="contact"><div class="container">
            <h3 class="">Contact Details</h3>
            <div class="row">
                <div class="tap col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <address>
                      <strong>United Enng, Inc.</strong><br>
                      1355 Market Street, Suite 900<br>
                      San Francisco, CA 94103<br>
                      <abbr title="Phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;P:</abbr> (123) 456-7890
                    </address>

                    <address>
                      <strong>Full Name</strong><br>
                      <a href="mailto:#"><i class="fa fa-envelope"></i>&nbsp;&nbsp;first.last@example.com</a>
                    </address>
                </div>
                <div class="tap col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <address>
                      <strong>Mr. Jay Kataria</strong><br>
                    </address>

                    <address>
                      <abbr title="Phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;Mob:</abbr> (123) 456-7890<br>
                      <abbr title="Phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;Mob:</abbr> (123) 456-7890
                    </address>

                    <address>
                      <strong>Mr. Jugal Kataria</strong><br>
                    </address>

                    <address>
                      <abbr title="Phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;Mob:</abbr> (123) 456-7890<br>
                      <abbr title="Phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;Mob:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="tap-1 col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <a href="#" class="broucher" rel="link"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Our Broucher</a>
                    <hr>
                    <address>
                      <abbr title="Phone"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;WhatsApp:</abbr> (123) 456-7890<br>
                      <abbr title="Phone"><i class="fa fa-envelope"></i>&nbsp;&nbsp;SMS:</abbr> (123) 456-7890<br>
                      <abbr title="Phone"><i class="fa fa-fax"></i>&nbsp;&nbsp;Fax:</abbr> (123) 456-7890
                    </address>
                </div>
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

        var editable = "<?php echo $editable ?>";
        if(editable == 1){
            $('.ds-edit').attr("contenteditable", "true");
            $('.ds-edit').addClass("article");
        };

        $(".art-btn").click(function() {
            var edit_id = $(this).attr("id");
            var content = 'article'+edit_id;
            var cont_id = edit_id;
            var upd_id = "<?php echo $userId ?>";
            var pag = "<?php echo $page ?>";

            var cont = $("*[data-article='"+ content +"']").text();
            var dbcontent = $.trim(cont);

            console.log(dbcontent);

            if (confirm("Sure you want to Edit this Content? \n")) {
                $.ajax({
                    type : "POST",
                    url : "updatearticle.php", //URL to the delete php script
                    data : { "contid" : cont_id, "updcontent" : dbcontent, "user_id" : upd_id, "page" : pag },
                    success : function() {
                    }
                });
            }
            return false;
        }); 

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