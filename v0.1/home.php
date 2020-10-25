<?php
  session_start();
?>
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
   <div class="body-inner">
      <!-- Header start -->
      <header id="header" class="header header-classic">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
               <!-- logo-->
               <a class="navbar-brand" href="home.php?p=1">
                  <img src="images/logos/logo.png" alt="">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item <?php if($_GET["p"] == 1) echo "active"; ?>">
                        <a href="home.php?p=1" >Home</a>
                       </li>
                     <li class="nav-item <?php if($_GET["p"] == 2) echo "active"; ?>">
                        <a href="networking/?p=2&c=0" >Networking </a>
                     </li>
                     <li class="nav-item <?php if($_GET["p"] == 3) echo "active"; ?>">
                        <a href="conference.php?p=3"> Conference </a>

                     </li>
                     <li class="nav-item <?php if($_GET["p"] == 4) echo "active"; ?>">
                        <a href="#" class="" >Ehxibition</a>
                     </li>
                    <li class="nav-item <?php if($_GET["p"] == 5) echo "active"; ?>">
                        <a href="contact.php?p=5">Contact</a>
                     </li>
                     <?php
                      if(isset($_SESSION["api_key"]))
                      {
                        echo
                        '
                        <li class="nav-item dropdown header-ticket nav-item">
               						<a href="#" class="ticket-btn btn" data-toggle="dropdown">';

                               $name = explode(" ", $_SESSION["name"]);
                               for ($i=0; $i < count($name); $i++)
                               {
                                 if($i==0)
                                   echo $name[$i];
                                 else
                                   echo ' ' . $name[$i][0];
                               }
                        echo '
                              <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu" role="menu">
                             <li><a href="networking/?p=2&c=1" class="icon icon-user">Profile</a></li>
             						    <li><a href="logout.php" class="icon icon-exit">Logout</a></li>
                           </ul>
                         </li>
                        ';
                      }
                      else
                      {
                        echo
                        '
                        <li class="nav-item dropdown header-ticket nav-item">
                           <a href="register.php" class="ticket-btn btn"> Register</a>
                        </li>
                        ';
                      }
                     ?>
               </div>
            </nav>
         </div><!-- container end-->
      </header>
      <!--/ Header end -->

      <!-- banner start-->
      <section class="hero-area hero-speakers">
         <div class="banner-item overlay" style="background-image:url(./images/banner/banner_lobby4.png)">
		   <div class="container">

                  <div class="col-lg-7">
                     <div class="banner-content-wrap">
                        <p class="banner-info wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="500ms">28 - 29 Oktober, Jakarta</p>
                        <h3 class="banner-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="700ms">YOUNG ORGANIC Festival 2020</h3>
                        <div class="banner-btn wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="800ms">
                           <a href="#" class="btn">Exhibition</a>
                           <a href="conference.php?p=3" class="btn fill">Conference</a>
                        </div>

                     </div>
                     <!-- Banner content wrap end -->
                  </div><!-- col end-->



            </div>
            <!-- Container end -->
         </div>
      </section>
      <!-- banner end-->

	  <!--count down start-->
      <section class="ts-count-down">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 mx-auto">
                  <div class="countdown gradient clearfix">
                     <div class="counter-item">
                        <span class="days">00</span>
                        <div class="smalltext">Days</div>
                        <b>:</b>
                     </div>
                     <div class="counter-item">
                        <span class="hours">00</span>
                        <div class="smalltext">Hours</div>
                        <b>:</b>
                     </div>
                     <div class="counter-item">
                        <span class="minutes">00</span>
                        <div class="smalltext">Minutes</div>
                        <b>:</b>
                     </div>
                     <div class="counter-item">
                        <span class="seconds">00</span>
                        <div class="smalltext">Seconds</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- ts intro start -->
      <section class="ts-event-outcome event-intro">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="">
                     <div class="outcome-content ts-exp-content">
                        <h2 class="column-title">
                         ABOUT YORFest
                        </h2>
                        <p>
                          Adalah acara tahunan para pegiat organik di Indonesia berupa kumpulan komunitas anak muda yang peduli dengan pertanian, perkebunan & peternakan, bisnis yang berhubungan dengan pendayagunaan sistem organik yang alami.<br>
							Bersatu & berbagi inspirasi untuk pertumbuhan ekonomi melalui pertanian organik yang berkelanjutan sebagai wujud regenerasi petani Indonesia dalam membentuk kemandirian & menggali potensi alam di Indonesia.<br>
							Menciptakan nilai tambah produk pertanian, perkebunan & perternakan dari eko-sistem organik yang berorientasi ekspor berupa produk siap guna [green label], bukan hanya. meng-ekspor raw material yang bernilai murah.
                        </p>
                        </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="outcome-content">
                     <div class="outcome-img overlay">
                        <img class="" src="images/about/learn_img.jpg" alt="">
                     </div>
                     <h3 class="img-title text-white"><a href="#" class="text-white">Learn Things</a></h3>
                  </div>
               </div>
               <!--<div class="col-lg-4">
                  <div class="outcome-content">
                     <div class="outcome-img overlay">
                        <img class="" src="images/about/connect_img.jpg" alt="">
                     </div>
                     <h3 class="img-title"><a href="#" class="text-white">connect People</a></h3>
                  </div>
               </div> -->

            </div>
         </div>
      </section>
      <!-- ts intro end-->

	  <section id="ts-experiences" class="ts-experiences">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6 no-padding align-self-center">
                  <div class="exp-img" style="background-image:url(./images/gallery/gallery2.jpg)">
                     <!-- <img class="img-fluid" src="images/gallery/gallery2.jpg" alt=""> -->
                  </div>
               </div><!-- col end-->
               <div class="col-lg-6 no-padding align-self-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="500ms">
                  <div class="ts-exp-wrap">
                     <div class="ts-exp-content">
                        <h2 class="column-title">
                           <span>Get Experience</span>
                           Shift your perspective
                        </h2>
                        <p>
                           Fitur ini menjadi media komunikasi antara pembicara, peserta dan peminat untuk bertemu & berkenalan dengan sesama pegiat organik. Bangun jaringan anda dengan  bergabung di Organic Networking Space.
						   </p>
						   <a href="#" class="btn">JOIN NETWORKING</a>
                     </div>
                  </div>

               </div><!-- col end-->
            </div><!-- row end-->
         </div><!-- container fluid end-->
      </section>



	  <!-- ts intro end-->




      <!-- ts speaker start-->
      <section id="ts-speakers" class="ts-speakers" style="background-image:url(./images/speakers/speaker_bg.png">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <h2 class="section-title text-center">
                     <span>Listen to the</span>
                     EVENT SPEAKERS
                  </h2>
               </div><!-- col end-->
            </div><!-- row end-->
            <div class="row">
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker1.jpg" alt="">
                        <a href="#popup_1" class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Fredric Martinsson</a></h3>
                        <p>
                           Founder, Edilta
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_1" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker1.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                   10.30 - 11.30 am
                                             </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                      10.30 - 11.30 am
                                                </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="500ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker2.jpg" alt="">
                        <a href="#popup_2"  class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Melisa Lundryn</a></h3>
                        <p>
                           Lead Designer, Payol
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_2" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker2.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="600ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker3.jpg" alt="">
                        <a href="#popup_3" class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Agaton Johnsson</a></h3>
                        <p>
                           Developer Expert
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_3" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker3.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="700ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker4.jpg" alt="">
                        <a href="#popup_4" class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Rebecca Henrikon</a></h3>
                        <p>
                           Founder, Cards
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_4" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker4.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="800ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker5.jpg" alt="">
                        <a href="#popup_5" class="view-speaker  ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Fredric Martinsson</a></h3>
                        <p>
                           Founder, Edilta
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_5" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker5.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="900ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker6.jpg" alt="">
                        <a href="#popup_6" class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Lundryn Melisa </a></h3>
                        <p>
                           Lead Designer, Payol
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_6" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker1.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1000ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker7.jpg" alt="">
                        <a href="#popup_7" class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
									<i class="icon icon-plus"></i>
								</a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Johnsson Agaton </a></h3>
                        <p>
                           Developer Expert
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_7" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker7.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->

               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1100ms">
                  <div class="ts-speaker">
                     <div class="speaker-img">
                        <img class="img-fluid" src="images/speakers/speaker8.jpg" alt="">
                        <a href="#popup_8" class="view-speaker ts-image-popup" data-effect="mfp-zoom-in">
                                    <i class="icon icon-plus"></i>
                                </a>
                     </div>
                     <div class="ts-speaker-info">
                        <h3 class="ts-title"><a href="#">Henrikon Rebecca </a></h3>
                        <p>
                           Founder, Cards
                        </p>
                     </div>
                  </div>
                  <!-- popup start-->
                  <div id="popup_8" class="container ts-speaker-popup mfp-hide">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-img">
                              <img src="images/speakers/speaker8.jpg" alt="">
                           </div>
                        </div><!-- col end-->
                        <div class="col-lg-6">
                           <div class="ts-speaker-popup-content">
                              <h3 class="ts-title">David Robert</h3>
                              <span class="speakder-designation">Cheif Architecture</span>
                              <img class="company-logo" src="images/sponsors/sponsor-6.png" alt="">
                              <p>
                                 World is committed to making participation in the event a harass ment free experience
                                 for everyone, regardless of level experience gender, gender identity and expression
                              </p>
                              <h4 class="session-name">
                                 Sessions by David
                              </h4>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                         10.30 - 11.30 am
                                                   </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="speaker-session-info">
                                       <h4>Day 1</h4>
                                       <span>
                                                            10.30 - 11.30 am
                                                      </span>
                                       <p>
                                          Marketing Matters
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="ts-speakers-social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                           </div><!-- ts-speaker-popup-content end-->
                        </div><!-- col end-->
                     </div><!-- row end-->
                  </div><!-- popup end-->
               </div> <!-- col end-->
            </div><!-- row end-->
         </div><!-- container end-->

         <!-- shap img-->
         <div class="speaker-shap">
            <img class="shap1" src="images/shap/home_speaker_memphis1.png" alt="">
            <img class="shap2" src="images/shap/home_speaker_memphis2.png" alt="">
            <img class="shap3" src="images/shap/home_speaker_memphis3.png" alt="">
         </div>
         <!-- shap img end-->
      </section>
      <!-- ts speaker end-->



      <!-- ts experience start-->
      <section class="ts-schedule">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <h2 class="section-title">
                     <span>Schedule Details</span>
                     EVENT SCHEDULES
                  </h2>
                  <div class="ts-schedule-nav">
                     <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                           <a class="active" title="Click Me" href="#date1" role="tab" data-toggle="tab">
                                 <h3>28th October</h3>
                                 <span>Wednesday</span>
                               </a>
                        </li>
                        <li class="nav-item">
                           <a class="" href="#date2" title="Click Me" role="tab" data-toggle="tab">
						   <h3>29th October</h3>
                                  <span>Thursday</span>
                              </a>
                        </li>
                       </ul>
                     <!-- Tab panes -->
                  </div>
               </div><!-- col end-->

            </div><!-- row end-->
            <div class="row">
               <div class="col-lg-12">
                  <div class="tab-content schedule-tabs schedule-tabs-item">
                     <div role="tabpanel" class="tab-pane active" id="date1">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-left">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker1.jpg" alt="">
                                 <span class="schedule-slot-time">12.30 - 13.30 AM</span>
                                 <h3 class="schedule-slot-title">Marketing Matters</h3>
                                 <h4 class="schedule-slot-name">@ Ultrman</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-right">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker2.jpg" alt="">
                                 <span class="schedule-slot-time">10.30 - 11.30 PM</span>
                                 <h3 class="schedule-slot-title">Reinventing Experiences</h3>
                                 <h4 class="schedule-slot-name">@ Kemendes</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-left">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker3.jpg" alt="">
                                 <span class="schedule-slot-time">12.30 - 01.30 PM</span>
                                 <h3 class="schedule-slot-title">Cultures of Creativity</h3>
                                 <h4 class="schedule-slot-name">@ Sipitung</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-right">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker4.jpg" alt="">
                                 <span class="schedule-slot-time">01.30 - 02.30 PM</span>
                                 <h3 class="schedule-slot-title">Human Centered Design</h3>
                                 <h4 class="schedule-slot-name">@ Nagabonar</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                        </div><!-- row end-->
                        <div class="schedule-listing-btn">
                           <a href="Conference.html" class="btn">More Details</a>
                        </div>
                     </div><!-- tab pane end-->

                     <div role="tabpanel" class="tab-pane" id="date2">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-left">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker5.jpg" alt="">
                                 <span class="schedule-slot-time">02.30 - 03.30 PM</span>
                                 <h3 class="schedule-slot-title">Marketing Matters</h3>
                                 <h4 class="schedule-slot-name">@ Rebecca Henrikon</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-right">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker6.jpg" alt="">
                                 <span class="schedule-slot-time">03.30 - 04.30 PM</span>
                                 <h3 class="schedule-slot-title">Reinventing Experiences</h3>
                                 <h4 class="schedule-slot-name">@ Fredric Martinsson</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-left">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker7.jpg" alt="">
                                 <span class="schedule-slot-time">04.30 - 05.30 PM</span>
                                 <h3 class="schedule-slot-title">Cultures of Creativity</h3>
                                 <h4 class="schedule-slot-name">@ Melisa Lundryn</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                           <div class="col-lg-6">
                              <div class="schedule-listing-item schedule-right">
                                 <img class="schedule-slot-speakers" src="images/speakers/speaker8.jpg" alt="">
                                 <span class="schedule-slot-time">05.30 - 06.30 PM</span>
                                 <h3 class="schedule-slot-title">Human Centered Design</h3>
                                 <h4 class="schedule-slot-name">@ Agaton Johnsson</h4>
                                 <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                 </p>
                              </div>
                           </div><!-- col end-->
                        </div><!-- row end-->
                        <div class="schedule-listing-btn">
                           <a href="#" class="btn">More Details</a>
                        </div>


        <!-- container end-->
      </section>
      <!-- ts experience end-->

      <!-- ts sponsors start-->
      <section class="ts-intro-sponsors" style="background-image: url(./images/bg/yorfest_bg2.jpg)">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2 class="section-title black">
                     OUR SPONSORS
                  </h2><!-- section title end-->
               </div><!-- col end-->
            </div><!-- row end-->
            <div class="row">
               <div class="col-lg-12">
                  <div class="sponsors-logo text-center">
                     <a href=""><img src="images/sponsors/sponsor-1.png" alt=""></a>
                     <a href=""><img src="images/sponsors/sponsor-2.png" alt=""></a>
                     <a href=""><img src="images/sponsors/sponsor-3.png" alt=""></a>

                  </div><!-- sponsors logo end-->
               </div><!-- col end-->
            </div><!-- row end-->
         </div><!-- container end-->
      </section>
      <!-- ts sponsors end-->


		 <!--ts footer start-->
         <footer class="ts-footer" >
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 mx-auto">
                     <div class="ts-footer-social text-center mb-30">
                        <ul>
                           <li>
                              <a href="#"><i class="fa fa-facebook"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-twitter"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-linkedin"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-instagram"></i></a>
                           </li>
                        </ul>
                     </div>
                     <!-- footer social end-->
                     <div class="footer-menu text-center mb-25">
                        <ul>
                           <li><a href="#">Contact</a></li>
						</ul>
                     </div><!-- footer menu end-->
                     <div class="copyright-text text-center">
                        <p>Copyright © 2020 YORFEST. All Rights Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- footer end-->
         <div class="BackTo">
            <a href="#" class="fa fa-angle-up" aria-hidden="true"></a>
         </div>

      </div>
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
      <script src="js/main.js"></script>

   </div>
   <!-- Body inner end -->
</body>

</html>
