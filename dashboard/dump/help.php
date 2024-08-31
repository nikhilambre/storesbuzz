    <?php 
    include('header.php')
    ?>
     

    <div class="row page-heading">
        <h2>Dashboard Help</h2>
        <ol class="breadcrumb">
          <li>Dashboard</li>
          <li><a href="#">Help</a></li>
        </ol>
    </div>

    <div class="dash-wrap row">
        <div class="ct-quest">
            <div class="box-head">
                <h4>Frequently asked question</h4>
            </div>

            <div class="list">
                <div class="quest row">
                    <h4><i class="fa fa-question"></i> What is mean by category?</h4>
                    <p>Category is a head</p>
                </div>
                <div class="quest row">
                    <h4><i class="fa fa-question"></i> What is mean by category?</h4>
                    <p>Category is a head</p>
                </div>
                <div class="quest row">
                    <h4><i class="fa fa-question"></i> What is mean by category?</h4>
                    <p>Category is a head</p>
                </div>
            </div>
        </div>
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

        $('.sd-help').addClass('active');

    });
    </script>

</body>
</html>