$( document ).ready(function() {

  getNotification();

  setInterval(function()
  {
    getNotification();
  }, 5000);
});

function getNotification()
{
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));

  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"gn",
    api_key:api_key
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onNotifyDownloadSuccess,
    fail: onNotifyDownloadFail
  });
}

function onNotifyDownloadSuccess(data)
{
  var response = JSON.parse(data);

  for (var i = 0; i < response.data.length; i++)
  {
    var user = response.data[i].user;
    var userlistid = 'notification_' + response.data[i].id;

    if($("#" + userlistid).length == 0)
    {
      var message = "";

      if(response.data[i].action == "download")
        message = "<b>" + user.name + "</b>" + " dari " + user.company + " telah mengunduh kartu nama anda.";
      if(response.data[i].action == "like")
        message = "<b>" + user.name + "</b>" + " dari " + user.company + " menyukai postingan anda.";
      if(response.data[i].action == "comment")
        message = "<b>" + user.name + "</b>" + " dari " + user.company + " mengomentari postingan anda.";

      var userObject = $("#notification-template").clone().prop('id', userlistid);
      $(userObject.find('.photourl')[0]).attr('src', user.photourl);
      $(userObject.find('.message')[0]).html(message);
      $(userObject.find('.time')[0]).html(calculateTime(response.data[i].time));
      $(userObject).show();

      $("#notification-row").prepend($(userObject));
    }
  }

  getNavBarNotification();
}

function onNotifyDownloadFail(data)
{

}
