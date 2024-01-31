/* subtitle "Web développeuse" animation */
var typed = new Typed ("#auto-type", {
    strings: ["Web développeuse"],
    typeSpeed: 150,
    backSpeed: 150,
    loop: true
})

/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
    var x = document.getElementById("navlinks");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }

/* skills bar animation */
  var offsetTop = $('#skills').offset().top;
	$(window).scroll(function() {
  var height = $(window).height();
  if($(window).scrollTop()+height > offsetTop) {
    jQuery('.skillbar').each(function(){
      jQuery(this).find('.skillbar-bar').animate({
        width:jQuery(this).attr('data-percent')
      },2000);
    });
  }
  });