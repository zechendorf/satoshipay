<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "satoshipay"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'SatoshiPay',
	'description' => 'Earn money with your content: This extension implements SatoshiPay paywall with micro and nanopayments (in Bitcoin).',
	'category' => 'plugin',
	'author' => 'Christopher Zechendorf',
	'author_email' => 'christopher@zechendorf.com',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.7.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.0-7.6.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
