<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Office;
use WBW\Library\Core\Helper\IO\HTTPInterface;

/**
 * Office DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider
 * @final
 */
final class OfficeDataTablesProvider implements DataTablesProviderInterface {

    /**
     * {@inheritdoc}
     */
    public function getColumns() {

        // Initialize the columns.
        $dtColumns = [];

        $dtColumns[] = DataTablesColumn::newInstance("name", "Name");
        $dtColumns[] = DataTablesColumn::newInstance("actions", "Actions")->setOrderable(false)->setSearchable(false);

        // Returns the columns.
        return $dtColumns;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity() {
        return Office::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod() {
        return HTTPInterface::HTTP_METHOD_POST;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return "office";
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefix() {
        return "o";
    }

    /**
     * {@inheritdoc}
     */
    public function getView() {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function renderColumn(DataTablesColumn $dtColumn, $entity) {

        // Initialize the output.
        $output = null;

        // Switch into column data.
        switch ($dtColumn->getData()) {

            case "actions":
                $output = "";
                break;

            case "name":
                $output = $entity->getName();
                break;
        }

        // Return the output.
        return $output;
    }

    /**
     * {@inheritdoc}
     */
    public function renderRow($dtRow, $entity, $rowNumber) {

        // Initialize the output.
        $output = null;

        // Switch into column data.
        switch ($dtRow) {

            case self::DATATABLES_ROW_ATTR:
                break;

            case self::DATATABLES_ROW_CLASS:
                $output = (0 === $rowNumber % 2 ? "even" : "odd");
                break;

            case self::DATATABLES_ROW_DATA:
                $output = ["pkey" => $entity->getId()];
                break;

            case self::DATATABLES_ROW_ID:
                $output = "office_" . $entity->getId();
                break;
        }

        // Return the output.
        return $output;
    }

}