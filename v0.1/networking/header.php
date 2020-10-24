<?php
  include "../checksession.php";
?>

<header id="header" class="header header-classic" style="background:#ffffff; z-index:1000; position:fixed; width:100%; box-shadow: 0px 0px 20px 0px rgba(44, 101, 144, 0.1);">
   <div class="container">

     <div class="iq-menu-bt ml-2 mt-3" style="position:absolute; left:0px;  z-index:9000;">
       <div class="wrapper-menu text-left">
          <div class="main-circle"><i class="ri-menu-line"></i></div>
       </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light">
         <!-- logo-->
         <div class="iq-menu-bt ml-2 mt-3">
          </div>
         <a class="navbar-brand" href="#">
            <img src="../images/logos/logo.png" alt="">
         </a>


         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a href="../home.php?p=1" >Home</a>
                 </li>
                 <li class="nav-item <?php if($_GET["p"] == 2) echo "active"; ?>">
                    <a href="?p=2&c=0" >Networking </a>
                 </li>
               <li class="nav-item">
                  <a href="../conference.php?p=3"> Conference </a>
               </li>
               <li class="nav-item">
                  <a href="#" class="" >Ehxibition</a>
               </li>
     <li class="nav-item">
                  <a href="../contact.php?p=4">Contact</a>
               </li>
               <li class="header-ticket nav-item">
                  <a class="ticket-btn btn" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <?php
                      $name = explode(" ", $_SESSION["name"]);
                      for ($i=0; $i < count($name); $i++)
                      {
                        if($i==0)
                          echo $name[$i];
                        else
                          echo ' ' . $name[$i][0];
                      }
                    ?>
                  </a>
               </li>
            </ul>
         </div>
      </nav>
   </div><!-- container end-->
</header>
