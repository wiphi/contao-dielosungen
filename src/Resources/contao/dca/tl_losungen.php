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

use Contao\Backend;
use Contao\Config;
use Contao\Date;


/**
 * Table tl_losungen
 */
$GLOBALS['TL_DCA']['tl_losungen'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('datum'),
			'flag'                    => 1,
			'panelLayout' 			  => 'filter;sort,search,limit',
            'disableGrouping' 		  => false,
			//'child_record_callback'   => array('tl_losungen', 'listLosungen'),
		),
		'label' => array(
			'fields' => array('datum'),
			'format' => '%s',
			'label_callback' => array('tl_losungen', 'listLosungen')
		),
		'global_operations' => array
		(
			'importlosung' => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_losungen']['importlosungen'],
				'href' => 'key=importlosungen',
				'class' => 'header_importlosungen header_icon',
				'attributes' => 'onclick="Backend.getScrollOffset()"',
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			),
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_losungen']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_losungen']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_losungen']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_losungen']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Select
	'select' => array
	(
		'buttons_callback' => array()
	),

	// Edit
	'edit' => array
	(
		'buttons_callback' => array()
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{datum_legend},datum,wochentag,sonntag;{losung_legend},losungstext,losungsvers;{lehrtext_legend},lehrtext,lehrtextvers;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'datum_import' => array
		(
            'sql' => "varchar(10) NOT NULL"  
		),
		'datum' => array
		(
            'label' => &$GLOBALS['TL_LANG']['tl_losungen']['datum'],
            'exclude' => false,
            //'search' => true,
            'sorting' => true,
            //'filter' => true,
            'flag' => 8,            
            'inputType' => 'text',
            'default' => Date::parse(Config::get('dateFormat')),
			//'default' => \Date::parse('Y-m-d'),
            'eval' => array(
                'rgxp' => 'date',                
                'mandatory' => true,
                'doNotCopy' => true, 
                'datepicker' => true, 
                'tl_class' => 'w50 wizard'),
            'sql' => "varchar(10) NOT NULL"  
		),
		'wochentag' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['wochentag'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array(
				'mandatory'=>true, 
				'maxlength'=>15,
				'tl_class' => 'w50'),
			'sql'                     => "varchar(15) NOT NULL default ''"
		),
		'sonntag' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['sonntag'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array(
				'maxlength'=>128,
				'tl_class' => 'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'sonntag_full' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['sonntag_full'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array(
				'maxlength'=>128,
				'tl_class' => 'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'losungstext' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['losungstext'],
			'exclude'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array(
				'mandatory'=>true,
                'allowHtml' => true,
                'rte' => 'tinyMCE'),
			'sql'                     => "text NULL"
		),
		'losungsvers' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['losungsvers'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>50),
			'sql'                     => "varchar(50) NOT NULL default ''"
		),
		'lehrtext' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['lehrtext'],
			'exclude'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array(
				'mandatory'=>true,
				'allowHtml' => true,
                'rte' => 'tinyMCE'),
			'sql'                     => "text NULL"
		),
		'lehrtextvers' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_losungen']['lehrtextvers'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>50),
			'sql'                     => "varchar(50) NOT NULL default ''"
		)
		
	)
);

class tl_losungen extends Backend
{
	/**
	 * Add the type of input field
	 *
	 * @param array $arrRow
	 *
	 * @return string
	 */
	public function listLosungen($arrRow)
	{
		return '<div class="tl_content_left">' 
		. Date::parse(Config::get('dateFormat'), $arrRow['datum'])
		. ' <span style="color:#b3b3b3;padding-left:3px">[' 
		. $arrRow['losungsvers']
		. ']</span> '	
		. '' . $arrRow['losungstext'] . ''
		. '</div>';
	}
}