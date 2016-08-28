<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
$(document).ready(function(){
 $('#users').DataTable();
});
</script>

<div class="CSSTableGenerator">
    <table id="memberships" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Member</th>
            <th>expiry_date</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($memberships as $members): ?>

        <tr class="clickable" data-href="view/<?= h($members->id); ?>">

            <td><?= h($members->user->given_name) ?> <?= h($members->user->family_name) ?>  </td>

            <td><?= h($members->expiry_date) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>


</div>
<script>
    jQuery(document).ready(function($) {
        $("tr.clickable").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
