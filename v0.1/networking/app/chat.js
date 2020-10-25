var activeChat = "";
var activeChatInterval;
var currentChatID = "";
var lastChatID = "";
var resendMessage = false;
var minLoadChatCounter = 999999999;
var maxLoadChatCounter = 0;
$( document ).ready(function() {
  //console.log("Chat Loaded");
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;

  if(userdata.photourl.length == 0)
    userdata.photourl = "images/user.png";

  $("#chat_username").html(getShortName2(userdata.name));
  $("#chat_company").html(userdata.company);
  $("#chat_userphotourl").attr('src', userdata.photourl);
  $("#chat_userphotourl").attr('src', userdata.photourl);


  nextChatToOpen = sessionStorage.getItem("nextChatToOpen");
  if(nextChatToOpen.length > 0)
  {
    openChat(nextChatToOpen);
    nextChatToOpen="";
  }

  newUserChatList();

  setInterval(function()
  {
    newUserChatList();
  },1000);
});

function newUserChatList()
{
  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"cl",
    api_key:api_key,
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onLoadUserChatListSuccess,
    fail: onLoadUserChatListFail
  });
}

function onLoadUserChatListSuccess(data)
{
  var response = JSON.parse(data);

  for (var i = 0; i < response.data.length; i++)
  {
    // console.log(response.data[i]);
    printUserChatList(response.data[i].participant, response.data[i].totalchat, response.data[i].time);
  }
}

function printUserChatList(user, total, time)
{
  var id = "userchatlist_" + user.id;
  if($("#" + id).length == 0)
  {
    createChatUserList(user, total, time);
  }
  else
  {
    updateChatUserList(user, total, time);
  }

}

function createChatUserList(user, total, time)
{
  var id = "userchatlist_" + user.id;
  if(user.photourl == "")
    user.photourl = "images/user.png";

  var userListObject = $("#chat_userlist_template").clone().prop('id', id);
  $(userListObject).attr("data", CryptoJS.AES.encrypt(JSON.stringify(user),key).toString());
  $(userListObject).attr("data-online", isUserOnline(user.last_update));
  $(userListObject.find('.photourl')[0]).attr('src', user.photourl);
  $(userListObject.find('.chat_username')[0]).html(getShortName2(user.name));
  $(userListObject.find('.chat_company')[0]).html(getShortName2(user.company));
  $(userListObject.find('.unread')[0]).html(total);
  $(userListObject.find('.time')[0]).html(calculateTime(time));
  $(userListObject).show();
  if(total == 0)
  {
    $(userListObject.find('.totalbase')).hide();
  }

  $("#chat_userlist").append($(userListObject));

  if(isUserOnline(user.last_update))
  {
    $(userListObject.find('.status-offline')).hide();
    $(userListObject.find('.status-online')).show();
  }
  else
  {
    $(userListObject.find('.status-offline')).show();
    $(userListObject.find('.status-online')).hide();
  }
}

function updateChatUserList(user, total, time)
{
  var id = "userchatlist_" + user.id;

  var userListObject = $("#" + id);

  // console.log(total, $($(userListObject).find('.unread')[0]).html(), total > $($(userListObject).find('.unread')[0]).html());
  if(total > $($(userListObject).find('.unread')[0]).html())
    $(userListObject).prependTo($("#chat_userlist"));

    $(userListObject).attr("data-online", isUserOnline(user.last_update));
  $($(userListObject).find('.unread')[0]).html(total);
  $($(userListObject).find('.time')[0]).html(calculateTime(time));

  if(total == 0)
  {
    $($(userListObject).find('.totalbase')).hide();
  }
  else
  {
    $($(userListObject).find('.totalbase')).show();
  }

  // console.log(user.name, time, isUserOnline(time));

  if(isUserOnline(user.last_update))
  {
    $(userListObject.find('.status-offline')).hide();
    $(userListObject.find('.status-online')).show();
  }
  else
  {
    $(userListObject.find('.status-offline')).show();
    $(userListObject.find('.status-online')).hide();
  }
}

function onLoadUserChatListFail(data)
{

}

function openChat(userdata)
{
  var user = JSON.parse(decrypt(userdata));

  if(activeChat != user.id)
  {
    minLoadChatCounter = 999999999;
    maxLoadChatCounter = 0;

    $("#chat_scroll").html("");

    if(activeChatInterval != undefined)
      clearInterval(activeChatInterval);

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

    loadChatHistory();

    activeChatInterval = setInterval(function(){
        updateActiveChat();
    },1000);
  }
}

function closeChat(){
  activeChat = "";
  $("#chat_box").hide();
  $("#default-block").show();
  sessionStorage.setItem("nextChatToOpen", "");
  clearInterval(activeChatInterval);
}

function updateActiveChat()
{
  nextChatToOpen = sessionStorage.getItem("nextChatToOpen");

  var user = JSON.parse(decrypt(nextChatToOpen));

  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"ch",
    api_key:api_key,
    to:user.id,
    maxCounter:maxLoadChatCounter,
    minCounter:minLoadChatCounter,
    time:"new"
  }

  // console.log("maxCounter", maxLoadChatCounter);

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onLoadNewChatHistorySuccess,
    fail: onLoadNewChatHistoryFail
  });
}

function onLoadNewChatHistorySuccess(data)
{
  var response = JSON.parse(data);
  // console.log(response);
  nextChatToOpen = sessionStorage.getItem("nextChatToOpen");

  var user = JSON.parse(decrypt(nextChatToOpen));

  if(response.data.chats != undefined)
  {
    for (var i = response.data.chats.length - 1; i >= 0; i--)
    {
      if(i==0)
          maxLoadChatCounter = response.data.chats[i].counter;

      var me = response.data.chats[i].participantid == response.data.myid;
      var userData = response.data.chats[i].participantid == me.id ? me : user;

      printChat(me, userData, response.data.chats[i].id, response.data.chats[i].message, getHourAndMinutes(response.data.chats[i].time))
    }
  }

}

function onLoadNewChatHistoryFail(data)
{

}

function sendChatInput(input)
{
  var x = event.which || event.keyCode;

  if(x == 13)
  {
    sendChat();
  }
}

function sendChat()
{
  nextChatToOpen = sessionStorage.getItem("nextChatToOpen");

  var user = JSON.parse(decrypt(nextChatToOpen));

  var message = $("#chatMessage").val();

  if(message.replaceAll(" ", "").length > 0)
  {
    var api_key = sessionStorage.getItem("api_key");

    if(!resendMessage)
      lastChatID = uuidv4();

    message = CryptoJS.AES.encrypt(message,key).toString();

    printChat(true, user, lastChatID, message, "Sending");

    var data = {
      cmd:"sc",
      api_key:api_key,
      to:user.id,
      chatid:currentChatID,
      id:lastChatID,
      message:message
    }

    // console.log(data);

    $.ajax({
      type: "POST",
      url: "../apicall.php",
      data: data,
      success: onSendChatSuccess,
      fail: onSendChatFail
    });
  }

  $("#chatMessage").val("");
  resendMessage = false;
}

function printChat(me, user, chatid, message, time)
{
  if($("#" + chatid).length == 0)
  {
    var postbase = me ? "#chat_usertemplate" : "#chat_replytemplate";

    var messageObject = $(postbase).clone().prop('id', chatid);
    $(messageObject.find('.photourl')[0]).attr('src', user.photourl);
    $(messageObject.find('.chat-message-text')[0]).html(decrypt(message));
    $(messageObject.find('.chat-time')[0]).html(time);
    $(messageObject).show();

    $("#chat_scroll").append(messageObject);

    $("#chat_scroll").scrollTop($("#chat_scroll")[0].scrollHeight);

  }

  if(!me)
  {
    readChat(chatid);
  }
}

function readChat(chatid)
{
  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"mr",
    api_key:api_key,
    id:chatid
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onReadMessageSuccess,
    fail: onReadMessageFail
  });
}

function onReadMessageSuccess(data)
{
}

function onReadMessageFail()
{

}

function updateChat(id, time)
{
  var messageObject = $("#" + id);
  $(messageObject.find('.chat-time')[0]).html(time);
}

function onSendChatSuccess(data)
{
  // console.log(data);
  var response = JSON.parse(data);
  // console.log(response);
  if(!data.error)
  {

    updateChat(response.data.id, getHourAndMinutes(response.data.time));
  }
  else
    updateChat(response.data.id, '<a class="resend-chat" data="'+response.data.message+'" data-id="'+response.data.id+'" href="#" onclick="javascript:resendChat(this)" style="color:red;">Resend</a>');
}

function getHourAndMinutes(time)
{
  var timeSplit = time.split(" ");
  var times = timeSplit[1].split(":");
  return times[0] + ":" + times[1];
}

function onSendChatFail(data)
{

}

function resendChat(input)
{
  lastChatID = $(input).attr("data-id");
  var message = decrypt($(input).attr("data"));;
  $("#chatMessage").val(message);
  $("#" + lastChatID).remove();
  sendChat();
}

function loadChatHistory()
{
  nextChatToOpen = sessionStorage.getItem("nextChatToOpen");

  var user = JSON.parse(decrypt(nextChatToOpen));

  var api_key = sessionStorage.getItem("api_key");

  var data = {
    cmd:"ch",
    api_key:api_key,
    to:user.id,
    maxCounter:maxLoadChatCounter,
    minCounter:minLoadChatCounter,
    time:"old"
  }

  // console.log(data);

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: data,
    success: onLoadChatHistorySuccess,
    fail: onLoadChatHistoryFail
  });
}

function onLoadChatHistorySuccess(data)
{
  var response = JSON.parse(data);

  nextChatToOpen = sessionStorage.getItem("nextChatToOpen");

  var user = JSON.parse(decrypt(nextChatToOpen));

  if(response.data.chats == undefined)
    return;

  for (var i = response.data.chats.length - 1; i >= 0; i--)
  {
    if(i == response.data.chats.length - 1)
      minLoadChatCounter = response.data.chats[i].counter;

    if(i==0)
        maxLoadChatCounter = response.data.chats[i].counter;

    var me = response.data.chats[i].participantid == response.data.myid;
    var userData = response.data.chats[i].participantid == me.id ? me : user;

    printChat(me, userData, response.data.chats[i].id, response.data.chats[i].message, getHourAndMinutes(response.data.chats[i].time))
  }

  // console.log("MIN", minLoadChatCounter, "MAX", maxLoadChatCounter);
}

function onLoadChatHistoryFail(data)
{

}

function openUserChat(input){
  nextChatToOpen = $(input).attr("data");
  // console.log(nextChatToOpen);
  sessionStorage.setItem("nextChatToOpen", nextChatToOpen);
  openChat(nextChatToOpen);
}

String.prototype.replaceAll = function(str1, str2, ignore)
{
    return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
}

function isUserOnline(time)
{
    var result = false;

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

      if(d != 0 || h != 0)
        result = false;
      else if(m < 2)
        result = true;
    }

    return result;
}
