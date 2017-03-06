<?php defined('C5_EXECUTE') or die("Access Denied.");
$dh = Core::make('helper/date');
/* @var \Concrete\Core\Localization\Service\Date $dh */
?>
<div class="ccm-dashboard-header-buttons btn-group">
    <a href="<?=$view->action('view_batch', $batch->getID())?>" class="btn btn-default"><i class="fa fa-angle-double-left"></i> <?=t('Back to Batch')?></a>
</div>


<form method="post" action="<?=$view->action('save_batch_settings')?>">
    <?=$token->output('save_batch_settings')?>
    <?=$form->hidden('id', $batch->getID())?>

<fieldset>
    <legend><?=t('Basics')?></legend>

    <?php if (count($sites) > 1) { ?>
        <div class="form-group">
            <?=Loader::helper("form")->label('siteID', t('Site'))?>
            <select name="siteID" class="form-control">
                <?php foreach($sites as $site) { ?>
                    <option value="<?=$site->getSiteID()?>" <?php if ($batch->getSite()->getSiteID() == $site->getSiteID()) { ?>selected<?php } ?>><?=$site->getSiteName()?></option>
                <?php } ?>
            </select>
        </div>
    <?php } ?>
    <div class="form-group">
        <?=Loader::helper("form")->label('notes', t('Notes'))?>
        <?=Loader::helper('form')->textarea('notes', $batch->getNotes(), array("rows" => "3"))?>
    </div>
</fieldset>

<fieldset>
    <legend><?=t('Mapping Definitions')?></legend>
    <div class="form-group">
        <label class="control-label launch-tooltip" title="<?=t('Downloads all the current mappings as an XML file. This file can then be reused across multiple batches to save time.')?>"><?=t('Download Mappings')?></label>
        <div><button type="submit" name="download_mappings" value="1" class="btn btn-default"><?=t('Download Current Definitions')?></div>
    </div>
</fieldset>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <a href="<?=$view->action('view_batch', $batch->getID())?>" class="btn btn-default"><?=t('Cancel')?></a>
            <button class="pull-right btn btn-primary" type="submit"><?=t('Save')?></button>
        </div>
    </div>
</form>