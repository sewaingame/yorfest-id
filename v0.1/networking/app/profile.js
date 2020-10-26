$( document ).ready(function() {
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;

  $(".user-photourl").attr('src',userdata.photourl);
  $(".user-name").html(userdata.name);
  $(".user-email").html(userdata.email);
  $(".user-phone").html(userdata.phone);
  $(".user-birth").html(getDate(userdata.birth));
  $(".user-company").html(userdata.company);
  $(".user-interest").html(userdata.interest);
  $(".user-conference").html(userdata.conference);
  $(".user-card").attr('src',userdata.cardurl);
});


function getDate(date)
{
  var months = ["January", "Ferbuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  var dateSplit = date.split("-");

  return dateSplit[2] + ' ' + months[parseInt(dateSplit[1]) - 1] + ' ' + dateSplit[0];
}
