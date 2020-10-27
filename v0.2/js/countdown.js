$( document ).ready(function() {
  var countDownDate = new Date("Oct 28, 2020 10:15:00").getTime();

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

    if (distance < 0) {
      $('#day').html(0);
      $('#hour').html(0);
      $('#min').html(0);
      $('#sec').html(0);
    }
  }, 1000);
});
