(function () {
  var testTool = window.testTool;
  // if (testTool.isMobileDevice()) {
  //   vConsole = new VConsole();
  // }
  console.log("checkSystemRequirements");
  console.log(JSON.stringify(ZoomMtg.checkSystemRequirements()));

  const params = new URLSearchParams(window.location.search);
  console.log(params.get('g'));

  var data = {
    cmd:"zoomlink",
    group:params.get('g'),
    api_key:sessionStorage.getItem("api_key")
  }

  $.ajax({
    type: "POST",
    url: "data-zoom.php",
    data: data,
    success: onSuccess,
    fail: onFail
  });


  function onSuccess(data)
  {
    console.log(data);

    var response = JSON.parse(data);

    console.log(response);

    if(response.error == false)
    {
      ZoomMtg.preLoadWasm();

      var API_KEY = "YjvNrkU7Q3O64sGTqtYIvw";
      var API_SECRET = "enjNPwghXNKlLpojlNytaAeCImVwrKNQJibD";

      var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));

      var meetingConfig = testTool.getMeetingConfig(response.data.meetingid, userdata.data.name, response.data.password, userdata.data.email);

      console.log(meetingConfig);

      if (!meetingConfig.mn || !meetingConfig.name) {
        alert("Meeting number or username is empty");
        return false;
      }

      testTool.setCookie("meeting_number", meetingConfig.mn);
      testTool.setCookie("meeting_pwd", meetingConfig.pwd);

      console.log(meetingConfig);

      var signature = ZoomMtg.generateSignature({
        meetingNumber: meetingConfig.mn,
        apiKey: API_KEY,
        apiSecret: API_SECRET,
        role: meetingConfig.role,
        success: function (res) {
          console.log(res.result);
          meetingConfig.signature = res.result;
          meetingConfig.apiKey = API_KEY;
          var joinUrl = "./zoommeeting.php?" + testTool.serialize(meetingConfig) + "&started=" + response.data.isStarted+ "&day=" + response.data.day+ "&date=" + response.data.date+ "&time=" + response.data.time + "&meetingname=" + response.data.name + "&g=" + params.get('g') + "&endTime=" + response.data.endTime;
          console.log(joinUrl);

          window.open(joinUrl,"_self");
        },
      });
    }
    else
    {
      alert('Anda tidak memiliki akses untuk masuk ke link zoom ini!')
      onFail();
    }
  }

  function onFail()
  {
    window.history.go(-1);
    return false;
  }

  function uuidv4() {
    return 'xxxxxxxxy'.replace(/[xy]/g, function(c) {
      var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
      return v.toString(16);
    });
  }
})();
