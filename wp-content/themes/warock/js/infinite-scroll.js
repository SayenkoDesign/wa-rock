<!--Thanks to http://www.affariproject.com/ which this functionality is based-->
  jQuery(function(){
    var page = 2;
    var loadmore = 'on';
    jQuery(document).on('scroll resize', function() {
      if (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() -  jQuery("#colophon").height()) {
        if (loadmore == 'on') {
          loadmore = 'off';
          jQuery('#spinner').css('visibility', 'visible');
          jQuery('#lazyload').append(jQuery('<div class="page" id="p' + page + '">').load('http://warock.wpengine.com/product/?paged=' + page + ' .page > *', function() {
            page++;
            loadmore = 'on';
            jQuery('#spinner').css('visibility', 'hidden');
          }));
        }
      }
    });
    jQuery( document ).ajaxComplete(function( event, xhr, options ) {
      if (xhr.responseText.indexOf('class="page"') == -1) {
        loadmore = 'off';
      }
    });
  });