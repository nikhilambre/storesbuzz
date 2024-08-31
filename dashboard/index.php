<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard Login - Pixel Coders | Web Designers &amp; Web Developers | Category Product based website Designs |India</title>

    <meta name="description" content="">
    <meta name="keywords" content="HTML5, CSS3, Template, dashboard, login, secured PHP/MySQL Authentication">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Pixel coders team">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/images/favicon1.png">

    <!-- Bootstrap v3.2.0 & Custome stylesheet
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link href="public/stylesheet/css/bootstrap.min.css" rel="stylesheet" type='text/css' media="screen" />
    <link href="public/stylesheet/css/dashboard.css" rel="stylesheet" type='text/css' />


    <!-- PlugIn stylesheet 
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/stylesheet/css/animate.min.css" type='text/css' />
    <link rel="stylesheet" href="public/stylesheet/css/inputs.css" type='text/css' />

    <script type='text/javascript' src="public/js/snap.svg-min.js"></script>

    <!-- Google fonts
    +++++++++++++++++++++++++++++++++++++++++++++++++   -->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>



</head>

<body class="">

    <div id="preloader">
        <div id="status"></div>
    </div>

    <div class="login"><div class="container">

        <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
            <div class="well row">
                <h2 class="text-center"><span>Pixel Coders</span>Dashboard Login</h2><br>
                <form class="form row" method="post" action="index.php">
                    <div class="form-group row">
                        <div class="input-wrap col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="" placeholder="User Name" name="username" required>
                            <span class="morph-shape" data-morph-active="M359,70c0,0-59,6-174,6C84,76,9,70,9,70S3,60,3,40c0-16,6-30,6-30s75-6,176-6c115,0,174,6,174,6s8,14,8,30C367,60,359,70,359,70z">
                                <svg width="100%" height="100%" viewBox="0 0 370 80" preserveAspectRatio="none">
                                    <path d="M359,70c0,0-59,0-174,0C84,70,9,70,9,70s0-10,0-30c0-16,0-30,0-30s75,0,176,0c115,0,174,0,174,0s0,14,0,30C359,60,359,70,359,70z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-wrap col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="password" class="" placeholder="Password" name="password">
                            <span class="morph-shape" data-morph-active="M359,70c0,0-59,6-174,6C84,76,9,70,9,70S3,60,3,40c0-16,6-30,6-30s75-6,176-6c115,0,174,6,174,6s8,14,8,30C367,60,359,70,359,70z">
                                <svg width="100%" height="100%" viewBox="0 0 370 80" preserveAspectRatio="none">
                                    <path d="M359,70c0,0-59,0-174,0C84,70,9,70,9,70s0-10,0-30c0-16,0-30,0-30s75,0,176,0c115,0,174,0,174,0s0,14,0,30C359,60,359,70,359,70z"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <?php
                    error_reporting(E_ALL & ~E_NOTICE);
                    session_start();

                        /*** check if the users is already logged in ***/
                        if(isset( $_SESSION['username'] ))
                        {
                            $message = 'Users is already logged in';
                        }

                        if ($_POST['submit']){
                            require_once('connection.php');
                            $conn = Connect();

                            $username = strip_tags($_POST['username']);
                            $password = strip_tags($_POST['password']);

                            $sql =  "SELECT mem_id, username, password, mimg_name FROM members WHERE username = '$username'";

                            $query = mysqli_query($conn,$sql);

                            $conn->close();

                            if (!$query) {
                                die("Couldn't enter data: ".$conn->error);
                            }

                            if($query){
                                $row = mysqli_fetch_row($query);
                                $userId = $row[0];
                                $dbUsername = $row[1];
                                $dbPassword = $row[2];
                                $dbuserimg  = $row[3];
                            }

                            if (password_verify($password, $dbPassword)) {
                                session_start();

                                $_SESSION['username'] = $username;
                                $_SESSION['mem_id'] = $userId;
                                $_SESSION['userimg'] = $dbuserimg;
                                header('Location: settings/dashboard.php');
                            }   else{
                                echo "Incorrect Username or Password.";
                            }
                        }
                    ?>

                    <div class="input-container ">
                        <div class="input-wrap input-wrap--small">
                            <input type="checkbox" id="checkbox-2" />
                            <i class="fa fa-fw fa-check"></i>
                            <span class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
                                <svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
                                    <path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z"/>
                                </svg>
                            </span>
                        </div>
                        <label class="input-label input-label--long" for="checkbox-2">Stay signed in</label>
                    </div>

                    <input type="submit" name="submit" class="btn btn-info pull-right" value="Sign In"></input>
                </form>
            </div>
        </div>
    </div></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and bootstrap js
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    <script type='text/javascript' src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type='text/javascript' src="public/js/bootstrap.min.js" ></script>

    <!-- plugin's java Script 
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script type='text/javascript' src="public/js/SmoothScroll.js"></script>

    <script type='text/javascript' src="public/js/classie.js"></script>
    <script type='text/javascript' src="public/js/ElasticSVG.js"></script>


    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {


    });
    </script>

</body>
</html>        