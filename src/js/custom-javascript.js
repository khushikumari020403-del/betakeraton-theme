// Add your custom JS here.
jQuery( document ).ready(function($) {
    $('.navbar-toggler').addClass('collapsed');
});

jQuery(".navbar-toggler").click(function() {
    jQuery('.open').toggleClass('hidden');
    jQuery('.close').toggleClass('hidden');
});

// Forms
(function($) {
function deepLookup(structure, keys) {
 var key = keys.shift();
 if (structure[key]) {
  if (keys.length) {
   return deepLookup(structure[key], keys);
  } else {
   return structure[key];
  }
 } else {
  return '';
 }
}
$(function() {
 // Autofill
 if ( $('#gform_1').length || $('#gform_10').length || $('#gform_11').length || $('#gform_12').length || $('#gform_13').length || $('#gform_14').length || $('#gform_15').length || $('#gform_16').length || $('#gform_17').length || $('#gform_18').length || $('#gform_19').length  || $('#gform_20').length || $('#gform_21').length || $('#gform_22').length || $('#gform_24').length || $('#gform_25').length ) {
  if ( $('#gform_1').length || $('#gform_10').length || $('#gform_11').length || $('#gform_12').length || $('#gform_13').length || $('#gform_14').length || $('#gform_15').length || $('#gform_16').length || $('#gform_17').length || $('#gform_18').length || $('#gform_19').length || $('#gform_20').length || $('#gform_21').length || $('#gform_22').length || $('#gform_24').length || $('#gform_25').length ) {
   var autofillButton = $('<input type="button" id="hentadresseknapp" class="gform_button autofill_button" value="Gå videre" />');
  } else {
   if ( $('html[lang="nb-NO"]').length ) {
    var autofillButton = $('<input type="button" id="hentadresseknapp" class="gform_button autofill_button" value="Gå videre" />');
   }
  }
  $('.ginput_container_phone').append(autofillButton);
  autofillButton.on('click', function(e) {
   e.preventDefault();
   var $t = $(this);
   $t.attr('disabled', true);
   // if( $('#gform_25').length) {
   //      //$('#gform_next_button_25_23').click();
   //  } else {
   //      $('.gform_next_button').click();
   //  }
   $.getJSON('/wp-content/themes/betakaroten2.0/apilookup.php', {
    qry: $('.ginput_container_phone input').val()
   }).done(function(data) {
    $('.name_first input').val(deepLookup(data, ['search_vcard', 'listing', 'N', 'value', 1]));
    $('.name_last input').val(deepLookup(data, ['search_vcard', 'listing', 'N', 'value', 0]));
    $('.address_line_1 input').val(deepLookup(data, ['search_vcard', 'listing', 'ADR', 'value', 2]));
    $('.address_zip input').val(deepLookup(data, ['search_vcard', 'listing', 'ADR', 'value', 5]));
    $('.address_city input').val(deepLookup(data, ['search_vcard', 'listing', 'ADR', 'value', 3]));
    if( $('#gform_25').length) {
        $('#gform_next_button_25_23').click();
    } else {
        $('.gform_next_button').click();
    }
   }).fail(function() {
    setTimeout(function() {
     $t.removeAttr('disabled');
    }, 3000);
    // if( $('#gform_25').length) {
    //     $('#gform_next_button_25_23').click();
    // } else {
    //     $('.gform_next_button').click();
    // }
   });
  });
 }
});
})(window.jQuery);

// Gravity forms side 2
jQuery(document).on('gform_page_loaded', function(event, form_id, current_page){
    if( current_page == 2 ) {
        jQuery('#step1').hide();
        jQuery( ".gravity-forms" ).prepend( "<img src='/wp-content/themes/betakaroten2.0/inc/gfx/steg_bestilling_02.svg' id='step2'>" );
        jQuery('.form-left').hide();
        jQuery('.form-right2').show();
    }
});

// Bestillingsknapp
jQuery(".bestillbutton").click(function() {
   jQuery(".gravity-forms").addClass("animer");
});

// Fullscreen video
jQuery(".overvideo").click(function(e) {

    e.stopPropagation();
    jQuery('video').click();
});

jQuery("video").click(function() {
  //console.log(this); 
  if (this.paused) {
    this.play();
    jQuery('.overvideo-inner-content').hide();
  } else {
    this.pause();
    jQuery('.overvideo-inner-content').show();
  }
});

// Slick: initate
jQuery(document).ready(function(){
    jQuery('.s-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 3000,
    });
    jQuery('.beforeafter-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true
    });
    jQuery('.step-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      infinite: false,
      "cssEase": "linear"
    });
});