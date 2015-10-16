<?php

namespace PortlandLabs\Concrete5\MigrationTool\Publisher\Routine;

use Concrete\Core\Page\Type\PublishTarget\Type\Type;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Batch;

defined('C5_EXECUTE') or die("Access Denied.");

class CreatePageTypePublishTargetTypesRoutine implements RoutineInterface
{

    public function execute(Batch $batch)
    {
        $types = $batch->getObjectCollection('page_type_publish_target_type');
        foreach($types->getTypes() as $type) {
            if (!$type->getPublisherValidator()->skipItem()) {
                $pkg = false;
                if ($type->getPackage()) {
                    $pkg = \Package::getByHandle($type->getPackage());
                }
                Type::add($type->getHandle(), $type->getName(), $pkg);
            }
        }
    }

}