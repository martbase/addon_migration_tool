<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import\AttributeKey;

use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\AttributeKey\BooleanFormatter;


/**
 * @Entity
 * @Table(name="MigrationImportBooleanAttributeKeys")
 */
class BooleanAttributeKey extends AttributeKey
{

    /**
     * @Column(type="boolean")
     */
    protected $is_checked = false;

    /**
     * @return mixed
     */
    public function getIsChecked()
    {
        return $this->is_checked;
    }

    /**
     * @param mixed $is_checked
     */
    public function setIsChecked($is_checked)
    {
        $this->is_checked = $is_checked;
    }

    public function getType()
    {
        return 'boolean';
    }

    public function getFormatter()
    {
        return new BooleanFormatter($this);
    }

}
