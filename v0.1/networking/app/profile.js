$( document ).ready(function() {
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;

  $(".user-photourl").attr('src',userdata.photourl);
  $(".user-name").html(userdata.name);
  $(".user-email").html(userdata.email);
  $(".user-birth").html(userdata.birth);
  $(".user-company").html(userdata.company);
  $(".user-interest").html(userdata.interest);
  $(".user-conference").html(userdata.conference);
  $(".user-card").attr('src',userdata.cardurl);
});
