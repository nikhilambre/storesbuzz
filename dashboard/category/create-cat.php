    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard Create Category</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="dashboard.php">Home</a></li>
          <li>Create Category</li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="create row">
            <div class="set">
                <div class="box-head">
                    <h4>Add Category</h3>
                </div>
                <form class="edit row" name="catform" action="save-cat.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Name: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="cat_name" maxlength="78" placeholder="Category Name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Description: </label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <textarea type="textarea" class="form-control" name="cat_desc" maxlength="400" rows="4" placeholder="Description"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Image: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <input type="file" class="" name="cat_img" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categorySelect" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Link with Category: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <select class="form-control" name="pcat_id" id="categorySelect">
                                <?php 
                                require_once('../connection.php');
                                $conn = Connect();

                                $result=mysqli_query($conn,"SELECT pcat_id, pcat_name FROM parent_cat");

                                mysqli_close($conn);

                                if (mysqli_num_rows($result) > 0)
                                {                      
                                    while($row = mysqli_fetch_assoc($result)) {

                                        echo "<option value=".$row["pcat_id"].">".$row["pcat_name"]."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Status</label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <select class="form-control" name="cat_active" id="cat_active">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
                        </div>
                    </div>

                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">&nbsp;</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <hr>
                        <input type="submit" name="submit" class="btn btn-default" value="Save" />
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

        $('.sd-cat').addClass('active');

    });
    </script>

</body>
</html>