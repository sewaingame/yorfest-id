var last_post_id = 0;
var first_post_id = 0;
var is_load_old_post = false;
var end_post = false;
var post_check_id = 0;

$( document ).ready(function() {

  loadNewPost();

  setInterval(function(){
    loadNewPost();
  }, 20000);

  setInterval(function(){
    updatePostTime();
  }, 60000);

  updatePostData();

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  photourl = userdata.data.photourl;
  if(photourl == 0)
    photourl = 'images/user.png';

  $("#post_photourl").attr('src', photourl);
});

function postMessage(){
  var message = $("#postmessage").html();
  if(message.length > 0)
  {
    var data = {
      cmd:"newpost",
      api_key:sessionStorage.getItem("api_key"),
      message:CryptoJS.AES.encrypt(message,key).toString()
    }

    $.ajax({
      type: "POST",
      url: "../apicall.php",
      data: data,
      success: onPostMessageSuccess,
      fail: onPostMessageFail
    });
  }
}

function onPostMessageSuccess(data)
{
  loadNewPost();
  $("#postmessage").html("");
}

function onPostMessageFail(data)
{
  console.log(data);
}

function loadNewPost()
{
  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"lw",
    api_key:api_key,
    last_post_id:last_post_id,
    first_post_id:first_post_id,
    methode:"new"
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onLoadNewPostSuccess,
    fail: onLoadNewPostFail
  });
}

function onLoadNewPostSuccess(data){

  var response = JSON.parse(data);

  if(last_post_id == 0 && response.data.length > 0)
    last_post_id = response.data[0].id;



  for (var i = response.data.length-1; i >= 0; i--) {
    if(i==0 && response.data[i].id > last_post_id)
      last_post_id = response.data[i].id;

    if(first_post_id == 0 && i==response.data.length-1)
      first_post_id = response.data[i].id;

    response.data[i].message = decrypt(response.data[i].message);

    printNewPost(response.data[i]);
  }

}

function onLoadNewPostFail(data) {
  console.log(data);
}

function printNewPost(post, isold) {
  // console.log(post);

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;
  var postObject = $("#post").clone().prop('id', 'post_' + post.id);

  var photourl = post.user.photourl;

  if(photourl.length < 5)
    photourl = "images/user.png";

  $(postObject).attr('data', post.updated);
  $(postObject).attr('data-id', post.id);
  $(postObject.find('.post_photourl')[0]).attr('src', photourl);
  $(postObject.find('.post_name')[0]).html(post.user.name);
  $(postObject.find('.post_time')[0]).html(calculateTime(post.time));
  $(postObject.find('.post_time')[0]).attr('data', post.time);
  $(postObject.find('.post_message')[0]).html(post.message);
  $(postObject.find('.post_like_count')[0]).html(post.like.length + " Likes");
  $(postObject.find('.post_like_count')[0]).attr('data', post.id);
  $(postObject.find('.post_comment_count')[0]).html(post.comment.length + " Comment");
  $(postObject.find('.comment_to_post')[0]).attr('data', post.id);

  for (var i = 0; i < post.comment.length; i++) {
    var commentObject = $("#comment").clone().prop('id', 'comment_' + post.id + '_' + post.comment[i].id);

    $(commentObject.find('.comment_photourl')[0]).attr('src', photourl);
    $(commentObject.find('.comment_name')[0]).html(post.comment[i].user.name);
    $(commentObject.find('.comment_time')[0]).html(calculateTime(post.comment[i].time));
    $(commentObject.find('.comment_time')[0]).attr('data', post.comment[i].time);
    $(commentObject.find('.comment_message')[0]).html(decrypt(post.comment[i].message));
    commentObject.show();

    $(postObject.find('.post_comments')[0]).append($(commentObject));
    // console.log($(postObject.find('#comment_' + post.id + '_' + post.comment[i].id)).length);
    // post.comment[i]
  }

  var is_update_like_list = $(postObject.find('.like_userlist')[0]).children().length != post.like.length;

  if(post.like.length == 0)
    $(postObject.find('.like_userlist')[0]).hide();
  else
    $(postObject.find('.like_userlist')[0]).show();

  if(is_update_like_list)
  {
    $(postObject.find('.like_userlist')[0]).html("");
  }

  var is_me_like = false;
  for (var i = 0; i < post.like.length; i++)
  {
    if(post.like[i].user.email == userdata.email)
      is_me_like = true;

    var newName = $('#like_comment_userlist').clone().prop('id', 'like_' + post.like[i].id).html(post.like[i].user.name);
    $(newName).show();
    $(postObject.find('.like_userlist')[0]).append(newName);
  }

  // console.log(is_me_like);

  if(is_me_like)
    $(postObject.find('.post_like_count')[0]).css('color', '#77bcff');
  else
    $(postObject.find('.post_like_count')[0]).css('color', '#a0a0a1');
  // console.log("update");

  if(!isold)
    $("#posts").prepend(postObject);
  else
    $("#posts").append(postObject);

  postObject.show();
}

function updatePost(post)
{
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;
  var postObject = $('#post_' + post.id);

  var photourl = post.user.photourl;

  if(photourl.length < 5)
    photourl = "images/user.png";

  $(postObject).attr('data', post.updated);
  $(postObject.find('.post_photourl')[0]).attr('src', photourl);
  $(postObject.find('.post_name')[0]).html(post.user.name);
  $(postObject.find('.post_time')[0]).html(calculateTime(post.time));
  $(postObject.find('.post_time')[0]).attr('data', post.time);
  $(postObject.find('.post_message')[0]).html(post.message);
  $(postObject.find('.post_like_count')[0]).html(post.like.length + " Likes");
  $(postObject.find('.post_like_count')[0]).attr('data', post.id);
  $(postObject.find('.post_comment_count')[0]).html(post.comment.length + " Comment");
  $(postObject.find('.comment_to_post')[0]).attr('data', post.id);

  for (var i = 0; i < post.comment.length; i++) {
    if($(postObject.find('#comment_' + post.id + '_' + post.comment[i].id)).length == 0)
    {
      var commentObject = $("#comment").clone().prop('id', 'comment_' + post.id + '_' + post.comment[i].id);

      $(commentObject.find('.comment_photourl')[0]).attr('src', photourl);
      $(commentObject.find('.comment_name')[0]).html(post.comment[i].user.name);
      $(commentObject.find('.comment_time')[0]).html(calculateTime(post.comment[i].time));
      $(commentObject.find('.comment_time')[0]).attr('data', post.comment[i].time);
      $(commentObject.find('.comment_message')[0]).html(decrypt(post.comment[i].message));
      commentObject.show();

      $(postObject.find('.post_comments')[0]).append($(commentObject));
    }
  }

  var is_update_like_list = $(postObject.find('.like_userlist')[0]).children().length != post.like.length;

  if(post.like.length == 0)
    $(postObject.find('.like_userlist')[0]).hide();
  else
    $(postObject.find('.like_userlist')[0]).show();

  if(is_update_like_list)
  {
    $(postObject.find('.like_userlist')[0]).html("");
  }

  var is_me_like = false;
  for (var i = 0; i < post.like.length; i++)
  {
    if(post.like[i].user.email == userdata.email)
      is_me_like = true;

    var newid = '#like_' + post.like[i].id;
    if($(newid).length == 0)
    {
      var newName = $('#like_comment_userlist').clone().prop('id', newid).html(post.like[i].user.name);
      $(postObject.find('.like_userlist')[0]).append(newName);
    }
  }

  // console.log(is_me_like);

  if(is_me_like)
    $(postObject.find('.post_like_count')[0]).css('color', '#77bcff');
  else
    $(postObject.find('.post_like_count')[0]).css('color', '#a0a0a1');
  // console.log("update");
}

function calculateTime(time){

    var t = time.split(/[- :]/);
    var postDate = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
    var currentDate = new Date(Date.now());
    var diffInMilliSeconds = currentDate-postDate;

    var cd = 24 * 60 * 60 * 1000,
        ch = 60 * 60 * 1000,
        d = Math.floor(diffInMilliSeconds / cd),
        h = Math.floor( (diffInMilliSeconds - d * cd) / ch),
        m = Math.round( (diffInMilliSeconds - d * cd - h * ch) / 60000),
        pad = function(n){ return n < 10 ? '0' + n : n; };
    if( m === 60 ){
    h++;
    m = 0;
    }
    if( h === 24 ){
    d++;
    h = 0;
    }

    var result = d + " days";
    if(d == 0 && h != 0)
      result = h + " hours";
    else if(h == 0 && m != 0)
      result = m + " minutes";
    else
      result = "Just Now";

    return result;
}

function updatePostTime(){
  $("#posts").children().each(function () {
    var time = $($(this).find('.post_time')[0]).attr('data');
    $($(this).find('.post_time')[0]).html(calculateTime(time));

    $($(this).find('.post_comments')[0]).children().each(function () {
      var time2 = $($(this).find('.comment_time')[0]).attr('data');
      $($(this).find('.comment_time')[0]).html(calculateTime(time2));
    });
  });
}



$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
      if(!end_post)
       loadOldPost();
   }
   else
   {
     end_post = false;
   }
});

function loadOldPost()
{
  if(!is_load_old_post)
  {
    $("#loader").show();

    is_load_old_post = true;

    post_check_id = 0;

    var api_key = sessionStorage.getItem("api_key");

    var data = {
      cmd:"lw",
      api_key:api_key,
      last_post_id:last_post_id,
      first_post_id:first_post_id,
      methode:"old"
    }

    $.ajax({
      type: "POST",
      url: "../apicall.php",
      data: data,
      success: onLoadOldPostSuccess,
      fail: onLoadOldPostFail
    });
  }
}

function onLoadOldPostSuccess(data){

  setTimeout(function() {
    $("#loader").hide();

    var response = JSON.parse(data);

    is_load_old_post = false;

    if(response.data.length == 0)
    {
      end_post = true;
    }
    if(last_post_id == 0 && response.data.length > 0)
      last_post_id = response.data[0].id;

    for (var i = 0; i < response.data.length; i++) {
      if(i==response.data.length-1)
        first_post_id = response.data[i].id;

      response.data[i].message = decrypt(response.data[i].message);

      printNewPost(response.data[i], true);
    }
  }, 1000);
}

function onLoadOldPostFail(data) {
  console.log(data);
}

function submitComment(input)
{
  var x = event.which || event.keyCode;

  var message = $(input).val();

  if(x == 13 && message.length > 0)
  {

    var api_key = sessionStorage.getItem("api_key");

    var data = {
      cmd:"cm",
      api_key:api_key,
      id:$(input).attr("data"),
      message:CryptoJS.AES.encrypt(message,key).toString()
    }

    $(input).val("");

    $.ajax({
      type: "POST",
      url: "../apicall.php",
      data: data,
      success: onCommentSuccess,
      fail: onCommentFail
    });
  }
}

function onCommentSuccess(data){
  var response = JSON.parse(data);
  checkCommentAndLike(response.data.id);
}

function onCommentFail(data){

}

function checkCommentAndLike(postid){
  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"cc",
    api_key:api_key,
    id:postid
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onCheckCommentAndLikeSuccess,
    fail: onCheckCommentAndLikeFail
  });
}

function onCheckCommentAndLikeSuccess(data){
  var response = JSON.parse(data);
  response.data[0].message = decrypt(response.data[0].message);
  updatePost(response.data[0]);
}

function onCheckCommentAndLikeFail(data){

}

function updatePostData(){
  postLength = $("#posts").children().length;

  // console.log(postLength, post_check_id);

  if(post_check_id >= postLength)
    post_check_id = 0;

  if(post_check_id < postLength)
  {
    var time = $($($("#posts").children()[post_check_id]).find('.post_time')[0]).attr('data');
    var id = $($("#posts").children()[post_check_id]).attr('data-id');

    var api_key = sessionStorage.getItem("api_key");

    var data = {
      cmd:"cp",
      api_key:api_key,
      time:time,
      id:id
    }

    $.ajax({
      type: "POST",
      url: "../apicall.php",
      data: data,
      success: onUpdatePostSuccess,
      fail: onUpdatePostFail
    });

    post_check_id++;
  }
  else {
    setTimeout(function()
    {
      updatePostData();
    }, 3000);
  }
}

function onUpdatePostSuccess(data){
  // console.log(data);
  var response = JSON.parse(data);

  if(response.error == false)
  {
    checkCommentAndLike(response.data.id);
  }

  setTimeout(function()
  {
    updatePostData();
  }, 1000);
}

function onUpdatePostFail(data){
  updatePostData();
}

function likePost(input){
  // console.log($(input).attr("data"));

  var postid = $(input).attr("data");
  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"lc",
    api_key:api_key,
    id:postid
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onLikeSuccess,
    fail: onLikeFail
  });
}

function onLikeSuccess(data){
  var response = JSON.parse(data);
  checkCommentAndLike(response.data.id);
}

function onLikeFail(data){
  console.log(data);
}
