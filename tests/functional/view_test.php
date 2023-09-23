<?php
/**
 *
 * Test. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023, Matt F
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace mattf\test\tests\functional;

/**
 * @group functional
 */
class view_test extends \phpbb_functional_test_case
{
	/**
	 * @inheritdoc
	 */
	protected static function setup_extensions()
	{
		return ['mattf/test'];
	}

	/**
	 * Test crawls the extension's page route /demo/ with the variable: foo
	 * Asserts that only the expected text is found, "Hello foo"
	 */
	public function test_view_foo()
	{
		$crawler = self::request('GET', 'app.php/demo/foo');
		self::assertStringContainsString('foo', $crawler->filter('h2')->text());

		$this->add_lang_ext('mattf/test', 'common');
		self::assertStringContainsString($this->lang('TEST_HELLO', 'foo'), $crawler->filter('h2')->text());
		self::assertStringNotContainsString($this->lang('TEST_GOODBYE', 'foo'), $crawler->filter('h2')->text());

		$this->assertNotContainsLang('ACP_TEST_GOODBYE', $crawler->filter('h2')->text());
	}

	/**
	 * Test crawls the extension's page route /demo/ again with a new variable: bar
	 * Asserts that only the expected text "bar" is found and that "foo" is no longer present.
	 */
	public function test_view_bar()
	{
		$crawler = self::request('GET', 'app.php/demo/bar');
		self::assertStringNotContainsString('foo', $crawler->filter('h2')->text());
		self::assertStringContainsString('bar', $crawler->filter('h2')->text());
	}
}
