
function getCookieByName(name) {
  const cookies = document.cookie.split(';');
  for (let cookie of cookies) {
    cookie = cookie.trim();
    if (cookie.startsWith(name + '=')) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}
// function timeFn() {

//   var time = getCookieByName('loginTime')
//   var x = Number(time)
//   if (x) {

//     var t = x - 1

//     var xs = Number(t)
//     document.cookie = 'loginTime= ' + xs

//     console.log(x);

//   }

// }



// setInterval(() =>
//   timeFn(), 1000);


setInterval(() => {
  d = new Date();
  hr = d.getHours();
  min = d.getMinutes();
  sec = d.getSeconds();
  hr_rotation = 30 * hr + min / 2;
  min_rotation = 6 * min;
  sec_rotation = 6 * sec;


  hour.style.transform = `rotate(${hr_rotation}deg)`;
  minute.style.transform = `rotate(${min_rotation}deg)`;
  second.style.transform = `rotate(${sec_rotation}deg)`;
}, 1000);



