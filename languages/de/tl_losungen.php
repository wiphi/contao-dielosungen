<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   Die Losungen
 * @author    Philipp Winkel
 * @license   GNU
 * @copyright 2017
 */


/**
 * DCA tl_losungen
 */
$GLOBALS['TL_LANG']['tl_losungen']['datum_legend'] = 'Tag, Datumsinformationen';
$GLOBALS['TL_LANG']['tl_losungen']['datum'] = array('Datum', 'Datum der Losung');
$GLOBALS['TL_LANG']['tl_losungen']['wochentag'] = array('Wochentag', 'Wochentag der Losung');
$GLOBALS['TL_LANG']['tl_losungen']['sonntag'] = array('Sonntag', 'Name des Sonntags im Kirchenjahr.');
$GLOBALS['TL_LANG']['tl_losungen']['sonntag_full'] = array('Sonntag (mit Zusatz)', 'Name des Sonntags im Kirchenjahr (mit Zusatzinformationen).');

$GLOBALS['TL_LANG']['tl_losungen']['losung_legend'] = 'Die Losung';
$GLOBALS['TL_LANG']['tl_losungen']['losungstext'] = array('Losungstext', 'Der Losungstext.');
$GLOBALS['TL_LANG']['tl_losungen']['losungsvers'] = array('Losungsvers', 'Vers der Losung');

$GLOBALS['TL_LANG']['tl_losungen']['lehrtext_legend'] = 'Lehrtext';
$GLOBALS['TL_LANG']['tl_losungen']['lehrtext'] = array('Lehrtext', 'Lehrtext zur Losung.');
$GLOBALS['TL_LANG']['tl_losungen']['lehrtextvers'] = array('Lehrtextvers', 'Vers des Lehrtextes.');

$GLOBALS['TL_LANG']['tl_losungen']['new'] = array('Neue Losung hinzufügen', 'Fügen Sie eine neue Losung hinzu. ACHTUNG! Es ist besser eine aktuelle Losungsdatei zu importieren!');
$GLOBALS['TL_LANG']['tl_losungen']['show'] = array('Losung', 'Details zur Losung ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_losungen']['edit']   = array('Losung bearbeiten', 'Bearbeite Losung ID %s. ACHTUNG! Das nachträgliche Bearbeiten der Texte ist nur für den Notfall gedacht!');
$GLOBALS['TL_LANG']['tl_losungen']['delete'] = array('Losung löschen', 'Lösche Losung ID %s ACHTUNG! Niemlas sollte eine zukünftige Losung gelöscht werden!');

$GLOBALS['TL_LANG']['tl_losungen']['importlosungen'] = array('Die Losung importieren', 'Importieren Sie eine aktuelle Losungsdatei.');
$GLOBALS['TL_LANG']['tl_losungen']['losungenFileInfo'] = array(
        '1. Losungsdatei von losungen.de herunterladen', 
        'Eine aktuelle Losungsdatei im <b>XML Format</b> kann unter <b>%s</b> heruntergeladen werden.',
        'http://www.losungen.de/download/');
$GLOBALS['TL_LANG']['tl_losungen']['losungenFileUpload'] = array('2. Losungsdatei auswählen und importieren', 'Bitte wählen Sie eine Losungsdatei für den Import aus. Diese muss eine gültige XML Datei sein. Sollte ein Imprt mehrmals erfolgen, werden die Daten überschrieben.');
$GLOBALS['TL_LANG']['tl_losungen']['fileNotExists'] = 'Datei existiert nicht!';
$GLOBALS['TL_LANG']['tl_losungen']['fileTransmitError'] = 'Datei wurde nicht korrekt übertragen!';
$GLOBALS['TL_LANG']['tl_losungen']['filenoXml'] = 'Datei ist keine XML-Datei!';
$GLOBALS['TL_LANG']['tl_losungen']['losungenTagNotFound'] = '"<Losungen></Losungen>"-Tag nicht gefunden!';
$GLOBALS['TL_LANG']['tl_losungen']['losungenAdded'] = '%s Losungen hinzugefügt.';
$GLOBALS['TL_LANG']['tl_losungen']['losungenUpdated'] = '%s Losungen aktualisiert.';
$GLOBALS['TL_LANG']['tl_losungen']['losungenImportSuccesfull'] = '<>< Losungen erfolgreich importiert. <><';
$GLOBALS['TL_LANG']['tl_losungen']['losungenImportError'] = 'Losungen konnten leider nicht importiert werden, bitte überprüfen Sie die Datei.';