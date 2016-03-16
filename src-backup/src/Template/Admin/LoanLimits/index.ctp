<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#loanLimits').DataTable( {
            "searching":   false,
            "ordering": false,
            "paging": false,
            "info": false
        } );
    } );
</script>
<h2> Borrowing Limits Management</h2>
<div class="loanLimits index large-10 medium-9 columns">
    <table id="loanLimits" cellpadding="0" cellspacing="0">
    <thead>
        <tr>

            <th>Type of Item</th>
            <th>Limit Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($loanLimits as $loanLimit): ?>
        <tr>

            <td><?= h($loanLimit->limit_item_types) ?></td>
            <td><?= $this->Number->format($loanLimit->limit_amounts) ?></td>
            <td>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loanLimit->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
