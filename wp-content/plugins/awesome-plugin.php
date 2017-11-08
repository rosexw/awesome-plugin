<?php
   /*
   Plugin Name: Awesomeness Creator
   Plugin URI: http://my-awesomeness-emporium.com
   Description: a plugin to create awesomeness and spread joy
   Version: 1.2
   Author: Mr. Awesome
   Author URI: http://mrtotallyawesome.com
   License: GPL2
   */

   /**
 * Adds a view to the post being viewed
 *
 * Finds the current views of a post and adds one to it by updating
 * the postmeta. The meta key used is "awepop_views".
 *
 * @global object $post The post object
 * @return integer $new_views The number of views the post has
 *
 */
  function awepop_add_view() {
     if(is_single()) {
        global $post;
        $current_views = get_post_meta($post->ID, "awepop_views", true);
        if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
           $current_views = 0;
        }
        $new_views = $current_views + 1;
        update_post_meta($post->ID, "awepop_views", $new_views);
        return $new_views;
     }
  }
?>
