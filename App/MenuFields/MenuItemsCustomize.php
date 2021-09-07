<?php


namespace App\MenuFields;


use WP_Post;

class MenuItemsCustomize {

	/**
	 * MenuItemsFields constructor.
	 */
	public function __construct() {

		add_action( 'wp_nav_menu_item_custom_fields', [ $this, 'fields_callback' ], 10, 2 );
		add_action( 'wp_update_nav_menu_item', [ $this, 'fields_save' ], 10, 2 );

		add_filter( 'nav_menu_item_title', [ $this, 'custom_menu_title' ], 10, 2 );

	}


	/**
	 * Add custom fields to menu item
	 *
	 * This will allow us to play nicely with any other plugin that is adding the same hook
	 *
	 * @param int $item_id
	 * @param $item
	 * @params obj $item - the menu item
	 * @params array $args
	 */
	public function fields_callback( int $item_id, $item ) {


		wp_nonce_field( 'custom_menu_meta_nonce', '_custom_menu_meta_nonce_name' );
		$custom_menu_meta = get_post_meta( $item_id, '_custom_menu_meta', true );
		?>
		<div class="field-custom_menu_meta description-wide nipper-settings"  style="margin: 5px 0;">
			<b class="description"><?php _e( "Время", 'html5blank' ); ?></b>
			<br/>

			<input type="hidden" class="nav-menu-id" value="<?php echo $item_id; ?>"/>

			<div class="logged-input-holder">
				<input type="text" name="custom_menu_meta[<?php echo $item_id; ?>]"
				       id="custom-menu-meta-for-<?php echo $item_id; ?>"
				       value="<?php echo esc_attr( $custom_menu_meta ); ?>"/>
			</div>

		</div>
		<?php
	}


	/**
	 * Save the menu item meta
	 *
	 * @param int $menu_id
	 * @param int $menu_item_db_id
	 *
	 * @return int
	 */
	public function fields_save( int $menu_id, int $menu_item_db_id ): int {

		// Verify this came from our screen and with proper authorization.
		if ( ! isset( $_POST['_custom_menu_meta_nonce_name'] ) || ! wp_verify_nonce( $_POST['_custom_menu_meta_nonce_name'], 'custom_menu_meta_nonce' ) ) {
			return $menu_id;
		}


		if ( isset( $_POST['custom_menu_meta'][ $menu_item_db_id ] ) ) {
			$sanitized_data = sanitize_text_field( $_POST['custom_menu_meta'][ $menu_item_db_id ] );
			update_post_meta( $menu_item_db_id, '_custom_menu_meta', $sanitized_data );
		} else {
			delete_post_meta( $menu_item_db_id, '_custom_menu_meta' );
		}

		return $menu_id;
	}


	/**
	 * Displays text on the front-end.
	 *
	 * @param string $title The menu item's title.
	 * @param WP_Post $item The current menu item.
	 *
	 * @return string
	 */
	public function custom_menu_title( string $title, WP_Post $item ): string {

		if ( is_object( $item ) && isset( $item->ID ) ) {

			$custom_menu_meta = get_post_meta( $item->ID, '_custom_menu_meta', true );

			if ( ! empty( $custom_menu_meta ) ) {
				$title .= ' - ' . $custom_menu_meta;
			}
		}

		return $title;
	}


}


