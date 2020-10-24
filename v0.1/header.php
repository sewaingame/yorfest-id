<header id="header" class="header header-classic">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
         <!-- logo-->
         <a class="navbar-brand" href="home.html">
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
                  <a href="networking/?p=2" >Networking </a>
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
               <li class="header-ticket nav-item">
                  <a class="ticket-btn btn" href="pricing.html"> Register</a>
               </li>
            </ul>
         </div>
      </nav>
   </div><!-- container end-->
</header>
