    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard List Products</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="dashboard.php">Home</a></li>
          <li>List Products</li>
        </ol>
    </div>

    <div class="dash-wrap row">
        <div class="set">
            <div class="box-head">
                <h4>Products List</h4>
            </div>
            <div class="list row">
                <table class="table table-hover" id="sort-table"> 
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Name</th> 
                            <th>Category</th> 
                            <th>Price</th>
                            <th>% Off</th>
                            <th>Status</th>
                            <th>Created date</th>
                            <th>Edit</th>
                            <th>Del</th>
                        </tr> 
                    </thead> 
                    <tbody>

                    <?php 
                    require_once('../connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT 
                                                    prd_id, 
                                                    prodc_name, 
                                                    prodc_active, 
                                                    prodc_price, 
                                                    prod_created, 
                                                    prod_discount,
                                                    catg_name FROM product LEFT JOIN category 
                                                ON product.prodc_cat_id = category.cat_id ORDER BY prd_id DESC");
                    mysqli_close($conn);

                    if (mysqli_num_rows($result) > 0)
                    {
                        $num = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="msg-record"><td>'.$num.'</td>';
                            echo '<td data-name="prodname'.$row["prd_id"].'" >'.$row["prodc_name"].'</td>';
                            echo '<td>'.$row["catg_name"].'</td>';
                            echo '<td data-price="prodpri'.$row["prd_id"].'">'.$row["prodc_price"].'</td>';
                            echo '<td>'.$row["prod_discount"].'</td>';
                            echo '<td data-act="prodact'.$row["prd_id"].'" >'.$row["prodc_active"].'</td>';
                            echo '<td>'.$row["prod_created"].'</td>';
                            echo '<td><a href="update-prod.php?id='.$row["prd_id"].'"><i class="fa fa-pencil-square-o" id="'.$row["prd_id"].'"></i></a></td>';
                            echo '<td><a href="#"><i class="fa fa-trash prod-del" id="'.$row["prd_id"].'"></i></a></td></tr>';
                            $num = $num + 1;
                        }
                    }

                    ?>
                    </tbody> 
                </table>

                <span class="pull-left hidden">Showing 1 to 10 of 57 entries</span>
                <nav class="pull-right hidden">
                  <ul class="pagination">
                    <li>
                      <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                      <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>

        </div>
    </div>

    <?php 
    include('../footer.php')
    ?>

    <script type='text/javascript' src="../public/js/datatables.min.js"></script>
    <!--script type='text/javascript' src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script-->

    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {

        $(".prod-del").click(function() {
            var del_id = $(this).attr("id");

            if (confirm("Sure you want to delete this Product? This cannot be undone later. \n")) {
                $.ajax({
                    type : "POST",
                    url : "del-prod.php", //URL to the delete php script
                    data : { "prodid" : del_id},
                    success : function() {
                    }
                });
                $(this).parents(".msg-record").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });

        $(".prod-edit").click(function() {
            var del_id = $(this).attr("id");
            var name = 'prodname'+del_id;
            var act = 'prodact'+del_id;
            var price = 'prodpri'+del_id;

            var prod_name = $("td[data-name='"+ name +"']").text();
            var prod_act = $("td[data-act='"+ act +"']").text();
            var prod_pri = $("td[data-price='"+ price +"']").text();

            if (confirm("Sure you want to Edit this Product? \n")) {
                $.ajax({
                    type : "POST",
                    url : "edit-prod.php", //URL to the delete php script
                    data : { "prodid" : del_id, "prodname" : prod_name, "prodact" : prod_act, "prodpri" : prod_pri},
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

        $('.sd-prod').addClass('active');

    });
    </script>

</body>
</html>