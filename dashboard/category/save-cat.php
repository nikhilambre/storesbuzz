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
				$cname   = $conn->real_escape_string($_POST['cat_name']);
				$cdesc   = $conn->real_escape_string($_POST['cat_desc']);
				$cactive = $conn->real_escape_string($_POST['cat_active']);
                $pcatid  = $conn->real_escape_string($_POST['pcat_id']);

				//	For Image upload
				$filetmp = $_FILES["cat_img"]["tmp_name"];
				$filename = $_FILES["cat_img"]["name"];
				$filetype = $_FILES["cat_img"]["type"];
				$filepath = "../../public/images/cat/".$filename;

				move_uploaded_file($filetmp, $filepath);

                if($filename){
    				$query   = "INSERT into category (
                                            catg_name,
                                            catg_desc,
                                            catg_active,
                                            catg_parent,
                                            cimg_name,
                                            cimg_path,
                                            cimg_type) 
    							     VALUES('" . $cname . "',
                                            '" . $cdesc . "',
                                            '" . $cactive . "',
                                            '" . $pcatid . "',
                                            '" . $filename . "',
                                            '" . $filepath . "',
                                            '" . $filetype . "')";
                } else {
                    $query   = "INSERT into category (
                                            catg_name,
                                            catg_desc,
                                            catg_active,
                                            catg_parent) 
                                     VALUES('" . $cname . "',
                                            '" . $cdesc . "',
                                            '" . $cactive . "',
                                            '" . $pcatid . "')";
                }

				$success = $conn->query($query);

				if (!$success) {
				    die("Couldn't enter data: ".$conn->error);

				}
				echo "<p>Your Category is saved successfully ..!! </p><br>";
				$conn->close();
			}

		?>
		<p>
			<a href="create-cat.php">Continue to Add Categories here</a>
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

        $('.sd-cat').addClass('active');

    });
    </script>

</body>
</html>