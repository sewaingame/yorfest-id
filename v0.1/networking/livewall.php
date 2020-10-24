<div class="col-lg-2">
</div>
<div class="col-lg-8 row m-0 p-0" id="content">
  <div class="col-sm-12 row" style="width:100%">
    <div class="col-sm-12">
       <div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
          <div class="iq-card-header d-flex justify-content-between">
             <div class="iq-header-title">
                <h4 class="card-title">What's on your mind?</h4>
             </div>
          </div>
          <div class="iq-card-body">
             <div class="d-flex align-items-center">
                <div class="user-img">
                   <img id="post_photourl" src="images/user/1.jpg" alt="userimg" class="avatar-60 rounded-circle">
                </div>
                <!-- <textarea class="form-control rounded" name="name" rows="1" cols="80" placeholder="Write something here..." style="border:none;"></textarea> -->
                <!-- <input id="Input" type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;"> -->
                <span class="textarea" role="textbox" contenteditable id="postmessage"></span>
             </div>
             <hr>
              <button type="submit" class="btn btn-primary d-block mt-3 mb-3 circle" id="newpost" onclick="postMessage()">Send</button>
          </div>
       </div>
    </div>
  </div>
  <div class="col-sm-12 row" id="posts">
  </div>
</div>

<!-- POST TEMPLATE -->
<div class="col-sm-12" id="post" style="display:none;" data="">
   <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
      <div class="iq-card-body">
         <div class="user-post-data">
            <div class="d-flex flex-wrap">
               <div class="media-support-user-img mr-3">
                  <img class="rounded-circle img-fluid post_photourl" src="###PhotoURL###" alt="">
               </div>
               <div class="media-support-info mt-2">
                  <h5 class="mb-0 d-inline-block"><a href="#" class="post_name">###Name###</a></h5>
                  <p class="mb-0 text-primary post_time" data="">###PostTime###</p>
               </div>
            </div>
         </div>
         <div class="mt-3">
            <p class="post_message">###Message###</p>
         </div>
         <div class="comment-area mt-3">
            <div class="d-flex justify-content-between align-items-center">
               <div class="like-block position-relative d-flex align-items-center">
                  <div class="d-flex align-items-center">
                     <div class="like-data">
                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                        <img src="images/icon/01.png" class="img-fluid" alt="">
                        </span>
                     </div>
                     <div class="total-like-block ml-2 mr-3">
                       <div class="dropdown">
                        <span class="dropdown-toggle post_like_count" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" onclick="likePost(this)">
                          ###Like###
                        </span>
                        <div class="dropdown-menu like_userlist" style="display:none;">
                        </div>
                     </div>
                  </div>
                  </div>
                  <div class="total-comment-block">
                    <div class="dropdown">
                    <span class="dropdown-toggle post_comment_count" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                      ###Comment###
                    </span>
                    <div class="dropdown-menu comment_userlist" style="display:none;">
                    </div>
                  </div>
                </div>
               </div>
            </div>
            <hr>
            <ul class="post-comments p-0 m-0 post_comments">
            </ul>
            <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
               <input type="text" class="form-control rounded comment_to_post" placeholder="Write your comment here..." onkeypress="submitComment(this)" data="">
            </form>
         </div>
      </div>
   </div>
</div>

<!-- COMMENT TEMPLATE -->
<li class="mb-2" style="display:none;" id="comment">
   <div class="d-flex flex-wrap">
      <div class="user-img">
         <img src="###PhotoURL###" alt="userimg" class="avatar-35 rounded-circle img-fluid comment_photourl">
      </div>
      <div class="comment-data-block ml-3">
         <h6><a  class="comment_name">###Name###</a></h6>
         <p class="mb-0 comment_message">###Message###</p>
         <span style="color:blue; font-weight:lighter; font-size:10px;" class="comment_time">###Time###</span>
      </div>
   </div>
</li>
<div class="col-lg-2">
</div>
<script type="text/javascript" src="./app/livewall.js"></script>

<a class="dropdown-item" href="#" id="like_comment_userlist" style="display:block"></a>
