<?php

namespace ZECHENDORF\Satoshipay\Hooks;

class GoodIdHook
{
	public function processDatamap_preProcessFieldArray( array &$fieldArray, $table, $id, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj )
	{
		if($table == 'tx_satoshipay_domain_model_good'){
			//var_dump($fieldArray); die;
			if(!$fieldArray['good_id']){
				// there is no good id yet - we create the good with satoshipay
				
				// if there is no price: default to 1000
				if(!$fieldArray['price']){ 
					$fieldArray['price'] = 1000;
				}
				
				// create a "secret"
				$fieldArray['secret'] = hash('sha256',mt_rand(0,2^512));
				
				// create the good with satoshipay
				$serverResponse = $this->satoshipayQuery($fieldArray);
				
				if(property_exists($serverResponse,'id')){
					// the good was successfully created we set the good_id
					$fieldArray['good_id'] = $serverResponse->id;
				} else {
					// something went wrong
					var_dump($serverResponse); die;
				}
				
			} else {
				// the good already exists - we update it
				
				// set a new secret if there is none
				if(!$fieldArray['secret']){ $fieldArray['secret'] = hash('sha256',mt_rand(0,2^512));}
				
				$serverResponse = $this->satoshipayQuery($fieldArray,'update');
			}
		}
	}
	
	private function satoshipayQuery($fieldArray, $action = 'create'){		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'xxx:xxx');
		
		if($action=='create'){
			// set the goods properties
			$data = json_encode(array(
				'secret' => $fieldArray['secret'],
				'price' => $fieldArray['price'],
				'title' => $fieldArray['title'],
				'url' => 'https://devel2.zechendorf.com/'
			));
			curl_setopt($ch, CURLOPT_URL,'https://api.satoshipay.io/v1/goods');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');   
		} else if($action=='update'){
			// update the goods properties
			$data = json_encode(array(
				'secret' => $fieldArray['secret'],
				'price' => $fieldArray['price'],
				'title' => $fieldArray['title'],
				'url' => 'https://devel2.zechendorf.com/'
			));
			curl_setopt($ch, CURLOPT_URL,'https://api.satoshipay.io/v1/goods/'.$fieldArray['good_id']);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');  
		} 
		
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data))                                                                       
		);
		
		
		// query satoshipay servers
		$serverResponse = json_decode(curl_exec($ch));
		curl_close($ch);
		
		//var_dump($serverResponse); die;
		
		return $serverResponse;
	}
}
