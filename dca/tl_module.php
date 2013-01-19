<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Leo Feyer 2005-2011
 * @author     Leo Feyer <http://www.contao.org>
 * @package    News
 * @license    LGPL
 * @filesource
 */


/**
 * Add palettes to tl_module
 */
//array_insert($GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'], 0, 'sis_ligaspiele');
$GLOBALS['TL_DCA']['tl_module']['palettes']['sisreader']    = '{title_legend},name,headline,type;{config_legend}, sis_art, sis_liga, cssID';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['sis_ligaspiele'] = 'sis_liga';
/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['sis_liga'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sis_liganummer'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'					  => array('alwaysSave' => true)
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
									   'letzten15spieleliga' => 'Letzten 15 Spiele der Liga')
);
/*$GLOBALS['TL_DCA']['tl_module']['fields']['sis_ligaspiele'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sis_ligaspiele'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange' => true)
);*/