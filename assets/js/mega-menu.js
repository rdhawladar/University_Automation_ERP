(function($) {
  $('.nav-pills > li ').hover( function(){
    if($(this).hasClass('hoverblock'))
      return;
      else
      $(this).find('a').tab('show');
  });

  $('.nav-tabs > li').find('a').click( function(){
    $(this).parent()
      .siblings().addClass('hoverblock');
  });
  
  $('.es-megamenu .dropdown').click('show.bs.dropdown', function(e) {
	var $dropdown = $(this).find('.dropdown-menu');
	var orig_margin_top = parseInt($dropdown.css('margin-top'));
      $dropdown.css({'margin-top': (orig_margin_top + 65) + 'px', opacity: 0}).animate({'margin-top': orig_margin_top + 'px', opacity: 1}, 200, function(){
        $(this).css({'margin-top':''});
    });
  });

})(jQuery);
