<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Losungen',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Losungen\Losungen'        => 'system/modules/die_losungen/classes/Losungen.php',
	'Losungen\LosungModule'    => 'system/modules/die_losungen/classes/LosungModule.php',

	// Models
	'Losungen\LosungenModel'   => 'system/modules/die_losungen/models/LosungenModel.php',

	// Modules
	'Losungen\ModuleDieLosung' => 'system/modules/die_losungen/modules/ModuleDieLosung.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_import_losungen' => 'system/modules/die_losungen/templates',
	'mod_dielosung'      => 'system/modules/die_losungen/templates',
));
