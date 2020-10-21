$( document ).ready(function()
{
    if(sessionStorage.getItem("api_key") == null)
    {
      alert("Your session has ended!");
      window.location.href = "logout.php";
      return;
    }

    setInterval(function(){

      var api_key = sessionStorage.getItem("api_key");

      var data = {
        cmd:"ck",
        api_key:api_key
      }

      $.ajax({
        type: "POST",
        url: "apicall.php",
        data: data,
        success: onCheckSuccess,
        fail: onCheckFail
      });
    }, 10000);

    function onCheckSuccess(data)
    {
      var response = JSON.parse(data);

      if(response.error == true)
      {
        alert("Your email has login in another browser!");
        window.location.href = "logout.php";
      }
    }

    function onCheckFail(onCheckFail)
    {
      console.log(data);
    }
});
