jQuery(document).ready(function($){
  var equalHeight = function(group) {
        var tallest = 0;
        group.each(function() {
           var thisHeight = $(this).height();
           if(thisHeight > tallest) {
              tallest = thisHeight;
           }
        });
        group.height(tallest);
    };
  $('.open-menu').on('click', function(e){
    e.preventDefault();
    $('.mobile-header').toggleClass('visible');
    $('.mobile-navigation').toggleClass('visible');
    return false;
  });
   equalHeight($(".card"));
});