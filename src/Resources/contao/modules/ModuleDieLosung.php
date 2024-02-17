<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   PhilippWinkel
 * @author    Philipp Winkel
 * @license   GNU
 * @copyright &#40;c&#41; Philipp Winkel 2017
 */


/**
 * Namespace
 */
namespace WiPhi\DieLosungen;

use Contao\BackendTemplate;
use Contao\Config;
use Contao\Date;
use Contao\Module;
use Contao\System;


/**
 * Class ModulePreachmentList
 *
 * @copyright  &#40;c&#41; Philipp Winkel 2017
 * @author     Philipp Winkel
 * @package    DieLosungen
 */
class ModuleDieLosung extends Module
{
    private $requestStack;
    private $scopeMatcher;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_dielosung';


	public function generate()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();

		if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . mb_strtoupper($GLOBALS['TL_LANG']['FMD']['dielosung'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;

			return $objTemplate->parse();
		}		

		return parent::generate();
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{		
		$objToday = new Date();
		$objLosung = null;
		$arrLosung = null;
		$blnLosungAvaible = false;
		$objLosung = LosungenModel::findOneByDatum($objToday->dayBegin);
		
		if ($objLosung != null)
		{
			$arrLosung = $objLosung->row();
			if (is_array($arrLosung))
			{
				$blnLosungAvaible = true;
				$arrLosung['datumFormated'] = Date::parse((($this->dielosung_datumsformat != '') ? $this->dielosung_datumsformat : Config::get('dateFormat')), $arrLosung['datum']);
				$arrLosung['IsSonntag'] = ($arrLosung['sonntag_full'] != ''); 
			}
		}		
		$this->Template->setData($arrLosung);
		$this->Template->blnLosungAvaible = $blnLosungAvaible;
	}
}
