<?php

/**
 * PHP version 5
 * @copyright  Oliver Lohoff 
 * @author     Oliver Lohoff, info@contao4you.de 
 * @package    sis-reader 
 * @license    GNU/LGPL 
 * @filesource
 */

namespace Contao4You;
/**
 * Class sis-reader 
 *
 * @copyright  Oliver Lohoff 
 * @author     Oliver Lohoff, info@contao4you.de 
 * @package    Controller
 */
class ModuleSISReader extends \Module
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
			$objTemplate = new \BackendTemplate('be_wildcard');

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
		$objTemplate = new \FrontendTemplate($tpl);
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
		$datei = 'system/tmp/sis_' . substr(md5($strArt . $auf), 0,8) . ".xml";
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