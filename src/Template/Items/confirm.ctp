<?php
    echo $this->Html->css('edit.css');
?>

<?php
echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);

echo $this->Form->create();
?>
        <script>
            $(document).ready(function(){
                $('#items').DataTable( {
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    "searching": false
                } );
            } );
        </script>
        <br>
        <div class="">
            <h1>Confirm Loan</h1>
            <p>You are confirming a loan of the following items:</p>
            <table id="items">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?= h($item->item_copy->item->title); ?></td>
                        <td> <?php foreach($item->item_copy->item->authors as $authors):
                           echo $authors->author_name.", ";
                            endforeach; ?> </td>
                        <td> <?= h($item->item_copy->item->item_type->type_name); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <br>
        </div>

<div>
<p>These items will be posted to the following address:</p>
    <br>
    <p><?php echo $user[0]->street_address." ".$user[0]->suburb.", ".$user[0]->state->state_name." ".$user[0]->postcode; ?></p>
    <br>
    <p><em>*Please note, in order to change this address - Edit your profile or contact EDV staff.</em></p>
</div>

<span class="inline"><?php echo $this->Form->button('Post Items', ['type' => 'submit', 'class'=>'buttonSmall']); ?></span>
Postage will be: <?php echo '$'.$postage; ?>
<br><br>

<span class="holdButton inline"><?php echo $this->Html->link('Hold at Desk', ['controller' => 'Items', 'action' => 'hold', $loan->id]); ?></span>
Items will be held for 2 weeks
<?php echo $this->Form->end();?>
