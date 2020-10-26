var nextChatToOpen = "";

$( document ).ready(function() {

  const params = new URLSearchParams(window.location.search);

  loadPageData(params.get("c"));

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  photourl = userdata.data.photourl;
  if(photourl == 0)
    photourl = 'images/user.png';

  $("#header_userphoto").attr('src', photourl);
  $("#header_username").html(userdata.data.name.split(' ')[0]);

  updateUserList();

  setInterval(function(){
    updateUserList();
  }, 120000);
});

var userlistfilter = "";

function loadPage(link)
{
    var ids = ["button_livewall","button_profile","button_chat","button_notification"];

    for (var i = 0; i < ids.length; i++)
    {
      if(i == link)
      {
        if(!$("#" + ids[i]).hasClass("active")){
           $("#" + ids[i]).addClass("active");
        }
      }
      else
      {
        if($("#" + ids[i]).hasClass("active")){
           $("#" + ids[i]).removeClass("active");
        }
      }
    }
}

function loadPageData(pageid){
  $("#loader").hide();

  if(pageid == "0")
  {
    $("#content").load("livewall.php");
  }
  else if(pageid == "1")
  {
    $("#content").load("profile.php");
  }
  else if(pageid == "2")
  {
    $("#content").load("chat.php");
  }
  else if(pageid == "3")
  {
    $("#content").load("notification.php");
  }

  loadPage(pageid);
}

$("#searchUserList").change(function()
{
  userlistfilter = $(this).val();
  $("#user_list").html("");
  updateUserList();
});

function updateUserList(){
  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"ul",
    api_key:api_key,
    filter:userlistfilter,
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onUpdateUserListSuccess,
    fail: onUpdateUserListFail
  });
}

function onUpdateUserListSuccess(data){
  var response = JSON.parse(data);

  for (var i = 0; i < response.data.length; i++)
  {
      var userlistid = '#userlist_' + response.data[i].id;

      if($(userlistid).length == 0)
        printUser(response.data[i]);
      else
        updateUser(response.data[i]);
  }
}

function onUpdateUserListFail(data){

}

function printUser(user){
  if(user.photourl.length == 0)
    user.photourl = "images/user.png";

  var userlistid = 'userlist_' + user.id;
  var userObject = $("#template_user").clone().prop('id', userlistid);
  $(userObject.find('.user_photourl')[0]).attr('src', user.photourl);
  $(userObject.find('.user_name')[0]).html(getShortName(user.name));
  $(userObject.find('.open_user_chat')[0]).attr('data',  CryptoJS.AES.encrypt(JSON.stringify(user),key).toString());
  $(userObject).css('display', '');

  $(userObject.find('.iq-profile-avatar')[0]).addClass(calculateOnlineStatus(user.last_update));

  if(user.cardurl.length != 0)
  {
    $(userObject.find('.user_card')[0]).attr("url", user.cardurl);
    $(userObject.find('.user_card')[0]).attr("url", user.cardurl);
  }
  else
  {
    $(userObject.find('.user_card')[0]).hide();
  }

  $("#user_list").append($(userObject));
}

function updateUser(user)
{
  if(user.photourl.length == 0)
    user.photourl = "images/user.png";

  var userObject = $('#userlist_' + user.id);
  $(userObject.find('.user_name')[0]).html(getShortName(user.name));
  $(userObject.find('.user_photourl')[0]).attr('src', user.photourl);
  $(userObject.find('.iq-profile-avatar')[0]).removeClass('status-online');
  $(userObject.find('.iq-profile-avatar')[0]).removeClass('status-away');
  $(userObject.find('.iq-profile-avatar')[0]).addClass(calculateOnlineStatus(user.last_update));
}

function calculateOnlineStatus(time)
{
    var result = "status-online";

    if(time != undefined)
    {
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

      if(d == 0 && h != 0)
        result = "";
      else if(h == 0 && m < 2)
        result = "status-away";
    }
    return result;
}



function openUserChat(input){
  nextChatToOpen = $(input).attr("data");
  sessionStorage.setItem("nextChatToOpen", nextChatToOpen);
  //loadPage(2);

  const params = new URLSearchParams(window.location.search);
  if(params.get("c") != 2)
    window.location.href= "?p=2&c=2";
  else
    openChat(nextChatToOpen);
}
