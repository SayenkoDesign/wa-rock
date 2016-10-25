jQuery(document).foundation();
jQuery(function() {
    jQuery('.prices .price:not(:first-child)').hide();
    jQuery('.variations > .variation:not(:first-child)').css("display", "none").removeClass('hide');
    jQuery('.product-variations').on('change', function(){
        var slide = this.value;
        jQuery('.product-slider').slick('goTo', slide);

    });
    jQuery('.product-slider').on('beforeChange', function(e, slick, current, next){
        var variation = next+1;
        jQuery('.variations > .variation:visible').fadeOut(250, function(){
            jQuery('.prices .price').hide();
            jQuery('.prices .price:nth-child(' + variation + ')').show();
            jQuery('.product-variations option[value='+next+']').prop('selected', true);
            jQuery('.variations > .variation:nth-child(' + variation + ')').fadeIn(250);
        });
    });
    // google tracking
    // call footer
    jQuery('div.medium-3:nth-child(2) > a:nth-child(1) > div:nth-child(1) > div:nth-child(1) > span:nth-child(1) > img:nth-child(1)').on("click", function(){
        console.log("logging call clicked");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Call',
            eventAction: 'click',
            eventLabel: 'Footer Call'
        });
    });
    // call office
    jQuery('.office-phone a').on("click", function(){
        console.log("logging header call clicked");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Call',
            eventAction: 'click',
            eventLabel: 'Header Office Call'
        });
    });
    // call sales
    jQuery('.sales-phone a').on("click", function(){
        console.log("logging header call clicked");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Call',
            eventAction: 'click',
            eventLabel: 'Header Sales Call'
        });
    });
    // calculate
    jQuery('#calculate').on("click", function(){
        console.log("logging calculate clicked");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Calculate',
            eventAction: 'click',
            eventLabel: 'Calculate Button'
        });
    });
    // contact Page Directions
    jQuery('' +
        '.page-template-page-contact .medium-6 .accordion li:nth-child(3), ' +
        '.page-template-page-contact .medium-6 .accordion li:nth-child(4), ' +
        '.page-template-page-contact .medium-6 .accordion li:nth-child(5)' +
        '').on("click", function(){
        console.log("logging directions");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Directions',
            eventAction: 'click',
            eventLabel: 'Contact Page Directions'
        });
    });
    // footer Page Directions
    jQuery('ul.accordion:nth-child(2) li:first-child p:nth-child(1) > a:nth-child(3)').on("click", function(){
        console.log("logging directions");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Directions',
            eventAction: 'click',
            eventLabel: 'Footer Page Directions'
        });
    });
});