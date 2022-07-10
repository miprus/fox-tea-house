///////////////Main Navigation Menu//////////////////
function masterNav() {
  var x = document.getElementById("master_nav");
  if (x.className === "main_nav") {
    x.className += " responsive";
  } else {
    x.className = "main_nav";
  }
};