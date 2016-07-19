<?php

namespace ZECHENDORF\Satoshipay\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \ZECHENDORF\Satoshipay\Domain\Model\Good.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christopher Zechendorf <christopher@zechendorf.com>
 */
class GoodTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ZECHENDORF\Satoshipay\Domain\Model\Good
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ZECHENDORF\Satoshipay\Domain\Model\Good();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSecretReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSecret()
		);
	}

	/**
	 * @test
	 */
	public function setSecretForStringSetsSecret()
	{
		$this->subject->setSecret('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'secret',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGoodIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getGoodId()
		);
	}

	/**
	 * @test
	 */
	public function setGoodIdForStringSetsGoodId()
	{
		$this->subject->setGoodId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'goodId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPriceReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPriceForIntSetsPrice()
	{	}

	/**
	 * @test
	 */
	public function getAccountReturnsInitialValueForAccount()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getAccount()
		);
	}

	/**
	 * @test
	 */
	public function setAccountForAccountSetsAccount()
	{
		$accountFixture = new \ZECHENDORF\Satoshipay\Domain\Model\Account();
		$this->subject->setAccount($accountFixture);

		$this->assertAttributeEquals(
			$accountFixture,
			'account',
			$this->subject
		);
	}
}
