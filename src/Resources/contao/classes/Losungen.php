<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   Losungen
 * @author    Philipp Winkel
 * @license   GNU
 * @copyright &#40;c&#41; Philipp Winkel 2017
 */


/**
 * Namespace
 */
namespace WiPhi\DieLosungen;

use Contao\Backend;
use Contao\BackendTemplate;
use Contao\BackendUser;
use Contao\DataContainer;
use Contao\Date;
use Contao\Environment;
use Contao\File;
use Contao\Input;
use Contao\Message;
use Contao\StringUtil;
use Contao\System;
use Contao\TextField;
use Contao\Upload;
use WiPhi\DieLosungen\LosungenModel;


/**
 * Class Losungen
 *
 * @copyright  &#40;c&#41; Philipp Winkel 2017
 * @author     Philipp Winkel
 * @package    DieLosungen
 */
class Losungen extends Backend
{
	protected $blnSave = true;

	protected $strLosungenFilename = '';

	/**
	 * Ruft den Improt-Dialog für die Losung-XML auf
	 * @param DataContainer $dc DC der Losungen
	 *
	 * @return string Geparster Import-Dialog 
	 */
	public function importlosungen(DataContainer $dc)
	{
		if (Input::get('key') != 'importlosungen')
		{
			return '';
		}

		// Backend-Objekte laden
		$this->import(BackendUser::class, 'User');
		$this->loadLanguageFile("tl_losungen");
		$requestToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();  		

		// Template laden & generieren
		// Environment setzen
		$this->template = new BackendTemplate('be_import_losungen');		
		$this->template->headline = $GLOBALS['TL_LANG']['tl_losungen']['importlosungen'][0];
		$this->template->hrefBack = StringUtil::ampersand(str_replace('&key=importlosungen', '', Environment::get('request')));
		$this->template->goBack = $GLOBALS['TL_LANG']['MSC']['goBack'];
		$this->template->request = StringUtil::ampersand(Environment::get('request'));
		$this->template->token = $requestToken;
		$this->template->submit = StringUtil::specialchars($GLOBALS['TL_LANG']['tl_losungen']['importlosungen'][0]);
		Message::reset();

		// Formular
		$this->template->losungenFileInfo = $this->getLosungenFileInfo();
		$this->template->losungenFileUpload = $this->getLosungenFileUpload();

		if (Input::post('FORM_SUBMIT') == 'tl_importlosung' && $this->blnSave)
		{
			if ($this->importLosungenFromXMLFile($this->strLosungenFilename))
			{
				Message::addConfirmation($GLOBALS['TL_LANG']['tl_losungen']['losungenImportSuccesfull']);
			}
			else
			{
				Message::addError($GLOBALS['TL_LANG']['tl_losungen']['losungenImportError']);
			}
		}

		$this->template->message = Message::generate();

		return $this->template->parse();
	}

	/**
	 * Erzeugt ein TextField-Widget für den Hinweistext
	 *
	 * @return TextField TextField-Widget
	 */
	protected function getLosungenFileInfo()
	{
		$widget = new TextField(array('name' => 'losungenFileInfo'));
		$widget->id = 'losungenFileInfo';
		$widget->label =  $GLOBALS['TL_LANG']['tl_losungen']['losungenFileInfo'][0];
		$strLosungenDownloadLink = sprintf('<a href="%1$s" target="_blank">%1$s</a>', $GLOBALS['TL_LANG']['tl_losungen']['losungenFileInfo'][2]);
		$widget->help = sprintf($GLOBALS['TL_LANG']['tl_losungen']['losungenFileInfo'][1], $strLosungenDownloadLink);

		return $widget;	
	}

	/**
	 * Erzeugt ein Upload-Widget
	 *
	 * @return Upload Upload-Widget
	 */
	protected function getLosungenFileUpload()
	{
		$widget = new Upload(array('name' => 'losungenFileUpload'));
		$widget->id = 'losungenFileUpload';
		$widget->label =  $GLOBALS['TL_LANG']['tl_losungen']['losungenFileUpload'][0];
		if ($GLOBALS['TL_CONFIG']['showHelp'] && strlen($GLOBALS['TL_LANG']['tl_losungen']['losungenFileUpload'][1]))
		{
			$widget->help = $GLOBALS['TL_LANG']['tl_losungen']['losungenFileUpload'][1];
		}
        $widget->extensions = 'xml';

		// Valiate input
		if (Input::post('FORM_SUBMIT') == 'tl_importlosung')
		{
			$widget->validate();

			if ($widget->hasErrors())
			{
				$this->blnSave = false;				
			}

			if (is_array($widget->value))
			{
				$this->strLosungenFilename = $widget->value[0];
			}
		}

		return $widget;	
	}

	/**
	 * Importiert eine Losungsdatei im XML-Format, 
	 * bereits importierte Daten werden ggf. ersetzt bzw. aktualisiert.
	 * @param string $strLosungenXMLFilename Dateipfad zur Import XML Datei
	 *
	 * @return boolean Import ohne Fehler durchgeführt?
	 */
	protected function importLosungenFromXMLFile($strLosungenXMLFilename)
	{
		if ($strLosungenXMLFilename == '')
		{
			Message::addError($GLOBALS['TL_LANG']['tl_losungen']['fileNotExists']);
			return false;
		}

		$objFile = new File($strLosungenXMLFilename, true);
		// File exists?
		if (!$objFile->exists())
		{
			Message::addError($GLOBALS['TL_LANG']['tl_losungen']['fileNotExists']);
			return false;
		}
		// File upload complete?
		if ($objFile->size == 0)
		{
			Message::addError($GLOBALS['TL_LANG']['tl_losungen']['fileTransmitError']);
			return false;
		}
		// Is XML File?
		if ($objFile->extension != 'xml')
		{
			Message::addError($GLOBALS['TL_LANG']['tl_losungen']['fileNoXml']);
			return false;
		}

		try 
		{
			$objXml = new \SimpleXMLElement($objFile->getContent());
			if ($objXml->Losungen == null)
			{
				Message::addError($GLOBALS['TL_LANG']['tl_losungen']['losungenTagNotFound']);
				return false;
			}

			$intNewLosungen = 0;
			$intUpdatedLosungen = 0;

			foreach ($objXml->Losungen as $Losung)
			{
				$losungModel = null;
				$strDatum = substr((string) $Losung->Datum, 0, 10);
				// Datum nach Unix parsen
				$intDatum = 0;
				$objDatum = new Date($strDatum, 'Y-m-d');
				$intDatum = $objDatum->dayBegin;
				// Losung exists?
				$losungModel = LosungenModel::findByDatum($intDatum);
				if ($losungModel == null)
				{
					$losungModel = new LosungenModel();
					$intNewLosungen++;
				}
				else
				{
					$intUpdatedLosungen++;
				}

				// Save the model
				/** 
				 *	TODO: Ersetze diverse Steuerzeichen
				 *  "/ xxx /" durch kursiv
				 *	"# xxx #" durch fett
				 */
				$losungModel->tstamp = time();
				$losungModel->datum_import = $strDatum;
				$losungModel->datum = $intDatum;
				$losungModel->wochentag = (string) $Losung->Wtag;
				// Zusatztexte entfernen
				$losungModel->sonntag = preg_replace('% \(.*%', '', (string) $Losung->Sonntag);
				$losungModel->sonntag_full = (string) $Losung->Sonntag;
				$losungModel->losungstext = $this->replaceTags((string) $Losung->Losungstext);
				$losungModel->losungsvers = (string) $Losung->Losungsvers;
				$losungModel->lehrtext = $this->replaceTags((string) $Losung->Lehrtext);
				$losungModel->lehrtextvers = (string) $Losung->Lehrtextvers;
				$losungModel->save();
			}

			if ($intNewLosungen > 0)
			{
				Message::addConfirmation(sprintf($GLOBALS['TL_LANG']['tl_losungen']['losungenAdded'], $intNewLosungen));
			}
			if ($intUpdatedLosungen > 0)
			{
				Message::addConfirmation(sprintf($GLOBALS['TL_LANG']['tl_losungen']['losungenUpdated'], $intUpdatedLosungen));
			}
		} 
		catch (\Exception $e)
		{
			Message::addError($e->getMessage());
			return false;
		}
		return true;
	}

	/**
	 * Ersetzt diverse Steuerzeichen durch HTML Tags
	 * @param string $strText Quelltext
	 *
	 * @return string Geparster HTML Text
	 */
	protected function replaceTags($strText)
	{
		return preg_replace(
			array(
				'%/(.*)/%U',		// ersetzt alle / .... /
				'%#(.*)#%U'			// ersetzt alle # .... #
				),
			array(
				'<i>\1</i>',
				'<b>\1</b>'
				),
			$strText
		);		
	}
}
