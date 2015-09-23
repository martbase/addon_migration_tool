<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import;

use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\Block\ImportedFormatter;
use PortlandLabs\Concrete5\MigrationTool\Publisher\Block\CIFPublisher;

/**
 * @Entity
 */
class ImportedBlockValue extends BlockValue
{

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getFormatter()
    {
        return new ImportedFormatter($this);
    }

    public function getPublisher()
    {
        return new CIFPublisher();
    }


}