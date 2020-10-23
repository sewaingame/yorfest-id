$("#login").click(function(){
  var email = $("#f-email").val();
  var password = $("#f-password").val();

  $("#v-login").hide();
  $("#loading").show();

  var data = {
    cmd:"login",
    email:email,
    password:password
  }

  console.log(data);

  $.ajax({
    type: "POST",
    url: "apicall.php",
    data: data,
    success: onLoginSuccess,
    fail: onLoginFail
  });
});

function onLoginSuccess(data)
{
  console.log(data);

  var response = JSON.parse(data);

  $("#loading").hide();

  if(response.error == false)
  {
    console.log(CryptoJS.AES.encrypt(data,key).toString());
    sessionStorage.setItem("api_key", response.data.api_key);
    sessionStorage.setItem("user_data", CryptoJS.AES.encrypt(data,key).toString());

    window.location.href = "index.php";
  }
  else
  {
    $("#v-login-m").html(response.message);
    $("#v-login").show();
  }

}

function onLoginFail(data)
{
  console.log(data);
  $("#loading").hide();
}
