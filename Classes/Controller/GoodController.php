<?php
namespace ZECHENDORF\Satoshipay\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * GoodController
 */
class GoodController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * goodRepository
	 *
	 * @var \ZECHENDORF\Satoshipay\Domain\Repository\GoodRepository
	 * @inject
	 */
	protected $goodRepository = NULL;

	/**
	 * action show
	 *
	 * @param \ZECHENDORF\Satoshipay\Domain\Model\Good $good
	 * @return void
	 */
	public function showAction()
	{
		
		if($this->settings['goods']){
			$GLOBALS['TSFE']->getPageRenderer()->addJsFooterLibrary('satoshipay_js', 'https://wallet.satoshipay.io/satoshipay.js', 'text/javascript', FALSE, FALSE, '', TRUE);
			$good = $this->goodRepository->findByUid($this->settings['goods']);
			$this->view->assign('good', $good);
			
			if($_GET['paymentCert']==$good->getSecret()){
				header('Content-Type: text/html');
				echo '<h1>'.$good->getTitle().'</h1>';
				die;
			}
		}
		
	}

}
