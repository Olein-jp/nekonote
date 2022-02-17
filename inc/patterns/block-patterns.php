<?php
/**
 * NEKONOTE: Block Patterns
 *
 * @package nekonote
 */
add_action(
	'init',
	function () {
		$nekonote_block_pattern_categories = [
			'feature' => [ 'label' => 'フューチャー' ],
			'header'  => [ 'label' => 'ヘッダー' ],
		];

		$nekonote_block_pattern_categories = apply_filters( 'nekonote_block_pattern_categories', $nekonote_block_pattern_categories );

		foreach ( $nekonote_block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}

		$nekonote_block_patterns = [
			'footer-dark',
		];

		$nekonote_block_patterns = apply_filters( 'nekonote_block_patterns', $nekonote_block_patterns );

		foreach ( $nekonote_block_patterns as $block_pattern ) {
			$block_pattern_file = NEKONOTE_PLUGIN_PATH . 'inc/patterns/assets/' . $block_pattern . '.php';

			register_block_pattern(
				'nekonote/' . $block_pattern,
				require $block_pattern_file
			);
		}
	}
);
