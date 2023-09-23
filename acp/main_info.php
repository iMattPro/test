<?php
/**
 *
 * Test. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023, Matt F
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace mattf\test\acp;

/**
 * Test ACP module info.
 */
class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\mattf\test\acp\main_module',
			'title'		=> 'ACP_TEST_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_TEST',
					'auth'	=> 'ext_mattf/test && acl_a_board',
					'cat'	=> ['ACP_TEST_TITLE'],
				],
			],
		];
	}
}
