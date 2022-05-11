<?php
/*
Plugin Name: Recently Registered
Plugin URI: http://halfelf.org/plugins/recently-registered/
Description: Add a sortable column to the users list to show registration date.
Version: 3.5
Author: Mika Epstein
Author URI: http://halfelf.org/
Text Domain: recently-registered
Network: true

Copyright 2009-2022 Mika Epstein (email: ipstenu@halfelf.org)

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

class RRHE {

	/**
	 * Let's get this party started
	 *
	 * @since 3.4
	 * @access public
	 */

	public function __construct() {
		add_action( 'admin_init', array( &$this, 'admin_init' ) );
	}


	/**
	 * All init functions
	 *
	 * @since 3.4
	 * @access public
	 */

	public function admin_init() {
		if ( is_admin() ) {
			add_filter( 'manage_users_columns', array( $this, 'users_columns' ) );
			add_action( 'manage_users_custom_column', array( $this, 'users_custom_column' ), 10, 3 );
			add_filter( 'manage_users_sortable_columns', array( $this, 'users_sortable_columns' ) );
			add_filter( 'request', array( $this, 'users_orderby_column' ) );
			add_action( 'plugins_loaded', array( $this, 'load_this_textdomain' ) );
			add_filter( 'plugin_row_meta', array( $this, 'donate_link' ), 10, 2 );	
		}
	}

	/**
	 * Registers column for display
	 *
	 * @since 2.0
	 * @access public
	 */

	public static function users_columns( $columns ) {
		$columns['registerdate'] = _x( 'Registered', 'user', 'recently-registered' );
		return $columns;
	}

	/**
	 * Handles the registered date column output.
	 *
	 * This uses the same code as column_registered, which is why
	 * the date isn't filterable.
	 *
	 * @since 2.0
	 * @access public
	 *
	 * @global string $mode
	 */

	public static function users_custom_column( $value, $column_name, $user_id ) {

		global $mode;

		$list_mode = empty( $_REQUEST['mode'] ) ? 'list' : sanitize_text_field( $_REQUEST['mode'] );

		if ( 'registerdate' !== $column_name ) {
			return $value;
		} else {
			$user = get_userdata( $user_id );

			if ( is_multisite() && ( 'list' === $list_mode ) ) {
				$formated_date = __( 'Y/m/d', 'recently-registered' );
			} else {
				$formated_date = __( 'Y/m/d g:i:s a', 'recently-registered' );
			}

			$registered = strtotime( get_date_from_gmt( $user->user_registered ) );

			// If the date is negative or in the future, then something's wrong, so we'll be unknown.
			if ( ( $registered <= 0 ) || ( time() <= $registered ) ) {
				$registerdate = '<span class="recently-registered invalid-date">' . __( 'Unknown', 'recently-registered' ) . '</span>';
			} else {
				$registerdate = '<span class="recently-registered valid-date">' . date_i18n( $formated_date, $registered ) . '</span>';
			}

			return $registerdate;
		}
	}

	/**
	 * Makes the column sortable
	 *
	 * @since 1.0
	 * @access public
	 */

	public static function users_sortable_columns( $columns ) {
		$custom = array(
			// meta column id => sortby value used in query
			'registerdate' => 'registered',
		);
		return wp_parse_args( $custom, $columns );
	}

	/**
	 * Calculate the order if we sort by date.
	 *
	 * @since 1.0
	 * @access public
	 */
	public static function users_orderby_column( $vars ) {
		if ( isset( $vars['orderby'] ) && 'registerdate' == $vars['orderby'] ) {

			$new_vars = array(
				'meta_key' => 'registerdate',
				'orderby'  => 'meta_value',
			);

			$vars = array_merge( $vars, $new_vars );
		}
		return $vars;
	}

	/**
	 * Internationalization - We're just going to use the language packs for this.
	 *
	 * @since 3.4
	 * @access public
	 */
	public function load_this_textdomain() {
		load_plugin_textdomain( 'recently-registered' );
	}

	/**
	 * Slap a donate link back into the plugin links. Show some love
	 *
	 * @since 2.x
	 * @access public
	 */
	public function donate_link( $links, $file ) {
		if ( plugin_basename( __FILE__ ) == $file ) {
			$donate_link = '<a href="https://ko-fi.com/A236CEN/">' . __( 'Donate', 'recently-registered' ) . '</a>';
			$links[] = $donate_link;
		}
		return $links;
	}

}

new RRHE();
