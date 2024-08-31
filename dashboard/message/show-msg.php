    

    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard Messages</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Home</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Messages Details</h4>
                </div>

                <div class="inbox row">

                    <?php 
                    require_once('../connection.php');
                    $conn = Connect();

                    $val = $_GET['id'];

                    $result = mysqli_query($conn,"SELECT * FROM tb_cform WHERE tb_id = '$val'");

                    mysqli_close($conn);

                    if (mysqli_num_rows($result) > 0)
                    {                     
                        while($row = mysqli_fetch_assoc($result)) {

                            echo '<dl class="dl-horizontal">';
                            echo '<dt>Name :</dt><dd>'.$row["u_name"].'</dd>';
                            echo '<dt>Contact No :</dt><dd>'.$row["cont"].'</dd>';
                            echo '<dt>Email Address :</dt><dd>'.$row["u_email"].'<span class="pull-right">Received Date : '.$row["msg_date"].'</span></dd><dt></dt><dd><hr></dd>';
                            echo '<dt>Message : </dt><dd>'.$row["message"].'</dd></dl>';

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
                
    $(document).ready(function() {

        $('#myTabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        });

        $('.sd-msg').addClass('active');

    });
    </script>

</body>
</html>