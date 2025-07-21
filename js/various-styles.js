jQuery(document).on('gform_page_loaded', function(event, form_id, current_page) {
  if(form_id == 25 && current_page == 2) {
    var $field = jQuery('#field_25_34');
    if($field.length) {
      $field.html('<p><small style="font-size:12px;">Bestill Betakaroten Premium til kun kr 99,- for 1 måneds forbruk. Selges som abonnement uten bindingstid. Etter velkomsttilbudet vil jeg motta to måneders forbruk annenhver måned frem til oppsigelse for kun kr 358,- per måned (kr 716,- annenhver måned). Alle forsendelser har GRATIS frakt. For å si opp abonnementet må du kontakte kundeservice innen 14 dager etter fakturadato. Ved for sen oppsigelse forplikter du deg til å motta neste planlagte levering. Vi er tilgjengelige for deg! *Tilbudet gjelder kun første pakke per nytegning av abonnement.</small></p>');
    }
  }
});

jQuery(document).on('gform_page_loaded', function(event, form_id, current_page) {
  // Sjekk om body-taggen inneholder klassen 'page-id-807'
  if (jQuery('body').hasClass('page-id-807')) {
    if (form_id == 5 && current_page == 2) {
      jQuery('#input_5_25').val('BETAPREMIUMNOFRI');
    }
  }
});

jQuery(document).on('gform_page_loaded', function(event, form_id, current_page) {
  if (jQuery('body').hasClass('page-id-1045')) {
    if (form_id === 5 && current_page === 2) {
      console.log("gform_page_loaded event:", form_id, current_page);
      jQuery('#label_5_21_1').html('Ja takk! Jeg vil bestille <strong>Betakaroten Premium</strong> til kun <span style="color: #f47a41;">79,-</span> for en måneds forbruk. Selges som abonnement uten bindingstid. Etter velkomsttilbudet vil du annenhver måned motta Betakaroten Premium for kun <span style="color: #f47a41;">449,- per måned</span> (kr 898,- annenhver måned). Alle forsendelser har <em>GRATIS frakt</em>. For å si opp abonnementet må du kontakte kundeservice innen 14 dager etter fakturadato, ved for sen oppsigelse forplikter du å motta neste planlagte levering. Vi er tilgjengelig for deg! * Tilbudet gjelder kun første pakke per nytegning av abonnement');

    }
  }
});

jQuery(document).on('gform_page_loaded', function(event, form_id, current_page) {
  if (jQuery('body').hasClass('page-id-1222')) {
    if (form_id === 1 && current_page === 2) {
      console.log("gform_page_loaded event:", form_id, current_page);
      jQuery('#label_1_21_1').html('Ja takk! Jeg vil bestille Betakaroten Premium for 49,- kr for en måneds forbruk. Selges som abonnement uten bindingstid. Etter velkomsttilbudet vil du annenhver måned motta Betakaroten Premium for kun 449,- per måned (kr 898,- annenhver måned). Alle forsendelser har GRATIS frakt. For å si opp abonnementet må du kontakte kundeservice innen 14 dager etter fakturadato, ved for sen oppsigelse forplikter du å motta neste planlagte levering. Vi er tilgjengelig for deg! * Tilbudet gjelder kun første pakke per nytegning av abonnement');

    }
  }
});