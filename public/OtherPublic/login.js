var modal = document.getElementById('id01');
var modal2 = document.getElementById('idSearch');
window.onclick = function(event) {
if (event.target == modal || event.target == modal2) {
    modal.style.display = "none";
    modal2.style.display = "none";}
}


 /*
  **********************************************************
  * OPAQUE NAVBAR SCRIPT
  **********************************************************
  */

  // Toggle tranparent navbar when the user scrolls the page

  $(window).scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removeClass('opaque');
    }
});