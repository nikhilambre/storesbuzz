    <?php 
    include('../header.php')
    ?>
     

    <div class="row page-heading">
        <h2>Contact Us Page Details</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Contact</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Add Address</h3>
                </div>

                <?php 
                require_once('../connection.php');
                $conn = Connect();

                $val = $_GET['id'];

                $sql = "SELECT * FROM address WHERE addr_id = '$val'";

                $result=mysqli_query($conn,$sql);

                if($result){
                    $row = mysqli_fetch_row($result);
                    $addrhead = $row[1];
                    $addrbody = $row[2];
                    $addrnumb = $row[3];
                    $addrname = $row[4];
                    $addremail = $row[5];
                }

                mysqli_close($conn);
                ?>

                <form class="edit row" name="addredit" action="edit-addr-done.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row hidden">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="addr_id" maxlength="20" value="<?php echo $val ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">*Address head: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="addr_head" id="addr_head" maxlength="40" value="<?php echo $addrhead ?>" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">*Address: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <textarea type="textarea" class="form-control" name="addr_body" id="addr_body" maxlength="400" rows="3" maxlength="400" required><?php echo $addrbody ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">*Contact no.: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="addr_numb" id="addr_numb" maxlength="20" value="<?php echo $addrnumb ?>" required onkeypress="return isNumberKey(event)">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">*Person Name: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="addr_name" id="addr_name" maxlength="60" value="<?php echo $addrname ?>" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">*Mail Addess: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="email" class="form-control" name="addr_email" id="addr_email" maxlength="100" value="<?php echo $addremail ?>" required>
                      </div>
                    </div>


                    <p id="contact-msg"></p>

                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">&nbsp;</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10"><hr>
                        <input type="submit" name="submit" class="btn btn-default" value="Edit Address" />
                    </div>
                </form>
            </div>
            <br>
            <div class="set">
                <div class="box-head">
                    <h4>Address List</h4>
                </div>

                <div class="list row">
                    <?php 
                    require_once('../connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT * FROM address ORDER BY addr_id DESC");
                    mysqli_close($conn);

                    if (mysqli_num_rows($result) > 0)
                    {
                        $num = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="addr-record"><address>';
                            echo '<strong>'.$row["addr_head"].'</strong><br>';
                            echo $row["addr_body"].'<br>';
                            echo '<abbr title="Phone">P: </abbr>'.$row["addr_numb"].'<br>';
                            echo '</address>';
                            echo '<address>';
                            echo '<strong>'.$row["addr_name"].'</strong><br>';
                            echo '<a href="mailto:'.$row["addr_email"].'">'.$row["addr_email"].'</a>';
                            echo '</address>';
                            echo '<a href="edit-address.php?id='.$row["addr_id"].'"><i class="list-fa btn fa fa-pencil-square-o" id="'.$row["addr_id"].'"></i></a>';
                            echo '<a href="#"><i class="list-fa btn fa fa-trash del-addr" id="'.$row["addr_id"].'"></i></a><br><hr><br></div>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Add Social Contact</h3>
                </div>
                <form class="edit row" name="socialadd" >
                    <div class="form-group row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <select class="form-control" name="social_icon" id="social_icon">
                                <option value="facebook"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</option>
                                <option value="twitter"><i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter</option>
                                <option value="youtube"><i class="fa fa-youtube"></i>&nbsp;&nbsp;YouTube</option>
                                <option value="google-plus"><i class="fa fa-google-plus"></i>&nbsp;&nbsp;google-plus</option>
                                <option value="instagram"><i class="fa fa-instagram"></i>&nbsp;&nbsp;Instagram</option>
                                <option value="linkedin"><i class="fa fa-linkedin"></i>&nbsp;&nbsp;Linkedin</option>
                                <option value="pinterest"><i class="fa fa-pinterest"></i>&nbsp;&nbsp;pinterest</option>
                                <option value="skype"><i class="fa fa-skype"></i>&nbsp;&nbsp;Skype</option>
                                <option value="qq"><i class="fa fa-qq"></i>&nbsp;&nbsp;qq</option>
                                <option value="tumblr"><i class="fa fa-tumblr"></i>&nbsp;&nbsp;tumblr</option>
                                <option value="snapchat"><i class="fa fa-snapchat"></i>&nbsp;&nbsp;snapchat</option>
                            </select>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <input type="text" class="form-control" name="social_link" id="social_link" maxlength="200" placeholder="Social Link" required>
                        </div>
                    </div>

                    <p id="social-msg"></p>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><hr>
                        <a href="#" name="submit" id="add-social" class="btn btn-default">Create Social Link</a>
                    </div>
                </form>
            </div>
            <br>
            <div class="set">
                <div class="box-head">
                    <h4>Added Social Contacts</h3>
                </div>
                <div class="list row">

                    <?php 
                    require_once('../connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT * FROM social ORDER BY social_id DESC");
                    mysqli_close($conn);

                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="panel panel-default">';
                            echo '<div class="panel-heading">';
                            echo '<h3 class="panel-title">';
                            echo '<i class="fa fa-'.$row["social_name"].'"></i>&nbsp; '.$row["social_name"].'</h3>';
                            echo '<div class="panel-icon pull-right">';
                            echo '<a href="javascript:void(0)" class="btn edit-social" id="'.$row["social_id"].'" data-toggle="tooltip" data-placement="top" title="Click on link text to Edit ">Edit</a>';
                            echo '<a href="javascript:void(0)" class="btn del-social" id="'.$row["social_id"].'">Del</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="panel-body" data-social="sociallink'.$row["social_id"].'" contenteditable>'.$row["social_link"].'</div>';
                            echo '</div>';
                        }
                    }

                    ?>

                </div>
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

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
            return false;
        return true;
    };
                
    $(document).ready(function() {

        $('#myTabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        });

        $('[data-toggle="tooltip"]').tooltip();

        $('.sd-cont').addClass('active');

        $("#add-addr").click(function() {

            var head = $('#addr_head').val();
            var addr = $('#addr_body').val();
            var numb = $('#addr_numb').val();
            var name = $('#addr_name').val();
            var email = $('#addr_email').val();

            if (head) {
                $.ajax({
                    type : "POST",
                    url : "add-address.php", //URL to the delete php script
                    data : { "addrhead" : head, "addrbody" : addr, "addrnumb" : numb, "addrname" : name, "addremail" : email},
                    success : function() {
                        $('#contact-msg').text("Address Created Successfully.");
                    }
                });
            } else {
                $('#contact-msg').text("Please Enter All fields.");
            }
        });

        $(".del-addr").click(function() {
            var del_id = $(this).attr("id");

            if (confirm("Sure you want to Delete this Addrss? \n")) {
                $.ajax({
                    type : "POST",
                    url : "del-address.php", //URL to the delete php script
                    data : { "addrid" : del_id},
                    success : function() {

                    }
                });

                $(this).parents(".addr-record").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });

        $("#add-social").click(function() {

            var soc_ico = $('#social_icon').val();
            var soc_link = $('#social_link').val();

            if (soc_link) {
                $.ajax({
                    type : "POST",
                    url : "add-social.php", //URL to the delete php script
                    data : { "socico" : soc_ico, "soclink" : soc_link},
                    success : function() {
                        $('#social-msg').text("Social Link Created Successfully.");
                    }
                });
            } else {
                $('#social-msg').text("Please Enter Link to map.");
            }
        });

        $(".edit-social").click(function() {
            var edit_id_soc = $(this).attr("id");
            var social = 'sociallink'+edit_id_soc;

            var social_link = $("*[data-social='"+ social +"']").text();

            if (confirm("Sure you want to Edit this Social Link? \n")) {
                $.ajax({
                    type : "POST",
                    url : "edit-social.php", //URL to the delete php script
                    data : { "soc-id" : edit_id_soc, "soc-link" : social_link},
                    success : function() {

                    }
                });
            }
            return false;
        });

        $(".del-social").click(function() {
            var del_id_soc = $(this).attr("id");

            if (confirm("Sure you want to Delete this Social Link? \n")) {
                $.ajax({
                    type : "POST",
                    url : "del-social.php", //URL to the delete php script
                    data : { "soc-id" : del_id_soc},
                    success : function() {

                    }
                });

                $(this).parents(".panel").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });


    });
    </script>

</body>
</html>