<?php
/*
Plugin Name: Eventtts
Plugin URI: http://devrix.com/
Description: A plugin helping you to plan your upcoming events.
Version: 1.0
Author: Anna-Mariya Mateyna
Author URI: https://github.com/any333
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

    add_action( 'init', 'event_custom_post_types' );
    function event_custom_post_types() {
		register_post_type( 'eventbase', array(
			'labels' => array(
				'name' => __("Events", 'eventbase'),
				'singular_name' => __("Event", 'eventbase'),
				'add_new' => _x("Add New", 'eventbase', 'eventbase' ),
				'add_new_item' => __("Add New Event", 'eventbase' ),
				'edit_item' => __("Edit Event", 'eventbase' ),
				'new_item' => __("New Ebent", 'eventbase' ),
				'view_item' => __("View Event", 'eventbase' ),
				'search_items' => __("Search Event", 'eventbase' ),
				'not_found' =>  __("No events found", 'eventbase' ),
				'not_found_in_trash' => __("No events found in Trash", 'eventbase' ),
			),
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 15,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'page-attributes',
			),
			'taxonomies' => array( 'add', 'show' )
		));	
	}
	
	
	
	
	add_action( 'init', 'event_type_custom_taxonomy' );
	function event_type_custom_taxonomy() {
		register_taxonomy( 'eventbase_taxonomy', 'eventbase', array(
			'hierarchical' => true,
			'labels' => array(
				'name' => _x( "Event Categories", 'taxonomy general name', 'dxbase' ),
				'singular_name' => _x( "Event Categorie", 'taxonomy singular name', 'dxbase' ),
				'search_items' =>  __( "Search Categorie", 'dxbase' ),
				'popular_items' => __( "Popular Categories", 'dxbase' ),
				'all_items' => __( "All Categories", 'dxbase' ),
				//'parent_item' => null,
				//'parent_item_colon' => null,
				'edit_item' => __( "Edit Categorie", 'dxbase' ), 
				'update_item' => __( "Update Categorie", 'dxbase' ),
				'add_new_item' => __( "Add New Categorie", 'dxbase' ),
				'new_item_name' => __( "New categorie Name", 'dxbase' ),
				'separate_items_with_commas' => __( "Separate categories with commas", 'dxbase' ),
				'add_or_remove_items' => __( "Add or remove categorie", 'dxbase' ),
				'choose_from_most_used' => __( "Choose from the most used categories", 'dxbase' )
			),
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
		));
		
		register_taxonomy_for_object_type( 'eventbase_taxonomy', 'eventbase' );
	}
	
	
	
	
	
	
	
	add_action( 'admin_init', 'add_box' );
	function add_box() {
	add_meta_box('display_events_meta_boxes','normal', 'high');
	}
	
	function display_events_meta_boxes(){	
	?>
	<table>
		<tr>
			<td style="width: 40%">Start Time</td>
			<td><input type="datetime-local" size="40" name="start_time"  /></td>
		</tr>
		<tr>
			<td style="width: 40%">End Time</td>
			<td><input type="datetime-local" size="40" name="end_time"  /></td>
		</tr>
		<tr>
            <td style="width: 40%">Date</td>
            <td><input type="date" size="40" name="date"  /></td>
        </tr>
        <tr>
			<td style="width: 150px">Repeat</td>
			<td>
                <select style="width: 100px" name="repeat">
                  	<option value="yes">Yes</option>
  					<option value="no">No</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width: 40%">Frequency</td>
            <td><input type="text" size="40" name="frequency"  /></td>
        </tr>
    </table>
    <?php
		
		
	}
	
	
