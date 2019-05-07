function startTime() {
  var today = new Date();
  var h = today.getHours();
  var suffix = 'AM';
  if(h > 12){
  	h-=12;
  	suffix = 'PM';
  }
  var m = today.getMinutes();
  m = checkTime(m);
  document.getElementById('clock').innerHTML =
    h + ":" + m + suffix;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}