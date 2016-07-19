<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Satoshipay',
	array(
		'Good' => 'show',
		
	),
	// non-cacheable actions
	array(
		'Good' => '',
		
	)
);
