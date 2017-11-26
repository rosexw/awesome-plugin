<?php
global $user_id;
$fb_link = get_user_meta( $user_id, $this->fb_meta_key, true );
$twit_link = get_user_meta( $user_id, $this->twit_meta_key, true );
$inst_link = get_user_meta( $user_id, $this->inst_meta_key, true );
$link_link = get_user_meta( $user_id, $this->link_meta_key, true );
$xing_link = get_user_meta( $user_id, $this->xing_meta_key, true );
$ren_link = get_user_meta( $user_id, $this->ren_meta_key, true );
$google_link = get_user_meta( $user_id, $this->google_meta_key, true );
$disqus_link = get_user_meta( $user_id, $this->disqus_meta_key, true );
$snap_link = get_user_meta( $user_id, $this->snap_meta_key, true );
$whats_link = get_user_meta( $user_id, $this->whats_meta_key, true );
$tumb_link = get_user_meta( $user_id, $this->tumb_meta_key, true );
$pint_link = get_user_meta( $user_id, $this->pint_meta_key, true );
$yout_link = get_user_meta( $user_id, $this->yout_meta_key, true );
$vk_link = get_user_meta( $user_id, $this->vk_meta_key, true );
$vine_link = get_user_meta( $user_id, $this->vine_meta_key, true );
$website_link   = get_user_meta( $user_id, $this->website_meta_key, true );
?>
<div class="form-group">
  <label for="inputFacebook" class="social_media_facebook"><?php _e('Facebook','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->fb_meta_key; ?> class="form-control" value="<?php echo $fb_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputTwitter" class="social_media_twitter"><?php _e('Twitter', 'social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->twit_meta_key; ?> class="form-control" value="<?php echo $twit_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputInstagram" class="social_media_instagram"><?php _e('Instagram','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->inst_meta_key; ?> class="form-control" value="<?php echo $inst_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputLinkedIn" class="social_media_linkedin"><?php _e('LinkedIn','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->link_meta_key; ?> class="form-control" value="<?php echo $link_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputXing" class="social_media_xing"><?php _e('Xing', 'social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->xing_meta_key; ?> class="form-control" value="<?php echo $xing_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputRenren" class="social_media_renren"><?php _e('Renren','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->ren_meta_key; ?> class="form-control" value="<?php echo $ren_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputGooglePlus" class="social_media_googleplus"><?php _e('Google+','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->google_meta_key; ?> class="form-control" value="<?php echo $google_link; ?>" placeholder="">
</div>
<?php /*?><div class="form-group">
  <label for="inputWhatsapp" class="social_media_whatsapp"><?php _e('Whatsapp','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->whats_meta_key; ?> class="form-control" value="<?php echo $whats_link; ?>" placeholder="">
</div><?php */?>
<div class="form-group">
  <label for="inputTumblr" class="social_media_tumblr"><?php _e('Tumblr', 'social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->tumb_meta_key; ?> class="form-control" value="<?php echo $tumb_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputPinterest" class="social_media_pinterest"><?php _e('Pinterest','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->pint_meta_key; ?> class="form-control" value="<?php echo $pint_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputYoutube" class="social_media_youtube"><?php _e('Youtube', 'social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->yout_meta_key; ?> class="form-control" value="<?php echo $yout_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputVk" class="social_media_vk"><?php _e('VK','social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->vk_meta_key; ?> class="form-control" value="<?php echo $vk_link; ?>" placeholder="">
</div>
<div class="form-group">
  <label for="inputVine" class="social_media_vine"><?php _e('Vine', 'social-links-um'); ?></label>
  </br>
  <input type="text" name=<?php echo $this->vine_meta_key; ?> class="form-control" value="<?php echo $vine_link; ?>" placeholder="">
</div>
<div class="form-group">
 <label for="inputVine" class="social_media_vine"><?php _e( 'Website', 'social-links-um' ); ?></label>
 </br>
 <input type="text" name=<?php echo $this->website_meta_key; ?> class="form-control" value="<?php echo $website_link; ?>" placeholder="">
</div>
<?php wp_nonce_field( 'sl_um_verify_nonce', 'sl_nonce_field' ); ?>
