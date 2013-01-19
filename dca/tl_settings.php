<?php if(!defined('TL_ROOT')) die('You can not access this file directly!');

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
 *
 * PHP version 5
 * @copyright  Oliver Lohoff 2011
 * @author     Oliver Lohoff <info@contao4you.de>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
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