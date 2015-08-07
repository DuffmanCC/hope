<!-- === START CONTACT SECTION === -->
<section class="contact-section container-fluid" id="contact-section">
    <div class="row">
        <div class="site-title col-xs-12">
            <h1>Contact us</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <p>Please call or email if you would like more information about attending one of our programs, volunteering, or being paired up with one of our mentors (or perhaps you would like to take part in our mentor training).</p>
        </div>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-4">
                    <p class="contact-info"><i class="fa fa-phone"></i>555 666 777<p>
                </div>
                <div class="col-md-4">
                    <p class="contact-info"><i class="fa fa-envelope"></i><a href="mailto:sharelove@donate.com">info@help.org</a><p>
                </div>
                <div class="col-md-4">
                    <p class="contact-info"><i class="fa fa-map-marker"></i>Buckingham Palace, London<p>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="row">
               <?php if ( is_active_sidebar( 'contact-form' ) ) : ?>
                    
                <?php dynamic_sidebar( 'contact-form' ); ?>
                    
            <?php endif; ?> 
            </div>
            
        </div>
        
      
        
    </div>
</section>
<!-- === END CONTACT SECTION === -->