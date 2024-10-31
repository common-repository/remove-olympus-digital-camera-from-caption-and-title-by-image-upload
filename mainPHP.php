<?php
/*
	Inspired by:
	https://wordpress.stackexchange.com/questions/121709/how-can-i-add-a-default-description-to-uploaded-files
	written @gps 36.75055, 22.56716
*/

/* rofm_remove_attachment_title_caption(720); */
function rofm_remove_attachment_title_caption( $attach_id ){
  $caption  = wp_get_attachment_caption($attach_id);
  $title    = get_the_title($attach_id);
  $filename = basename ( get_attached_file( $attach_id ) );
  $filename = explode(".", $filename);
  array_pop($filename);
  $filename = implode(" ", $filename);
  $slug     = get_post_field( 'post_name', get_post($attach_id) );


  if(strpos($caption, "OLYMPUS DIGITAL CAMERA") !== false){
    $caption = $filename;
  }

  if(strpos($title, "OLYMPUS DIGITAL CAMERA") !== false){
    $title = $filename;
  }

  if(strpos($slug, "olympus-digital-camera") !== false){
    $slug = $title;
  }

  $args = array(
                    'ID'           => $attach_id,
                    'post_title'   => $title,
                    'post_excerpt' => $caption,
	  				        'post_name'    => $slug,
            );
    wp_update_post( $args );
}
add_action( 'add_attachment', 'rofm_remove_attachment_title_caption', 10, 1 );
?>
