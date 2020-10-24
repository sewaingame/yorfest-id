var key = 'yorfest';
function uuidv4() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(16);
  });
}


function decrypt(message){
  var decrypted = CryptoJS.AES.decrypt(message,key);
  var message = decrypted.toString(CryptoJS.enc.Utf8);
  return message;
}

function getShortName(name){
  var name_split = name.split(' ');
  var name_short = "";
  for (var i = 0; i < name_split.length; i++)
  {
    if(i==0)
      name_short = name_split[i];
    else if(i==1)
      name_short += ' ' + name_split[i];
    else
      name_short += ' ' + name_split[i][0];
  }
  return name_short;
}

function getShortName2(name){
  var name_split = name.split(' ');
  var name_short = "";
  for (var i = 0; i < name_split.length; i++)
  {
    if(i==0)
      name_short = name_split[i];
    else if(i==1)
      name_short += ' ' + name_split[i][0];
    else
      name_short += ' ' + name_split[i][0];
  }
  return name_short;
}
