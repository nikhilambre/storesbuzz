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
		error_reporting(E_ALL & ~E_NOTICE);
		session_start();

		    if ($_POST['submit']){

				require_once('../connection.php');
				$conn    = Connect();

                $aid    = $conn->real_escape_string($_POST['addr_id']);
				$ahead  = $conn->real_escape_string($_POST['addr_head']);
				$abody  = $conn->real_escape_string($_POST['addr_body']);
				$anumb  = $conn->real_escape_string($_POST['addr_numb']);
                $aname  = $conn->real_escape_string($_POST['addr_name']);
                $aemail = $conn->real_escape_string($_POST['addr_email']);

                $query   = "UPDATE address SET  addr_head   = '$ahead', 
                                                addr_body   = '$abody', 
                                                addr_numb   = '$anumb',
                                                addr_name   = '$aname',
                                                addr_email  = '$aemail' WHERE addr_id ='$aid'";


				$success = $conn->query($query);

                $conn->close();

				if (!$success) {
				    die("Couldn't enter data: ".$conn->error);
				}

				echo "<p>Your Address is Updated successfully ..!! </p><br>";
			}

		?>
		<p>
			<a href="address.php">Continue with Address update page here</a>
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

        $('.sd-cont').addClass('active');

    });
    </script>

</body>
</html>