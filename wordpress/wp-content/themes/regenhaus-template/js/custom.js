jQuery(document).ready(function() {

    var $box = jQuery('.vc_column-inner > .wpb_wrapper')

    var hover_scroll = function() {
        $box.each(function(i, $this) {
            var $this = jQuery($this)
            var pointer = jQuery(window).scrollTop() + jQuery(window).height() / 2

            if ( pointer >= $this.offset().top - 60 && pointer <= $this.offset().top + $this.height() + 60 ) {
                $this.addClass("hover")

            } else {
                if ( $this.hasClass("hover") )
                    $this.removeClass("hover")
            }
        })
    }

    
    var span_label = jQuery('#ct_property_type + span.customSelect').find('span.customSelectInner')
    
    jQuery(window).resize(function() {
        // ===== Categoría ajuste selector responsive ==== 
        let width = jQuery(window).width()
        
        if ( width >= 768 && width <= 950 ) {
            if ( span_label.text().toLowerCase() == "categoría" )
                span_label.text("Categ.")
        } else {
            if ( span_label.text().toLowerCase() == "categ." )
                span_label.text("Categoría")
        }


        // ===== Servicios scroll highlight ====
        if ( jQuery('body').hasClass('page-id-4062') ) {
            if ( jQuery(window).width() <= 768 )
                jQuery(window).on("scroll", hover_scroll)

            else {
                jQuery(window).off("scroll", hover_scroll)
                $box.removeClass("hover")
            }
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
        
        jQuery('html, body').animate({
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
        jQuery('#suggestion-box').fadeIn(100)
    })
    
    jQuery('#ct_keyword').focusout(function() {
        jQuery('#suggestion-box').fadeOut()
    })
    
    
    
    // ===== Enable go to listing by clicking box ====
    jQuery('#suggestion-box').on("click", ".listing_media", function() {
        window.location.href = jQuery(this).find('a.media-object').attr('href')
    })
    
})