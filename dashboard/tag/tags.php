    <?php 
    include('../header.php')
    ?>


    <div class="row page-heading">
        <h2>Tags</h2>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Tags</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Create Tag</h3>
                </div>
                <form class="edit row" name="tagadd" >

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Tag: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="tag_name" id="tag_name" maxlength="30" placeholder="Tag Name">
                      </div>
                    </div>

                    <p id="tag-msg"></p>

                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">&nbsp;</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10"><hr>
                        <a href="#" name="submit" id="add-tag" class="btn btn-default">Create Tag</a>
                    </div>
                </form>
            </div>
            <br>
            <div class="set">
                <div class="box-head">
                    <h4>Tags List</h4>
                </div>

                <div class="list row">
                    <p id="tag-msg2"></p>
                    <table class="table table-hover" id="sort-table"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th>Name (Click on Name to Edit)</th> 
                                <th>Edit</th>
                                <th>Del</th>
                            </tr> 
                        </thead> 
                        <tbody> 

                        <?php 

                        require_once('../connection.php');
                        $conn = Connect();

                        $result=mysqli_query($conn,"SELECT * FROM tags ORDER BY tag_id DESC");

                        mysqli_close($conn);

                        if (mysqli_num_rows($result) > 0)
                        {
                            $num = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<tr class="msg-record"><td>'.$num.'</td>';
                                echo '<td data-name="tagname'.$row["tag_id"].'" contenteditable>'.$row["tag_name"].'</td>';
                                echo '<td><a href="#"><i class="fa fa-pencil-square-o edit-tag"  id="'.$row["tag_id"].'"></i></a></td>';
                                echo '<td><a href="#"><i class="fa fa-trash del-tag" id="'.$row["tag_id"].'"></i></a></td></tr>';
                                $num = $num + 1;
                            }
                        }

                        ?>

                        </tbody> 
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Add Tags to Product</h3>
                </div>
                <form class="edit row" name="tagform" method="POST" action="save-tag.php" enctype="multipart/form-data">

                    <div class="form-group row">
                        <p class="">Select a Product to Link Tags: </p>
                        <select class="form-control" name="prod_id" id="prod_id" required>
                            <option value='0'><-- Select a Product --></option>

                            <?php 
                            require_once('../connection.php');
                            $conn = Connect();

                            $result=mysqli_query($conn,"SELECT prd_id, prodc_name FROM product");
                            mysqli_close($conn);

                                if (mysqli_num_rows($result) > 0)
                                {                      
                                    while($row = mysqli_fetch_assoc($result)) {

                                        echo "<option value=".$row["prd_id"].">".$row["prodc_name"]."</option>";
                                    }
                                }
                            ?>
                        </select>
                        <div class="row check-wrap"></div>
                    </div>

                    <hr>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="submit" name="submit" id="tag-set" class="btn btn-default" value="Add Tags">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php 
    include('../footer.php')
    ?>

    <script type='text/javascript' src="../public/js/datatables.min"></script>

    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {

        $('.sd-tag').addClass('active');

        $('#sort-table').DataTable();

        $("#add-tag").click(function() {

            var name = $('#tag_name').val();

            if (name) {
                $.ajax({
                    type : "POST",
                    url : "add-tag.php", //URL to the delete php script
                    data : { "tagname" : name},
                    success : function() {
                        $('#tag-msg').text("Tag Created Successfully.");
                    }
                });
            } else {
                $('#tag-msg').text("Please Enter Tag name.");
            }
        });

        $(".edit-tag").click(function() {
            var edit_id = $(this).attr("id");
            var name = 'tagname'+edit_id;

            var tag_name = $("td[data-name='"+ name +"']").text();

            if (tag_name) {
                if (confirm("Sure you want to Edit this Tag? \n")) {
                    $.ajax({
                        type : "POST",
                        url : "edit-tag.php", //URL to the delete php script
                        data : { "tagid" : edit_id, "tagname" : tag_name},
                        success : function() {

                        }
                    });
                }
            } else {
                $('#tag-msg2').text("Please Enter Tag name.");
            }
            return false;
        });

        $(".del-tag").click(function() {
            var del_id = $(this).attr("id");

            if (confirm("Sure you want to Delete this Tag? \n")) {
                $.ajax({
                    type : "POST",
                    url : "del-tag.php", //URL to the delete php script
                    data : { "tagid" : del_id},
                    success : function() {

                    }
                });

                $(this).parents(".msg-record").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });

        $("#prod_id").change(function (){

            var prd_id = $(this).attr("id");
            var prd_name = $('#prod_id').val();

            $.ajax({
                type : "POST",
                url : "show-tag.php", //URL to the delete php script
                data : { "prodid" : prd_name},
                success : function(d) {
                    $('.check-wrap').html(d);
                }
            });
        })

    });
    </script>

</body>
</html>