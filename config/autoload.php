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
	'Losungen\Losungen'        => 'system/modules/dielosungen/classes/Losungen.php',
	'Losungen\LosungModule'    => 'system/modules/dielosungen/classes/LosungModule.php',

	// Models
	'Losungen\LosungenModel'   => 'system/modules/dielosungen/models/LosungenModel.php',

	// Modules
	'Losungen\ModuleDieLosung' => 'system/modules/dielosungen/modules/ModuleDieLosung.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_import_losungen' => 'system/modules/dielosungen/templates',
	'mod_dielosung'      => 'system/modules/dielosungen/templates',
));
