
<div class="memTypes form large-10 medium-9 columns">
    <?= $this->Form->create($memType); ?>
    <fieldset>
        <legend><?= __('Add A New Membership Type') ?></legend>
        <table>
            <tr style="height:30px;" >
                <td width="130px"><b>Membership Name: </b></td>
                <td><?php echo $this->Form->input('mem_name',['label'=>false]); ?></td>
            </tr>
            <tr style="height:30px;" >
                <td><b>Duration: </b></td>
                <td><?php echo $this->Form->input('duration_id',['options'=> $durations, 'label'=>false]); ?></td>
            </tr>
            <tr style="height:30px;" >
                <td><b>Price: </b></td>
                <td><?php echo $this->Form->input('mem_price',['label'=>false]); ?></td>
            </tr>
            <tr style="height:30px;" >
                <td><b>Category: </b></td>
                <td><?php echo $this->Form->input('membership_category_id',['options'=> $memcat,'label'=>false]); ?></td>
            </tr>
        </table>

    </fieldset><br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
