jQuery(function(){ 
	Calculatit();		   
});

if (!Array.prototype.indexOf)
{
  Array.prototype.indexOf = function(elt /*, from*/)
  {
    var len = this.length;

    var from = Number(arguments[1]) || 0;
    from = (from < 0)
         ? Math.ceil(from)
         : Math.floor(from);
    if (from < 0)
      from += len;

    for (; from < len; from++)
    {
      if (from in this &&
          this[from] === elt)
        return from;
    }
    return -1;
  };
}


var errorMsgs = new Array();
//=============================
function Calculatit(){
	"use strict";
	if(jQuery('#calculator').length > 0){
		clearForm();
		CalcInput(); 
		
		jQuery('#calculate').bind('click',function(){
			jQuery('#results').empty();
		 			
			//verify that we actually have a number for inches
			var lengthInches = parseInt(jQuery('#lengthinches').val())/12;
			if(lengthInches === 0 || isNaN(lengthInches)){
				lengthInches = 0;
			}
			var calcLength = parseInt(jQuery('#lengtha').val()) + lengthInches;
			if(calcLength === 0 || isNaN(calcLength)){
				errorMsgs.push('Please specify a length');
			}
				
				
			//verify that we actually have a number for inches
			var widthInches = parseInt(jQuery('#widthinches').val())/12;
			if(widthInches === 0 || isNaN(widthInches)){
				widthInches = 0;
			}
			var calcWidth = parseInt(jQuery('#widtha').val()) + widthInches;
			if(calcWidth === 0 || isNaN(calcWidth)){
				errorMsgs.push('Please specify a width.');
			}
						
			var calcDepth = parseInt(jQuery('#deptha').val());
			//alert(calcLength + " " + calcWidth + " " +  calcDepth);
			if(calcDepth === 0 || isNaN(calcDepth)){
				errorMsgs.push('Please specify a depth in inches.');
			}
				if(errorMsgs.length > 0){
					errorPrompt();
					return;
				}
				else {
					var cubicYards = ( (calcLength * calcWidth * (calcDepth)/12))/27;
					jQuery('#results').append('<strong>Approximate cubic yards needed: </strong>' + cubicYards.toFixed(2));
					return;
				}
		//end mulch ======================================================
			 
		});	
		//=======================================
		jQuery('#clear-calc').bind('click',function(){
			clearForm();									   
		});
		//=======================================
	}
}
//============================
function clearForm(){
	jQuery('#calculator input[type=text]').each(function(i){
		jQuery(this).val('');	
	});
 	jQuery('#lengthinches').val('');
	jQuery('#widthinches').val('');
 	//End Prefilled fields	
	jQuery('#results').empty();
	jQuery('#calc-error').empty();
	jQuery('#clear-calc').attr('disabled','disabled');
	jQuery('#calculate').attr('disabled','disabled');
	//Don't go directly here on page
	//jQuery('input:first').focus();
}
//============================
function errorPrompt(){
	jQuery('#results').empty();
	jQuery('#calc-error').empty().hide();
	var errorPrompt = '';
	var len = errorMsgs.length;
		jQuery(errorMsgs).each(function(i){
			errorPrompt = errorPrompt + '<span style="color:#BE0F34">'  + this + '</span>' + '<br /><br />';
		});
	jQuery('#calc-error').append(errorPrompt).fadeIn();
	errorMsgs = [];

	return;
}
//============================
function CalcInput(){
	jQuery('#calculator input[type=text]').each(function(i){
		var jQueryobj = jQuery(this);
		var isblank = false;
		
		if(jQueryobj.val() == '') {
			isblank = true;
		}
		if(isblank) {
			jQuery('#calculate').removeAttr('disabled');	
		} 
		else {
			jQuery('#calculate').attr('disabled','disabled');
			jQuery('#clear-calc').removeAttr('disabled');
		}	
		
		jQueryobj.bind('blur',function(){
			if(jQueryobj.val() == ''){
				jQueryobj.val('0');
			}
		}).bind('keyup',function(e){
			var tab = false;
			var isblank = false;
			var key = e.keyCode;
			// if it's the tab key, don't throw a "blank" error
			if(key == 9) {
				tab = true;
			}
	
			
			if(key != 110 && isNaN(jQueryobj.val()) && !tab){
					var thisString = jQueryobj.val().toUpperCase();
					var keyPressed = String.fromCharCode(key);
					var lengthNaN = (parseInt(thisString.lastIndexOf(keyPressed)) - parseInt(thisString.indexOf(keyPressed)));
					var curLen = (jQueryobj.val().length - lengthNaN) - 1;
					var curString = String(jQueryobj.val()).substring(0,curLen);		
					jQueryobj.val(curString);
					jQuery('#calc-error').empty();
			}
			//if there's only one element to calculate enable both submit and clear
			else if(!isblank && jQuery('#calculator input[type=text]').length == 1){
				jQuery('#calc-error').empty();
				jQuery('#calculate').removeAttr('disabled');
				jQuery('#clear-calc').removeAttr('disabled');
			}
			//for multiple fields, enable submit when all are entered, and clear when first element is entered
			else {
				jQuery('#calc-error').empty();
				jQuery('#calculator input[type=text]').each(function(i) {
					if(jQueryobj.val() == '') {
						isblank = true;
					}
				});
				if(!isblank) {
					jQuery('#calculate').removeAttr('disabled');	
					jQuery('#clear-calc').removeAttr('disabled');	
				} 
				else {
					jQuery('#calculate').attr('disabled','disabled');
					jQuery('#clear-calc').removeAttr('disabled');
				}
			}
		});
		
	});
}
 clearForm();
 