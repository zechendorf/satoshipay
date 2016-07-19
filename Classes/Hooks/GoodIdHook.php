<?php

namespace \ZECHENDORF\Satoshipay\Hooks;

class GoodIdHook
{
	public function processDatamap_preProcessFieldArray( array $fieldArray, $table, $id, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj )
	{
		if($table == 'tx_satoshipay_domain_model_good'){
			//$fieldArray['secret']
		} else {
			var_dump($table); die;
		}
	}
}
