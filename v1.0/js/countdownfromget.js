$( document ).ready(function() {
  $('#zoommeeting').hide();
  const params = new URLSearchParams(window.location.search);

  $('#meetingname').html(params.get('meetingname'));
  $('#daytitle').html(params.get('day') + ', ' + params.get('date') + '&nbsp&nbsp' + params.get('time') + '-' +  params.get('endTime'));

  $("#zoomapp").attr("href", "https://us02web.zoom.us/j/" + params.get('mn') + "?pwd=" + params.get('pass'));

  if(params.get('started')=='false')
  {
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var fullmonths = ['Januari','Februari','Maret','April','Mai','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    var dates = params.get('date').split('-');
    var time = params.get('time');

    var datestring = months[dates[1] - 1] + ' ' + dates[0] + ', ' + dates[2] + ' ' + time + ':00';

    console.log(datestring);
    console.log(dates);

    var countDownDate = new Date(datestring).getTime();

    $("#schedule").html( params.get('day') + ', ' + dates[0] + ' ' + fullmonths[dates[1] - 1] + ' ' + dates[2] + ' ' + params.get('time') + ' WIB');
    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      $('#day').html(days);
      $('#hour').html(hours);
      $('#min').html(minutes);
      $('#sec').html(seconds);

      if (seconds < 0) {

        $('#day').html(0);
        $('#hour').html(0);
        $('#min').html(0);
        $('#sec').html(0);

        clearInterval(x);
        params.set('started','true');

        window.open('zoom.php?g=' + params.get('g'),"_self");
      }
    }, 1000);

    }
    else
    {

      $('#zoommeeting').show();
      $('#zoomnotstarted').hide();
    }

});
