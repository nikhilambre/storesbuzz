    <?php 
    include('header.php')
    ?>
    
    <div class="row page-heading">
        <h2>Dashboard Update Product</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="dashboard.php">Home</a></li>
          <li>Create Product</li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="create row">
            <div class="set">
                <div class="box-head">
                    <h4>Update Product</h3>
                </div>

                <?php 
                require_once('connection.php');
                $conn = Connect();

                $val = $_GET['id'];

                $sql = "SELECT * FROM product WHERE prd_id = '$val'";

                $result=mysqli_query($conn,$sql);

                mysqli_close($conn);

                    if($result){
                        $row = mysqli_fetch_row($result);
                        $pname = $row[1];
                        $pcat = $row[4];
                        $pdesc = $row[2];
                        $ppric = $row[5];
                        $pcurr = $row[6];
                        $pactive = $row[3];
                        $pdisc = $row[11];
                        $pdscpr = $row[12];
                        $ptag = $row[13];
                        $ptext = $row[14];
                    }

                ?>

                <form class="edit row" name="catform" action="updateproddone.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row hidden">
                      <label for="exampleInputEmail1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></label>
                      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <input type="text" class="form-control" name="prod_id" maxlength="78" value="<?php echo $val ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="productName" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">* Name: </label>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" id="productName" name="prod_name" value="<?php echo $pname ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categorySelect" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">* Link with Category: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <select class="form-control" name="cat_id" id="categorySelect">
                                <option value="<?php echo $pcat ?>">No Change</option>
                                <?php 
                                require_once('connection.php');
                                $sel = Connect();

                                $option=mysqli_query($sel,"SELECT cat_id, catg_name FROM category WHERE catg_active = 'ACTIVE'");

                                if (mysqli_num_rows($option) > 0)
                                {                      
                                    while($opt = mysqli_fetch_assoc($option)) {
                                        echo "<option value=".$opt["cat_id"].">".$opt["catg_name"]."</option>";
                                    }
                                }
                                mysqli_close($sel);
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="productText" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">* Short Description: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <textarea type="text" rows="5" class="form-control" id="productText" name="prod_text" maxlength="400" required><?php echo $ptext ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="productPrice" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Price: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <input type="text" class="form-control" id="productPrice" name="prod_price" maxlength="9" onkeypress="return isNumberKey(event)" value="<?php echo $ppric ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="productPrice" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Discount Percentage: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <input type="text" class="form-control" id="productDisc" onblur="discount()" name="product_disc" placeholder="% Discount" min="0" max="100" value="<?php echo $pdisc ?>">
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5"><p>(Between 0.0 to 99.99)</p></div>
                    </div>

                    <div class="form-group row">
                        <label for="productPrice" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Price After Discount: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <input type="text" class="form-control" id="discPrice" name="disc_price" onblur="discountprice()" placeholder="Product Price after Discount" onkeypress="return isNumberKey(event)" value="<?php echo $pdscpr ?>">
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5"><p>(Must Be less than Product Price)</p></div>
                    </div>

                    <div class="form-group row">
                        <label for="productCurrency" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Currency: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <select class="form-control" name="prod_cur" id="productCurrency">
                                <option value="<?php echo $pcurr ?>"><i class="fa fa-<?php echo $pcurr ?>"></i>&nbsp; No Change</option>

                                <option value="inr"><i class="fa fa-inr"></i>&nbsp;&nbsp;Indian Rupees (INR)</option>
                                <option value="usd"><i class="fa fa-usd"></i>&nbsp;&nbsp;DOLLOR (USD)</option>
                                <option value="eur"><i class="fa fa-eur"></i>&nbsp;&nbsp;EURO</option>
                                <option value="gbp"><i class="fa fa-gbp"></i>&nbsp;&nbsp;POUND (GBP)</option>
                                <option value="jpy"><i class="fa fa-jpy"></i>&nbsp;&nbsp;Japanese Yen (JPY)</option>
                                <option value="rub"><i class="fa fa-rub"></i>&nbsp;&nbsp;Russian Ruble (RUB)</option>
                                <option value="btc"><i class="fa fa-btc"></i>&nbsp;&nbsp;BITCOIN</option>
                                <option value="ils"><i class="fa fa-ils"></i>&nbsp;&nbsp;Israeli Sheke (ILS)</option>
                                <option value="krw"><i class="fa fa-krw"></i>&nbsp;&nbsp;Korean Won (KRW)</option>
                                <option value="try"><i class="fa fa-try"></i>&nbsp;&nbsp;Turkish Lira (TRY)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Status</label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <select class="form-control" name="prod_active" id="prod_active">
                                <option value="<?php echo $pactive ?>"><?php echo $pactive ?></option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="productCurrency" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Product Tag: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <select class="form-control" name="prod_tag" id="productTag">
                                <option value="<?php echo $ptag ?>"><?php echo $ptag ?></option>
                                <option value="">No Tag</option>
                                <option value="New">New</option>
                                <option value="Best">Best</option>
                                <option value="Popular">Popular</option>
                                <option value="Best Price">Best Price</option>
                                <option value="New Arrival">New Arrival</option>
                                <option value="Assured">Assured</option>
                                <option value="Best Deal">Best Deal</option>
                                <option value="Best Selling">Best Selling</option>
                                <option value="Best in Class">Best in Class</option>
                                <option value="Exclusive">Exclusive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Image: </label>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <input type="file" class="" name="prod_img">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">* Describe your product here: </label>
                        <label class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                          <textarea class="textarea" name="prod_desc"><?php echo $pdesc ?></textarea>
                        </label>
                    </div>

                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">&nbsp;</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <hr>
                        <input type="submit" name="submit" class="btn btn-default" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php 
    include('footer.php')
    ?>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ 
        selector:'.textarea' ,

        theme: 'modern',
        height: 300,
        plugins: [
          'advlist autolink lists charmap preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking',
          'save table contextmenu directionality template paste textcolor'
        ],

        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | preview fullpage'

        });
    </script>

    <script type="text/javascript">

    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });

    function discount() {
        var price = $('#productPrice').val();
        var disc = $('#productDisc').val();
        var discPrice = price - ((price/100)*disc);
        $('#discPrice').val(discPrice);
    };

    function discountprice() {
        var discPriced = $('#discPrice').val();
        var priced = $('#productPrice').val();

        if(priced < discPriced){
            alert("Field 'Price After Discount' must be less than Field 'Product Price'.");
            $('#discPrice').val(priced);
            $('#productDisc').val('0');
        } else{
            var discd = (priced - discPriced)/(priced/100);
            $('#productDisc').val(discd);
        }
    };

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
            return false;
        return true;
    };

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