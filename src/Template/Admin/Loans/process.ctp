<?php
    echo $this->Html->css(['jquery.dataTables.min']);
    echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
    echo $this->Html->css('viewUserAdmin.css');
    echo $this->Html->script('/js/ajax.js');
?>

<div>
    <br>
    <div class="row">
        <div>
            <div class="x_panel">

                <div class="x_content">
                    <div>
                        <div class="profile_img">
                        <span class="inline"><h3><?= h($user->salutation->salutation_name) ?> <?= h($user->given_name) ?> <?= h($user->family_name)?></h3></span>
                        <br><br>


                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Address</legend>
                                        <?= h($user->street_address) ?>,  <?= h($user->suburb) ?><br>
                                        <?= h($user->state->state_name) ?> <?= h($user->postcode) ?><br>
                                        <?= h($user->country->country_name) ?><br><br>
                                    </fieldset>
                                </div>
                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Additional Information</legend>
                                        <b>Gender:</b> <?= h($user->gender->gender_type) ?><br>
                                        <b>Birth Year:</b> <?= h($user->year->year_number) ?><br>
                                        <b>Contact type:</b> <?= h($user->contact_type->contact_types_name) ?><br><br>
                                    </fieldset>
                                </div>
                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Contact Information</legend>
                                        <b>Email Address:</b> <?= h($user->email_address) ?><br>
                                        <b>Home Phone:</b> <?= h($user->phone_number) ?><br><br><br>
                                    </fieldset>
                                </div>
                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Loan Information</legend>
                                        text<br>
                                        text<br>
                                        text<br><br>
                                    </fieldset>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br>
<div class="items index">
    <p>Items currently in <?php echo $user->given_name ?>'s cart: - </p>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
        <tr>
            <th>Barcode</th>
            <th>Title</th>
            <th>Author</th>
            <th>Type of Item</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart_items as $item): ?>
        <tr>
            <td><?= h($item->item_copy->barcode); ?></td>
            <td><?= h($item->item_copy->item->title); ?></td>
            <td> <?php foreach($item->item_copy->item->authors as $authors):
                echo $authors->author_name.", ";
                endforeach; ?> </td>
            <td><?= h($item->item_copy->item->item_type->type_name); ?></td>
            <td class="actions">
                <?= $this->Form->postLink(__('Remove'), ['controller'=> 'Items','action' => 'remove', $item->id], ['confirm' => __('Are you sure you want to remove '. $item->item_copy->item->title.' from your cart ?')]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<br>
<br>

<div>
    <?php echo $this->Form->create(); ?>
    <table>
        <tr>
            <td><?php echo $this->Form->input('barcode', ['autoFocus' => 'autoFocus']); ?></td>
            <td><?php $this->Form->hidden('user', ['value' => $user->id]); ?></td>
            <td><button>Add Item</button></td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
    <br><br><br>
    <span class="processButton"><?= $this->Form->postLink(__('Process Loan'), ['action' => 'complete', $loan->id], ['confirm' => __('Are you sure you want to proceed with this loan ?')]) ?></span>
    <span class="cancelButton"><?= $this->Form->postLink('Cancel', ['action' => 'createloan'], ['confirm' => __('Are you sure you want to cancel ?')]) ?></span>



</div>


<script>
    $(document).ready(function(){
        $('#items').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false
        } );
    } );
</script>
</div>