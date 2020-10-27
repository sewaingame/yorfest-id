<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Basic Page Needs ================================================== -->
   <meta charset="utf-8">

   <!-- Mobile Specific Metas ================================================== -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <meta name ="description" content="Young organic festival 2020">
   <meta name ="og;description" content="Young organic festival 2020">
   <meta name ="og;url" content="https;//yorfest.id/">

   <!-- Site Title -->
   <title>YORFEST - 2020 &amp; YOUNG ORGANIC FESTIVAL 2020 </title>
   <link rel="shortcut icon" type="image/x-icon" href="images/logo_tab.png">



   <!-- CSS
         ================================================== -->
   <!-- Bootstrap -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

   <!-- FontAwesome -->
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <!-- Animation -->
   <link rel="stylesheet" href="css/animate.css">
   <!-- magnific -->
   <link rel="stylesheet" href="css/magnific-popup.css">
   <!-- carousel -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <!-- isotop -->
   <link rel="stylesheet" href="css/isotop.css">
   <!-- ico fonts -->
   <link rel="stylesheet" href="css/xsIcon.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="css/responsive.css">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>

<body>
<?php include 'header.php'; ?>
<!-- <div class="body-inner container-fluid"> -->
      <!-- Header start -->
		<!--/ Header end -->

		<div id="page-banner-area" class="page-banner-area">
			<!-- Subpage title start -->
			<div class="page-banner-title">
				<div class="text-center">
					<h3 id="meetingname"></h3>
					<ol class="breadcrumb">
						<li id="daytitle">
							About
						</li>
					</ol>
				</div>
			</div><!-- Subpage title end -->
		</div><!-- Page Banner end -->

		<!-- ts intro start -->
		<section class="ts-about-intro section-bg"  style="width:100vw; ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-8 col-sm-12 mx-auto" id="zoommeeting">
              <?php
                $url = 'meeting.html?';
                $url .= 'name=' . $_GET['name'];
                $url .= '&mn=' . $_GET['mn'];
                $url .= '&email=' . $_GET['email'];
                $url .= '&pwd=' . $_GET['pwd'];
                $url .= '&role=' . $_GET['role'];
                $url .= '&lang=' . $_GET['lang'];
                $url .= '&signature=' . $_GET['signature'];
                $url .= '&china=' . $_GET['china'];
                $url .= '&apiKey=' . $_GET['apiKey'];
              ?>
               <iframe id="meeting" class="img-fluid" src="<?php echo $url; ?>" style="width:100%; height:60vh; border-radius:10px; background:#000;"></iframe>

               <a href="#" class="btn" target="_blank" id="zoomapp">Join in Zoom App</a>
          </div><!-- col end-->
				</div><!-- row end-->
			</div><!-- container end-->
		</section>
		<!-- ts intro end-->

			<!-- footer start-->
    <?php include 'footer.php';  ?>
		<!-- ts footer area end-->


      <!-- Javascript Files
            ================================================== -->
      <!-- initialize jQuery Library -->
      <script src="js/jquery.js"></script>

      <script src="js/popper.min.js"></script>
      <!-- Bootstrap jQuery -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Counter -->
      <script src="js/jquery.appear.min.js"></script>
      <!-- Countdown -->
      <script src="js/jquery.jCounter.js"></script>
      <!-- magnific-popup -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- carousel -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Waypoints -->
      <script src="js/wow.min.js"></script>

      <!-- isotop -->
      <script src="js/isotope.pkgd.min.js"></script>

      <!-- Template custom -->
      <!-- <script src="js/main.js"></script> -->
      <script src="js/countdownfromget.js"></script>
   <!-- </div> -->
	<!-- Body inner end -->
</body>

</html>
