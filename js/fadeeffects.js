function fade(what, duration) {
  what.opct = 100;
  what.ih = window.setInterval(function() {
    what.opct--;
    if(what.opct) {
      what.MozOpacity = what.opct / 100;
      what.KhtmlOpacity = what.opct / 100;
      what.filter = "alpha(opacity=" + what.opct + ")";
      what.opacity = what.opct / 100;
    }else{
      window.clearInterval(what.ih);
      what.style.display = 'none';
    }
  }, 10 * duration);
}