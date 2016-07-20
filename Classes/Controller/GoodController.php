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
			$good = $this->goodRepository->findByUid($this->settings['goods']);
			$this->satoshipaySetGoodUrl($good);
			$this->view->assign('good', $good);
			
			if($_GET['paymentCert']==$good->getSecret()){
				header('Content-Type: text/html');
				echo '<h1>'.$good->getTitle().'</h1>';
				die;
			}
		}
		
	}
	
	private function satoshipaySetGoodUrl($good){
		$extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['satoshipay']);
					
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD,$extensionConfiguration['apiKey'].':'.$extensionConfiguration['apiSecret']);
		
		$url = $GLOBALS['TSFE']->cObj->typoLink_URL(array(
			'parameter' => $GLOBALS['TSFE']->page['uid'],
			'additionalParams' => '&tx_satoshipay[good]='.$good->getGoodId(),
			'forceAbsoluteUrl' => true,
			'forceAbsoluteUrl.' => array('scheme'=>'https')
		));
		
		$url = 'http://devel2.zechendorf.com/fileadmin/demo.php';
		
		// update the goods properties
		$data = json_encode(array(
			'url' => $url
		));
		curl_setopt($ch, CURLOPT_URL,'https://api.satoshipay.io/v1/goods/'.$good->getGoodId());
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');  
		
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data))                                                                       
		);
		
		
		// query satoshipay servers
		$serverResponse = json_decode(curl_exec($ch));
		curl_close($ch);
		return $serverResponse;
	}

}
