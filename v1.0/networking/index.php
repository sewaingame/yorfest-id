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
   <link rel="shortcut icon" type="image/x-icon" href="../images/logo_tab.png">

   <!-- CSS
         ================================================== -->
   <!-- Bootstrap -->
   <link rel="stylesheet" href="../css/bootstrap.min.css">

   <!-- FontAwesome -->
   <link rel="stylesheet" href="../css/font-awesome.min.css">
   <!-- Animation -->
   <link rel="stylesheet" href="../css/animate.css">
   <!-- magnific -->
   <link rel="stylesheet" href="../css/magnific-popup.css">
   <!-- carousel -->
   <link rel="stylesheet" href="../css/owl.carousel.min.css">
   <!-- isotop -->
   <link rel="stylesheet" href="../css/isotop.css">
   <!-- ico fonts -->
   <link rel="stylesheet" href="../css/xsIcon.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="../css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="../css/responsive.css">


   <!-- Style CSS -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">

   <!-- Typography CSS -->
   <link rel="stylesheet" href="css/typography.css">

   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>

<body>

   <div class="body-inner right-column-fixed">

     <?php include "header.php"; ?>

     <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
           <div id="sidebar-scrollbar">
              <nav class="iq-sidebar-menu">
                 <ul id="iq-sidebar-toggle" class="iq-menu">

                   <li style="cursor:pointer;">
                   </li>
                    <li class="active" style="cursor:pointer;" id="button_livewall">
                       <a class="iq-waves-effect" href="?p=2&c=0"><i class="las la-newspaper"></i><span>Live Wall</span></a>
                    </li>
                    <li class="" onclick="loadPage(this);" style="cursor:pointer;" id="button_profile">
                       <a class="iq-waves-effect" href="?p=2&c=1"><i class="las la-user"></i><span>Profile</span></a>
                    </li>
                    <li class="" onclick="loadPage(this);" style="cursor:pointer;" id="button_chat">
                       <a class="iq-waves-effect" href="?p=2&c=2"><i class="lab la-rocketchat"></i><span>Chat</span></a>
                    </li>
                    <li class="" onclick="loadPage(this);" style="cursor:pointer;" id="button_notification">
                       <a class="iq-waves-effect" href="?p=2&c=3"><i class="lar la-bell"></i><span>Notification</span></a>
                    </li>
                 </ul>
              </nav>
              <div class="p-3"></div>
           </div>
        </div>
        <!-- TOP Nav Bar -->

        <!-- TOP Nav Bar END -->
        <!-- Right Sidebar Panel Start-->
        <div class="right-sidebar-mini right-sidebar mt-1">
           <div class="right-sidebar-panel p-0">
              <div class="iq-card shadow-none">
                 <div class="iq-card-body p-0">
                      <div class="media-height pl-3 pt-3 pr-3">
                        <div class="media align-items-center">
                          <input type="text" class="text search-input" placeholder="Search by Name" id="searchUserList">
                        </div>
                      </div>
                    <div class="media-height pl-3 pt-3 pr-3" id="user_list">

                    </div>
                    <div class="right-sidebar-toggle bg-primary mt-3">
                       <i class="ri-arrow-left-line side-left-icon"></i>
                       <i class="ri-arrow-right-line side-right-icon"><span class="ml-3 d-inline-block">Close Menu</span></i>
                    </div>
                 </div>
              </div>
           </div>
        </div>

        <!-- Right Sidebar Panel End-->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
           <div class="container">
              <div class="row">
                  <div class="col-lg-12 row m-0 p-0" id="content">

                  </div>
                  <div class="col-sm-12 text-center" id="loader" style="display:none;">
                     <img src="images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">
                  </div>
              </div>
           </div>
        </div>
     </div>

     <div class="media align-items-center pb-4" id="template_user" style="display:none;">
        <div class="iq-profile-avatar">
           <img class="rounded-circle avatar-50 user_photourl" src="images/user.png" alt="">
        </div>
        <div class="media-body ml-3">
           <h6 class="mb-0"><a href="#" class="user_name open_user_chat" data="" onclick="openUserChat(this)">Paul Molive</a></h6>
           <a href="#" onclick="downloadBusinessCard(this)" class="user_card">Download Card</a>
        </div>
     </div>


      <!-- Javascript Files
            ================================================== -->
      <!-- initialize jQuery Library -->
      <script src="../js/jquery.js"></script>

      <script src="../js/popper.min.js"></script>
      <!-- Bootstrap jQuery -->
      <script src="../js/bootstrap.min.js"></script>
      <!-- Counter -->
      <script src="../js/jquery.appear.min.js"></script>
      <!-- Countdown -->
      <script src="../js/jquery.jCounter.js"></script>
      <!-- magnific-popup -->
      <script src="../js/jquery.magnific-popup.min.js"></script>
      <!-- carousel -->
      <script src="../js/owl.carousel.min.js"></script>
      <!-- Waypoints -->
      <script src="../js/wow.min.js"></script>

      <!-- isotop -->
      <script src="../js/isotope.pkgd.min.js"></script>

      <!-- Template custom -->
      <script src="../js/main.js"></script>

      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <!-- <script src="js/waypoints.min.js"></script> -->
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>

      <script src="js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="js/worldLow.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
      <!-- App JavaScript -->
      <script src="../js/crypto-js.min.js"></script>
      <script src="../app/tools.js"></script>
      <script src="app/keycheck.js"></script>
      <script src="app/main.js"></script>
      <script src="js/checknotification.js"></script>
      <?php include "../chat.php"; ?>
   </div>
   <!-- Body inner end -->
</body>

</html>
