<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SocialV - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/custom.css">


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
   </head>
   <body class="right-column-fixed body-inner">
     <header id="header" class="header header-classic">
        <div class="container">
           <nav class="navbar navbar-expand-lg navbar-light">
              <!-- logo-->
              <a class="navbar-brand" href="home.php">
                 <img src="../images/logos/logo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                 aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                 <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                       <a href="../home.php" >Home</a>
                      </li>
                    <li class="nav-item active">
                       <a href="#" >Networking </a>
                      </li>
                    <li class="nav-item">
                       <a href="../conference.html"> Conference </a>

                    </li>
                    <li class="nav-item">
                       <a href="#" class="" >Ehxibition</a>
                    </li>
          <li class="nav-item">
                       <a href="../contact.html">Contact</a>
                    </li>
                    <li class="header-ticket nav-item">
                       <a class="ticket-btn btn" href="pricing.html"> Register</a>
                    </li>
                 </ul>
              </div>
           </nav>
        </div><!-- container end-->
     </header>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">

                    <li style="cursor:pointer;">
                      <div class="iq-menu-bt ml-2">
                        <div class="wrapper-menu text-left">
                           <div class="main-circle"><i class="ri-menu-line"></i></div>
                        </div>
                       </div>
                    </li>
                     <li class="active" onclick="loadPage(this);" style="cursor:pointer;" id="button_livewall">
                        <a class="iq-waves-effect"><i class="las la-newspaper"></i><span>Live Wall</span></a>
                     </li>
                     <li class="" onclick="loadPage(this);" onclick="loadPage(this);" style="cursor:pointer;" id="button_profile">
                        <a class="iq-waves-effect"><i class="las la-user"></i><span>Profile</span></a>
                     </li>
                     <li class="" onclick="loadPage(this);" onclick="loadPage(this);" style="cursor:pointer;" id="button_chat">
                        <a class="iq-waves-effect"><i class="lab la-rocketchat"></i><span>Chat</span></a>
                     </li>
                     <li class="" onclick="loadPage(this);" onclick="loadPage(this);" style="cursor:pointer;" id="button_notification">
                        <a class="iq-waves-effect"><i class="lar la-bell"></i><span>Notification</span></a>
                     </li>
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->

         <!-- TOP Nav Bar END -->
         <!-- Right Sidebar Panel Start-->
         <div class="right-sidebar-mini right-sidebar">
            <div class="right-sidebar-panel p-0">
               <div class="iq-card shadow-none">
                  <div class="iq-card-body p-0">
                       <div class="media-height pl-3 pt-3 pr-3">
                         <div class="media align-items-center mb-4">
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



       <div class="media align-items-center mb-4" id="template_user" style="display:none;">
          <div class="iq-profile-avatar">
             <img class="rounded-circle avatar-50 user_photourl" src="images/user.png" alt="">
          </div>
          <div class="media-body ml-3">
             <h6 class="mb-0"><a href="#" class="user_name open_user_chat" data="" onclick="openUserChat(this)">Paul Molive</a></h6>
             <a href="#" class="user_card">Download Card</a>
          </div>
       </div>
      <!-- Wrapper END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
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
   </body>
</html>
