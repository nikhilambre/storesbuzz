    <?php 
    include('header.php')
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

				require_once('connection.php');
				$conn    = Connect();
				$pname   = $conn->real_escape_string($_POST['prod_name']);
                $ptext   = $conn->real_escape_string($_POST['prod_text']);
				$pcat    = $conn->real_escape_string($_POST['cat_id']);
				$pdesc   = $conn->real_escape_string($_POST['prod_desc']);
				$ppric   = $conn->real_escape_string($_POST['prod_price']);
				$pcurr   = $conn->real_escape_string($_POST['prod_cur']);
				$pactive = $conn->real_escape_string($_POST['prod_active']);
                $pdisc   = $conn->real_escape_string($_POST['product_disc']);
                $pdiscpr = $conn->real_escape_string($_POST['disc_price']);
                $ptaglin = $conn->real_escape_string($_POST['prod_tag']);

				//	For Image upload
				$filetmp = $_FILES["prod_img"]["tmp_name"];
				$filename = $_FILES["prod_img"]["name"];
				$filetype = $_FILES["prod_img"]["type"];
				$filepath = "../public/images/prod/".$filename;

				move_uploaded_file($filetmp, $filepath);

                if($filename){
				    $query   = "INSERT into product (
                                        prodc_name,
                                        prodc_desc,
                                        prodc_text, 
                                        prodc_active,
                                        prodc_cat_id,
                                        prodc_price,
                                        prodc_cur,
                                        pimg_name,
                                        pimg_path,
                                        pimg_type,
                                        prod_discount,
                                        prod_final_price,
                                        prod_line) 
							     VALUES('" . $pname . "',
                                        '" . $pdesc . "',
                                        '" . $ptext . "',
                                        '" . $pactive . "',
                                        '" . $pcat . "',
                                        '" . $ppric . "',
                                        '" . $pcurr . "',
                                        '" . $filename . "',
                                        '" . $filepath . "',
                                        '" . $filetype . "',
                                        '" . $pdisc . "',
                                        '" . $pdiscpr . "',
                                        '" . $ptaglin . "')";
                } else{
                    $query   = "INSERT into product (
                                        prodc_name,
                                        prodc_desc,
                                        prodc_text,
                                        prodc_active,
                                        prodc_cat_id,
                                        prodc_price,
                                        prodc_cur,
                                        prod_discount,
                                        prod_final_price,
                                        prod_line) 
                                 VALUES('" . $pname . "',
                                        '" . $pdesc . "',
                                        '" . $ptext . "',
                                        '" . $pactive . "',
                                        '" . $pcat . "',
                                        '" . $ppric . "',
                                        '" . $pcurr . "',
                                        '" . $pdisc . "',
                                        '" . $pdiscpr . "',
                                        '" . $ptaglin . "')";
                }


				$success = $conn->query($query);

                $conn->close();

				if (!$success) {
				    die("Couldn't enter data: ".$conn->error);
				}

				echo "<p>Your Product is saved successfully ..!! </p><br>";
			}

		?>
		<p>
			<a href="create-prod.php">Continue to Add Products here</a>
		</p>

    </div>

    <?php 
    include('footer.php')
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