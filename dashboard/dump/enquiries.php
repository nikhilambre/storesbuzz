    <?php 
    include('header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard Enquiries</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Home</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">
        <div class="set">
            <div class="box-head">
                <h4>Enquiries From Visitors</h4>
            </div>
            <div class="list">
                <table class="table table-hover" id="sort-table"> 
                    <thead> 
                        <tr>
                            <th>#</th> 
                            <th>Name</th>
                            <th>For Product</th>
                            <th>Contact No</th>
                            <th>Date</th> 
                            <th>Delete</th>
                        </tr> 
                    </thead> 
                    <tbody> 

                    <?php 
                    require_once('connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT 
                                                    enq_id,
                                                    enq_name,
                                                    enq_cont,
                                                    enq_created,
                                                    prodc_name FROM enquiries LEFT JOIN product 
                                                ON product.prd_id = enquiries.enq_prd_id ORDER BY enq_id DESC");

                    if (mysqli_num_rows($result) > 0)
                    {                  
                        $num = 1;    
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="msg-record"><td>'.$num.'</td>';
                            echo '<td><a href="enquiryshow.php?id='.$row["enq_id"].'?&pname='.$row["prodc_name"].'">'.$row["enq_name"].'</a></td>';
                            echo '<td>'.$row["prodc_name"].'</td>';
                            echo '<td>'.$row["enq_cont"].'</td>';
                            echo '<td>'.$row["enq_created"].'</td>';
                            echo '<td><a href="#"><i class="fa fa-trash enq-del" id="'.$row["enq_id"].'"></i></a></td></tr>';
                            $num = $num + 1;
                        }
                    }

                    mysqli_close($conn);
                    ?>
                    </tbody> 
                </table>
            </div>
        </div>
    </div>

    <?php 
    include('footer.php')
    ?>

    <script type='text/javascript' src="public/js/datatables.min"></script>

    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });
                
    $(document).ready(function() {

        $('#sort-table').DataTable();

        $(".enq-del").click(function() {
            var del_id = $(this).attr("id");
            var info = del_id;
            if (confirm("Sure you want to delete this Enquiry? This cannot be undone later. \n")) {
                $.ajax({
                    type : "POST",
                    url : "deleteenq.php", //URL to the delete php script
                    data : { "msgid" : info},
                    success : function() {
                    }
                });
                $(this).parents(".msg-record").animate("fast").animate({
                    opacity : "hide"
                }, "slow");
            }
            return false;
        });

        $('.sd-enq').addClass('active');


    });
    </script>

</body>
</html>