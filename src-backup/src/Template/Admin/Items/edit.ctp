<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php echo $this->Html->script(array(
          '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
          '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
      ));?>
<div>
    <?= $this->Form->create($item, ['class'=>'form-horizontal','novalidate' => true]); ?>

    <span class="inline"><h1>Edit Item </h1></span> * required fields<br><br>


    <div id="wizard" class="form_wizard wizard_horizontal">

            <ul class="wizard_steps">
                <li>
                    <a href="#step-1">
                        <span class="step_no">1</span>
                        <span class="step_descr">
                Step 1<br />
                <small>Item Details</small>
            </span>
                    </a>
                </li>
                <li>
                    <a href="#step-2">
                        <span class="step_no">2</span>
                        <span class="step_descr">
                Step 2<br />
                <small>Author Details</small>
            </span>
                    </a>
                </li>
                <li>
                    <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                Step 3<br />
                <small>Subject details</small>
            </span>
                    </a>
                </li>

            </ul>

            <div id="step-1">
                <center><h2 class="StepTitle">Add Item</h2></center>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Type <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="item_type_id" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="item_type_id" value="1"> &nbsp; Book &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="item_type_id" value="2"> DVD
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="item_type_id" value="3"> Pamphlet
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="item_type_id" value="4"> Journal
                            </label>
                        </div>
                        <?php
                            echo $this->Form->error('item_type_id');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Shelf Category <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('shelf_section_id', ['options' => $shelf_category ,'label' =>'Shelf Category ','empty' => true, 'label' => false, 'class' => 'form-control']);  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="call_number">Call No. <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('call_number', ['class' => 'form-control','label' => false]);  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span></label>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('title', ['class' => 'form-control','label' => false]);  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ISBN <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('isbn', ['class' => 'form-control','label' => false]);  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Edition <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('edition', ['class' => 'form-control','label' => false]);  ?>
                    </div>
                </div>
                <div div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Publisher <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('publisher_id', ['options' => $publishers, 'empty' => true, 'label' => false, 'class' => 'form-control']);  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Year <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('year_id', ['options' => $years ,'label' =>'Publication year','empty' => true, 'label' => false, 'class' => 'form-control']);  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->textarea('description', ['rows' => '4', 'label' => false, 'class' => 'form-control']);?>
                        <?php echo $this->Form->error('description'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Additional Notes <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->textarea('notes', ['rows' => '4', 'label' => false, 'class' => 'form-control']);?>
                    </div>
                </div>
                <span class="catalogue"><?php    echo $this->Form->hidden('catalogue_id', ['value' => 1]);  ?></span>
            </div>


            <div id="step-2">
                <center><h2 class="StepTitle">Add Author(s)</h2></center>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Author(s) <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('authors._ids', ['options' => $authors, 'label'=>false, 'class'=>'form-control', 'size'=>'20']); ?>
                    </div>
                </div>
            </div>




            <div id="step-3">
                <center><h2 class="StepTitle">Add Subject(s)</h2></center>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Subjects(s) <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('subjects._ids', ['options' => $subjects, 'label'=>false, 'class'=>'form-control', 'size'=>'20']); ?>
                    </div>
                </div>
            </div>

    </div>




    <?= $this->Form->end() ?>

</div>






<?php echo $this->Html->script('/js/adminPanel/jquery.min.js'); ?>
<?php echo $this->Html->script('/js/adminPanel/wizard/jquery.smartWizard.js'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            // Smart Wizard
            $('#wizard').smartWizard();

            function onFinishCallback() {
                $('#wizard').smartWizard('showMessage', 'Finish Clicked');
                //alert('Finish Clicked');
            }
        });

        $(document).ready(function () {
            // Smart Wizard
            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

        });
    </script>



