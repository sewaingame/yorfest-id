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

function calculateTime(time){

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

    var result ="Just Now";
    if(d >= 1)
      result = d + " days";
    else if(d == 0 && h != 0)
      result = h + " hours";
    else if(h == 0 && m != 0)
      result = m + " minutes";

    return result;
}
