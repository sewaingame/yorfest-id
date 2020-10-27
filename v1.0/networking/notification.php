<div class="container">
  <div class="row">
     <div class="col-sm-12">
        <div class="iq-card-header d-flex justify-content-between">
           <div class="iq-header-title">
              <h4 class="card-title">Notification</h4>
           </div>
        </div>
     </div>
  </div>
   <div class="row" id="notification-row">

   </div>
</div>

<script type="text/javascript" src="app/notification.js?v=<?php echo uniqid(); ?>"></script>

<div class="col-sm-12" id="notification-template" style="display:none;">
  <div class="iq-card">
     <div class="iq-card-body">
        <ul class="notification-list m-0 p-0">
           <li class="d-flex align-items-center">
              <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40 photourl"></div>
              <div class="media-support-info ml-3">
                 <h6 class="message">Mardika Reza downloaded your business card</h6>
                 <p class="mb-0 time" style="color:grey; font-size:10px;">30  ago</p>
              </div>
           </li>
        </ul>
     </div>
  </div>
</div>
