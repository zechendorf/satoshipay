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
	 * @return void
	 * @dontverifyrequesthash
	 */
	public function showAction()
	{
		
		if($this->settings['goods']){
			$GLOBALS['TSFE']->getPageRenderer()->addJsFooterLibrary('satoshipay_js', 'https://wallet.satoshipay.io/satoshipay.js', 'text/javascript', FALSE, FALSE, '', TRUE);
			$good = $this->goodRepository->findByUid($this->settings['goods']);
			$this->view->assign('good', $good);
			$this->view->assign('teaserImageWidth', $good->getWidth()/10);
			$this->view->assign('teaserImageHeight', $good->getHeight()/10);
		}
	}

	/**
	 * action reveal
	 *
	 * @param \ZECHENDORF\Satoshipay\Domain\Model\Good $good
	 * @return void
	 * @dontverifyrequesthash
	 */
	public function revealAction(\ZECHENDORF\Satoshipay\Domain\Model\Good $good)
	{
		if($_GET['paymentCert']==$good->getSecret()){
			if($good->getType()==0){
				// it's content
				$cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');
				$content = '';
				foreach($good->getContent() as $tt_content){
					$content .= $cObject->RECORDS(array('tables'=>'tt_content','source'=>$tt_content->getUid()));
				}
				header('Content-Type: text/html');
				echo $content;
				die;
			} else if($good->getType()==1){
				// it's an image
				header('Content-Type: '.$good->getImage()->getOriginalResource()->getMimeType());
				readfile($good->getImage()->getOriginalResource()->getPublicUrl());
				die;
			} else if($good->getType()==2){
				// it's an image
				header('Content-Type: '.$good->getFile()->getOriginalResource()->getMimeType());
				readfile($good->getFile()->getOriginalResource()->getPublicUrl());
				die;
			}
		}	else {
			header('HTTP/1.0 401 Unauthorized');
			echo '<p>401 unauthorized</p>';
			die;
		}
	}

}
