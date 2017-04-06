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
    // contact button
    jQuery('.call-to-action a').on("click", function(e){
        console.log("logging contact button clicked");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Button',
            eventAction: 'click',
            eventLabel: 'Contact Button'
        });
    });
    // contact form
    jQuery("#contact-form form").on("submit", function(){
        console.log("logging contact form submission");
        ga('send', {
            hitType: 'event',
            eventCategory: 'Form',
            eventAction: 'submit',
            eventLabel: 'Contact Form'
        });
        console.log("form tracking info sent");
    });
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
    // get get vars in url
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };
    // slide to
    var scroll_to = getUrlParameter('scroll');
    if(scroll_to) {
        console.log('going to scroll to ' + scroll_to);
        jQuery('html, body').animate({
            scrollTop: jQuery('#'+scroll_to).offset().top
        }, 2000);
    } else {
        console.log("not scrolling");
    }
});