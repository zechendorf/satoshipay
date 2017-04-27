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

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
		$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
		if($this->settings['goods']){
			$pageRenderer->addJsFooterLibrary(
				'satoshipay_js', 
				'https://wallet.satoshipay.io/satoshipay.js', 
				'text/javascript', 
				FALSE, 
				FALSE,
				'', 
				TRUE
			);
			$good = $this->goodRepository->findByUid($this->settings['goods']);
			
			if($good->getType()==1){
				// if it is an image
				
				// set if width & height are defined
				$hasWidthAndHeight = false;
				if($good->getWidth() && $good->getHeight()){
					$hasWidthAndHeight = true;
				}
				
				// set the imageTeaser if not defined
				if(!$good->getImageTeaser()){
					$cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');
					$imageTeaserTypoScript = array(
						'file' => 'GIFBUILDER',
						'file.' => array(
							'XY' => '[10.w],[10.h]',
							'10' =>'IMAGE',
							'10.' => array(
								'file' => $good->getImage()->getOriginalResource()->getPublicUrl()
							),
							'20' => 'SCALE',
							'20.' => array('params'=>'-blur 0x6')
						),
						'layoutKey' => 'default',
						'layout.' => array(
							'default.' => array(
								'element' => '###SRC###',
								'source' => ''
							)
						)
					);
					$imageTeaser = $cObject->IMAGE($imageTeaserTypoScript);
					$this->view->assign('imageTeaser', $imageTeaser);
				}
				
			}
			$this->view->assign('hasWidthAndHeight', $hasWidthAndHeight);
			$this->view->assign('good', $good);
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
				$this->response->setHeader('Content-Type', 'text/html', true);
				$this->response->sendHeaders();
				echo $content;
				exit;
			} else if($good->getType()==1){
				// it's an image
				$this->response->setHeader('Content-Type', $good->getImage()->getOriginalResource()->getMimeType(), true);
				$this->response->sendHeaders();
				@readfile($good->getImage()->getOriginalResource()->getPublicUrl());
				exit;
			} else if($good->getType()==2){
				// it's a file
				$this->response->setHeader('Content-Type', $good->getFile()->getOriginalResource()->getMimeType(), true);
				$this->response->sendHeaders();
				@readfile($good->getFile()->getOriginalResource()->getPublicUrl());
				exit;
			}
		}	else {
			header('HTTP/1.0 401 Unauthorized');
			echo '<p>401 unauthorized</p>';
			die;
		}
	}

}
