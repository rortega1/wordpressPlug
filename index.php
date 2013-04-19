<?php
/*
Plugin Name: Chatter_Gallery
Plugin URI: 
Description: Category based gallery with sorting options
Version: 1.0
Author: Rey Ortega - Chatter Buzz Media
Author URI: http://www.blindfoldcreative.com
License: GPL2
*/

/*  Copyright 2013  Rey Ortega - Chatter Buzz Media (email : rey@blindfoldcreative.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



function chatter_gallery_activate()
{
	error_log("Plug-in activated");
}

function chatter_gallery_deactivate()
{
	error_log("Plug-in deactivated");
}

// create custom post type for images
add_action('init', 'create_post_type');
function create_post_type()
{	
	$post_name = 'Port_Image';
	
	if(!post_type_exists($post_name . "s"))
	{
		$labels = array(
			'name' => _x($post_name, 'post type general name'),
			'singular_name' => _x($post_name, 'post type singular name'),
			'add_new' => _x('Add New', $post_name),
			'add_new_item' => __('Add New '. $post_name),
			'edit_item' => 'Edit '. $post_name
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'excerpt', 'thumbnail', 'custom-fields')
		);
		
		register_post_type($post_name, $args);
	}
	
	
}





register_activation_hook( __FILE__, "chatter_gallery_activate");
register_deactivation_hook(__FILE__, "chatter_gallery_deactivate");
?>