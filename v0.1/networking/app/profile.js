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

  $(".user-name-input").val(userdata.name);
  $(".user-phone-input").val(userdata.phone);
  $(".user-birth-input").val(userdata.birth);
  $(".user-company-input").val(userdata.company);

  $(".user-name-input").hide();
  $(".user-phone-input").hide();
  $(".user-birth-input").hide();
  $(".user-company-input").hide();
});


function editContact()
{
  $(".user-phone-input").show();
  $(".user-birth-input").show();
  $(".user-company-input").show();

  $(".user-phone").hide();
  $(".user-birth").hide();
  $(".user-company").hide();

  $(".edit-contact").hide();
  $(".save-contact").show();
}

function saveContact()
{
  $(".user-phone-input").hide();
  $(".user-birth-input").hide();
  $(".user-company-input").hide();

  $(".user-phone").show();
  $(".user-birth").show();
  $(".user-company").show();

  $(".edit-contact").show();
  $(".save-contact").hide();

  $(".user-phone").html($(".user-phone-input").val());
  $(".user-birth").html(getDate($(".user-birth-input").val()));
  $(".user-company").html($(".user-company-input").val());

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  userdata.data.phone = $(".user-phone-input").val();
  userdata.data.birth = $(".user-birth-input").val();
  userdata.data.company = $(".user-company-input").val();
  var data = JSON.stringify(userdata);
  sessionStorage.setItem("user_data", CryptoJS.AES.encrypt(data,key).toString());

  saveUserData();
}

function editName()
{
  $(".user-name-input").show();
  $(".user-name").hide();

  $(".edit-name").hide();
  $(".save-name").show();
}

function saveName()
{
  $(".user-name-input").hide();
  $(".user-name").show();

  $(".edit-name").show();
  $(".save-name").hide();


  $(".user-name").html($(".user-name-input").val());

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  userdata.data.name = $(".user-name-input").val();
  var data = JSON.stringify(userdata);
  sessionStorage.setItem("user_data", CryptoJS.AES.encrypt(data,key).toString());

  saveUserData();
}

function editProfilePicture()
{

}

function getDate(date)
{
  var months = ["January", "Ferbuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  var dateSplit = date.split("-");

  return dateSplit[2] + ' ' + months[parseInt(dateSplit[1]) - 1] + ' ' + dateSplit[0];
}

function saveUserData()
{
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;

  var api_key = sessionStorage.getItem("api_key");

  var formdata = new FormData();
  formdata.append("cmd","uu");
  formdata.append("api_key",api_key);
  formdata.append("name",userdata.name);
  formdata.append("phone",userdata.phone);
  formdata.append("birth",userdata.birth);
  formdata.append("company",userdata.company);


  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: formdata,
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success: onUpdateUserSuccess,
    fail: onUpdateUserFail
  });
}

function onUpdateUserSuccess(data)
{
  console.log("Update Data", data);
}

function onUpdateUserFail()
{

}

function openProfilePicture()
{
  $(".file-upload").click();
}

function openBusinessCard()
{
  $(".file-upload-businesscard").click();
}

$(".file-upload").change(function()
{
    var myFile = $(this).prop('files');
    console.log("profile");

    if (myFile[0])
    {
        var readerProfile = new FileReader();

        readerProfile.onload = function (e)
        {
            $('.user-photourl').attr('src', e.target.result);
        }
        readerProfile.readAsDataURL(myFile[0]);
    }

    saveProfilePicture();
});

$(".file-upload-businesscard").change(function()
{
    var myFile = $(this).prop('files');
    console.log("businesscard");

    if (myFile[0])
    {
        var readerBusiness = new FileReader();

        readerBusiness.onload = function (e)
        {
            $('.user-card').attr('src', e.target.result);
        }
        readerBusiness.readAsDataURL(myFile[0]);
    }

    $(".edit-card").hide();
    $(".save-card").show();
    $(".cancel-card").show();
});


function cancelBusinessCard()
{
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data"))).data;
  $('.user-card').attr('src', userdata.cardurl);


  $(".edit-card").show();
  $(".save-card").hide();
  $(".cancel-card").hide();
}

function saveProfilePicture()
{
  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  var api_key = sessionStorage.getItem("api_key");
  var formdata = new FormData();
  formdata.append("cmd","upp");
  formdata.append("api_key", api_key);
  formdata.append("email",userdata.email);

  var profilepicture = $(".file-upload")[0].files;
  if (profilepicture[0]) {
    formdata.append("profilepicture",profilepicture[0]);
    console.log(profilepicture[0]);
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: formdata,
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success: onUpdateProfileSuccess,
    fail: onUpdateProfileFail
  });
}

function saveBusinessCard()
{
  console.log("Save Business Card");


  $(".edit-card").show();
  $(".save-card").hide();
  $(".cancel-card").hide();

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  var api_key = sessionStorage.getItem("api_key");
  var formdata = new FormData();
  formdata.append("cmd","ubc");
  formdata.append("api_key",api_key);
  formdata.append("email",userdata.email);
  var bcard = $(".file-upload-businesscard")[0].files;
  if (bcard[0]) {
    formdata.append("businesscard",bcard[0]);
    console.log(bcard[0]);
  }

  $.ajax({
    type: "POST",
    url: "../apicall.php",
    data: formdata,
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success: onUpdateCardSuccess,
    fail: onUpdateCardFail
  });
}

function onUpdateProfileSuccess(data)
{
  console.log(data);
  var response = JSON.parse(data);

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  userdata.data.photourl = response.data.photourl;
  var data = JSON.stringify(userdata);
  sessionStorage.setItem("user_data", CryptoJS.AES.encrypt(data,key).toString());
}

function onUpdateProfileFail(data)
{

}

function onUpdateCardSuccess(data)
{
  console.log(data);
  var response = JSON.parse(data);

  var userdata = JSON.parse(decrypt(sessionStorage.getItem("user_data")));
  userdata.data.cardurl = response.data.cardurl;
  var data = JSON.stringify(userdata);
  sessionStorage.setItem("user_data", CryptoJS.AES.encrypt(data,key).toString());
}

function onUpdateCardFail(data)
{

}
