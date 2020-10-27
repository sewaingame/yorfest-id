<!DOCTYPE html>
<html lang="en">
   <!-- index-515:19-->
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
      <section class="hero-area hero-speakers">
         <div class="banner-item overlay" style="background-image:url(images/bg/yorfest_bg.jpg)">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="hero-form-content row ml-md-0 ml-1 mr-md-0 mr-1">
                        <div class="col-12">
                           <h2>Register</h2>
                        </div>
                        <div class="col-lg-6 row">
                          <div class="col-12 text-left">
                             <label for="name" style="color:#000000; font-size:14px;">Name</label>
                             <input class="form-control form-control-email" name="name" id="f-name"  type="name" required="">
                             <label id="v-name" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Name is not valid. Minimum 3 character.</label>
                          </div>
                          <div class="col-12 text-left">
                             <label for="email" style="color:#000000;  font-size:14px;">Email</label>
                             <input class="form-control form-control-email" name="email" id="f-email"  type="email" required="">
                             <label id="v-email" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Email is not valid.</label>
                             <label id="v-email-2" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Email is already used.</label>
                          </div>
                          <div class="col-12 text-left">
                             <label for="password" style="color:#000000; font-size:14px;">Password</label>
                             <input class="form-control form-control-password" name="password" id="f-password" type="password">
                             <label id="v-password" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Password is not valid. Minimum 4 character</label>
                          </div>
                          <div class="col-12 text-left">
                             <label for="cpassword" style="color:#000000; font-size:14px;">Confirm Password</label>
                             <input class="form-control form-control-password" name="cpassword" id="f-cpassword" type="password">
                             <label id="v-cpassword" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Password didn't match</label>
                          </div>
                          <div class="col-12 text-left">
                             <label for="phone" style="color:#000000; font-size:14px;">Phone</label>
                             <input class="form-control form-control-email" name="phone" id="f-phone"  type="phone" required="">
                             <label id="v-phone" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Phone is not valid. Minimum 10 digit. Ex: 08xxxxxxxxxx</label>
                          </div>
                          <div class="col-12 text-left" style="display:none">
                             <label for="birth" style="color:#000000; font-size:14px;">Date of Birth</label>
                             <input class="form-control form-control-email" name="birth" id="f-birth"  type="text" required="" value="1991-08-17">
                             <label id="v-birth" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Please select your birth date</label>
                          </div>
                          <div class="col-12 text-left">
                             <label for="company" style="color:#000000; font-size:14px;">Institution/Company/Organization</label>
                             <input class="form-control form-control-email" name="company" id="f-company"  type="text" required="">
                             <label id="v-company" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Company is not valid. Minimum 3 character</label>
                          </div>
                          <div class="col-12 text-left">
                            <label for="interest" style="color:#000000;  font-size:14px;">Interest</label>
                            <select class="form-control form-control-email" id="f-interest">
                               <option value="-1">Select One</option>
                               <option value="0">Organic Healthy Life Style</option>
                               <option value="1">Organic Farming</option>
                               <option value="2">Organic Business</option>
                               <option value="4">Organic Agriculture</option>
                               <option value="5">Other</option>
                             </select>
                             <input class="form-control form-control-email mt-2" placeholder="Fill with your interest" name="company" id="f-interest-other"  type="text" required="" style="display:none;">
                             <label id="v-interest" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Minimum 4 character</label>
                             <label id="v-interest-2" for="name" style="color:#FF6C6C; font-size:12px; display:none;">You must select one of the option.</label>
                         </div>
                        </div>
                        <div class="col-lg-6 row">

                          <div class="col-12 text-left" style="display:none;">
                             <label for="conference" style="color:#000000; padding-top:20px; font-size:14px;">Join Conferece As</label>
                             <select class="form-control form-control-email" id="f-conference">
                                <option value="-1">Select One</option>
                                <option value="0">Participant/Peserta</option>
                                <option value="1">Visitor/Penonton</option>
                              </select>
                              <label id="v-conference" for="name" style="color:#FF6C6C; font-size:12px; display:none;">Select one of the options.</label>
                          </div>
                          <div class="col-12 text-left">
                             <label for="profilepicture" style="color:#000000; padding-top:20px; font-size:14px;">Profile Picture (Or Add later)</label>
                             <br>
                             <img src="images/user.png" alt="" style="padding-bottom: 10px; max-height: 200px; max-width: 100%; position:relative;" id="preview-profilepicture">
                             <br>
                             <input class="form-control form-control-email" name="company" id="f-profilepicture"  type="file" required="" accept="image/x-png,image/gif,image/jpeg">
                          </div>
                          <div class="col-12 text-left">
                             <label for="bussinesscard" style="color:#000000; padding-top:20px; font-size:14px;">Bussiness Card (Or Add later)</label>
                             <br>
                             <img src="images/card.png" alt="" style=" padding-bottom: 10px; max-height: 200px; max-width: 100%; position:relative;" id="preview-bussinesscard">
                             <br>
                             <input class="form-control form-control-email" name="company" id="f-bussinesscard"  type="file" required="" accept="image/x-png,image/gif,image/jpeg">
                          </div>
                        </div>

                        <div class="col-12 mt-4">
                           <button class="btn" id="register"> Register</button>
                        </div>
                        <div class="col-12 mt-3">
                           <a href="login.php" style="color:#000000; font-size:14px; text-align: center;">Already have an account? Sign In</a>
                        </div>
                     </div>
                  </div>
                  <!-- col end-->
               </div>
               <!-- row end-->
            </div>
            <!-- Container end -->
         </div>
      </section>

      <div class="loading" style="display:none">Loading&#8230;</div>
      <!-- banner end-->

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
      <!-- Encryption -->
      <script src="js/jquery.min.js"></script>
      <!-- Encryption -->
      <script src="js/crypto-js.min.js"></script>
      <!-- App -->
      <script src="app/tools.js"></script>
      <script src="app/register.js"></script>
      <!-- Body inner end -->
   </body>
   <!-- index-515:53-->
</html>
