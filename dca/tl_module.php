<?php

/**
 * PHP version 5
 * @copyright  Oliver Lohoff
 * @author     Oliver Lohoff, info@contao4you.de
 * @package    sis-reader
 * @license    GNU/LGPL
 * @filesource
 */


/**
 * Add palettes to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['sisreader']    = '{title_legend},name,headline,type;{config_legend}, sis_art, sis_liga, cssID';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['sis_liga'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sis_liganummer'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'					  => array('alwaysSave' => true),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sis_art'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sis_art'],
	'default'                 => 'all_items',
	'exclude'                 => true,
	'inputType'               => 'radio',
	'options'                 => array('tabelle' => "Tabelle",
	                                   'allespieleverein' => "Alle Spiele des Vereins",
	                                   'allespieleliga' => "Alle Spiele der Liga",
									   'naechsten15spieleverein' => 'Nächsten 15 Spiele des Verein',
									   'naechsten15spieleliga' => 'Nächsten 15 Spiele der Liga',
									   'spielemannschaft' => 'Nächsten 15 Spiele der Mannschaft',
									   'naechsten30spieleverein' => 'Nächsten 30 Spiele des Vereins',
									   'heimspieleverein' => 'Nächsten Heimspiele des Vereins',
									   'letzten15spieleverein' => 'Letzten 15 Spiele des Verein',
									   'letzten15spieleliga' => 'Letzten 15 Spiele der Liga'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);