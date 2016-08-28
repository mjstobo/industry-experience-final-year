<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td width="1016px">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo $this->Form->input("authors.{$key}.author_name", ['class'=>'form-control','label'=>false]); ?>
    </div>
    </td>

    <td width="500px">
        <a href="#" class="remove">Remove Author</a>
    </td>
</tr>