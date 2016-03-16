
<div class="itemCopies form large-10 medium-9 columns">
    <?= $this->Form->create($itemCopy, ['class'=>'form-horizontal','novalidate' => true]) ?>
    <span class="inline"><h1>Add copy of existing item </h1></span> <br><br><br>

         <div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="call_number">Select Item <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('item_id', ['label'=>'Select an Item', 'label' => false, 'class'=>'form-control','option'=>$items]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Status <span class="required">*</span></label>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('item_status_id', ['label'=>'Select a Status', 'label' => false, 'class'=>'form-control','option'=>$itemStatuses]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('barcode', ['label'=>'Barcode', 'label' => false, 'class'=>'form-control']); ?>
                        <center><?= $this->Form->button('Add Copy',['class'=>'button']) ?></center>
                    </div>
                </div>
        </div>

    <br>

    <?= $this->Form->end() ?>
</div>


