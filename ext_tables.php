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

/***************
 * Reset extConf array to avoid errors
 */
if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

$pluginSignature = 'satoshipay_satoshipay';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue( $pluginSignature, 'FILE:EXT:satoshipay/Configuration/FlexForms/Good.xml');
