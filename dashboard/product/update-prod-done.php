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
                $pid     = $conn->real_escape_string($_POST['prod_id']);
				$pname   = $conn->real_escape_string($_POST['prod_name']);
				$pdesc   = $conn->real_escape_string($_POST['prod_desc']);
                $ptext   = $conn->real_escape_string($_POST['prod_text']);
				$pactive = $conn->real_escape_string($_POST['prod_active']);
                $pcat    = $conn->real_escape_string($_POST['cat_id']);
                $ppric   = $conn->real_escape_string($_POST['prod_price']);
                $pcurr   = $conn->real_escape_string($_POST['prod_cur']);
                $pdisc   = $conn->real_escape_string($_POST['product_disc']);
                $pdispri = $conn->real_escape_string($_POST['disc_price']);
                $ptag    = $conn->real_escape_string($_POST['prod_tag']);

				//	For Image upload
				$filetmp = $_FILES["prod_img"]["tmp_name"];
				$filename = $_FILES["prod_img"]["name"];
				$filetype = $_FILES["prod_img"]["type"];
				$filepath = "../../public/images/prod/".$filename;

                move_uploaded_file($filetmp, $filepath);

                if($filename){
                    $query   = "UPDATE product SET 
                                            prodc_name = '$pname', 
                                            prodc_desc = '$pdesc', 
                                            prodc_text = '$ptext', 
                                            prodc_active = '$pactive', 
                                            prodc_cat_id = '$pcat', 
                                            prodc_price = '$ppric', 
                                            prodc_cur = '$pcurr', 
                                            pimg_name = '$filename', 
                                            pimg_path = '$filepath', 
                                            pimg_type = '$filetype',
                                            prod_discount = '$pdisc',
                                            prod_final_price = '$pdispri',
                                            prod_line = '$ptag' WHERE prd_id='$pid'";
                }   else {
                    $query   = "UPDATE product SET 
                                            prodc_name = '$pname', 
                                            prodc_desc = '$pdesc', 
                                            prodc_text = '$ptext',
                                            prodc_active = '$pactive', 
                                            prodc_cat_id = '$pcat', 
                                            prodc_price = '$ppric', 
                                            prodc_cur = '$pcurr',
                                            prod_discount = '$pdisc',
                                            prod_final_price = '$pdispri',
                                            prod_line = '$ptag' WHERE prd_id='$pid'";
                }

				$success = $conn->query($query);

                $conn->close();

				if (!$success) {
				    die("Couldn't enter data: ".$conn->error);
				}

				echo "<p>Your Product is Updated successfully ..!! </p><br>";
			}

		?>
		<p>
			<a href="list-prod.php">Continue to List Products here</a>
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

        $('.sd-prod').addClass('active');

    });
    </script>

</body>
</html>