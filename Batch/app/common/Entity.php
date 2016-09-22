<?php

/**
 * Entity Manager
 *
 * @category  	Batch
 * @package   	Batch\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/vyctory)
 * @license   	https://github.com/vyctory/venus-batch/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 2.0.0
 * @filesource	https://github.com/vyctory/venus-batch
 * @link      	https://github.com/vyctory
 * @since     	2.0.0
 */
namespace Batch\common;

use \Venus\core\Entity as CoreEntity;

/**
 * Entity Manager
 *
 * @category  	src\Batch
 * @package   	src\Batch\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/vyctory)
 * @license   	https://github.com/vyctory/venus-batch/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 2.0.0
 * @filesource	https://github.com/vyctory/venus-batch
 * @link      	https://github.com/vyctory
 * @since     	2.0.0
 */
abstract class Entity extends CoreEntity
{
	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */
	public function __construct()
	{
		parent::__construct();
	}
}
