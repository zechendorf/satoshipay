<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Satoshipay',
	'SatoshiPay'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'SatoshiPay');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_satoshipay_domain_model_good', 'EXT:satoshipay/Resources/Private/Language/locallang_csh_tx_satoshipay_domain_model_good.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_satoshipay_domain_model_good');
