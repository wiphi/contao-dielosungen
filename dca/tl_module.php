<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['dielosung']   = '{title_legend},name,headline,type;{config_legend},dielosung_datumsformat;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space;';
$GLOBALS['TL_DCA']['tl_module']['fields']['dielosung_datumsformat'] = array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dielosung_datumsformat'],
        'exclude'                 => true,
        'inputType'               => 'text',
        'eval'                    => array('mandatory'=>false, 'helpwizard'=>true, 'maxlength'=>25),
        'explanation'             => 'dateFormat',
        'sql'                     => "varchar(25) NOT NULL default ''"
    );