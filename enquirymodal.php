

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Send Equiry to United Engineers </h4>
</div>
<div class="modal-body row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

        <div class="ct-box-1 text-center">


        <?php 
        require_once('connection.php');
        $conn = Connect();

        $id = $conn->real_escape_string($_POST['prodid']);

        $result=mysqli_query($conn,"SELECT  prd_id,
                                            prodc_name,
                                            prodc_price,
                                            prodc_cur,
                                            pimg_name,
                                            prod_final_price FROM product WHERE    prd_id = '$id'");
        mysqli_close($conn);

        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {

                echo '<div class="ct-img">';
                    echo '<img src="public/images/prod/'.$row["pimg_name"].'" class="img-responsive" alt="Responsive image" />';
                echo '</div>';
                echo '<div class="ct-content">';
                    echo '<h3 class="ct-pr-name">'.$row["prodc_name"].'</h3>';
                    echo '<div class="ct-price">';
                        echo '<del><span><i class="fa fa-'.$row["prodc_cur"].'"></i>&nbsp;'.$row["prodc_price"].'</span></del>';
                        echo '<ins><span><i class="fa fa-'.$row["prodc_cur"].'"></i>&nbsp;'.$row["prod_final_price"].'</span></ins>';
                    echo '</div>';
                echo '</div>';
            }
        }   else{
            echo "No Products found for this Category.";
        }
        ?>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
        

        <form class="equiry-form" name="contactform" id="enq_form">
            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12 hidden">
                <input type="text" class="form-control" name="prd_id" id="prd_id" maxlength="0" value="<?php echo $id ?>"/>
                <i class="fa fa-user"></i>
            </div><br>
            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="enq_name" id="enq_name" maxlength="60" placeholder="* Full Name" required/>
                <i class="fa fa-user"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="email" class="form-control" name="enq_email" id="enq_email" maxlength="90" placeholder="* Email ID" required/>
                <i class="fa fa-envelope-o"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="enq_con" id="enq_con" maxlength="20" placeholder="* Contact No" required />
                <i class="fa fa-phone"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <textarea rows="5" class="form-control" name="enq_msg" id="enq_msg" maxlength="1590" placeholder="Your Message *" required></textarea>
                <i class="fa fa-pencil-square-o"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input name="submit" id="enq_submit" class="btn btn-lg" value="Submit">
            </div>
        </form>


    </div>
</div>


<script type="text/javascript">

    $('#enq_submit').click(function(){

        var id = $('#prd_id').val();
        var name = $('#enq_name').val();
        var email = $('#enq_email').val();
        var cont = $('#enq_con').val();
        var msg = $('#enq_msg').val();

        $.ajax({
            type : "POST",
            url : "saveenquiry.php", //URL to the delete php script
            data : { "prodid" : id, "en_name" : name, "en_email" : email, "en_cont" : cont, "en_msg": msg },
            success : function() {
                $('#enq_submit').val('Enquiry Submitted');
                setTimeout(function(){ $('#enqModal').modal('hide'); }, 1500);
            }
        });

    });
    </script>