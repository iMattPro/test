<?php
/**
 *
 * Test. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023, Matt F
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace mattf\test\migrations;

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['mattf_test_goodbye']);
	}

	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\v320'];
	}

	public function update_data()
	{
		return [
			['config.add', ['mattf_test_goodbye', 0]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_TEST_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_TEST_TITLE',
				[
					'module_basename'	=> '\mattf\test\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
