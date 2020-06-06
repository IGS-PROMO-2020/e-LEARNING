$(document).ready(function(){

      $(".button-collapse").sideNav();//on lui dit de faire side le menu de navigation qui a la classe .button-collapse
      $("select").material_select();

      $('.slider').slider();//SLIDER HOME
      $(".dropdown-trigger").dropdown();//MENU DEROULANT NAVBAR

      $('.dropdown-trigger').dropdown();

      $('.dropdown-trigger').dropdown();
     var instance = M.Dropdown.getInstance(elem);
     instance.open();

});
