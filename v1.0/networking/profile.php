<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="iq-card">
            <div class="iq-card-body profile-page p-0">
               <div class="profile-header">
                  <div class="cover-container">
                     <img src="../images/bg/yorfest_bg_profile_fix.jpg" alt="profile-bg" class="rounded img-fluid">
                  </div>
                  <div class="user-detail text-center">
                    <div class="profile-img-edit">
                      <div style="width:200px; height:200px;">
                         <img class="profile-pic user-photourl avatar-150" src="images/user/11.png" alt="profile-pic">
                      </div>
                       <div class="p-image">
                          <i class="ri-pencil-line upload-button" onclick="openProfilePicture()"></i>
                          <input class="file-upload" type="file" accept="image/*"/>
                       </div>
                    </div>
                     <div class="profile-detail text-center">
                        <h3 class="user-name">Bni Cyst</h3>
                        <input type="text" name="" value="085659622363" class="form-control mb-0 user-name-input inputprofile" style="width:auto; position:relative;  margin: auto; text-align:center; background:#fff; font-size:25px;">
                     </div>
                     <div class="text-center pb-n10">
                       <a href="javascript:editName();" style="color:black;" class="edit-name"><i class="ri-edit-line mr-2"></i>Edit</a>
                       <a href="javascript:saveName();" style="color:black; display:none;" class="save-name"><i class="ri-save-line mr-2"></i>Save</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="tab-content">
           <div class="tab-pane fade active show" id="about" role="tabpanel">
              <div class="iq-card">
                 <div class="iq-card-body">
                    <div class="row">
                       <div class="col-md-3">
                          <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                             <li>
                                <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contact and Basic Info</a>
                             </li>
                             <li>
                                <a class="nav-link" data-toggle="pill" href="#family">Business Card</a>
                             </li>
                          </ul>
                       </div>
                       <div class="col-md-9 pl-4">
                          <div class="tab-content">
                             <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                               <div class="row">
                                 <div class="col-lg-6">
                                   <h4>Contact Information</h4>
                                 </div>
                                  <div class="col-lg-6 text-right pr-3">
                                    <a href="javascript:editContact();" class="edit-contact"><i class="ri-edit-line mr-2"></i>Edit</a>
                                    <a href="javascript:saveContact();" class="save-contact" style="display:none;"><i class="ri-save-line mr-2"></i>Save</a>
                                  </div>
                               </div>
                                <hr>
                                <div class="row">
                                   <div class="col-3">
                                      <h6>Email</h6>
                                   </div>
                                   <div class="col-9 row">
                                     <div class="col-lg-8">
                                      <p class="mb-0 user-email">Bnijohn@gmail.com</p>
                                     </div>
                                   </div>
                                   <div class="col-3">
                                      <h6>Phone</h6>
                                   </div>
                                   <div class="col-9 row">
                                     <div class="col-lg-8">
                                      <p class="mb-0 user-phone">085659622363</p>
                                      <input type="number" name="" value="085659622363" class="form-control mb-0 user-phone-input inputprofile">
                                     </div>
                                   </div>
                                   <div class="col-3" style="display:none;">
                                      <h6>Birth</h6>
                                   </div>
                                   <div class="col-9 row" style="display:none;">
                                     <div class="col-lg-8">
                                      <p class="mb-0 user-birth">Bnijohn@gmail.com</p>
                                      <input type="date" name="" value="085659622363" class="form-control mb-0 user-birth-input inputprofile">
                                     </div>
                                   </div>
                                </div>
                                <hr>
                                <h4>Contact Information</h4>
                                <hr>
                                <div class="row">
                                   <div class="col-3">
                                      <h6>Company</h6>
                                   </div>
                                   <div class="col-9 row">
                                     <div class="col-lg-8">
                                      <p class="mb-0 user-company">Bnijohn@gmail.com</p>
                                      <input type="text" name="" value="085659622363" class="form-control mb-0 user-company-input inputprofile">
                                     </div>
                                   </div>
                                   <div class="col-3">
                                      <h6>Interest</h6>
                                   </div>
                                   <div class="col-9 row">
                                     <div class="col-lg-8">
                                      <p class="mb-0 user-interest">085659622363</p>
                                     </div>
                                   </div>
                                   <div class="col-3" style="display:none;">
                                      <h6>Conference As</h6>
                                   </div>
                                   <div class="col-9 row" style="display:none;">
                                     <div class="col-lg-8">
                                      <p class="mb-0 user-conference">Bnijohn@gmail.com</p>
                                     </div>
                                   </div>
                                </div>
                                <hr>
                             </div>
                             <div class="tab-pane fade" id="family" role="tabpanel">
                               <div class="row">
                                 <div class="col-lg-6">
                                   <h4>Business Card</h4>
                                 </div>
                                  <div class="col-lg-6 text-right pr-3">
                                    <a href="javascript:openBusinessCard();" class="edit-card"><i class="ri-edit-line mr-2"></i>Edit</a>
                                    <a href="javascript:saveBusinessCard();" style="display:none;" class="save-card"><i class="ri-save-line mr-2"></i>Save</a>
                                    <a href="javascript:cancelBusinessCard();" style="display:none;" class="cancel-card pl-3">Cancel</a>
                                  </div>
                               </div>
                                <hr>
                                <img src="images/card.png" alt="card" style="width:100%;" class="user-card">
                                <input class="file-upload-businesscard" type="file" accept="image/*"/ style="display:none;">
                                <hr>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" src="app/profile.js"></script>
