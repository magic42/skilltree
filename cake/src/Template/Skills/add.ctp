<?= $this->Nav->display(); ?>

<div class="skills form large-9 medium-8 columns content">
    <?= $this->Form->create($skill, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Skill') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('photo', ['type' => 'file']);
            echo $this->Form->input('talent_id', ['options' => $talents]);
            echo $this->Form->input('stats._ids', ['options' => $stats]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
