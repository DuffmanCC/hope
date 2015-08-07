<?php 

/* ********************************

Adding Meta Boxes for Events

********************************* */


add_action('add_meta_boxes', 'agw_meta_boxes_events');
function agw_meta_boxes_events() {
    add_meta_box( 'agw-meta-box-events', __('Events Settings'), 'agw_meta_box_callback_events', 'events' );
}
 
function agw_meta_box_callback_events( $post ) {

     //nonce. See http://codex.wordpress.org/Function_Reference/wp_nonce_field
     wp_nonce_field( 'agw_meta_box', 'agw_meta_box_noncename' );
    
     //Get the current values of meta fields to pre-populate the custom fields
     $post_meta = get_post_custom($post->ID);
 
     //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_start'][0] ) ) {
         $current_value = $post_meta['text_meta_field_start'][0];
     }
     ?>
     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_start"><?php _e("Event Start"); ?></label>
         <input name="text_meta_field_start" id="text_meta_field_start" type="text" value="<?php echo $current_value; ?>">
     </div>

	 <?php 
	 //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_end'][0] ) ) {
         $current_value = $post_meta['text_meta_field_end'][0];
     }
	  ?>
     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_end"><?php _e("Event End"); ?></label>
         <input name="text_meta_field_end" id="text_meta_field_end" type="text" value="<?php echo $current_value; ?>">
     </div>

     <?php 
	 //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_date'][0] ) ) {
         $current_value = $post_meta['text_meta_field_date'][0];
     }
	  ?>

     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_date"><?php _e("Event Date"); ?></label>
         <input name="text_meta_field_date" id="text_meta_field_date" type="text" value="<?php echo $current_value; ?>">
     </div>

     <?php 
	 //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_place'][0] ) ) {
         $current_value = $post_meta['text_meta_field_place'][0];
     }
	  ?>

     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_place"><?php _e("Event Place"); ?></label>
         <input name="text_meta_field_place" id="text_meta_field_place" type="text" value="<?php echo $current_value; ?>">
     </div>

     <?php 
	 //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_price'][0] ) ) {
         $current_value = $post_meta['text_meta_field_price'][0];
     }
	  ?>

     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_price"><?php _e("Event Price"); ?></label>
         <input name="text_meta_field_price" id="text_meta_field_price" type="text" value="<?php echo $current_value; ?>">
         <p class="meta-box-description">Write the currency symbol</p>
     </div>
 
     <?php
}
 
add_action('save_post', 'agw_save_custom_fields_events');
function agw_save_custom_fields_events($post_id){
 
         // Primero comprobamos que usuario actual tenga permiso para editor el post
	 if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ) {
	        if ( !current_user_can( 'edit_post', $post_id ) ) {
	             return;
	        }
	 }
	       
       	 // Segundo, comprobamos el nonce como medida de seguridad
	if ( !isset( $_POST['agw_meta_box_noncename'] ) || ! wp_verify_nonce( $_POST['agw_meta_box_noncename'], 'agw_meta_box' ) ) {
			return;
	}
			
        //Tercero, validamos y almacenamos el valor del custom field o lo borramos si es necesario
        
        //El text input
	if( isset($_POST['text_meta_field_start']) && $_POST['text_meta_field_start'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_start', sanitize_text_field( $_POST['text_meta_field_start'] ) );
	} else {
            //$_POST['text_meta_field_start'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_start');
	    }
	}

	//El text input
	if( isset($_POST['text_meta_field_end']) && $_POST['text_meta_field_end'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_end', sanitize_text_field( $_POST['text_meta_field_end'] ) );
	} else {
            //$_POST['text_meta_field_end'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_end');
	    }
	}

	//El text input
	if( isset($_POST['text_meta_field_date']) && $_POST['text_meta_field_date'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_date', sanitize_text_field( $_POST['text_meta_field_date'] ) );
	} else {
            //$_POST['text_meta_field_date'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_date');
	    }
	}

	//El text input
	if( isset($_POST['text_meta_field_place']) && $_POST['text_meta_field_place'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_place', sanitize_text_field( $_POST['text_meta_field_place'] ) );
	} else {
            //$_POST['text_meta_field_place'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_place');
	    }
	}

	//El text input
	if( isset($_POST['text_meta_field_price']) && $_POST['text_meta_field_price'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_price', sanitize_text_field( $_POST['text_meta_field_price'] ) );
	} else {
            //$_POST['text_meta_field_price'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_price');
	    }
	}
	
}



/* ********************************

Adding Meta Boxes for Causes

********************************* */


add_action('add_meta_boxes', 'agw_meta_boxes_causes');
function agw_meta_boxes_causes() {
    add_meta_box( 'agw-meta-box-causes', __('Causes Settings'), 'agw_meta_box_callback_causes', 'causes' );
}
 
function agw_meta_box_callback_causes( $post ) {

     //nonce. See http://codex.wordpress.org/Function_Reference/wp_nonce_field
     wp_nonce_field( 'agw_meta_box', 'agw_meta_box_noncename' );
    
     //Get the current values of meta fields to pre-populate the custom fields
     $post_meta = get_post_custom($post->ID);
 
     //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_goal'][0] ) ) {
         $current_value = $post_meta['text_meta_field_goal'][0];
     }
     ?>
     <div class="meta-box-fields">
        <div class="label">
            <label for="text_meta_field_goal"><?php _e("Donation Goal"); ?></label>
            <p class="meta-box-description">Without currency symbol</p>
        </div>
        <div class="input">
            <input name="text_meta_field_goal" id="text_meta_field_goal" type="text" value="<?php echo $current_value; ?>">
        </div>             
     </div>

	 <?php 
	 //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_amount'][0] ) ) {
         $current_value = $post_meta['text_meta_field_amount'][0];
     }
	  ?>
     <div class="meta-box-fields">
        <div class="label">
            <label for="text_meta_field_amount"><?php _e("Total Amount"); ?></label>
            <p class="meta-box-description">Without currency symbol</p>           
        </div>        
        <div class="input">
            <input name="text_meta_field_amount" id="text_meta_field_amount" type="text" value="<?php echo $current_value; ?>">
        </div>
     </div>

     <?php 
	 //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_people'][0] ) ) {
         $current_value = $post_meta['text_meta_field_people'][0];
     }
	  ?>

     <div class="meta-box-fields">
        <div class="label">
            <label for="text_meta_field_people"><?php _e("People Donated"); ?></label>   
        </div>
        <div class="input">
            <input name="text_meta_field_people" id="text_meta_field_people" type="text" value="<?php echo $current_value; ?>">    
        </div>        
     </div>

     <?php 
     //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_paypal'][0] ) ) {
         $current_value = $post_meta['text_meta_field_paypal'][0];
     }
      ?>

     <div class="meta-box-fields">
        <div class="label">
            <label for="text_meta_field_paypal"><?php _e("Pay Pal link"); ?></label>
            <p class="meta-box-description">Your Pay-Pal ID</p>   
        </div>
        <div class="input">
            <input name="text_meta_field_paypal" id="text_meta_field_paypal" type="text" value="<?php echo $current_value; ?>">
        </div>        
     </div>

     <?php 
     //The input text
     $current_value = '';
     if( isset( $post_meta['text_meta_field_currency'][0] ) ) {
         $current_value = $post_meta['text_meta_field_currency'][0];
     }
      ?>

     <div class="meta-box-fields">
        <div class="label">
            <label for="text_meta_field_currency"><?php _e("Currency Symbol"); ?></label>
            <p class="meta-box-description">Add your Currency Symbol</p>   
        </div>
        <div class="input">
            <input name="text_meta_field_currency" id="text_meta_field_currency" type="text" value="<?php echo $current_value; ?>">
        </div>        
     </div>



 
     <?php
}
 
add_action('save_post', 'agw_save_custom_fields_causes');
function agw_save_custom_fields_causes($post_id){
 
         // Primero comprobamos que usuario actual tenga permiso para editor el post
	 if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ) {
	        if ( !current_user_can( 'edit_post', $post_id ) ) {
	             return;
	        }
	 }
	       
       	 // Segundo, comprobamos el nonce como medida de seguridad
	if ( !isset( $_POST['agw_meta_box_noncename'] ) || ! wp_verify_nonce( $_POST['agw_meta_box_noncename'], 'agw_meta_box' ) ) {
			return;
	}
			
        //Tercero, validamos y almacenamos el valor del custom field o lo borramos si es necesario
        
    //El text input
	if( isset($_POST['text_meta_field_goal']) && $_POST['text_meta_field_goal'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_goal', sanitize_text_field( $_POST['text_meta_field_goal'] ) );
	} else {
            //$_POST['text_meta_field_goal'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_goal');
	    }
	}

	//El text input
	if( isset($_POST['text_meta_field_amount']) && $_POST['text_meta_field_amount'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_amount', sanitize_text_field( $_POST['text_meta_field_amount'] ) );
	} else {
            //$_POST['text_meta_field_amount'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_amount');
	    }
	}

	//El text input
	if( isset($_POST['text_meta_field_people']) && $_POST['text_meta_field_people'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_people', sanitize_text_field( $_POST['text_meta_field_people'] ) );
	} else {
            //$_POST['text_meta_field_people'] no tiene valor establecido, eliminar el meta field de la base de datos
	    if ( isset( $post_id ) ) {
	        delete_post_meta($post_id, 'text_meta_field_people');
	    }
	}

    //El text input
    if( isset($_POST['text_meta_field_paypal']) && $_POST['text_meta_field_paypal'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_paypal', sanitize_text_field( $_POST['text_meta_field_paypal'] ) );
    } else {
            //$_POST['text_meta_field_paypal'] no tiene valor establecido, eliminar el meta field de la base de datos
        if ( isset( $post_id ) ) {
            delete_post_meta($post_id, 'text_meta_field_paypal');
        }
    }
	
    //El text input
    if( isset($_POST['text_meta_field_currency']) && $_POST['text_meta_field_currency'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_currency', sanitize_text_field( $_POST['text_meta_field_currency'] ) );
    } else {
            //$_POST['text_meta_field_currency'] no tiene valor establecido, eliminar el meta field de la base de datos
        if ( isset( $post_id ) ) {
            delete_post_meta($post_id, 'text_meta_field_currency');
        }
    }
}

/* ********************************

Adding Meta Boxes for Team

********************************* */


add_action('add_meta_boxes', 'agw_meta_boxes_team');
function agw_meta_boxes_team() {
    add_meta_box( 'agw-meta-box-team', __('Member settings'), 'agw_meta_box_callback_team', 'team' );
}
 
function agw_meta_box_callback_team( $post ) {

     //nonce. See http://codex.wordpress.org/Function_Reference/wp_nonce_field
     wp_nonce_field( 'agw_meta_box', 'agw_meta_box_noncename' );
    
     //Get the current values of meta fields to pre-populate the custom fields
     $post_meta = get_post_custom($post->ID);
 
     //The input text for position
     $current_value = '';
     if( isset( $post_meta['text_meta_field_position'][0] ) ) {
         $current_value = $post_meta['text_meta_field_position'][0];
     }
     ?>
     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_position"><?php _e("Position"); ?></label>
         <input name="text_meta_field_position" id="text_meta_field_position" type="text" value="<?php echo $current_value; ?>">
     </div>

     <?php 
     //The input text for email
     $current_value = '';
     if( isset( $post_meta['text_meta_field_mail'][0] ) ) {
         $current_value = $post_meta['text_meta_field_mail'][0];
     }
      ?>
     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_mail"><?php _e("E-mail"); ?></label>
         <input name="text_meta_field_mail" id="text_meta_field_mail" type="text" value="<?php echo $current_value; ?>">
     </div>
 
     <?php
}
 
add_action('save_post', 'agw_save_custom_fields_team');
function agw_save_custom_fields_team($post_id){
 
         // Primero comprobamos que usuario actual tenga permiso para editor el post
     if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_post', $post_id ) ) {
                 return;
            }
     }
           
         // Segundo, comprobamos el nonce como medida de seguridad
    if ( !isset( $_POST['agw_meta_box_noncename'] ) || ! wp_verify_nonce( $_POST['agw_meta_box_noncename'], 'agw_meta_box' ) ) {
            return;
    }
            
        //Tercero, validamos y almacenamos el valor del custom field o lo borramos si es necesario
        
    //El text input for position
    if( isset($_POST['text_meta_field_position']) && $_POST['text_meta_field_position'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_position', sanitize_text_field( $_POST['text_meta_field_position'] ) );
    } else {
            //$_POST['text_meta_field_position'] no tiene valor establecido, eliminar el meta field de la base de datos
        if ( isset( $post_id ) ) {
            delete_post_meta($post_id, 'text_meta_field_position');
        }
    }

    //El text input for email
    if( isset($_POST['text_meta_field_mail']) && $_POST['text_meta_field_mail'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_mail', sanitize_text_field( $_POST['text_meta_field_mail'] ) );
    } else {
            //$_POST['text_meta_field_mail'] no tiene valor establecido, eliminar el meta field de la base de datos
        if ( isset( $post_id ) ) {
            delete_post_meta($post_id, 'text_meta_field_mail');
        }
    }
    
}


/* ********************************

Adding Meta Boxes for Services

********************************* */


add_action('add_meta_boxes', 'agw_meta_boxes_services');
function agw_meta_boxes_services() {
    add_meta_box( 'agw-meta-box-services', __('Service settings'), 'agw_meta_box_callback_services', 'services' );
}
 
function agw_meta_box_callback_services( $post ) {

     //nonce. See http://codex.wordpress.org/Function_Reference/wp_nonce_field
     wp_nonce_field( 'agw_meta_box', 'agw_meta_box_noncename' );
    
     //Get the current values of meta fields to pre-populate the custom fields
     $post_meta = get_post_custom($post->ID);
 
     //The input text for position
     $current_value = '';
     if( isset( $post_meta['text_meta_field_logo'][0] ) ) {
         $current_value = $post_meta['text_meta_field_logo'][0];
     }
     ?>
     <div class="meta-box-fields">
         <label class="label" for="text_meta_field_logo"><?php _e("Logo"); ?></label>
         <input name="text_meta_field_logo" id="text_meta_field_logo" type="text" value="<?php echo $current_value; ?>">
         <p class="meta-box-description">Write icon class - "fa fa-heart, fa fa-bed, fa fa-car" <a href="http://fontawesome.io/icons/" target="_blank">Click Here</a></p>
     </div>
 
     <?php
}
 
add_action('save_post', 'agw_save_custom_fields_services');
function agw_save_custom_fields_services($post_id){
 
         // Primero comprobamos que usuario actual tenga permiso para editor el post
     if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_post', $post_id ) ) {
                 return;
            }
     }
           
         // Segundo, comprobamos el nonce como medida de seguridad
    if ( !isset( $_POST['agw_meta_box_noncename'] ) || ! wp_verify_nonce( $_POST['agw_meta_box_noncename'], 'agw_meta_box' ) ) {
            return;
    }
            
        //Tercero, validamos y almacenamos el valor del custom field o lo borramos si es necesario
        
    //El text input for logo
    if( isset($_POST['text_meta_field_logo']) && $_POST['text_meta_field_logo'] != "" ) {
            update_post_meta( $post_id, 'text_meta_field_logo', sanitize_text_field( $_POST['text_meta_field_logo'] ) );
    } else {
            //$_POST['text_meta_field_logo'] no tiene valor establecido, eliminar el meta field de la base de datos
        if ( isset( $post_id ) ) {
            delete_post_meta($post_id, 'text_meta_field_logo');
        }
    }
    
}







// some styling for de admin area
function agw_backend_css() { ?>

        <style type="text/css">
           #agw-meta-box-causes .inside .meta-box-fields {
            position: relative;
           }
           .label{
            width: 18%;
           }
           .label label{
            font-size: 13px;
            font-weight: bold;
           }
           .meta-box-description{
            font-size: 10px;
            font-style: italic;
            margin: 0;
           }
           .meta-box-fields input{
            width: 80%;
            position: absolute;
            left: 19%;
            top: 0;
            
           }
           .meta-box-fields{
            margin-bottom: 50px;
           }
        </style>

<?php }

add_action('admin_head', 'agw_backend_css');

