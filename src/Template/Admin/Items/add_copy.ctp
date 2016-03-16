
<div class="itemCopies form large-10 medium-9 columns">
    <?= $this->Form->create($itemCopy, ['class'=>'form-horizontal','novalidate' => true]) ?>
    <span class="inline"><h1>Add copy of existing item </h1></span> <br><br><br>

         <div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Item ID: </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $item->id; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Title: </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $item->title; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('item_status_id', ['label'=>'Select a Status', 'label' => false, 'class'=>'form-control','option'=>$itemStatuses]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('barcode', ['label'=>'Barcode', 'label' => false, 'class'=>'form-control']); ?>
                    </div>
                </div>
        </div>

    <br>

    <button class="button">Add Copy &raquo;</button>
    <?= $this->Html->link(__('Finish'), ['controller'=>'items','action'=>'view',$itemCopy->item_id],['class'=>"button"]) ?></div>
    <?= $this->Form->end() ?>
</div>



