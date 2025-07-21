<?php
/**
 * Forside hoved Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'forsidehoved-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'forsidehoved';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 

// Overstyr vilkårstekst
if( get_field('djj_fpt_vilktxt') && get_field('djj_fpt_formid') && get_field('djj_fpt_feltid') ) : // Skal overstyres og vi har både skjemaID og feltID 
    $vilkarstxt = get_field("djj_fpt_vilkartxt");
?>

    <!-- <script>
        /* Kjør script ved page load for énsideskjema BEST */
        var dill = <?php //echo addslashes($vilkarstxt); ?>
        jQuery( document ).ready(function() {
            jQuery('#input_<?php //echo get_field("djj_fpt_formid");?>_<?php //echo get_field("djj_fpt_feltid");?> label').text(dill);
        });
        /* Kjør script når sider lastes, som ikke er side én */
        jQuery(document).on('gform_page_loaded', function(event, form_id, current_page){
            if( current_page != 1) {
                jQuery('#input_<?php //echo get_field("djj_fpt_formid");?>_<?php //echo get_field("djj_fpt_feltid");?> label').text(dill);
            }
        });
    </script> -->

<?php
endif;

if( get_field('djj_ftp_bgvid') ) :
    $vid = get_field('djj_ftp_bgvid');
else :
    $vid = get_stylesheet_directory_uri() . '/inc/gfx/bk_bading.mp4';
endif;
?>


<div class="container alignfull <?php echo $className; ?>">
    <video poster="poster.jpg" autoplay playsinline muted loop>
      <source src="<?php echo $vid; ?>" type="video/mp4">
    </video>
    <div class="video-overlay">
    </div>
    <div class="row">
        <div class="col-md-12 fullimgtxt block-inner-content">

            <div class="forsidehoved-inner">
                <div class="forsidehoved-content">
                    <h1><?php echo get_field('djj_fpt_heading'); ?></h1>
                    <?php echo get_field('djj_fpt_ingr'); ?>

                    <?php // Build rabatt-tekst
                    if( have_rows('djj_fpt_rabatt_tekst') ):
                        echo '<h2 class="big-screen">';
                        $rabattxt = '';
                            while( have_rows('djj_fpt_rabatt_tekst') ) : the_row();

                                if( get_sub_field('type_tekst') == 'vanlig') :
                                    $rabattxt .= get_sub_field('rabatt_txt');
                                elseif( get_sub_field('type_tekst') == 'gjennomstrek') :
                                    $rabattxt .= '<strike>' . get_sub_field('rabatt_txt') . '</strike>';
                                elseif( get_sub_field('type_tekst') == 'rod') :
                                    $rabattxt .= '<span class="red">' . get_sub_field('rabatt_txt') . '</span>';
                                endif;

                                if( get_sub_field('linjeskift_etter_txt') ) :
                                    $rabattxt .= '<br>';
                                endif;

                            endwhile;
                        echo $rabattxt . '</h2>';
                    endif;
                    ?>
                </div>
                <div class="forsidehoved-img">
                    <?php if( get_field('vis_rabattboble') ) : ?>
                        <div class="sirkel">
                            <div class="sirkel-txt">
                                <p>Kun</p>
                                <h3 class="responsive_headline"><?php echo get_field('djj_fpt_naa'); ?></h3>
                                <div class="forpris">
                                    <p><?php echo get_field('djj_fpt_for'); ?></p>
                                    <p class="overstrek"></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <?php // Build rabatt-tekst
                if( have_rows('djj_fpt_rabatt_tekst') ):
                    echo '<h2 class="small-screen">';
                    $rabattxt = '';
                        while( have_rows('djj_fpt_rabatt_tekst') ) : the_row();

                            if( get_sub_field('type_tekst') == 'vanlig') :
                                $rabattxt .= get_sub_field('rabatt_txt');
                            elseif( get_sub_field('type_tekst') == 'gjennomstrek') :
                                $rabattxt .= '<strike>' . get_sub_field('rabatt_txt') . '</strike>';
                            elseif( get_sub_field('type_tekst') == 'rod') :
                                $rabattxt .= '<span class="red">' . get_sub_field('rabatt_txt') . '</span>';
                            endif;

                            // if( get_sub_field('linjeskift_etter_txt') ) :
                            //     $rabattxt .= '<br>';
                            // endif;

                        endwhile;
                    echo $rabattxt . '</h2>';
                endif;
                ?>

            </div>

            <?php if( get_field('djj_fpt_formid') ) : ?>

                <?php
                $params = '';
                // Overstyring av parametere
                if( have_rows('djj_fpt_params') ):
                    $i = 0;
                    while( have_rows('djj_fpt_params') ) : the_row();

                        if( $i == 0 ) :
                            $params .= get_sub_field('djj_fpt_pname') . '=' . get_sub_field('djj_fpt_pvalue');
                        else:
                            $params .= '&' . get_sub_field('djj_fpt_pname') . '=' . get_sub_field('djj_fpt_pvalue');
                        endif; 

                        $i++;
                    endwhile;
                endif;
                ?>
                <div class="forsidehoved-inner2" id="bestilling">
                    <?php
                    if( get_field('djj_fpt_visnedt') ) : ?>

                        <script>
                            function createCountDown(elementId, antall) 
                            {
                            // Set the date we're counting down to
                            var countDownDate = new Date().getTime() + (antall*60*60*1000);
                            //console.log(countDownDate.getTime());
                            // Update the count down every 1 second
                            var x = setInterval(function() 
                            {

                              // Get todays date and time
                              var now = new Date().getTime();

                              // Find the distance between now an the count down date
                              var distance = (countDownDate) - (now);

                              //Hint on converting from object to the string.
                              //var distance = Date.parse(countDownDate) - Date.parse(now);

                              // Time calculations for days, hours, minutes and seconds
                              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 
                              60));
                              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                              // Display the result in the element with id="demo"
                              document.getElementById(elementId).innerHTML = "<div class='teller-outer'><div class='utloper-om'>Tilbudet utløper om:</div><div class='siffere'>" + days + "</div><div class='headere'>Dager</div><div class='siffere'>" + hours + "</div><div class='headere'>Timer</div><div class='siffere'>"
                              + minutes + "</div><div class='headere'>Min</div><div class='siffere'>" + seconds + "</div><div class='headere'>Sek</div></div>";

                              // If the count down is finished, write some text 
                              if (distance < 0) 
                              {
                                clearInterval(x);
                                document.getElementById(elementId).innerHTML = "TILBUDET ER UTLØPT";
                              }
                              }, 1000);
                              }

                              createCountDown('nedtelling1', "<?php echo get_field('djj_ftp_tell_ned_fra'); ?>");
                              // createCountDown('nedtelling2', "<?php echo get_field('djj_ftp_tell_ned_fra'); ?>");

                          </script>

                        <div class="nedtelling" id="nedtelling-outer">
                            <div class="teller-kolonne1"><?php echo get_field('djj_fpt_cntdn_txt'); ?></div>
                            <div class="teller-kolonne2" id="nedtelling1"></div>
                        </div>
                    <?php
                    endif; ?>
                    <div class="gravity-forms">
                        <div class="gravity-forms-inner">
                            <div class="form-left">
                                <div class="form-left-inner-top">
                                    <?php echo get_field('djj_fpt_skjema_head'); ?>
                                </div>
                                <div class="form-left-inner-bottom">
                                    <div class="step-outer">
                                        <p>Steg</p>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/gfx/steg_bestilling_01.svg" id="step1">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-right">
                                <?php echo do_shortcode('[gravityform id="' . get_field('djj_fpt_formid') . '" title="false" description="false" ajax="true" tabindex="49" field_values="' . $params . '"]'); ?>
                            </div>
                            <div class="form-right2" style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
