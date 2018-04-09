<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Wrapper;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Column\DataTablesColumn;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractDataTablesTest;
use WBW\Bundle\JQuery\DatatablesBundle\Wrapper\DataTablesWrapper;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Wrapper
 * @final
 */
final class DataTablesWrapperTest extends AbstractDataTablesTest {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = $this->dataTablesWrapper;

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals("prefix", $obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertEquals([], $obj->getOrder());
        $this->assertTrue($obj->getProcessing());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertEquals("route", $obj->getRoute());
        $this->assertTrue($obj->getServerSide());
    }

    /**
     * Tests the addColumn() method.
     *
     * @return void
     */
    public function testAddColumn() {

        $obj = $this->dataTablesWrapper;

        $obj->addColumn(new DataTablesColumn("name1", "title1"));
        $this->assertCount(1, $obj->getColumns());
        $this->assertEquals("name1", $obj->getColumns()["name1"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name1"]->getMapping()->getPrefix());

        $obj->addColumn(new DataTablesColumn("name2", "title2"));
        $this->assertCount(2, $obj->getColumns());
        $this->assertEquals("name2", $obj->getColumns()["name2"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name2"]->getMapping()->getPrefix());
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $obj = $this->dataTablesWrapper;
        $arg = new DataTablesColumn("name1", "title1");

        $this->assertNull($obj->getColumn("name1"));

        $obj->addColumn($arg);
        $this->assertEquals($arg, $obj->getColumn("name1"));
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        $obj = $this->dataTablesWrapper;

        $obj->parse(new Request());
        $this->assertNotNull($obj->getRequest());
        $this->assertNotNull($obj->getResponse());
    }

    /**
     * Tests the removeColumn() method.
     *
     * @return void
     */
    public function testRemoveColumn() {

        $obj = $this->dataTablesWrapper;

        $col1 = new DataTablesColumn("name1", "title1");
        $col2 = new DataTablesColumn("name2", "title2");

        $obj->addColumn($col1);
        $obj->addColumn($col2);
        $this->assertCount(2, $obj->getColumns());

        $obj->removeColumn($col1);
        $this->assertCount(1, $obj->getColumns());
        $this->assertNull($col1->getMapping()->getPrefix());

        $obj->removeColumn($col2);
        $this->assertCount(0, $obj->getColumns());
        $this->assertNull($col2->getMapping()->getPrefix());
    }

    /**
     * Tests the setMethod() method.
     *
     * @return void
     */
    public function testSetMethod() {

        $obj = $this->dataTablesWrapper;

        $obj->setMethod("GET");
        $this->assertEquals("GET", $obj->getMethod());

        $obj->setMethod("exception");
        $this->assertEquals("GET", $obj->getMethod());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = $this->dataTablesWrapper;

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setProcessing() method.
     *
     * @return void
     */
    public function testSetProcessing() {

        $obj = $this->dataTablesWrapper;

        $obj->setProcessing(false);
        $this->assertFalse($obj->getProcessing());

        $obj->setProcessing(null);
        $this->assertTrue($obj->getProcessing());
    }

    /**
     * Tests the setRoute() method.
     *
     * @return void
     */
    public function testSetRoute() {

        $obj = $this->dataTablesWrapper;

        $obj->setRoute("anotherRoute");
        $this->assertEquals("anotherRoute", $obj->getRoute());
    }

    /**
     * Tests the setRouteArguments() method.
     *
     * @return void
     */
    public function testSetRouteArguments() {

        $obj = $this->dataTablesWrapper;

        $obj->setRouteArguments(["arg1" => "value1"]);
        $this->assertEquals(["arg1" => "value1"], $obj->getRouteArguments());
    }

    /**
     * Tests the setServerSide() method.
     *
     * @return void
     */
    public function testSetServerSide() {

        $obj = $this->dataTablesWrapper;

        $obj->setServerSide(false);
        $this->assertFalse($obj->getServerSide());

        $obj->setServerSide(null);
        $this->assertTrue($obj->getServerSide());
    }

}
