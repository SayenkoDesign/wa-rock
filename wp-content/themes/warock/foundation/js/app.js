jQuery(document).foundation();
jQuery(function() {
    jQuery('.variations > .variation:not(:first-child)').css("display", "none").removeClass('hide');
    jQuery('.product-variations').on('change', function(){
        var slide = this.value;
        jQuery('.product-slider').slick('goTo', slide);

    });
    jQuery('.product-slider').on('beforeChange', function(e, slick, current, next){
        var variation = next+1;
        jQuery('.variations > .variation:visible').fadeOut(250, function(){
            jQuery('.product-variations option[value='+next+']').prop('selected', true);
            jQuery('.variations > .variation:nth-child(' + variation + ')').fadeIn(250);
        });
    });
});