<?php
	require_once 'include.php';
	$sql = "select * from mr_long";
	$data = fetchAll($sql);
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>龙神威武</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
  <link rel="shotcut icon" href="images/jclf.ico"/>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Salvattore -->
	<link rel="stylesheet" href="css/salvattore.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-main">
		<div class="container">

			<div class="row">

        <div id="fh5co-board" data-columns>

          <!-- <div class="item">
        		<div class="animate-box">
	        		<a href="images/jcl1.jpg" class="image-popup fh5co-board-img"><img src="images/jcl1.jpg"></a>
	        		<div class="fh5co-desc"></div>
        		</div>
        	</div> -->
					<?php
						foreach ($data as $value) {
					?>
					<div class="item">
            <div class="animate-box"><a href="<?php echo $value['imgpath'] ?>" class="image-popup fh5co-board-img"><img src="<?php echo $value['imgpath'] ?>" alt=""></a></div>
						<?php
							if (!empty($value['decription'])) {
						?>
						<div class="fh5co-desc"><?php echo $value['decription'] ?></div>
						<?php
							}
						 ?>

          </div>
					<?php
						}
					 ?>
        </div>
      </div>
    </div>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Salvattore -->
	<script src="js/salvattore.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>




	</body>
</html>
