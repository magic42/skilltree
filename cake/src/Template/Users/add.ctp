<?= $this->Nav->display(); ?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
            echo $this->Form->input('skills._ids', ['options' => $skills]);
            echo $this->Form->input('stats._ids', ['options' => $stats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
