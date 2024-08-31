    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard Parent Category</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="dashboard.php">Home</a></li>
          <li>Parent Category</li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="create row">
            <div class="set">
                <div class="box-head">
                    <h4>Create Parent Category</h3>
                </div>
                <form class="edit row" name="pcatform" >

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Name: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="pcat_name" id="pcat_name" maxlength="78" placeholder="Parent Category Name">
                      </div>
                    </div>

                    <p id="pcat-msg"></p>

                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">&nbsp;</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10"><hr>
                        <input name="submit" id="pcatadd" class="btn btn-default" value="create" />
                    </div>
                </form>
            </div>
        </div>


        <div class="set">
            <div class="box-head">
                <h4>Parent Category List</h4>
            </div>
            <div class="list row">
                <table class="table table-hover" id="sort-table"> 
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Name (Click on Name to Edit)</th> 
                            <th>Create date</th>
                            <th>Edit</th>
                            <th>Del</th>
                        </tr> 
                    </thead> 
                    <tbody> 

                    <?php 

                    require_once('../connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT * FROM parent_cat ORDER BY pcat_id DESC");

                    mysqli_close($conn);

                    if (mysqli_num_rows($result) > 0)
                    {
                        $num = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="msg-record"><td>'.$num.'</td>';
                            echo '<td data-name="pcatname'.$row["pcat_id"].'" contenteditable>'.$row["pcat_name"].'</td>';
                            echo '<td>'.$row["pcat_create"].'</td>';
                            echo '<td><a href="#"><i class="fa fa-pencil-square-o edit-pcat"  id="'.$row["pcat_id"].'"></i></a></td>';
                            echo '<td><a href="#"><i class="fa fa-trash del-pcat" id="'.$row["pcat_id"].'"></i></a></td></tr>';
                            $num = $num + 1;
                        }
                    }

                    ?>

                    </tbody> 
                </table>
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

        $("#pcatadd").click(function() {

            var name = $('#pcat_name').val();

            if (name) {

                $.ajax({
                    type : "POST",
                    url : "save-pcat.php", //URL to the delete php script
                    data : { "pcatname" : name},
                    success : function() {
                        $('#pcat-msg').text("Parent Category Created Successfully.");
                    }
                });
            } else {
                $('#pcat-msg').text("Please Enter Category name.");
            }
        });

        $(".edit-pcat").click(function() {
            var edit_id = $(this).attr("id");
            var name = 'pcatname'+edit_id;

            var pcat_name = $("td[data-name='"+ name +"']").text();

            if (confirm("Sure you want to Edit this Product? \n")) {
                $.ajax({
                    type : "POST",
                    url : "edit-pcat.php", //URL to the delete php script
                    data : { "pcatid" : edit_id, "pcatname" : pcat_name},
                    success : function() {

                    }
                });
            }
            return false;
        });

        $(".del-pcat").click(function() {
            var del_id = $(this).attr("id");

            if (confirm("Sure you want to Delete this Category? \n")) {
                $.ajax({
                    type : "POST",
                    url : "del-pcat.php", //URL to the delete php script
                    data : { "pcatid" : del_id},
                    success : function() {

                    }
                });

                $(this).parents(".msg-record").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });

        $('.sd-pcat').addClass('active');

    });
    </script>

</body>
</html>