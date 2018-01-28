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


/**
 * Class ModulePreachmentList
 *
 * @copyright  &#40;c&#41; Philipp Winkel 2017
 * @author     Philipp Winkel
 * @package    Devtools
 */
class ModuleDieLosung extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_dielosung';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['dielosung'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}		

		return parent::generate();
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{		
		$objToday = new \Date();
		$arrLosung = null;
		$blnLosungAvaible = false;
		$arrLosung = LosungenModel::findOneByDatum($objToday->dayBegin)->row();
		if (is_array($arrLosung))
		{
			$blnLosungAvaible = true;
			$arrLosung['datumFormated'] = \Date::parse((($this->dielosung_datumsformat != '') ? $this->dielosung_datumsformat : \Config::get('dateFormat')), $arrLosung['datum']);
			$arrLosung['IsSonntag'] = ($arrLosung['sonntag_full'] != ''); 
		}		
		$this->Template->setData($arrLosung);
		$this->Template->blnLosungAvaible = $blnLosungAvaible;
	}
}
