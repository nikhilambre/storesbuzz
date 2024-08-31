    <?php 
    include('../header.php')
    ?>

    <div class="row page-heading">
        <h2>Dashboard Home</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Home</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">

        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Categories</h3>
                </div>
                <div class="edit row">
                    <p>You have 14 Categories created</p><br>
                    <a href="" class="btn btn-primary">Check List</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <div class="set">
                <div class="box-head">
                    <h4>Products</h3>
                </div>
                <div class="edit row">
                    <p>You have 34 Products updated in all categories</p><br>
                    <a href="" class="btn btn-primary">Check List</a>
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

        $('.sd-home').addClass('active');

    });
    </script>

</body>
</html>        