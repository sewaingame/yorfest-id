var valid_name = false;
var valid_email = false;
var valid_phone = false;
var valid_birth = false;
var valid_company = false;
var valid_conference = false;
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
  var conference = $('#f-conference').val();
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
    var conference = $('#f-conference option:selected').val();
    var interest_other = $('#f-interest-other').val();
    var password = $('#f-password').val();
    var cpassword = $('#f-cpassword').val();
    var valid = true;

    if($('#f-interest').val() == 5)
      interest = interest_other;

    var data = {
      cmd:"register",
      name:name,
      email:email,
      phone:phone,
      birth:birth,
      company:company,
      interest:interest,
      password:password
    }

    $.ajax({
      type: "POST",
      url: "apicall.php",
      data: data,
      success: onRegisterSuccess,
      fail: onRegisterFail
    });
  }
});

function onRegisterSuccess(data)
{
  console.log(data);

  var response = JSON.parse(data);

  $("#loading").hide();

  if(response.error == false)
  {
    window.location.href = "emailconfirmationsent.php?key=" + response.data.verifiedkey;
  }
  else
  {
    $("#v-email-2").show();
  }

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

$("#f-conference").change(function(){
  valid_conference = $('#f-conference').val() > -1;
});

$("#f-cpassword").change(function()
{
  checkConfirmPassword();
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
