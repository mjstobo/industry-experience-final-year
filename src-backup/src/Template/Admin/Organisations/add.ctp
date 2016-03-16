<link type="text/css" href="../../webroot/css/form.css" rel="stylesheet" media="all" />

   <div>
    <?= $this->Form->create($organisation, ['class'=>'register']); ?>

        <?= $this->Form->create($organisation); ?>

        <fieldset class="row">
            <legend>Add New Organisation</legend><br>
            <?php
                echo $this->Form->input('user_id', ['options' => $users]);
                echo $this->Form->input('org_type_id', ['options' => $orgTypes]);
                echo $this->Form->input('org_name');
            ?>
        </fieldset>
        <div><button class="button">Submit &raquo;</button></div>
        <?= $this->Form->end() ?>

    </div>