<?php

namespace mattf\test\tests\functional;

/**
* @group functional
*/
class trouble_test extends \phpbb_functional_test_case
{
	protected static function setup_extensions()
	{
		return ['mattf/test'];
	}

	public function test_module_page()
	{
		$this->login();
		$this->admin_login();

		// While we're here, lets enable quick reply, so we can test that later
		$this->add_lang('acp/board');
		$crawler = self::request('GET', "adm/index.php?i=acp_board&mode=post&sid={$this->sid}");
		$form = $crawler->selectButton('allow_quick_reply_enable')->form();
		$crawler = self::submit($form);
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('CONFIG_UPDATED', $crawler->text());
	}
}
