<?php
/*
Plugin Name: Recently Registered
Plugin URI: http://halelf.org/plugins/recently-registered/
Description: Add a sortable column to the users list on Single Site WordPress to show registration date.
Version: 2.3
Author: Mika Epstein
Author URI: http://www.ipstenu.org/

Copyright 2009-11 Mika Epstein (email: ipstenu@ipstenu.org)

    This file is part of Recently Registered, a plugin for WordPress.

    Recently Registered is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    (at your option) any later version.

    Recently Registered is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with WordPress.  If not, see <http://www.gnu.org/licenses/>.

*/

global $wp_version;
$exit_msg_ms  = 'Sorry, this plugin is not supported (and will not work) on WordPress MultiSite.';
$exit_msg_ver = 'Sorry, this plugin is not supported on pre-3.1 WordPress installs.';
if( is_multisite() ) { exit($exit_msg_ms); }
if (version_compare($wp_version,"3.1","<")) { exit($exit_msg_ver); }

// This makes the column and makes it sortable
	// Register the column - Registered
	function registerdate($columns) {
		$columns['registerdate'] = __('Registered', 'registerdate');
		return $columns;
	}
	add_filter('manage_users_columns', 'registerdate');

	// Display the column content
	function registerdate_columns( $value, $column_name, $user_id ) {
        if ( 'registerdate' != $column_name )
           return $value;
        $user = get_userdata( $user_id );
        $registerdate = $user->user_registered;
        $registerdate = date_i18n(get_option('date_format') ,strtotime($registerdate) );
        return $registerdate;
	}
	add_action('manage_users_custom_column',  'registerdate_columns', 10, 3);

	function registerdate_column_sortable($columns) {
          $custom = array(
		  // meta column id => sortby value used in query
          'registerdate'    => 'registered',
          );
      return wp_parse_args($custom, $columns);
	}
	add_filter( 'manage_users_sortable_columns', 'registerdate_column_sortable' );

	function registerdate_column_orderby( $vars ) {
        if ( isset( $vars['orderby'] ) && 'registerdate' == $vars['orderby'] ) {
                $vars = array_merge( $vars, array(
                        'meta_key' => 'registerdate',
                        'orderby' => 'meta_value'
                ) );
        }
        return $vars;
	}
	add_filter( 'request', 'registerdate_column_orderby' );
	
// donate link on manage plugin page
	add_filter('plugin_row_meta', 'registerdate_donate_link', 10, 2);
	function registerdate_donate_link($links, $file) {
        if ($file == plugin_basename(__FILE__)) {
                $donate_link = '<a href="https://www.wepay.com/donations/halfelf-wp">Donate</a>';
                $links[] = $donate_link;
        }
        return $links;
}