<?php

/**
 * Batch that create entity
 *
 * @category  	Batch
 * @package   	Batch\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/vyctory)
 * @license   	http://www.iscreenway.com/framework/licence.php Tout droit réservé à http://www.iscreenway.com
 * @version   	Release: 2.0.0
 * @filesource	https://github.com/vyctory/venus-batch
 * @link      	https://github.com/vyctory
 * @since     	2.0.0
 *
 * @tutorial    You could launch this Batch in /private/
 * 				php bin/console scaffolding -p [portal]
 * 				-p [portal] => it's the name where you want add your entities and models
 * 				-r [rewrite] => if we force rewrite file
 * 					by default, it's Batch
 */
namespace Batch\Controller;

use \Venus\core\Config as Config;
use \Attila\Batch\Entity as BatchEntity;
use \Attila\Batch\Operation as Operation;
use \Batch\common\Controller as Controller;

/**
 * Batch that create entity
 *
 * @category  	Batch
 * @package   	Batch\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/vyctory)
 * @license   	http://www.iscreenway.com/framework/licence.php Tout droit réservé à http://www.iscreenway.com
 * @version   	Release: 2.0.0
 * @filesource	https://github.com/vyctory/venus-batch
 * @link      	https://github.com/vyctory
 * @since     	2.0.0
 */
class Entity extends Controller
{
	/**
	 * run the batch to create entity
	 * @tutorial bin/console scaffolding
	 *
	 * @access public
	 * @param  array $aOptions options of script
	 * @return void
	 */
	public function runScaffolding(array $aOptions = array())
	{
	    if (!isset($aOptions['p'])) { $aOptions['p'] = 'Batch'; }

	    if (!isset($aOptions['b'])) {
            $nameConnection = Config::get('default_connection');
            $configurationDb = new \stdClass();
            $configurationDb->configuration = Config::get('database')->$nameConnection;
            $configurationDb->configuration->tables = Config::get('tables');
	        $aOptions['b'] = json_encode($configurationDb);
	    }

	    $baseFolder =  __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.
            DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'bundles'.
            DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR;
	    $aOptions['g'] = $baseFolder.$aOptions['p'].DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Entity'.DIRECTORY_SEPARATOR;
	    $aOptions['h'] = $baseFolder.$aOptions['p'].DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR;


        if (!isset($aOptions['o'])) {
            $aOptions['o'] = $baseFolder.'..'.DIRECTORY_SEPARATOR.'conf'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'db.json';
        }

	    if (!defined('ENTITY_NAMESPACE')) { define('ENTITY_NAMESPACE', '\Venus\src\\'.$aOptions['p'].'\Entity'); }
	    if (!defined('MODEL_NAMESPACE')) { define('MODEL_NAMESPACE', '\Venus\src\\'.$aOptions['p'].'\Model'); }
	    
	    $oBatch = new BatchEntity;
	    $oBatch->runScaffolding($aOptions);
	}

    /**
     * run the batch to create entity
     * @tutorial bin/console scaffolding
     *
     * @access public
     * @param  array $aOptions options of script
     * @return void
     */
    public function scaffolding(array $aOptions = array())
    {
        if (!isset($aOptions['p'])) { $aOptions['p'] = 'Batch'; }

        $baseFolder =  __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.
            DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'bundles'.
            DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR;

        $aOptions['g'] = $baseFolder.$aOptions['p'].DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Entity'.DIRECTORY_SEPARATOR;
        $aOptions['h'] = $baseFolder.$aOptions['p'].DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR;
        $aOptions['f'] = $baseFolder.'..'.DIRECTORY_SEPARATOR.'conf'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'db.json';
        $aOptions['e'] =  '\Venus\src\\'.$aOptions['p'].'\Entity';
        $aOptions['m'] =  '\Venus\src\\'.$aOptions['p'].'\Model';

        $oBatch = new BatchEntity;
        $oBatch->scaffolding($aOptions);
    }

    /**
     * run the batch to create entity
     * @tutorial bin/console scaffolding
     *
     * @access public
     * @param  array $aOptions options of script
     * @return void
     */
    public function createDb(array $aOptions = array())
    {
        if (!isset($aOptions['p'])) { $aOptions['p'] = 'Batch'; }

        if (!isset($aOptions['b'])) { $aOptions['b'] = json_encode(Config::get('Db', $aOptions['p'])); }

        $oBatch = new Operation;
        $oBatch->createDb($aOptions);
    }
}
