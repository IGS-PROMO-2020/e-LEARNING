$(document).ready(function(){

      $(".button-collapse").sideNav();//on lui dit de faire side le menu de navigation qui a la classe .button-collapse
      $("select").material_select();

      $('.slider').slider();//SLIDER HOME
      $(".dropdown-trigger").dropdown();//MENU DEROULANT NAVBAR
      document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.parallax');
          var instances = M.Parallax.init(elems, options);
        });

});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, options);
  });

  // Or with jQuery
