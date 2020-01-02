<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception;

use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesCSVExporterException;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables CSV exporter exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception
 */
class BadDataTablesCSVExporterExceptionTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new BadDataTablesCSVExporterException(new Exception());

        $this->assertEquals("The DataTables CSV exporter \"Exception\" must implement DataTablesCSVExporterInterface", $obj->getMessage());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructWithNull() {

        $obj = new BadDataTablesCSVExporterException(null);

        $this->assertEquals("The DataTables CSV exporter is null", $obj->getMessage());
    }
}