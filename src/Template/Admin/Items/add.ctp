<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="../../webroot/js/library_item.js"></script>
<?php echo $this->Html->script(array(
          '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
          '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
      ));?>
<div>
    <?= $this->Form->create($item, ['class'=>'form-horizontal','novalidate' => true]); ?>

    <span class="inline"><h1>Add New Item </h1></span> * required fields<br><br>



     <span class="item_type">
     <?php
         echo $this->Form->radio('option',[['value' => 'New Item', 'text' => 'New Item', 'name' => 'option','class'=>'option'],
                                           ['value' => 'Existing Item', 'text' => 'Existing Item', 'name' => 'option','class'=>'option']]);
         echo $this->Form->error('option');
     ?>
     </span>

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
                <li>
                    <a href="#step-4">
                        <span class="step_no">4</span>
                        <span class="step_descr">
                Step 4<br />
                <small>Summary</small>
            </span>
                    </a>
                </li>
            </ul>

            <div id="step-1">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="item_type_id" class="btn-group" data-toggle="buttons">

                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="item_type_id" value="1"> &nbsp; Book &nbsp;
                                </label>
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="item_type_id" value="2"> DVD
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="call_number">Call No. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="call_number" required="required" class="form-control col-md-7 col-xs-12" name="call_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="title" required="required" class="form-control col-md-7 col-xs-12" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">ISBN </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="isbn" class="form-control col-md-7 col-xs-12" type="text" name="isbn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edition </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="edition" class="form-control col-md-7 col-xs-12" type="text" name="edition">
                        </div>
                    </div>
                    <div div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Publisher </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('publisher_id', ['options' => $publishers, 'empty' => true, 'label' => false, 'class' => 'form-control']);  ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year <span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('year_id', ['options' => $years ,'label' =>'Publication year','empty' => true, 'label' => false, 'class' => 'form-control']);  ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('description', ['rows' => '4', 'label' => false, 'class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Additional Notes <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('notes', ['rows' => '4', 'label' => false, 'class' => 'form-control']);?>
                        </div>
                    </div>
                    <span class="catalogue"><?php    echo $this->Form->hidden('catalogue_id', ['value' => 1]);  ?></span>
                    <!--<span class="subjects"><?php  foreach ($subjects as $subject=>$label) {  echo $this->Form->input('subjects.ids.$subject', ['value' => $subject ,'label' =>$label , 'type' => 'checkbox']);}  ?>-->
                    <div><button class="button">Add Item &raquo;</button></div>
            <?= $this->Form->end() ?>
            </div>


            <div id="step-2">
                <center><h2 class="StepTitle">Add Author(s)</h2></center>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('item_id', ['options' => $items, 'label'=>false, 'class'=>'form-control']); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="call">Author(s) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('author_id', ['options' => $authors, 'label'=>false, 'class'=>'form-control']); ?>
                        </div>
                    </div>

                    <center><div>
                    <?php echo $this->Form->create('Student'); ?>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="call">Author Name </label>
                            <table id="grade-table">
                                <tbody>
                                    <?php if (!empty($this->request->data['Grade'])) :?>
                                        <?php for ($key = 0; $key < count($this->request->data['Grade']); $key++) :?>
                                            <?php echo $this->element('authors', array('key' => $key));?>
                                        <?php endfor;?>
                                    <?php endif;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="#" class="add">+ Add Author</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <script id="author-template" type="text/x-underscore-template">
                                <?php echo $this->element('authors');?>
                            </script>
                    </div></center>
                    <div><button class="button">Add Item &raquo;</button></div>
            </div>





            <div id="step-3">
                <center><h2 class="StepTitle">Add Subject(s)</h2></center>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('item_id', ['options' => $items, 'label'=>false, 'class'=>'form-control']); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="call">Subject(s) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input('subject_id', ['options' => $subjects, 'label'=>false, 'class'=>'form-control','multiple'=>true, 'size'=>'10']); ?>
                        </div>
                    </div>
            </div>



            <div id="step-4">
                <center><h2 class="StepTitle">Item Summary</h2><center>
                <div><?= $this->Html->link(__('Add Copy'), ['class' => 'button','action' => 'addCopy', $item_id])?></div>


            </div>
    </div>






    <div id="existing-item-form">


    </div>


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


    <?php echo $this->Html->script(array(
              '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
              '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
          )); ?>


<script>
$(document).ready(function() {
    var
        gradeTable = $('#grade-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#author-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();

            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();

            $(this)
                .closest('tr')
                .fadeOut('fast', function() {
                    $(this).remove();
                });
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }
});
</script>

