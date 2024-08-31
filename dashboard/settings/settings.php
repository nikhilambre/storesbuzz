    <?php 
    include('../header.php')
    ?>


    <div class="row page-heading">
        <h2>Settings</h2>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Settings</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Edit Personal Details</h3>
                </div>
                <form class="edit row" method="post" action="settings.php" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-3 col-lg-3">First Name: </label>
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                        <input type="text" class="form-control" id="mem_first" name="mem_first" placeholder="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-3 col-lg-3">Last Name: </label>
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                        <input type="text" class="form-control" id="mem_last" name="mem_last" placeholder="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-3 col-lg-3">Profile Pic: </label>
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                        <input type="file" id="mem_img" name="mem_img">
                    </div>
                  </div>

                    <?php
                    error_reporting(E_ALL & ~E_NOTICE);

                        if ($_POST['change']){
                            require_once('../connection.php');
                            $conn = Connect();

                            $username = strip_tags($_SESSION['username']);
                            $memfirst = $conn->real_escape_string($_POST['mem_first']);
                            $memlast  = $conn->real_escape_string($_POST['mem_last']);

                            //  For Image upload
                            $filetmp  = $_FILES["mem_img"]["tmp_name"];
                            $filename = $_FILES["mem_img"]["name"];
                            $filetype = $_FILES["mem_img"]["type"];
                            $filepath = "../public/images/".$filename;

                            move_uploaded_file($filetmp, $filepath);

                            if($filename){
                                $sql   = "UPDATE members SET 
                                                    firstname = '$memfirst',
                                                    lastname  = '$memlast',
                                                    mimg_name = '$filename',
                                                    mimg_path = '$filepath',
                                                    mimg_type = '$filetype' WHERE username = '$username'";
                            } else{
                                $sql   = "UPDATE members SET 
                                                    firstname = '$memfirst',
                                                    lastname = '$memlast'  WHERE username = '$username'";
                            }

                            $query = mysqli_query($conn,$sql);

                            if (!$query) {
                                die("Couldn't enter data: ".$conn->error);
                            } else{
                                echo "Your Details are sucessfully updated.";
                            }
                            $conn->close();

                        }
                    ?>

                    <div class="save">
                      <input type="submit" name="change" class="btn btn-primary" value="Update" />
                  </div>
                </form>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Change password</h3>
                </div>
                <form class="edit row" method="post" action="settings.php" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-3 col-lg-3">Old Password: </label>
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                        <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-3 col-lg-3">New Password: </label>
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                        <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-3 col-lg-3">Retype New Password: </label>
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Retype New Password">
                    </div>
                  </div>

                    <?php
                    error_reporting(E_ALL & ~E_NOTICE);
                    session_start();

                        if ($_POST['submit']){
                            require_once('../connection.php');
                            $conn = Connect();

                            $username = strip_tags($_SESSION['username']);
                            $oldpassword = strip_tags($_POST['oldpassword']);
                            $password = strip_tags($_POST['password']);
                            $confirmpassword = strip_tags($_POST['confirmpassword']);

                            if($password == $confirmpassword){

                                $sql =  "SELECT mem_id, username, password FROM members WHERE username = '$username'";

                                $query = mysqli_query($conn,$sql);

                                if($query){
                                    $row = mysqli_fetch_row($query);
                                    $userId = $row[0];
                                    $dbUsername = $row[1];
                                    $dbPassword = $row[2];
                                }

                                if (password_verify($oldpassword, $dbPassword)) {
                                    $storepassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 14));
                                    $sql = "UPDATE members SET password = '$storepassword' WHERE username = '$username'";
                                    $query = mysqli_query($conn,$sql);

                                    echo "Password Changed sucessfully.";

                                }   else{
                                    echo "<p>Old password doesn't matches with your current password.</p>";
                                }
                            }   else{
                                echo "Password & Retyped password are not matching.";
                            }

                            if (!$query) {
                                die("Couldn't enter data: ".$conn->error);
                            } else{
                                echo "Your Password is sucessfully updated.";
                            }
                            $conn->close();

                        }
                    ?>

                  <div class="save">
                      <input type="submit" name="submit" class="btn btn-primary" value="Change Password" />
                  </div>

                </form>
            </div>
        </div>
    </div>

    <?php 
    include('../footer.php')
    ?>


    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {

        $('#myTabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        });

        $('.sd-set').addClass('active');

    });
    </script>

</body>
</html>