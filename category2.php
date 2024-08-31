<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

    if(isset($_SESSION['mem_id'])) {
      $userId = $_SESSION['mem_id'];
      $username = $_SESSION['username'];
    } else {
    }

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Web Designers - One Business</title>

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

    <link href="public/stylesheet/css/parallax.css" rel="stylesheet" type='text/css' />


    <!-- Google fonts
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">   
</head>

<body class="cbp-spmenu-push">

    <div id="preloader">
        <div id="status"></div>
    </div>

    <div class="ct-2"><div class="container">

        <div class="ct-sec-1 col-md-3 col-sm-3 col-lg-3 col-xs-12">
            <div class="ct-cat">
                <div class="ct-list-head"><h3>Categories</h3></div>
                <ul class="ct-ul list-unstyled">

                <?php 
                require_once('connection.php');
                $conn = Connect();

                $result=mysqli_query($conn,"SELECT catg_name, cat_id FROM category WHERE catg_active = 'ACTIVE'");
                mysqli_close($conn);

                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<li class=""><a href="category2.php?id='.$row["cat_id"].'?&name='.$row["catg_name"].'">'.$row["catg_name"].'</a></li>';
                    }
                }
                ?>
                </ul>
            </div>
        </div>

        <div class="ct-sec-2 col-md-9 col-sm-9 col-lg-9 col-xs-12">
            <div class="ct-list">

                <div class="ct-prod-head">
                <?php
                    $name = $_GET['name'];
                    echo '<h2>'.$_GET['name'].'</h2>';
                ?>
                </div>


                <?php 
                require_once('connection.php');
                $conn = Connect();

                $val = $_GET['id'];

                $result=mysqli_query($conn,"SELECT  prd_id,
                                                    prodc_name,
                                                    prodc_price,
                                                    prodc_cur,
                                                    pimg_name,
                                                    prod_final_price,
                                                    prod_line FROM product WHERE    prodc_active = 'ACTIVE' AND 
                                                                                    prodc_cat_id = '$val'");
                mysqli_close($conn);

                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)) {

                        echo '<div class="ct-box-cover col-md-4 col-sm-6 col-lg-4 col-xs-6">';
                        echo '<a href="product1.php?id='.$row["prd_id"].'" class="ct-link">';
                        echo '<div class="ct-box-1 text-center">';
                            echo '<div class="ct-img">';
                                echo '<img src="public/images/prod/'.$row["pimg_name"].'" class="img-responsive" alt="Responsive image" />';
                            echo '</div>';
                            echo '<div class="ct-content">';
                                echo '<h3 class="ct-pr-name">'.$row["prodc_name"].'</h3>';
                                echo '<div class="ct-star">';
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                    echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                                echo '</div>';
                                echo '<div class="ct-price">';
                                    echo '<del><span><i class="fa fa-'.$row["prodc_cur"].'"></i>&nbsp;'.$row["prodc_price"].'</span></del>';
                                    echo '<ins><span><i class="fa fa-'.$row["prodc_cur"].'"></i>&nbsp;'.$row["prod_final_price"].'</span></ins>';
                                echo '</div>';
                                echo '<div class="ct-btn">';
                                    echo '<a class="btn btn-default enquirycall" id="'.$row["prd_id"].'" data-toggle="modal" data-target="#enqModal">Send Enquiry</a>';
                                echo '</div>';
                            echo '</div>';

                        if($row["prod_line"]){
                            echo '<div class="ct-tag">';
                                echo '<span class="ct-tag-span lab-1">'.$row["prod_line"].'</span>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                }   else{
                    echo "No Products found for this Category.";
                }
                ?>


<!--
                <div class="ct-box-cover col-md-4 col-sm-6 col-lg-4 col-xs-6 hidden">
                    <a href="#" class="ct-link">
                        <div class="ct-box-1 text-center">
                            <div class="ct-img">
                                <img src="public/images/prod/mach.jpg" class="img-responsive" alt="Responsive image" />
                            </div>
                            <div class="ct-content">
                                <h3 class="ct-pr-name">Category name can be updated</h3>
                                <div class="ct-star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                                <div class="ct-price">
                                    <del><span>2000 Rs</span></del>
                                    <ins><span>1000 Rs</span></ins>
                                </div>
                                <div class="ct-btn">
                                    <a href="#" class="btn btn-default">Ask For Quote</a>
                                </div>
                            </div>
                            <div class="ct-tag">
                                <span class="ct-tag-span lab-1">Exclusive</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="ct-box-cover col-md-4 col-sm-6 col-lg-4 col-xs-6 hidden">
                    <a href="#" class="ct-link">
                        <div class="ct-box-1 text-center">
                            <div class="ct-img">
                                <img src="public/images/prod/mach.jpg" class="img-responsive" alt="Responsive image" />
                            </div>
                            <div class="ct-content">
                                <h3 class="ct-pr-name">Category name can be updated</h3>
                                <div class="ct-star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                                <div class="ct-price">
                                    <del><span>2000 Rs</span></del>
                                    <ins><span>1000 Rs</span></ins>
                                </div>
                                <div class="ct-btn">
                                    <a href="#" class="btn btn-default">Ask For Details</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="ct-box-cover col-md-4 col-sm-6 col-lg-4 col-xs-6 hidden">
                    <a href="#" class="ct-link">
                        <div class="ct-box-1 text-center">
                            <div class="ct-img">
                                <img src="public/images/prod/mach.jpg" class="img-responsive" alt="Responsive image" />
                            </div>
                            <div class="ct-content">
                                <h3 class="ct-pr-name">Category name can be updated</h3>
                                <div class="ct-star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                                <div class="ct-price">
                                    <del><span>2000 Rs</span></del>
                                    <ins><span>1000 Rs</span></ins>
                                </div>
                                <div class="ct-btn">
                                    <a href="#" class="btn btn-default">Ask For Details</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="ct-box-cover col-md-4 col-sm-6 col-lg-4 col-xs-6 hidden">
                    <a href="#" class="ct-link">
                        <div class="ct-box-1 text-center">
                            <div class="ct-img">
                                <img src="public/images/prod/mach.jpg" class="img-responsive" alt="Responsive image" />
                            </div>
                            <div class="ct-content">
                                <h3 class="ct-pr-name">Category name can be updated</h3>
                                <div class="ct-star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                                <div class="ct-price">
                                    <del><span>2000 Rs</span></del>
                                    <ins><span>1000 Rs</span></ins>
                                </div>
                                <div class="ct-btn">
                                    <a href="#" class="btn btn-default">Ask For Details</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
-->

            </div>
        </div>


    </div></div>


    <footer class="footer">
        <div class="container p10">
        <div class="pull-left">
            <div>Copyright 2013 &copy; - <a href="#">PixelCoders</a> All rights reserved.</div>
        </div>

        <div class="pull-right">
            <ul class="list-inline list-unstyled social">
                <li><a href="#">Terms&amp;Conditions</a></li>
                <li>Developed by <a href="#">Pixel Coders</a></li>
            </ul>
        </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="enqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-enquiry" id="md-dash">

        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and bootstrap js
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    <script type='text/javascript' src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type='text/javascript' src="public/js/bootstrap.min.js" ></script>

    <!-- plugin's java Script 
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script type='text/javascript' src="public/js/SmoothScroll.js"></script>
    <script type='text/javascript' src="public/js/parallax.js"></script>


    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });

    $(".enquirycall").click(function() {
        var enq_id = $(this).attr("id");

        $.ajax({
            type : "POST",
            url : "enquirymodal.php", //URL to the delete php script
            data : { "prodid" : enq_id},
            success : function(d) {
                $('#md-dash').html(d);
            }
        });
    });

                
    $(document).ready(function() {

    });
    </script>

</body>
</html>        