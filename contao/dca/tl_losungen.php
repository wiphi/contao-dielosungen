<?php

/**
 * @package   DieLosungen
 * @author    Philipp Winkel
 */

use Contao\Backend;
use Contao\Config;
use Contao\Date;
use Contao\DC_Table;


/**
 * Table tl_losungen
 */
$GLOBALS['TL_DCA']['tl_losungen'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => DC_Table::class,
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
				'href' => 'key=dielosungen_importlosungen',
				'class' => 'header_sync',
				'primary' => true
			),
			'all'
		),
		'operations' => array
		(
			'edit',
			'copy',
			'delete',
			'!show'
		)
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
            'default' => Date::parse(Config::get('dateFormat')),
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