jQuery(document).ready(function($){
  $('.open-menu').on('click', function(e){
    e.preventDefault();
    $('.mobile-header').toggleClass('visible');
    $('.mobile-navigation').toggleClass('visible');
    return false;
  });
});