jQuery(document).ready(function() {
    
    // ===== Categoría ajuste selector responsive ==== 
    var span_label = jQuery('#ct_property_type + span.customSelect').find('span.customSelectInner')
    
    jQuery(window).resize(function() {
        let width = jQuery(window).width()
        
        if ( width >= 768 && width <= 950 ) {
            if ( span_label.text().toLowerCase() == "categoría" )
                span_label.text("Categ.")
        } else {
            if ( span_label.text().toLowerCase() == "categ." )
                span_label.text("Categoría")
        }
    })
    
    jQuery(window).trigger('resize')
    
    
    
    // ===== Scroll to Top ==== 
    jQuery(window).scroll(function() {
        if ( jQuery(this).scrollTop() >= 50 )
            jQuery('#return-to-top').fadeIn(200)
        else
            jQuery('#return-to-top').fadeOut(200)
    })
    
    jQuery('#return-to-top').click(function(e) {
        e.preventDefault()
        
        jQuery('html').animate({
            scrollTop: 0
        }, 700)
    })
    
    
    
    // ===== Hide actions on Listing details ====
    var $tools = jQuery('#tools')
    var $pre_footer = jQuery('#pre-footer')
    
    if ( $tools.length ) {
        jQuery(window).scroll(function() {
            if ( jQuery(window).scrollTop() >= $pre_footer.offset().top - jQuery(window).height() ) {
                if ( $tools.is(":visible") )
                    $tools.fadeOut(200)
                    
            } else {
                if ( $tools.is(":hidden") )
                    $tools.fadeIn(200)
            }
        })
    }
    
    
    
    // ===== Suggestion box show/hide ====
    jQuery('#ct_keyword').focus(function() {
        jQuery('#suggestion-box').fadeIn(200)
    })
    
    jQuery('#ct_keyword').focusout(function() {
        jQuery('#suggestion-box').fadeOut()
    })
    
    
    
    // ===== Enable go to listing by clicking box ====
    jQuery('#suggestion-box').on("click", ".listing_media", function() {
        window.location.href = jQuery(this).find('a.media-object').attr('href')
    })
    
})