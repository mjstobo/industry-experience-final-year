
<div class="memberships form large-10 medium-9 columns">
    <?= $this->Form->create($membership); ?>
    <fieldset>
        <legend>Add Membership for <?= h($user->given_name) . ' ' . h($user->family_name); ?> <em style=" font-size:10pt;">ID: #<?= h($user->id); ?></em></legend>
        <?php
            $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}']);
        ?>
        <div class="membership">
        <table>
            <tr>
                <td style="text-align:right;font-weight:700;padding-right:15px;">Membership Type: </td>
                <td><?php echo $this->Form->input('mem_type_id', ['options' => $memberships, 'empty' => 'Membership Type','label'=>false]); ?></td>
            </td>
            <tr>
                <td style="text-align:right;font-weight:700;padding-right:15px;">Join Date: </td>
                <td><?php echo $this->Form->input('join_date', ['label'=>false]); ?></td>
            </td>
            <tr>
                <td style="text-align:right;font-weight:700;padding-right:15px;">Expiry Date: </td>
                <td><?php echo $this->Form->input('expiry_date', ['label'=>false]); ?></td>
            </td>
        </table>
        </div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


