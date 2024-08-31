    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard Enquiries</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Home</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Enquiry Details</h4>
                </div>

                <div class="inbox row">

                    <?php 
                    require_once('../connection.php');
                    $conn = Connect();

                    $val = $_GET['id'];
                    $pdname = $_GET['pname'];

                    $result = mysqli_query($conn,"SELECT * FROM enquiries WHERE enq_id = '$val'");


                    if (mysqli_num_rows($result) > 0)
                    {                     
                        while($row = mysqli_fetch_assoc($result)) {

                            echo '<dl class="dl-horizontal">';
                            echo '<dt>Name :</dt><dd>'.$row["enq_name"].'</dd>';
                            echo '<dt>Contact No :</dt><dd>'.$row["enq_cont"].'</dd>';
                            echo '<dt>For Product :</dt><dd>'.$pdname.'</dd>';
                            echo '<dt>Email Address :</dt><dd>'.$row["enq_email"].'<span class="pull-right">Received Date : '.$row["enq_created"].'</span></dd><dt></dt><dd><hr></dd>';
                            echo '<dt>Message : </dt><dd>'.$row["enq_txt"].'</dd></dl>';

                        }
                    }

                    mysqli_close($conn);
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

        $('.sd-enq').addClass('active');

    });
    </script>

</body>
</html>