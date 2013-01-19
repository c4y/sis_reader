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
 * @copyright  Oliver Lohoff 
 * @author     Oliver Lohoff, info@contao4you.de 
 * @package    sis-reader 
 * @license    GNU/LGPL 
 * @filesource
 */


/**
 * Class sis-reader 
 *
 * @copyright  Oliver Lohoff 
 * @author     Oliver Lohoff, info@contao4you.de 
 * @package    Controller
 */
class ModuleSISReader extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_sis';
	protected $strVerein = '';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### SIS - Reader ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;

			return $objTemplate->parse();
		}
		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->strVerein = $GLOBALS['TL_CONFIG']['sisverein'];
		$xmldatei = $this->aktualisiereDaten($this->sis_art, $this->sis_liga, $this->strVerein);
		switch ($this->sis_art)
		{
			case 'tabelle': $tpl = 'sis_tabelle'; break;
			case 'allespieleliga'           : $tpl = 'sis_naechstenspiele'; break;
			case 'allespieleverein'         : $tpl = 'sis_naechstenspiele'; break;
			case 'heimspieleverein'         : $tpl = 'sis_heimspiele'; break;
			case 'spielemannschaft'         : $tpl = 'sis_spielemannschaft'; break;
			case 'naechsten15spieleliga'    : $tpl = 'sis_naechstenspiele'; break;
			case 'naechsten30spieleverein'  : $tpl = 'sis_gesamtspielplan'; break;
			case 'naechsten15spieleverein'  : $tpl = 'sis_naechstenspiele'; break;
			case 'letzten15spieleliga'      : $tpl = 'sis_letztenspiele'; break;
			case 'letzten15spieleliga'      : $tpl = 'sis_letztenspiele'; break;
		}
		$objTemplate = new FrontendTemplate($tpl);
		$objTemplate->sis_verein = $this->strVerein;
		$objTemplate->sis_liga    = $this->Template->sis_liga;
		$objTemplate->xmldatei = $xmldatei;
		$this->Template->daten = $objTemplate->parse();
	}

	protected function aktualisiereDaten($strArt, $strLiga)
	{

		// SIS - Benutzerdaten auslesen
		$login = $GLOBALS['TL_CONFIG']['sisuser'];
		$pass  = $GLOBALS['TL_CONFIG']['sispass'];

		// Die SIS - Parameter zuordnen
		switch ($strArt)
		{
			case 'tabelle'                  : $art = 4; $auf = $strLiga; break;
			case 'allespieleliga'           : $art = 1; $auf = $strLiga; break;
			case 'allespieleverein'         : $art = 1; $auf = $this->strVerein; break;
			case 'heimspieleverein'         : $art = 1; $auf = $this->strVerein; break;
			case 'spielemannschaft'         : $art = 1; $auf = $strLiga; break;
			case 'naechsten15spieleliga'    : $art = 3; $auf = $strLiga; break;
			case 'naechsten30spieleverein'  : $art= 11; $auf = $this->strVerein; break;
			case 'naechsten15spieleverein'  : $art = 3; $auf = $this->strVerein; break;
			case 'letzten15spieleliga'      : $art = 2; $auf = $strLiga; break;
			case 'letzten15spieleverein'    : $art = 2; $auf = $this->strVerein; break;
		}

		// Den Dateinamen bestimmen
		$datei = 'system/html/sis_' . substr(md5($strArt . $auf), 0,8) . ".xml";
		// Url generieren
		$this->sisUrl = "http://sis-handball.de/xmlexport/xml_dyn.aspx?art=$art&auf=$auf&user=$login&pass=$pass";
		if (file_exists($datei))
		{
			$letzteAenderung = filemtime($datei);
			if ( (time() - $letzteAenderung) > 3600)
			{
				// Laden
				$content = file_get_contents($this->sisUrl);
				// Parsen
				$doc = simplexml_load_string($content);
				$doc->saveXML($datei);
			}
		} else{
			$content = file_get_contents($this->sisUrl);
			// Parsen
			$doc = simplexml_load_string($content);
			$doc->saveXML($datei);
		}
		return $datei;
	}
}

?>