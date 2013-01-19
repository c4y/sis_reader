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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Contao4You',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao4You\ModuleSISReader'  => 'system/modules/sis_reader/ModuleSISReader.php',

));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_sis'                   => 'system/modules/sis_reader/templates',
    'sis_gesamtspielplan'       => 'system/modules/sis_reader/templates',
    'sis_heimspiele'            => 'system/modules/sis_reader/templates',
    'sis_letztenspiele'         => 'system/modules/sis_reader/templates',
    'sis_naechstenspiele'       => 'system/modules/sis_reader/templates',
    'sis_spielemannschaft'       => 'system/modules/sis_reader/templates',
    'sis_tabelle'               => 'system/modules/sis_reader/templates',
));
