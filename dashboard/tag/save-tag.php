    <?php 
    include('../header.php')
    ?>


    <div class="row page-heading">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Home</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">


        <?php 
            if(isset($_POST["submit"])) {
                if(!empty($_POST["tagset"])) {

                    require_once('../connection.php');
                    $conn    = Connect();

                    $prod   = $conn->real_escape_string($_POST['prod_id']);

                    $deleteold = mysqli_query($conn,"DELETE FROM tag_set WHERE t_prod_id = $prod ");

                    foreach ($_POST["tagset"] as $tag_entry) {
                        $query   = "INSERT into tag_set ( t_tag_id, t_prod_id ) VALUES('". $tag_entry ."', '". $prod ."')";
                        $success = $conn->query($query);
                    }

                    if (!$success) {
                        die("Couldn't enter data: ".$conn->error);
                    } else {
                        echo "<p>Tags are saved for selected Product.</p>";
                    }

                    $conn->close();
                } else {
                    echo "No Tags are selected.";
                }
            }
        ?>


        <p>
            <a href="tags.php">Continue to Add Tags here</a>
        </p>

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

        $('.sd-tag').addClass('active');

    });
    </script>

</body>
</html>