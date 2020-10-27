var valid_name = false;
var valid_email = false;
var valid_phone = false;
var valid_birth = false;
var valid_company = false;
var valid_conference = true;
var valid_interest = false;
var valid_interest_other = true;
var valid_password = false;
var valid_cpassword = false;

$("#register").click(function ()
{

  var name = $('#f-name').val();
  var email = $('#f-email').val();
  var phone = $('#f-phone').val();
  var birth = $('#f-birth').val();
  var company = $('#f-company').val();
  var interest = $('#f-interest option:selected').val();
  var conference = $('#f-conference option:selected').val();
  var interest_other = $('#f-interest-other').val();
  var password = $('#f-password').val();
  var cpassword = $('#f-cpassword').val();
  var valid = true;

  if(!valid_name)
  {
    $("#v-name").show();
    valid = false;
  }
  if(!valid_email)
  {
    $("#v-email").show();
    valid = false;
  }
  if(!valid_phone)
  {
    $("#v-phone").show();
    valid = false;
  }
  if(!valid_birth)
  {
    $("#v-birth").show();
    valid = false;
  }
  if(!valid_company)
  {
    $("#v-company").show();
    valid = false;
  }
  if(!valid_interest)
  {
    $("#v-interest-2").show();
    valid = false;
  }
  if($('#f-interest').val() > 0)
  {
    if(!valid_interest_other)
    {
      $("#v-interest").show();
      valid = false;
    }
  }
  if(!valid_password)
  {
    $("#v-password").show();
    valid = false;
  }
  if(!valid_cpassword)
  {
    $("#v-cpassword").show();
    valid = false;
  }

  var valid_conference = true;
  if(!valid_conference)
  {
    $("#v-conference").show();
    valid = false;
  }

  if(valid)
  {

    $("#loading").show();
    $("#v-email-2").hide();

    var name = $('#f-name').val();
    var email = $('#f-email').val();
    var phone = $('#f-phone').val();
    var birth = $('#f-birth').val();
    var company = $('#f-company').val();
    var interest = $('#f-interest option:selected').html();
    var conference = $('#f-conference option:selected').html();
    var interest_other = $('#f-interest-other').val();
    var password = $('#f-password').val();
    var cpassword = $('#f-cpassword').val();
    var valid = true;

    if($('#f-interest').val() == 5)
      interest = interest_other;

    var formdata = new FormData();
    formdata.append("cmd","register");
    formdata.append("name",name);
    formdata.append("email",email);
    formdata.append("phone",phone);
    formdata.append("birth",birth);
    formdata.append("conference",conference);
    formdata.append("company",company);
    formdata.append("interest",interest);
    formdata.append("password",password);

    console.log(conference);

    $(".loading").show();

    var profilepicture = $("#f-profilepicture")[0].files;
    if (profilepicture[0]) {
      formdata.append("profilepicture",profilepicture[0]);
      console.log(profilepicture[0]);
    }

    var bcard = $("#f-bussinesscard")[0].files;
    if (bcard[0]) {
      formdata.append("businesscard",bcard[0]);
      console.log(bcard[0]);
    }

    $.ajax({
      type: "POST",
      url: "apicall.php",
      data: formdata,
      contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
      processData: false, // NEEDED, DON'T OMIT THIS
      success: onRegisterSuccess,
      fail: onRegisterFail
    });
  }
});

function onRegisterSuccess(data)
{
  $(".loading").hide();
  console.log(data);

  var response = JSON.parse(data);

  $("#loading").hide();

  if(response.error == false)
  {
    sendEmail(data);
    // window.location.href = "emailconfirmationsent.php?key=" + response.data.verifiedkey;
  }
  else
  {
    $("#v-email-2").show();
  }

}

function sendEmail(data)
{
  var response = JSON.parse(data);

  var formdata = new FormData();
  formdata.append("cmd","register");
  formdata.append("name",response.data.name);
  formdata.append("email",response.data.email);
  formdata.append("verifiedkey",response.data.phone);

  $.ajax({
    type: "POST",
    url: "sendemail.php",
    data: formdata,
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success: onSendEmailSuccess,
    fail: onSendEmailFail
  });
}

function onSendEmailSuccess(data)
{
  console.log(data);
   //window.location.href = "emailconfirmationsent.php?key=" + response.data.verifiedkey;
}

function onSendEmailFail(data)
{

}

function onRegisterFail(data)
{
  console.log(data);
  $("#loading").hide();
}

$("#f-name").change(function(){
  valid_name = checkMinChar(3, "#f-name", "#v-name");
});

$("#f-email").change(function(){
  valid_email = checkEmailValid("#f-email", "#v-email");
});

$("#f-phone").change(function(){
  valid_phone = checkPhone("#f-phone", "#v-phone");
});

$("#f-birth").change(function(){
  valid_birth = checkMinChar(3, "#f-birth", "#v-birth");
});

$("#f-company").change(function(){
  valid_company = checkMinChar(3, "#f-company", "#v-company");
});

$("#f-password").change(function(){
  valid_password = checkMinChar(4, "#f-password", "#v-password");
  checkConfirmPassword();
});

$("#f-conference").change(function()
{
  valid_conference = $('#f-conference').val() > -1;

  console.log(valid_conference);

  if(!valid_conference) $("#v-conference").show();
  else $("#v-conference").hide();
});

$("#f-cpassword").change(function()
{
  checkConfirmPassword();
});

$("#f-profilepicture").change(function()
{
    var myFile = $(this).prop('files');
    console.log();

    if (myFile[0])
    {
        var reader = new FileReader();

        reader.onload = function (e)
        {
            $('#preview-profilepicture').attr('src', e.target.result);
        }
        reader.readAsDataURL(myFile[0]);
    }
});

$("#f-bussinesscard").change(function()
{
    var myFile = $(this).prop('files');
    console.log();

    if (myFile[0])
    {
        var reader = new FileReader();

        reader.onload = function (e)
        {
            $('#preview-bussinesscard').attr('src', e.target.result);
        }
        reader.readAsDataURL(myFile[0]);
    }
});

$("#f-interest").change(function(){
  console.log($(this).val(),0,$(this).val()<0);
  if($(this).val() < 0)
  {
      valid_interest = false;
      $("#f-interest-other").hide();
      $("#v-interest-2").show();
      return;
  }
  else
  {
    valid_interest = true;
    $("#v-interest").hide();
    $("#v-interest-2").hide();

    if($(this).val() == 5)
    {
      $("#f-interest-other").show();
      valid_interest_other = checkMinChar(4, "#f-interest-other", "#v-interest");
    }
    else {
      $("#f-interest-other").hide();
      valid_interest_other = true;
    }
  }
});

$("#f-interest-other").change(function(){
  valid_interest_other = checkMinChar(4, "#f-interest-other", "#v-interest");
});

function checkMinChar(minchar, elementid, invalidid)
{
  if($(elementid).val().length < minchar)
  {
    $(invalidid).show();
    return false;
  }
  else
  {
    $(invalidid).hide();
    return true;
  }
}

function checkEmailValid(elementid, invalidid)
{
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var result = regex.test($(elementid).val());

  if(!result)
    $(invalidid).show();
  else
    $(invalidid).hide();

  return result;
}

function checkPhone(elementid, invalidid)
{
  var phone =  $(elementid).val();
  var result = false;

  result = phone.startsWith("08");

  if(result)
    result = phone.length >=10;

  if(!result)
    $(invalidid).show();
  else
    $(invalidid).hide();

  return result;
}

function checkConfirmPassword()
{
  if($("#f-cpassword").val() != $("#f-password").val())
    valid_cpassword = false;
  else
    valid_cpassword = true;

  if(valid_cpassword) $("#v-cpassword").hide();
  else $("#v-cpassword").show();
}
