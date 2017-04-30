<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Satoshipay',
	array(
		'Good' => 'show, reveal',
	),
	// non-cacheable actions
	array(
		'Good' => 'show, reveal',
	)
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =        'EXT:satoshipay/Classes/Hooks/GoodIdHook.php:ZECHENDORF\Satoshipay\Hooks\GoodIdHook';

$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'][] = 'tx_satoshipay_satoshipay[good]';
$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'][] = 'tx_satoshipay_satoshipay[action]';
$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'][] = 'tx_satoshipay_satoshipay[controller]';
