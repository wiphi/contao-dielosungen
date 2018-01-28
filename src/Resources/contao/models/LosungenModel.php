<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Losungen;


/**
 * Reads and writes Losungen
 *
 * @property integer $id
 * @property integer $tstamp
 *
 * @method static \LosungenModel|null findById($id, $opt=array())
 * @method static \LosungenModel|null findByPk($id, $opt=array())
 * @method static \LosungenModel|null findByIdOrAlias($val, $opt=array())
 * @method static \LosungenModel|null findOneBy($col, $val, $opt=array())
 * @method static \LosungenModel|null findOneByTstamp($val, $opt=array())
 * @method static \LosungenModel|null findOneByTitle($val, $opt=array())
 * @method static \LosungenModel|null findOneByJumpTo($val, $opt=array())
 * @method static \LosungenModel|null findOneByProtected($val, $opt=array())
 * @method static \LosungenModel|null findOneByGroups($val, $opt=array())
 * @method static \LosungenModel|null findOneByAllowComments($val, $opt=array())
 * @method static \LosungenModel|null findOneByNotify($val, $opt=array())
 * @method static \LosungenModel|null findOneBySortOrder($val, $opt=array())
 * @method static \LosungenModel|null findOneByPerPage($val, $opt=array())
 * @method static \LosungenModel|null findOneByModerate($val, $opt=array())
 * @method static \LosungenModel|null findOneByBbcode($val, $opt=array())
 * @method static \LosungenModel|null findOneByRequireLogin($val, $opt=array())
 * @method static \LosungenModel|null findOneByDisableCaptcha($val, $opt=array())
 *
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByTstamp($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByTitle($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByJumpTo($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByProtected($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByGroups($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByAllowComments($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByNotify($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findBySortOrder($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByPerPage($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByModerate($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByBbcode($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByRequireLogin($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findByDisableCaptcha($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findMultipleByIds($val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findBy($col, $val, $opt=array())
 * @method static \Model\Collection|\LosungenModel[]|\LosungenModel|null findAll($opt=array())
 *
 * @method static integer countById($id, $opt=array())
 * @method static integer countByTstamp($val, $opt=array())
 * @method static integer countByTitle($val, $opt=array())
 * @method static integer countByJumpTo($val, $opt=array())
 * @method static integer countByProtected($val, $opt=array())
 * @method static integer countByGroups($val, $opt=array())
 * @method static integer countByAllowComments($val, $opt=array())
 * @method static integer countByNotify($val, $opt=array())
 * @method static integer countBySortOrder($val, $opt=array())
 * @method static integer countByPerPage($val, $opt=array())
 * @method static integer countByModerate($val, $opt=array())
 * @method static integer countByBbcode($val, $opt=array())
 * @method static integer countByRequireLogin($val, $opt=array())
 * @method static integer countByDisableCaptcha($val, $opt=array())
 */
class LosungenModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_losungen';

	/**
	 * Primary key
	 * @var string
	 */
	protected static $strPk = 'datum';


}
