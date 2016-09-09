<?= $this->Nav->display(); ?>

<div class="stats form large-9 medium-8 columns content">
    <?= $this->Form->create($stat) ?>
    <fieldset>
        <legend><?= __('Add Stat') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('skills._ids', ['options' => $skills]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
