<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Manager;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;

/**
 * DataTables manager test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Manager
 * @final
 */
final class DataTablesManagerTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesManager();

        $this->assertEquals([], $obj->getProviders());
    }

}
