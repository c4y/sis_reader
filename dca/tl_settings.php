<?php

/**
 * PHP version 5
 * @copyright  Oliver Lohoff
 * @author     Oliver Lohoff, info@contao4you.de
 * @package    sis-reader
 * @license    GNU/LGPL
 * @filesource
 */


$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace('{date_legend}', '{sis_legend:hide},sisverein, sisuser, sispass;{date_legend}', $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_settings']['fields']['sisuser'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['sisuser'],
			'exclude'                 => true,
			'inputType'               => 'text'
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['sispass'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['sispass'],
			'exclude'                 => true,
			'inputType'               => 'text'
		);
$GLOBALS['TL_DCA']['tl_settings']['fields']['sisverein'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['sisverein'],
			'exclude'                 => true,
			'inputType'               => 'text'
		);
?>