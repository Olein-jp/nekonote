<?php
/**
 * NEKONOTE: Block Styles
 *
 * @package nekonote
 */

/**
 * Register Block Styles
 */
add_action(
	'init',
	function() {
		$block_styles = [
			[
				'target' => 'core/heading',
				'name'   => 'counted-heading',
				'label'  => '連番付き見出し',
			],
			[
				'target' => 'core/paragraph',
				'name'   => 'test-block-style-02',
				'label'  => 'ラベルテスト2',
			],
		];

		foreach ( $block_styles as $block_style ) {
			register_block_style(
				$block_style['target'],
				array(
					'name'  => $block_style['name'],
					'label' => $block_style['label'],
				)
			);
		}
	}
);
