
<?php
  include "checksession.php";
?>


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
                  <a href="exhibition.php" class="" >Ehxibition</a>
               </li>
              <li class="nav-item <?php if($_GET["p"] == 5) echo "active"; ?>">
                  <a href="contact.php?p=5">Contact</a>
               </li>
               <li class="nav-item dropdown header-ticket nav-item">
						   <a href="#" class="ticket-btn btn" data-toggle="dropdown" >
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
                  &nbsp;<n class="nav-notification-number-1">(2)</n>&nbsp;
                   <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                   <li><a href="networking/?p=2&c=1"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                   <li><a href="networking/?p=2&c=2"><i class="fa fa-comment" aria-hidden="true"></i> Chat <n class="nav-notification-number-2">(2)</n></a></li>
                   <li><a href="networking/?p=2&c=3"><i class="fa fa-bell" aria-hidden="true"></i> Notification <n class="nav-notification-number-3">(2)</n></a></li>
		               <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
         </div>
      </nav>
   </div><!-- container end-->
</header>
