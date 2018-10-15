var modal = document.getElementById('id01');
var modal2 = document.getElementById('idSearch');
var modal3 = document.getElementById('idSMS');
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";}

if (event.target == modal2) {
    modal2.style.display = "none";}

if (event.target == modal3) {
    modal3.style.display = "none";}
}


 /*
  **********************************************************
  * OPAQUE NAVBAR SCRIPT
  **********************************************************
  */

  // Toggle tranparent navbar when the user scrolls the page

  window.scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removeClass('opaque');
    }
});