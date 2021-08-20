<?php
    include('auth.php');
    check_session();
?>
<!doctype html>
<html lang="en">
<head>
    <?php
        $title = "SpeedTest";
        include("head.php");
    ?>
</head>
<body>
<div id="app">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mx-auto" style="margin-top:30px">
                <div class="card block moving-glow">
		    <?php include('navbar.php'); ?>
                    <div class="card-header nganu slide">
                        <div class="text-center">
                            <h3><i class="fa fa-arrows-v"></i> SpeedTest</h3>
                        </div>
                    </div>
                    <div class="card-body sss">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="//openspeedtest.com/Get-widget.php" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
<?php include("javascript.php"); ?>
</body>
</html>