    <?php 
    include('header.php')
    ?>
    
    <div class="row page-heading">
        <h2>Dashboard Messages</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Home</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">
        <div class="set">
            <div class="box-head">
                <h4>Messages from visitors</h4>
            </div>
            <div class="list row">
                <table class="table table-hover" id="sort-table"> 
                    <thead> 
                        <tr>
                            <th>#</th> 
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>Date</th> 
                            <th>Delete</th>
                        </tr> 
                    </thead> 
                    <tbody> 

                    <?php 
                    require_once('connection.php');
                    $conn = Connect();

                    $result=mysqli_query($conn,"SELECT * FROM tb_cform ORDER BY tb_id DESC");

                    if (mysqli_num_rows($result) > 0)
                    {                  
                        $num = 1;    
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="msg-record"><td>'.$num.'</td>';
                            echo '<td><a href="messageshow.php?id='.$row["tb_id"].'">'.$row["u_name"].'</a></td>';
                            echo '<td>'.$row["cont"].'</td>';
                            echo '<td>'.$row["msg_date"].'</td>';
                            echo '<td><a href="#"><i class="fa fa-trash msg-del" id="'.$row["tb_id"].'"></i></a></td></tr>';
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

        $('.sd-msg').addClass('active');

        $(".msg-del").click(function() {
            var del_id = $(this).attr("id");
            var info = del_id;
            if (confirm("Sure you want to delete this message? This cannot be undone later. \n")) {
                $.ajax({
                    type : "POST",
                    url : "deletemsg.php", //URL to the delete php script
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

    });
    </script>

</body>
</html>