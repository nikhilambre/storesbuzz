    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard List Categories</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="dashboard.php">Home</a></li>
          <li>List Category</li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="set">
            <div class="box-head">
                <h4>Category List</h4>
            </div>
            <div class="list row">
                <table class="table table-hover" id="sort-table"> 
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Category Name</th> 
                            <th>Parent Category</th>
                            <th>Status</th> 
                            <th>Create date</th>
                            <th>Edit</th>
                            <th>Del</th>
                        </tr> 
                    </thead> 
                    <tbody> 

                    <?php 
                    require_once('../connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT cat_id,
                                                       catg_name,
                                                       catg_active,
                                                       catg_created,
                                                       pcat_name FROM category LEFT JOIN parent_cat 
                                                    ON category.catg_parent = parent_cat.pcat_id ORDER BY cat_id DESC");

                    mysqli_close($conn);

                    if (mysqli_num_rows($result) > 0)
                    {
                        $num = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="msg-record"><td>'.$num.'</td>';
                            echo '<td data-name="catname'.$row["cat_id"].'" >'.$row["catg_name"].'</td>';
                            echo '<td>'.$row["pcat_name"].'</td>';
                            echo '<td data-act="catact'.$row["cat_id"].'" >'.$row["catg_active"].'</td>';
                            echo '<td>'.$row["catg_created"].'</td>';
                            echo '<td><a href="update-cat.php?id='.$row["cat_id"].'"><i class="fa fa-pencil-square-o" id="'.$row["cat_id"].'"></i></a></td>';
                            echo '<td><a href="#"><i class="fa fa-trash cat-del" id="'.$row["cat_id"].'"></i></a></td></tr>';
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

    <script type='text/javascript' src="../public/js/datatables.min"></script>


    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {

        $(".cat-del").click(function() {
            var del_id = $(this).attr("id");

            if (confirm("Sure you want to delete this Category? This cannot be undone later. \n")) {
                $.ajax({
                    type : "POST",
                    url : "del-cat.php", //URL to the delete php script
                    data : { "catid" : del_id},
                    success : function() {
                    }
                });
                $(this).parents(".msg-record").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });

        $(".cat-edit").click(function() {
            var del_id = $(this).attr("id");
            var name = 'catname'+del_id;
            var act = 'catact'+del_id;

            var cat_name = $("td[data-name='"+ name +"']").text();
            var cat_act = $("td[data-act='"+ act +"']").text();

            if (confirm("Sure you want to Edit this Category? \n")) {
                $.ajax({
                    type : "POST",
                    url : "edit-cat.php", //URL to the delete php script
                    data : { "catid" : del_id, "catname" : cat_name, "catact" : cat_act},
                    success : function() {
                    }
                });
            }
            return false;
        });

        $('#myTabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        });

        $('#sort-table').DataTable();

        $('.sd-cat').addClass('active');

    });
    </script>

</body>
</html>