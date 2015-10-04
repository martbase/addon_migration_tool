<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import;

/**
 * @Entity
 * @Table(name="MigrationImportObjectCollections")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap( {
 * "page" = "PageObjectCollection",
 * "conversation_editor" = "\PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\EditorObjectCollection",
 * "conversation_flag_type" = "\PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\FlagTypeObjectCollection",
 * "conversation_rating_type" = "\PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\RatingTypeObjectCollection",
 * "page_template" = "PageTemplateObjectCollection",
 * "attribute_key" = "\PortlandLabs\Concrete5\MigrationTool\Entity\Import\AttributeKey\AttributeKeyObjectCollection",
 * "single_page" = "SinglePageObjectCollection",
 * "block_type" = "BlockTypeObjectCollection"
 * } )
 */
abstract class ObjectCollection
{

    /**
     * @Id @Column(type="guid")
     * @GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    abstract public function hasRecords();

    abstract public function getFormatter();

    abstract public function getTreeFormatter();

    abstract public function getType();

    abstract public function getRecords();

    abstract public function getRecordValidator();



}