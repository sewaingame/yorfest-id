var activeChat = "";

$( document ).ready(function() {
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;

  if(userdata.photourl.length == 0)
    userdata.photourl = "images/user.png";

  $("#chat_username").html(getShortName2(userdata.name));
  $("#chat_company").html(userdata.company);
  $("#chat_userphotourl").attr('src', userdata.photourl);
  $("#chat_userphotourl").attr('src', userdata.photourl);

  if(nextChatToOpen.length > 0)
  {
    openChat(nextChatToOpen);
    nextChatToOpen="";
  }
});

function openChat(userdata){
  var user = JSON.parse(decrypt(userdata));

  if(activeChat != user.id)
  {
    activeChat = user.id;

    if(user.photourl.length == 0)
      user.photourl = "images/user.png";

    $("#chat_box").css('display','');
    $("#default-block").hide();
    $($("#chat_box").find(".photourl")[0]).attr('src', user.photourl);
    $($("#chat_box").find(".chat_username")[0]).html(user.name);

    $($("#chat_box").find(".chat_detail_photourl")[0]).attr('src', user.photourl);
    $($("#chat_box").find(".chat_detail_name")[0]).html(user.name);
    $($("#chat_box").find(".chat_detail_company")[0]).html(user.company);
    $($("#chat_box").find(".chat_detail_phone")[0]).html(user.phone);
    $($("#chat_box").find(".chat_detail_email")[0]).html(user.email);
    $($("#chat_box").find(".chat_detail_birth")[0]).html(user.birth);
    $($("#chat_box").find(".chat_detail_interest")[0]).html(user.interest);
    $($("#chat_box").find(".chat_detail_cardurl")[0]).hide();

    if(user.cardurl.length > 0)
    {
      $($("#chat_box").find(".chat_detail_cardurl")[0]).css('display', '');
      $($("#chat_box").find(".cardurl")[0]).attr('href', user.cardurl);
    }
  }
}

function loadChatHistory(){

}

function closeChat(){
  activeChat = "";
  $("#chat_box").hide();
}
