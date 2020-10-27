$( document ).ready(function()
{
  console.log("notification counter load");
  $(".nav-notification-number-1").hide();
  $(".nav-notification-number-2").hide();
  $(".nav-notification-number-3").hide();

  getNavBarNotification();

  setInterval(function()
  {
    getNavBarNotification();
  }, 2000);
});

function getNavBarNotification()
{
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));

  var api_key = sessionStorage.getItem("api_key");
  
  var data = {
    cmd:"an",
    api_key:api_key
  }

  $.ajax({
    type: "POST",
    url: "apicall.php",
    data: data,
    success: onNotifCountSuccess,
    fail: onNotifCountFail
  });
}

function onNotifCountSuccess(data)
{
  var response = JSON.parse(data);

  var chat = response.data.chat;
  var notification = response.data.notification;
  var total = parseInt(chat) + parseInt(notification);

  $(".nav-notification-number-1").html("("+total+")" );
  $(".nav-notification-number-2").html("("+chat+")");
  $(".nav-notification-number-3").html("("+notification+")");

  if(total > 0) $(".nav-notification-number-1").show();
  else $(".nav-notification-number-1").hide();

  if(chat > 0) $(".nav-notification-number-2").show();
  else $(".nav-notification-number-2").hide();

  if(notification > 0) $(".nav-notification-number-3").show();
  else $(".nav-notification-number-3").hide();
}

function onNotifCountFail(data)
{
  console.log(data);
}
